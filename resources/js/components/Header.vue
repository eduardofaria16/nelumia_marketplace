<script setup lang="ts">
import { ShoppingBag, User, Menu } from 'lucide-vue-next';
import { ref, onMounted, onUnmounted } from 'vue';
import Cart from './Cart.vue';
import UserComponent from './User.vue';
import { usePage } from '@inertiajs/vue3';
import { useCartStore } from '@/stores/cart';

const cart = useCartStore();

const userRef = ref();
function openUserDialog() {
  const isAuthenticated = usePage().props.auth?.user;

  if (!isAuthenticated) {
    userRef.value?.openAuthDialog();
  } else {
    console.log(isAuthenticated.name);
    userRef.value?.openPopover(isAuthenticated.name);

  }
}
onMounted(() => {
  cart.getCart();
});

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
      'w-full px-6 transition-all duration-300 fixed top-10 left-0 z-50 bg-white shadow-sm border-b border-[#267b7d]/10',
      isScrolled ? 'py-2' : 'py-3'
    ]"
    
  >
    <div class="flex items-center justify-between w-full mx-auto max-w-7xl">
      <!-- Botão hambúrguer (mobile) -->
      <button
        class="lg:hidden text-[#267b7d] hover:text-[#f2663b] transition duration-200"
        @click="isMobileMenuOpen = !isMobileMenuOpen"
      >
        <Menu class="w-7 h-7" />
      </button>

      <!-- Logo -->
      <div class="flex items-center gap-2 text-3xl font-extrabold tracking-wide text-[#267b7d] select-none">
        <img 
          src="https://via.placeholder.com/48x48.png?text=Logo" 
          alt="Logo" 
          class="w-5 h-5 object-contain"
        />
        <a href="#home">NELUMIA</a>
      </div>

      <!-- Menu (desktop) -->
      <nav class="hidden lg:flex items-center gap-8 text-[#267b7d] font-medium">
        <a href="#home" class="hover:text-[#f2663b] text-lg transition-colors duration-200 ">Home</a>
        <a href="#kit-destaque" class="hover:text-[#f2663b] text-lg transition-colors duration-200">Destaque</a>
        <a href="#produtos" class="hover:text-[#f2663b] text-lg transition-colors duration-200">Produtos</a>
        <a href="#sobre" class="hover:text-[#f2663b] text-lg transition-colors duration-200">Sobre nós</a>
        <a href="#instagram" class="hover:text-[#f2663b] text-lg transition-colors duration-200">Instagram</a>
      </nav>


      <!-- Ícones -->
      <div class="flex items-center gap-4 text-[#267b7d]">
        <Cart />
        <UserComponent ref="userRef" />
        <User 
          class="w-7 h-7 cursor-pointer hover:bg-[#267b7d]/10 rounded-full p-1 transition"
          @click="openUserDialog"
        />

      </div>
    </div>

    <!-- Menu (mobile) -->
    <nav
      class="flex-col text-[#267b7d] font-medium gap-6 lg:hidden transition-all duration-300 bg-white shadow-md rounded-xl mt-2 px-4 py-4"
      :class="{
        'flex': isMobileMenuOpen,
        'hidden': !isMobileMenuOpen
      }"
    >
      <a href="#home" class="hover:text-[#f2663b] transition-colors duration-200">Home</a>
      <a href="#kit-destaque" class="hover:text-[#f2663b] transition-colors duration-200">Destaque</a>
      <a href="#produtos" class="hover:text-[#f2663b] transition-colors duration-200">Produtos</a>
      <a href="#sobre" class="hover:text-[#f2663b] transition-colors duration-200">Sobre nós</a>
      <a href="#instagram" class="hover:text-[#f2663b] transition-colors duration-200">Instagram</a>
    </nav>

    <!-- <Cart ref="cartRef" /> -->
    <!-- <UserComponent ref="userRef" /> -->
  </header>
</template>
