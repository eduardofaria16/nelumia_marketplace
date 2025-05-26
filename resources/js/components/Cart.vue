<!-- components/CartDrawer.vue -->
<template>
    <!-- fundo escuro opcional -->
    <div
      v-if="isOpen"
      class="fixed inset-0 bg- bg-opacity-50 z-40"
      @click.self="closeCart"
    ></div>
  
    <!-- cart lateral -->
    <aside
      :class="[
        'fixed top-0 right-0 h-full w-80 bg-white shadow-lg z-50 transform transition-transform duration-300',
        isOpen ? 'translate-x-0' : 'translate-x-full'
      ]"
    >
      <div class="p-4 flex justify-between items-center border-b">
        <h2 class="text-xl text-black">Seu carrinho</h2>
        <button @click="closeCart" class="text-gray-500 hover:text-black">&times;</button>
      </div>
  
      <div class="p-4">
        <p class="text-gray-500">Carrinho vazio</p>
        <!-- Aqui você pode listar os produtos depois -->
      </div>
    </aside>
  </template>
  
  <script setup lang="ts">
  import { ref, defineExpose } from 'vue';
  
  const isOpen = ref(false);
  
  function openCart() {
    isOpen.value = true;
  }
  
  function closeCart() {
    isOpen.value = false;
  }
  
  // Permite o componente pai controlar a abertura
  defineExpose({ openCart, closeCart });
  </script>
  