<script setup lang="ts">
// Exemplo estático. Depois pode vir via props ou fetch.
const produto = {
  imagem: '/images/produto1.jpg',
  descricao: 'Hidratante Facial com Ácido Hialurônico 50ml',
};
</script>

<template>
  <div class="flex flex-col items-center justify-center p-6">
    <h1 class="text-2xl font-bold mb-6 text-center">Produtos em destaque</h1>

    <div class="w-72 rounded-2xl border-4 border-primary shadow-xl overflow-hidden bg-white">
      <img
        :src="produto.imagem"
        alt="Produto em destaque"
        class="w-full h-72 object-cover"
      />
      <div class="p-4 text-center">
        <p class="text-gray-800 font-medium">{{ produto.descricao }}</p>
      </div>
    </div>
  </div>
</template>
