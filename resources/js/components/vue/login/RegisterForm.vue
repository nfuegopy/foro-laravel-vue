<!-- RegisterForm.vue -->
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
                class="bg-blue-500 text-white px-4 py-2 rounded-md font-medium hover:bg-blue-600 transition-all">
                ¡Registrar!
            </button>
        </form>
    </div>
</template>

<script>
export default {
    name: "RegisterForm",
    data() {
        return {
            name: "",
            email: "",
            password: "",
        };
    },
    methods: {
        handleRegister() {
            console.log("Registrando usuario con:", this.name, this.email, this.password);
        },
    },
};
</script>