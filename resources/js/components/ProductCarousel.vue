<template>
  <section class="w-full py-10 bg-white" id="produtos">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-2xl md:text-3xl font-bold text-[#267b7d] mb-6 text-center">Produtos em Destaque</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <div
          v-for="product in products"
          :key="product.id"
          class="bg-white border border-[#267b7d] rounded-xl shadow-md flex flex-col items-center p-6"
        >
          <img :src="product.image" :alt="product.name" class="w-40 h-40 object-cover rounded-lg mb-4" />
          <h3 class="text-lg font-semibold text-[#267b7d] mb-1">{{ product.name }}</h3>
          <span class="text-[#f2663b] font-bold text-base mb-2">{{ product.price }}</span>
          <button
            class="bg-[#267b7d] hover:bg-[#f2663b] text-white font-semibold px-4 py-2 rounded-lg transition-colors duration-200 w-full"
            @click="addToCart(product)"
          >
            Comprar
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { useCartStore } from '@/stores/cart'

const cart = useCartStore()

const products = [
  {
    id: 2,
    name: 'Sabonete Facial',
    price: 59.9,
    image: 'https://via.placeholder.com/150x150.png?text=Sabonete',
  },
  {
    id: 3,
    name: 'Sérum Vitamina C',
    price: 89.9,
    image: 'https://via.placeholder.com/150x150.png?text=Serum',
  },
  {
    id: 4,
    name: 'Hidratante',
    price: 79.9,
    image: 'https://via.placeholder.com/150x150.png?text=Hidratante',
  },
  {
    id: 5,
    name: 'Protetor Solar',
    price: 69.9,
    image: 'https://via.placeholder.com/150x150.png?text=Protetor',
  },
  {
    id: 6,
    name: 'Tônico Facial',
    price: 49.9,
    image: 'https://via.placeholder.com/150x150.png?text=Tônico',
  },
  {
    id: 7,
    name: 'Máscara Facial',
    price: 39.9,
    image: 'https://via.placeholder.com/150x150.png?text=Máscara',
  },
]

function addToCart(product: any) {
  cart.addToCart(product)
}
</script>
