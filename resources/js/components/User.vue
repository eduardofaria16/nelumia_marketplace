<template> 
    <!-- Dialog de Login -->
    <Dialog v-model:open="isDialogOpen">
        <DialogContent class="sm:max-w-md">
            <DialogHeader>
                <DialogTitle class="text-xl font-semibold">Login</DialogTitle>
            </DialogHeader>
            
            <form @submit.prevent="login" class="mt-4 space-y-4">
                <div class="space-y-2">
                    <Label for="email">E-mail</Label>
                    <Input 
                        id="email" 
                        v-model="form.email" 
                        type="email" 
                        placeholder="seu@email.com" 
                        required 
                        autocomplete="email" 
                    />
                    <p v-if="form.errors.email" class="text-red-500 text-sm">{{ form.errors.email }}</p>
                </div>

                <div class="space-y-2">
                    <Label for="password">Senha</Label>
                    <Input 
                        id="password" 
                        v-model="form.password" 
                        type="password" 
                        placeholder="Sua senha" 
                        required 
                        autocomplete="current-password" 
                    />
                    <p v-if="form.errors.password" class="text-red-500 text-sm">{{ form.errors.password }}</p>
                </div>

                <div class="flex items-center space-x-2">
                    <Checkbox id="remember" v-model="form.remember" />
                    <Label for="remember">Lembrar-me</Label>
                </div>

                <DialogFooter class="flex flex-col sm:flex-row sm:justify-between gap-4">
                    <Button type="button" variant="outline" class="bg-white text-[#267b7d] hover:text-[#267b7d] transition duration-200" @click="closeAuthDialog">Cancelar</Button>
                    <Button type="submit" :disabled="form.processing">
                        <LoaderCircle v-if="form.processing" class="mr-2 h-4 w-4 animate-spin" />
                        Entrar
                    </Button>
                </DialogFooter>
                
                <div class="text-center text-sm pt-2">
                    <Link href="/register" class="text-[#267b7d] hover:text-[#f2663b] transition duration-200">
                        Não tem uma conta? Registre-se
                    </Link>
                </div>
                
                <div class="text-center text-sm">
                    <Link href="/password/reset" class="text-[#267b7d] hover:text-[#f2663b] transition duration-200">
                        Esqueceu sua senha?
                    </Link>
                </div>
            </form>
        </DialogContent>
    </Dialog>

    <!-- Popover do Usuário -->
    <Popover v-model:open="isPopoverOpen">
        <PopoverTrigger asChild>
            <Button variant="ghost" class="p-0 h-auto relative">
                <slot name="trigger">
                    <!-- Slot para o ícone do usuário do componente pai -->
                     
                </slot>
            </Button>
        </PopoverTrigger>
        <PopoverContent class="w-64 p-4 bg-white border-none" align="end">
            <div class="space-y-3">
                <div class="text-sm">
                    <p class="font-medium text-gray-900">{{ userInfo?.name || 'Usuário' }}</p>
                    <p class="text-gray-500">{{ userInfo?.email || '' }}</p>
                </div>
                
                <div class="border-t pt-3 space-y-2">
                    <Button 
                        variant="ghost" 
                        class="w-full justify-start text-sm h-8 px-2"
                        @click="goToProfile"
                    >
                        Meu Perfil
                    </Button>
                    
                    <Button 
                        variant="ghost" 
                        class="w-full justify-start text-sm h-8 px-2"
                        @click="goToSettings"
                    >
                        Configurações
                    </Button>
                    
                    <Button 
                        variant="ghost" 
                        class="w-full justify-start text-sm h-8 px-2 text-red-600 hover:text-red-700 hover:bg-red-50"
                        @click="logout"
                    >
                        Sair
                    </Button>
                </div>
            </div>
        </PopoverContent>
    </Popover>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useForm, Link, router } from '@inertiajs/vue3';
import { 
    Dialog, 
    DialogContent, 
    DialogHeader,
    DialogTitle,
    DialogFooter
} from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { LoaderCircle } from 'lucide-vue-next';
import {
  Popover,
  PopoverContent,
  PopoverTrigger,
} from '@/components/ui/popover';

// Props para receber informações do usuário
interface Props {
    userInfo?: {
        name: string;
        email: string;
        [key: string]: any;
    };
}

const props = defineProps<Props>();

const isDialogOpen = ref(false);
const isPopoverOpen = ref(false);

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const openAuthDialog = () => {
    isDialogOpen.value = true;
    // Limpa os erros quando abre o modal
    form.clearErrors();
};

const openPopover = () => {
    isPopoverOpen.value = true;
};

const closeAuthDialog = () => {
    isDialogOpen.value = false;
    // Limpa o formulário quando fecha o modal
    form.reset();
    form.clearErrors();
};

const login = () => {
    form.post('/login', {
        onSuccess: () => {
            closeAuthDialog();
        },
        onError: () => {
            // Os erros serão automaticamente mostrados no formulário
        }
    });
};

const logout = () => {
    router.post('/logout', {}, {
        onSuccess: () => {
            isPopoverOpen.value = false;
        }
    });
};

const goToProfile = () => {
    router.visit('/profile');
    isPopoverOpen.value = false;
};

const goToSettings = () => {
    router.visit('/settings');
    isPopoverOpen.value = false;
};

// Expõe as funções para o componente pai
defineExpose({
    openAuthDialog,
    openPopover
});
</script>