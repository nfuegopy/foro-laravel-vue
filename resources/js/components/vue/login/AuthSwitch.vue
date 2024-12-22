<template>
    <div class="min-h-screen bg-gradient-to-br from-blue-100 to-blue-300 flex items-center justify-center p-4">
        <div class="bg-white shadow-xl rounded-lg p-6 w-full max-w-sm text-center">
            <h2 class="text-2xl font-bold text-blue-600 mb-5">
                {{ tituloActual }}
            </h2>

            <div class="flex items-center justify-center mb-6 cursor-pointer" @click="toggleState">
                <div class="relative w-14 h-7 transition duration-300 ease-out rounded-full"
                    :class="state === 1 ? 'bg-blue-500' : 'bg-gray-300'">
                    <div class="absolute bg-white w-6 h-6 rounded-full shadow-md top-0 left-0 transform transition-all duration-300 ease-out"
                        :class="state === 1 ? 'translate-x-7' : ''"></div>
                </div>
                <span class="ml-3 text-gray-800 font-semibold transition-all duration-300">
                    {{ state === 0 ? 'Iniciar sesión' : 'Registrarse' }}
                </span>
            </div>

            <transition name="fade" mode="out-in">
                <component :is="componenteActual" @registro-exitoso="cambiarAVistaLogin" />
            </transition>
        </div>
    </div>
</template>

<script>
import { ref, computed } from "vue";
import LoginForm from "./LoginForm.vue";
import RegisterForm from "./RegisterForm.vue";

export default {
    name: "AuthSwitch",
    components: {
        LoginForm,
        RegisterForm,
    },
    setup() {
        const state = ref(0);

        const toggleState = () => {
            state.value = state.value === 0 ? 1 : 0;
        };

        const componenteActual = computed(() => {
            return state.value === 0 ? "LoginForm" : "RegisterForm";
        });

        const tituloActual = computed(() => {
            return state.value === 0
                ? "Bienvenido, por favor inicia sesión"
                : "Crea tu cuenta";
        });

        const cambiarAVistaLogin = () => {
            state.value = 0; // Cambiar a la vista de inicio de sesión
        };

        return {
            state,
            toggleState,
            componenteActual,
            tituloActual,
            cambiarAVistaLogin,
        };
    },
};
</script>
