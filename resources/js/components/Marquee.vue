<template>
  <header class="fixed top-0 w-full bg-[#267b7d] z-50 py-2">
    <div class="w-full flex justify-center items-center">
      <div class="relative overflow-hidden h-6">
        <transition name="fade" mode="out-in">
          <span :key="currentIndex" class="text-white font-medium text-sm">
            {{ messages[currentIndex] }}
          </span>
        </transition>
      </div>
    </div>
  </header>
</template>




<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';

const messages = [
  'FRETE GRÁTIS | Compras acima de R$297',
  'CRUELTY FREE | Não testado em animais',
  'SITE SEGURO | Seus dados protegidos'
];

const currentIndex = ref(0);
let intervalId;

onMounted(() => {
  intervalId = setInterval(() => {
    currentIndex.value = (currentIndex.value + 1) % messages.length;
  }, 4000); // Troca a cada 3 segundos
});

onBeforeUnmount(() => {
  clearInterval(intervalId);
});
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>

