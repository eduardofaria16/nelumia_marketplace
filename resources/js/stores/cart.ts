import { defineStore } from 'pinia'

export const useCartStore = defineStore('cart', {
  state: () => ({
    items: []
  }),
  getters: {
    stotalItems: (state: { items: { id: number; quantity: number }[] }) => state.items.reduce((sum, item) => sum + item.quantity, 0)
  },
  actions: {
    addItem(productId: number, quantity: number) {
      const existingItem = true;

      if (existingItem) {
        console.log('Item already exists')
      } else {
        console.log('Item does not exist')
      }
    }
  }
})
