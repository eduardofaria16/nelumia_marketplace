<script setup lang="ts">
import { Mail, Facebook, Instagram, Twitter } from 'lucide-vue-next';
</script>

<template>
  <footer class="bg-gray-100 text-gray-700 py-8 px-4">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
      <!-- Nome da marca -->
      <div class="text-center md:text-left">
        <h1 class="text-xl font-bold">Nelumia</h1>
        <p class="text-sm">© 2025 - Todos os direitos reservados</p>
      </div>

      <!-- Redes Sociais -->
      <div class="flex gap-4">
        <a href="https://facebook.com" target="_blank" class="hover:text-[#267b7d] transition">
          <Facebook class="w-5 h-5" />
        </a>
        <a href="https://instagram.com" target="_blank" class="hover:text-[#267b7d] transition">
          <Instagram class="w-5 h-5" />
        </a>
        <a href="https://twitter.com" target="_blank" class="hover:text-[#267b7d] transition">
          <Twitter class="w-5 h-5" />
        </a>
      </div>

      <!-- Contato -->
      <div class="flex items-center gap-2">
        <Mail class="w-5 h-5 text-gray-600" />
        <a href="mailto:contato@nelumia.com" class="hover:text-[#267b7d] transition">contato@nelumia.com</a>
      </div>
    </div>
  </footer>
</template>
