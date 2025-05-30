import { usePage } from '@inertiajs/vue3'
import { defineStore } from 'pinia'
import axios from 'axios'

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
    totalItems: (state) => state.items.length,
    subtotal: (state) => state.items.reduce((acc, item) => acc + item.price * item.quantity, 0),
  },
  actions: {
    async addToCart(product: { id: number; name: string; price: number; image: string }) {
      const isAuthenticated = usePage().props.auth?.user;

      if (isAuthenticated) {
        await axios.post('/cart', {
          product_id: product.id,
          price: product.price,
          name: product.name,
        })
      } else {
        const item = this.items.find((i) => i.id === product.id)
        if (item) {
          item.quantity+=1
        } else {
          this.items.push({ ...product, quantity: 1 })
        }
        this.saveToLocalStorage()
      }
    },

    async increaseQuantity(id: number) {
      const isAuthenticated = usePage().props.auth?.user;

      if (isAuthenticated) {
        await axios.put(`/cart/${id}`, { $params: { id: id, quantity: this.items.find((i) => i.id === id)?.quantity + 1 } })
      } else {
        const item = this.items.find((i) => i.id === id)
        if (item) {
          item.quantity++
          this.saveToLocalStorage()
        }
      }
    },

    async decreaseQuantity(id: number) {
      const isAuthenticated = usePage().props.auth?.user;

      if (isAuthenticated) {
        await axios.put(`/cart/${id}`, { $params: { id: id, quantity: this.items.find((i) => i.id === id)?.quantity - 1 } })
      } else {
        const item = this.items.find((i) => i.id === id)
        if (item && item.quantity > 1) {
          item.quantity--
          this.saveToLocalStorage()
        }
      }
    },

    async removeItem(id: number) {
      const isAuthenticated = usePage().props.auth?.user;

      if (isAuthenticated) {
        await axios.delete(`/cart/${id}`)
      } else {
        this.items = this.items.filter((i) => i.id !== id)
        this.saveToLocalStorage()
      }
    },

    saveToLocalStorage() {
      localStorage.setItem('cart', JSON.stringify(this.items))
    },

    loadFromLocalStorage() {
      const data = localStorage.getItem('cart')
      if (data) {
        this.items = JSON.parse(data)
      }
    },

    async getCart() {
      const isAuthenticated = usePage().props.auth?.user;

      if (isAuthenticated) {
        await axios.get('/cart').then((response) => {
          this.items = response.data
        })
      } else {
        this.loadFromLocalStorage()
      }
    },
    
    async finishOrder() {
      const isAuthenticated = usePage().props.auth?.user;

      if (isAuthenticated) {
        await axios.post('/cart/finish', {
          items: this.items,
          total: this.subtotal,
        })

      } else {
        console.log(this.items);
      } 
    }
  },
})
