<template>
    <div class="flex flex-col items-center bg-white p-5 rounded-lg shadow-md w-full">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Registrarse</h2>
        <form @submit.prevent="handleRegister" class="w-full flex flex-col gap-4">
            <input v-model="name" type="text" placeholder="Nombre completo"
                class="border-2 border-gray-200 rounded-md p-3 w-full focus:outline-none focus:border-blue-500 transition duration-200"
                required />
            <input v-model="email" type="email" placeholder="Correo electrónico"
                class="border-2 border-gray-200 rounded-md p-3 w-full focus:outline-none focus:border-blue-500 transition duration-200"
                required />
            <input v-model="password" type="password" placeholder="Contraseña"
                class="border-2 border-gray-200 rounded-md p-3 w-full focus:outline-none focus:border-blue-500 transition duration-200"
                required />
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md font-medium hover:bg-blue-600 transition-all"
                :disabled="loading">
                {{ loading ? 'Registrando...' : '¡Registrar!' }}
            </button>
        </form>
        <!-- Mensaje de error -->
        <div v-if="error" class="mt-4 text-red-500 text-sm">
            {{ error }}
        </div>
        <!-- Mensaje de éxito -->
        <div v-if="success" class="mt-4 text-green-500 text-sm">
            {{ success }}
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "RegisterForm",
    data() {
        return {
            name: "",
            email: "",
            password: "",
            loading: false,
            error: null,
            success: null
        };
    },
    methods: {
        async handleRegister() {
            console.log('Iniciando registro...');

            const datos = {
                username: this.name,
                email: this.email,
                password_hash: this.password,
            };

            console.log('Datos a enviar:', datos);

            this.loading = true; // Activar el estado de carga
            this.error = null; // Limpiar mensajes de error
            this.success = null; // Limpiar mensajes de éxito

            try {
                const response = await axios.post(rutaGuardarCliente, datos, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                });

                console.log('Respuesta:', response.data);

                // Mensaje de éxito
                this.success = '¡Registro exitoso! Ahora puedes iniciar sesión.';

                // Limpiar los campos del formulario
                this.name = '';
                this.email = '';
                this.password = '';

                // Esperar un momento antes de cambiar de vista
                setTimeout(() => {
                    this.$emit('registro-exitoso'); // Notificar al componente padre
                }, 2000); // Cambiar a la vista de inicio de sesión después de 2 segundos
            } catch (error) {
                console.log('Datos que causaron error:', datos);
                console.log('Error detallado:', error.response?.data);

                // Mostrar mensaje de error
                this.error = error.response?.data?.detalles ||
                    error.response?.data?.error ||
                    'Error al registrar usuario';
            } finally {
                this.loading = false; // Desactivar el estado de carga
            }
        },
    },

};
</script>