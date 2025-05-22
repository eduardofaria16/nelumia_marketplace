<script setup lang="ts">
import { ShoppingBag, User, Menu } from 'lucide-vue-next';

import { ref, onMounted } from 'vue';
import Cart from './Cart.vue';

const cartRef = ref();

function openCart() {
  cartRef.value?.openCart();
}

const isMobileMenuOpen = ref(false);
</script>

<template>
  <header class="w-full px-4 py-3 shadow-md bg-white relative">
    <div class="flex items-center justify-between">
      <!-- Botão menu hambúrguer (mostrado apenas no mobile) -->
      <button
        class="lg:hidden text-black"
        @click="isMobileMenuOpen = !isMobileMenuOpen"
      >
        <Menu class="w-6 h-6" />
      </button>

      <!-- Nome da marca (centralizado no mobile) -->
      <div class="text-2xl font-bold text-black absolute left-1/2 transform -translate-x-1/2 lg:static lg:translate-x-20">
        Nelumia
      </div>
      
    <!-- Menu navegação -->
    <nav
        class="flex-col text-gray-700 font-medium gap-4 lg:gap-6 lg:flex-row lg:items-center lg:justify-center"
        :class="{
        'flex mt-4': isMobileMenuOpen,
        'hidden': !isMobileMenuOpen,
        'lg:flex': true,
        'lg:mt-0': true
    }"
    >

      <a href="#" class="hover:text-primary transition">Sobre nós</a>
      <a href="#" class="hover:text-primary transition">Home</a>
      <a href="#products-container" class="hover:text-primary transition">Produtos</a>
    </nav>
      <!-- Ícones (mantém na direita em todas as telas) -->
      <div class="flex items-center gap-4 text-black">
        <ShoppingBag
        class="w-6 h-6 cursor-pointer hover:text-primary text-black transition"
        @click="openCart"
        />
        <User class="w-6 h-6 cursor-pointer hover:text-primary transition" />
      </div>
      
    </div>

    <Cart ref="cartRef" />
  </header>
</template>
