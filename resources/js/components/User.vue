
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

const isRegister = ref(false);

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const registerForm = useForm({
    email: '',
    password: '',
    password_confirmation: '',
});

const openAuthDialog = () => {
    isDialogOpen.value = true;
    isRegister.value = false;
    form.clearErrors();
    registerForm.clearErrors();
};

const openPopover = () => {
    isPopoverOpen.value = true;
};

const closeAuthDialog = () => {
    isDialogOpen.value = false;
    form.reset();
    form.clearErrors();
    registerForm.reset();
    registerForm.clearErrors();
    isRegister.value = false;
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

const register = () => {
    registerForm.post('/register', {
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
    openPopover,
});
</script>
<template> 
    <!-- Dialog de Login/Registro -->
    <Dialog v-model:open="isDialogOpen">
        <DialogContent class="sm:max-w-md">
            <DialogHeader>
                <DialogTitle class="text-xl font-semibold">
                  {{ isRegister ? 'Criar Conta' : 'Login' }}
                </DialogTitle>
            </DialogHeader>
            
            <form v-if="!isRegister" @submit.prevent="login" class="mt-4 space-y-4">
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
                    <button type="button" @click="isRegister = true" class="text-[#267b7d] hover:text-[#f2663b] transition duration-200">
                        Não tem uma conta? Registre-se
                    </button>
                </div>
                
                <div class="text-center text-sm">
                    <Link href="/password/reset" class="text-[#267b7d] hover:text-[#f2663b] transition duration-200">
                        Esqueceu sua senha?
                    </Link>
                </div>
            </form>

            <form v-else @submit.prevent="register" class="mt-4 space-y-4">
                <div class="space-y-2">
                    <Label for="register-email">E-mail</Label>
                    <Input 
                        id="register-email" 
                        v-model="registerForm.email" 
                        type="email" 
                        placeholder="seu@email.com" 
                        required 
                        autocomplete="email" 
                    />
                    <p v-if="registerForm.errors.email" class="text-red-500 text-sm">{{ registerForm.errors.email }}</p>
                </div>
                <div class="space-y-2">
                    <Label for="register-password">Senha</Label>
                    <Input 
                        id="register-password" 
                        v-model="registerForm.password" 
                        type="password" 
                        placeholder="Crie uma senha" 
                        required 
                        autocomplete="new-password" 
                    />
                    <p v-if="registerForm.errors.password" class="text-red-500 text-sm">{{ registerForm.errors.password }}</p>
                </div>
                <div class="space-y-2">
                    <Label for="register-password-confirm">Confirmar Senha</Label>
                    <Input 
                        id="register-password-confirm" 
                        v-model="registerForm.password_confirmation" 
                        type="password" 
                        placeholder="Confirme sua senha" 
                        required 
                        autocomplete="new-password" 
                    />
                    <p v-if="registerForm.errors.password_confirmation" class="text-red-500 text-sm">{{ registerForm.errors.password_confirmation }}</p>
                </div>
                <DialogFooter class="flex flex-col sm:flex-row sm:justify-between gap-4">
                    <Button type="button" variant="outline" class="bg-white text-[#267b7d] hover:text-[#267b7d] transition duration-200" @click="isRegister = false">Voltar</Button>
                    <Button type="submit" :disabled="registerForm.processing">
                        <LoaderCircle v-if="registerForm.processing" class="mr-2 h-4 w-4 animate-spin" />
                        Registrar
                    </Button>
                </DialogFooter>
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
        <PopoverContent class="w-56 p-4 bg-white border-none flex flex-col items-center" align="center" side="bottom" side-offset="8">
            <div class="space-y-3 w-full flex flex-col items-center">
                <div class="text-sm w-full flex flex-col items-center">
                    <p class="font-medium text-[#267b7d] text-base">{{ userInfo?.name || 'Usuário' }}</p>
                </div>
                <Button 
                    variant="ghost" 
                    class="w-full justify-center text-sm h-8 px-2 text-red-600 hover:text-red-700 hover:bg-red-50"
                    @click="logout"
                >
                    Sair
                </Button>
            </div>
        </PopoverContent>
    </Popover>
</template>
