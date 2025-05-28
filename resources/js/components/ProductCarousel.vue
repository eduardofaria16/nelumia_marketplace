<template>
  <section class="w-full py-10 bg-white">
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
          <button class="bg-[#267b7d] hover:bg-[#f2663b] text-white font-semibold px-4 py-2 rounded-lg transition-colors duration-200 w-full">
            Comprar
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
const products = [
  {
    id: 1,
    name: 'Sabonete Facial',
    price: 'R$ 59,90',
    image: 'https://via.placeholder.com/150x150.png?text=Sabonete',
  },
  {
    id: 2,
    name: 'Sérum Vitamina C',
    price: 'R$ 89,90',
    image: 'https://via.placeholder.com/150x150.png?text=Serum',
  },
  {
    id: 3,
    name: 'Hidratante',
    price: 'R$ 79,90',
    image: 'https://via.placeholder.com/150x150.png?text=Hidratante',
  },
  {
    id: 4,
    name: 'Protetor Solar',
    price: 'R$ 69,90',
    image: 'https://via.placeholder.com/150x150.png?text=Protetor',
  },
  {
    id: 5,
    name: 'Tônico Facial',
    price: 'R$ 49,90',
    image: 'https://via.placeholder.com/150x150.png?text=Tônico',
  },
  {
    id: 6,
    name: 'Máscara Facial',
    price: 'R$ 39,90',
    image: 'https://via.placeholder.com/150x150.png?text=Máscara',
  },
];
</script>

<style scoped>
/* Remover estilos de scrollbar, pois não há mais overflow-x */
</style> 