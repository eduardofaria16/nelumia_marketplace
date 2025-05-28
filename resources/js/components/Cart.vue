<script setup lang="ts">
import {
  Sheet,
  SheetContent,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from '@/components/ui/sheet'
import { ref, computed } from 'vue'
import { ShoppingBag } from 'lucide-vue-next'

const cartItems = ref([
  {
    id: 1,
    name: 'Sabonete Facial',
    price: 59.9,
    quantity: 1,
    image: 'https://via.placeholder.com/80x80.png?text=Sabonete',
  },
  {
    id: 2,
    name: 'Sérum Vitamina C',
    price: 89.9,
    quantity: 2,
    image: 'https://via.placeholder.com/80x80.png?text=Serum',
  },
])

const subtotal = computed(() =>
  cartItems.value.reduce((acc, item) => acc + item.price * item.quantity, 0)
)
</script>

<template>
  <Sheet>
    <SheetTrigger>
      <ShoppingBag
        class="w-6 h-6 cursor-pointer hover:text-[#f2663b] transition duration-200"
      />
    </SheetTrigger>
    <SheetContent class="w-full max-w-xs sm:max-w-md">
      <SheetHeader>
        <SheetTitle class="text-[#267b7d] text-2xl font-bold">Seu Carrinho</SheetTitle>
      </SheetHeader>
      <div class="mt-6 flex flex-col gap-6">
        <div v-if="cartItems.length === 0" class="text-[#267b7d] text-center py-8">
          Seu carrinho está vazio.
        </div>
        <div v-else class="flex flex-col gap-4">
          <div
            v-for="item in cartItems"
            :key="item.id"
            class="flex items-center gap-4 border-b pb-4 last:border-b-0"
          >
            <img :src="item.image" :alt="item.name" class="w-16 h-16 rounded-lg border border-[#267b7d] bg-white" />
            <div class="flex-1">
              <div class="font-semibold text-[#267b7d]">{{ item.name }}</div>
              <div class="text-sm text-[#267b7d]/80">Qtd: {{ item.quantity }}</div>
            </div>
            <div class="font-bold text-[#f2663b]">R$ {{ (item.price * item.quantity).toFixed(2) }}</div>
          </div>
        </div>
      </div>
      <div class="mt-8 border-t pt-6 flex flex-col gap-4">
        <div class="flex justify-between items-center text-lg font-semibold text-[#267b7d]">
          <span>Subtotal</span>
          <span>R$ {{ subtotal.toFixed(2) }}</span>
        </div>
        <button class="bg-[#267b7d] hover:bg-[#f2663b] text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200 shadow-md w-full">
          Finalizar compra
        </button>
      </div>
    </SheetContent>
  </Sheet>
</template>