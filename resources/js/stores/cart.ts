import { usePage } from '@inertiajs/vue3'
import { defineStore } from 'pinia'
import axios from 'axios'

export const useCartStore = defineStore('cart', {
  state: () => ({
    items: [] as {
      product_id: number
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

    async addCart() {
      const isAuthenticated = usePage().props.auth?.user;

      if (isAuthenticated) {
        await axios.post('/cart/add')
      } 
    },

    async migrateLocalCart(){
      const guestCart = JSON.parse(localStorage.getItem('cart'));
      if (guestCart && guestCart.length > 0) {
          try {
              await axios.post('/cart/migrate', { items: guestCart });
              localStorage.removeItem('cart');
          } catch (error) {
              console.error('Erro ao migrar o carrinho:', error);
          }
      }
    },

    async addToCart(product: { id: number; name: string; price: number; image: string }) {
      const isAuthenticated = usePage().props.auth?.user;

      if (isAuthenticated) {
        await axios.post('/cart', {
          product_id: product.id,
          price: product.price,
          name: product.name,
        })
        const item = this.items.find((i) => i.product_id === product.id)
        
        if (item) {
          item.quantity+=1
        } else {
          this.items.push({ ...product, quantity: 1 })
        }

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

    async increaseQuantity(id: number,quantity: number) {
      const isAuthenticated = usePage().props.auth?.user;
      console.log(id, quantity + 1);
    
      if (isAuthenticated) {
        try {
          const response = await axios.put(`/cart/${id}`, { id, quantity: quantity + 1 });
          // Atualiza o item no array local com a nova quantidade
          const item = this.items.find((i) => i.product_id === id);
          console.log(item);
          if (item) {
            item.quantity = quantity + 1;
          }
        } catch (error) {
          console.error('Erro ao atualizar quantidade:', error);
        }
      } else {
        const item = this.items.find((i) => i.id === id);
        if (item) {
          item.quantity++;
          this.saveToLocalStorage();
        }
      }
    },

    async decreaseQuantity(id: number,quantity: number) {
      const isAuthenticated = usePage().props.auth?.user;

      if (isAuthenticated) {
        try {
          const response = await axios.put(`/cart/${id}`, { id, quantity: quantity + 1 });
          // Atualiza o item no array local com a nova quantidade
          const item = this.items.find((i) => i.product_id === id);
          console.log(item);
          if (item) {
            item.quantity = quantity - 1;
          }
        } catch (error) {
          console.error('Erro ao atualizar quantidade:', error);
        }
      }else {
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
        this.items = this.items.filter((i) => i.product_id !== id)
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
          console.log(this.items);
        })
      } else {
        this.loadFromLocalStorage()
      }
    },
    
    async finishOrder() {
      const isAuthenticated = usePage().props.auth?.user;


      if (isAuthenticated) {
        const response = await axios.post('/checkout', {
          items: this.items,
          total: this.subtotal,
        })
        window.location.href = response.data.url;
      } else {
        const response = await axios.post('/checkout', {
          items: this.items,
          total: this.subtotal,
        })
        window.location.href = response.data.url;
      }
    }
  },
})
