<template>
  <section class="w-full bg-white py-10 flex justify-center" id ="kit-destaque">
    <div class="flex flex-col md:flex-row items-center gap-10 max-w-5xl w-full shadow-lg rounded-xl p-6 border border-[#267b7d]">
      <img
        src="https://via.placeholder.com/400x400.png?text=Kit+Nelumia"
        alt="Kit Nelumia"
        class="w-64 h-64 md:w-[400px] md:h-[400px] md:max-w-none object-cover rounded-xl md:rounded-2xl md:border-4 md:border-[#267b7d] md:shadow-xl bg-white"
      />
      <div class="flex-1 flex flex-col items-center md:items-start text-center md:text-left">
        <h2 class="text-2xl md:text-3xl font-bold text-[#267b7d] mb-2">KIT NELUMIA</h2>
        <p class="text-base text-[#267b7d] mb-4">O combo perfeito para sua rotina de autocuidado. Produtos exclusivos para realçar sua beleza natural.</p>
        <span class="text-2xl font-bold text-[#f2663b] mb-4">R$ 297,00</span>
        <button @click="addToCart" class="bg-[#267b7d] hover:bg-[#f2663b] text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-200 shadow-md">
          Comprar agora
        </button>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { useCartStore } from '@/stores/cart'

const cart = useCartStore()

function addToCart() {
  cart.addToCart({
    id: 1,
    name: 'Kit Nelumia',
    price: 297.0,
    image: 'https://via.placeholder.com/80x80.png?text=Kit+Nelumia',
  })
}
</script> 