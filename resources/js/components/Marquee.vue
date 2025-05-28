<template>
  <div class="fixed top-0 left-0 w-full z-50 h-8 bg-white text-[#267b7d] flex items-center py-0 text-center text-sm  overflow-x-auto whitespace-nowrap animate-marquee">
    <span v-for="(msg, idx) in messages" :key="idx" class="mx-4">
      {{ msg }}
    </span>
  </div>
</template>

<script setup lang="ts">
const messages = [
  'FRETE GRÁTIS | Compras acima de R$297',
  'CRUELTY FREE | Não testado em animais',
  'SITE SEGURO | Seus dados protegidos'
]
</script>

<style scoped>
@keyframes marquee {
  0% { transform: translateX(50%); }
  100% { transform: translateX(-50%); }
}
.animate-marquee {
  animation: marquee 20s linear infinite;
}
</style> 