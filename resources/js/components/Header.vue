<script setup lang="ts">
import { ShoppingBag, User, Menu } from 'lucide-vue-next';
import { ref, onMounted, onUnmounted } from 'vue';
import Cart from './Cart.vue';
import UserComponent from './User.vue';
import { usePage } from '@inertiajs/vue3';




const userRef = ref();
function openUserDialog() {
  const isAuthenticated = usePage().props.auth?.user;
  if (!isAuthenticated) {
    userRef.value?.openAuthDialog();
  } else {
    console.log(isAuthenticated);
    userRef.value?.openPopover();
  }
}

const isMobileMenuOpen = ref(false);

// Controla se o usuário rolou a página
const isScrolled = ref(false);
const handleScroll = () => {
  isScrolled.value = window.scrollY > 10;
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});
onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
  <header
    :class="[
      'w-full px-6 transition-all duration-300 fixed top-0 left-0 z-50 bg-white shadow-md',
      isScrolled ? 'py-2' : 'py-3'
    ]"
    
  >
    <div class="flex items-start justify-between w-full mx-auto max-w-7xl">
      <!-- Botão hambúrguer (mobile) -->
      <button
        class="lg:hidden text-[#267b7d] hover:text-[#f2663b] transition duration-200"
        @click="isMobileMenuOpen = !isMobileMenuOpen"
      >
        <Menu class="w-6 h-6" />
      </button>

      <!-- Logo -->
      <div class="text-2xl font-bold text-[#267b7d]">
        Nelumia
      </div>

      <!-- Menu (desktop) -->
      <nav class="hidden lg:flex justify-center gap-6 mt-4 text-[#267b7d] font-medium">
        <a href="#" class="hover:text-[#f2663b] transition duration-200">Sobre nós</a>
        <a href="#" class="hover:text-[#f2663b] transition duration-200">Home</a>
        <a href="#products-container" class="hover:text-[#f2663b] transition duration-200">Produtos</a>
        <a href="#products-container" class="hover:text-[#f2663b] transition duration-200">Rotina</a>
        <a href="#products-container" class="hover:text-[#f2663b] transition duration-200">Cuidados</a>
      </nav>


      <!-- Ícones -->
      <div class="flex items-center gap-4 text-[#267b7d] lg:right-6">
        <Cart />
        <UserComponent ref="userRef" />
        <User 
              class="w-6 h-6 cursor-pointer hover:text-[#f2663b] transition duration-200" 
              @click="openUserDialog"
        />

      </div>
    </div>

    <!-- Menu (mobile) -->
    <nav
      class="flex-col text-[#267b7d] font-medium gap-4 lg:hidden transition-all duration-300"
      :class="{
        'flex mt-4': isMobileMenuOpen,
        'hidden': !isMobileMenuOpen
      }"
    >
      <a href="#" class="hover:text-[#f2663b] transition duration-200">Sobre nós</a>
      <a href="#" class="hover:text-[#f2663b] transition duration-200">Home</a>
      <a href="#products-container" class="hover:text-[#f2663b] transition duration-200">Produtos</a>
      <a href="#products-container" class="hover:text-[#f2663b] transition duration-200">Rotina</a>
      <a href="#products-container" class="hover:text-[#f2663b] transition duration-200">Cuidados</a>
    </nav>

    <!-- <Cart ref="cartRef" /> -->
    <!-- <UserComponent ref="userRef" /> -->
  </header>
</template>
