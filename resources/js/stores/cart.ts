import { usePage } from '@inertiajs/vue3'
import { defineStore } from 'pinia'
import axios from 'axios';


export const useCartStore = defineStore('cart', {
  state: () => ({
    items: [] as {
      id: number
      name: string
      price: number
      quantity: number
      image: string
    }[],
  }),
  getters: {
    totalItems: (state) => state.items.reduce((acc, item) => acc + item.quantity, 0),
    subtotal: (state) => state.items.reduce((acc, item) => acc + item.price * item.quantity, 0),
  },
  actions: {
    async addToCart(product: { id: number; name: string; price: number; image: string}) {

      const isAuthenticated = usePage().props.auth?.user;

        if (!isAuthenticated) {

             await axios.post('/cart', {
              product_id: product.id,
              price: product.price,
              name: product.name,
            })

        }else{
          const item = this.items.find((i) => i.id === product.id)
          if (item) {
            item.quantity++
          } else {
            this.items.push({ ...product, quantity: 1 })
          }
        }
    },
    increaseQuantity(id: number) {
      const item = this.items.find((i) => i.id === id)
      if (item) item.quantity++
    },
    decreaseQuantity(id: number) {
      const item = this.items.find((i) => i.id === id)
      if (item && item.quantity > 1) item.quantity--
    },
    removeItem(id: number) {
      this.items = this.items.filter((i) => i.id !== id)
    },
  },
})
