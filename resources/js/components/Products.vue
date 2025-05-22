<template>
  <section class="products px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Produtos</h2>

    <div class="overflow-x-auto">
      <div class="flex gap-4 w-max mx-auto max-w-[1200px]" id="products-container">
        <div
          v-for="product in products"
          :key="product.id"
          class="group relative min-w-[200px] bg-white border border-gray-200 rounded-xl shadow-md p-4 flex-shrink-0 transition duration-300 hover:shadow-lg"
        >
          <!-- Imagem do produto -->
          <img
            :src="product.image"
            :alt="product.name"
            class="w-full h-40 object-cover rounded-md mb-2"
          />

          <!-- Informações do produto -->
          <h3 class="text-lg font-semibold text-gray-800">{{ product.name }}</h3>
          <p class="text-primary font-bold mt-1">R$ {{ product.price.toFixed(2) }}</p>

          <!-- Botão que aparece no hover -->
          <button
            class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-primary text-white text-sm px-4 py-2 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300"
          >
            Adicionar ao carrinho
          </button>
        </div>
      </div>
    </div>
  </section>
</template>



  
  <script lang="ts" setup>
  
  import type { Product } from '../types/Product'
  const products: Product[] = [
  {
    id: 1,
    name: 'Batom Matte Ruby Rose',
    price: 19.9,
    image: '/images/batom.jpg'
    },
    {
      id: 2,
      name: 'Base Líquida Avon',
      price: 29.9,
      image: '/images/base.jpg'
    },
    {
      id: 3,
      name: 'Batom Matte Ruby Rose',
      price: 19.9,
      image: '/images/batom.jpg'
    },
    {
      id: 4,
      name: 'Batom Matte Ruby Rose',
      price: 19.9,
      image: '/images/batom.jpg'
    },
    {
      id: 5,
      name: 'Batom Matte Ruby Rose',
      price: 19.9,
      image: '/images/batom.jpg'
    },
    

]
  </script>
  
  <style scoped>
  .product-list {
    display: flex;
    gap: 1rem;
  }
  .product-card {
    border: 1px solid #ddd;
    padding: 1rem;
    width: 200px;
  }
  </style>
  