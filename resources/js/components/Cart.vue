<script setup lang="ts">
import {
  Sheet,
  SheetContent,
  SheetDescription,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from '@/components/ui/sheet'
import { ref } from 'vue'
import { ShoppingBag } from 'lucide-vue-next'

</script>

<template>
  <Sheet>
    <SheetTrigger>
      <ShoppingBag
        class="w-6 h-6 cursor-pointer hover:text-[#f2663b] transition duration-200"
      />
    </SheetTrigger>
    <SheetContent>
      <SheetHeader>
        <SheetTitle>Are you absolutely sure?</SheetTitle>
        <SheetDescription>
          This action cannot be undone. This will permanently delete your account
          and remove your data from our servers.
        </SheetDescription>
      </SheetHeader>
    </SheetContent>
  </Sheet>
</template>