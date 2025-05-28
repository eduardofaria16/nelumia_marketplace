<template>
  <section class="w-full py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-2xl md:text-3xl font-bold text-[#267b7d] mb-6 text-center">Siga a Nelumia no Instagram</h2>
      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        <div
          v-for="img in images"
          :key="img"
          class="aspect-square overflow-hidden rounded-xl border-2 border-[#267b7d] hover:scale-105 transition-transform duration-200 bg-gray-100 cursor-pointer"
        >
          <img :src="img" alt="Instagram Nelumia" class="w-full h-full object-cover" />
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
const images = [
  'https://via.placeholder.com/400x400.png?text=Insta+1',
  'https://via.placeholder.com/400x400.png?text=Insta+2',
  'https://via.placeholder.com/400x400.png?text=Insta+3',
  'https://via.placeholder.com/400x400.png?text=Insta+4',
  'https://via.placeholder.com/400x400.png?text=Insta+5',
  'https://via.placeholder.com/400x400.png?text=Insta+6',
  'https://via.placeholder.com/400x400.png?text=Insta+7',
  'https://via.placeholder.com/400x400.png?text=Insta+8',
];
</script> 