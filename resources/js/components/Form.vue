<template>
    <section
      class="px-6 py-12 bg-white"
    >
      <div class="max-w-2xl mx-auto flex flex-col items-center gap-6 text-center">
        <h2 class="text-2xl font-bold text-[#267b7d] drop-shadow-sm">
          Fique por dentro das novidades
        </h2>
        <form action="post" class="w-full flex flex-col sm:flex-row items-center gap-4">
          <input
            type="email"
            placeholder="Email"
            class="w-full sm:flex-1 px-4 py-3 rounded-2xl border border-white text-[#267b7d] placeholder:text-[#267b7d] focus:outline-none focus:ring-2 focus:ring-white bg-white shadow"
          />
          <button
            type="submit"
            class="px-6 py-3 bg-white text-[#267b7d]   rounded-2xl  font-semibold  shadow hover:bg-[#e0f7f7] transition"
          >
            Enviar
          </button>
        </form>
      </div>
    </section>
  </template>
  
  <script setup lang="ts">
  </script>
  