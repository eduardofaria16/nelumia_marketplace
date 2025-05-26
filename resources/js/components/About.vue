<template>
  <section
    class="about px-6 py-12 min-h-[500px]"
    style="background: linear-gradient(to bottom, #ffffff, #267b7d);"
  >
    <div class="max-w-2xl mx-auto flex flex-col items-center gap-8 text-center">
      <!-- Imagem centralizada e quadrada -->
      <div class="w-60 aspect-square rounded-2xl border-4 border-[#267b7d] shadow-xl overflow-hidden bg-white">
        <img
          src="/images/sobre.jpg"
          alt="Sobre a Nelumia"
          class="w-full h-full object-cover"
        />
      </div>

      <!-- Texto abaixo da imagem -->
      <div>
        <h2 class="text-2xl font-bold text-white mb-4 drop-shadow-sm">Sobre a Nelumia</h2>
        <p class="text-white/90 leading-relaxed drop-shadow-sm">
          Na Nelumia, acreditamos que a beleza está nos detalhes. Somos uma empresa dedicada a
          oferecer os melhores produtos de beleza com qualidade, preço justo e carinho. Com uma
          curadoria especial, trazemos até você marcas que valorizam o bem-estar, a autoestima e a
          diversidade.
        </p>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
</script>
