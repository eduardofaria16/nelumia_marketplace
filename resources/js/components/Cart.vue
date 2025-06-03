<script setup lang="ts">
import {
  Sheet,
  SheetContent,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from '@/components/ui/sheet'
import { ref, computed, onMounted } from 'vue'
import { ShoppingBag } from 'lucide-vue-next'
import { useCartStore } from '@/stores/cart'
import { usePage } from '@inertiajs/vue3'

const cart = useCartStore();
const isAuthenticated = usePage().props.auth?.user;

const finishOrder = () => {
  cart.finishOrder()
};

</script>

<template>
  <Sheet>
    <SheetTrigger class="relative">

      <ShoppingBag
        class="w-6 h-6 cursor-pointer hover:text-[#f2663b] transition duration-200"
      />
      <span
        v-if="cart.totalItems > 0"
        class="absolute -top-2 -right-2 bg-[#f2663b] text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center border-2 border-white"
      >
        {{ cart.totalItems }}
      </span>
    </SheetTrigger>

    <SheetContent class="w-full px-6 sm:w-full px-6">

      <SheetHeader>
        <SheetTitle class="text-[#267b7d] text-2xl font-bold">Seu Carrinho</SheetTitle>
      </SheetHeader>

      <div class="mt-6 flex flex-col gap-6">
        <div v-if="cart.items.length === 0" class="text-[#267b7d] text-center py-8">
          Seu carrinho está vazio.
        </div>
        <div v-else class="flex flex-col gap-4">
          <div
            v-for="item in cart.items"
            :key="item.id"
            class="flex items-center gap-4 border-b pb-4 last:border-b-0"
          >
            <img :src="item.image" :alt="item.name" class="w-16 h-16 rounded-lg border border-[#267b7d] bg-white" />
            <div class="flex-1">
              <div
                class="font-semibold text-[#267b7d] truncate max-w-[140px]"
                :title="item.name"
              >
                {{ item.name }}
              </div>
              <div class="text-sm text-[#267b7d]/80 flex items-center gap-2">
                <button
                  class="px-2 py-1 bg-[#267b7d] text-white rounded disabled:opacity-50"
                  @click="cart.decreaseQuantity(isAuthenticated ? item.product_id : item.id, item.quantity)"
                  :disabled="item.quantity === 1"
                  aria-label="Diminuir quantidade"
                >-</button>
                <span>{{ item.quantity }}</span>
                <button
                  class="px-2 py-1 bg-[#267b7d] text-white rounded"
                  @click="cart.increaseQuantity(isAuthenticated ? item.product_id : item.id, item.quantity)"
                
                  aria-label="Aumentar quantidade"
                >+</button>
              </div>
            </div>
            <div class="font-bold text-[#f2663b] flex items-center gap-2">
              R$ {{ (item.price * item.quantity).toFixed(2) }}
              <button
                @click="cart.removeItem(isAuthenticated ? item.product_id : item.id)"
                class="ml-2 text-[#f2663b] hover:text-red-600 transition"
                aria-label="Remover item"
                title="Remover item"
                >
                  &times;
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-8 border-t pt-6 flex flex-col gap-4">
        <div class="flex justify-between items-center text-lg font-semibold text-[#267b7d]">
          <span>Subtotal</span>
          <span>R$ {{ cart.subtotal.toFixed(2) }}</span>
        </div>
        <button @click="finishOrder" class="bg-[#267b7d] hover:bg-[#f2663b] text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200 shadow-md w-full">
          Finalizar compra
        </button>
      </div>

    </SheetContent>

  </Sheet>
</template>