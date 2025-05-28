<template>
  <section class="w-full py-12 bg-white flex justify-center">
    <form class="w-full max-w-xl mx-auto flex flex-col items-center gap-6 p-6 rounded-xl border border-[#267b7d] shadow-md bg-white">
      <h2 class="text-2xl md:text-3xl font-bold text-[#267b7d] text-center">Receba novidades e ofertas exclusivas!</h2>
      <p class="text-[#267b7d] text-center">Cadastre seu e-mail e fique por dentro das promoções e lançamentos da Nelumia.</p>
      <div class="w-full flex flex-col sm:flex-row gap-4">
        <input
          type="email"
          placeholder="Digite seu e-mail"
          class="flex-1 px-4 py-3 rounded-lg border border-[#267b7d] focus:outline-none focus:ring-2 focus:ring-[#267b7d] text-[#267b7d] bg-white"
        />
        <button
          type="submit"
          class="bg-[#267b7d] hover:bg-[#f2663b] text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200 shadow-md"
        >
          Quero receber
        </button>
      </div>
    </form>
  </section>
</template>

<script setup lang="ts">
// Lógica de envio pode ser implementada depois
</script> 