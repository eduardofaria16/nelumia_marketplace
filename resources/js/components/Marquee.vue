<template>
  <header class="fixed top-0 w-full bg-[#267b7d] backdrop-blur-md z-50 py-2">
    <div class="w-full flex justify-between items-end">

      <div class="ticker-wrapper overflow-hidden w-full mx-auto">
        <div class="ticker-move">
          <div class="ticker-content text-white font-medium flex whitespace-nowrap">
            <template v-for="n in 5" :key="n">
              <span class="ticker-item">Workshop Hands On</span>
              <span class="ticker-separator">✦</span>
              <span class="ticker-item">{{ formattedDate }} - Restam {{ remainingSlots }} vagas</span>
              <span class="ticker-separator">✦</span>
              <span class="ticker-item">Última Chamada</span>
              <span class="ticker-separator">✦</span>
            </template>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, computed } from 'vue';


const eventDate = new Date('2025-07-27'); // Exemplo: 15 de julho de 2024

// Número de vagas restantes
const remainingSlots = ref(2);

// Formatar a data
const formattedDate = computed(() => {
  const options = { day: 'numeric', month: 'numeric' };
  return eventDate.toLocaleDateString('pt-BR', options);
});
</script>

<style scoped>
.ticker-wrapper {
  position: relative;
  overflow: hidden;
  width: 100vw;
  max-width: 100vw;
}

.ticker-move {
  display: inline-block;
  white-space: nowrap;
  will-change: transform;
  animation: ticker 40s linear infinite;
}

.ticker-content {
  display: inline-flex;
}

.ticker-item {
  display: inline-block;
  color: #020202;
  font-weight: 900;
}

.ticker-separator {
  display: inline-block;
  margin: 0 0.5rem;
}

@keyframes ticker {
  0% {
    transform: translateX(100%);
  }
  100% {
    transform: translateX(-100%);
  }
}
</style>