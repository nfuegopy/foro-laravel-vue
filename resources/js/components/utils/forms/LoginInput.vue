<template>
    <div class="mb-4">
        <label :for="id" class="block text-sm font-medium text-gray-700">{{ label }}</label>
        <input :id="id" v-bind="attrs" v-model="inputValue"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
            @blur="validateInput" />
        <p v-if="error" class="text-sm text-red-500 mt-1">{{ error }}</p>
    </div>
</template>

<script>
export default {
    name: 'LoginInput',
    props: {
        id: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },
        type: {
            type: String,
            default: 'text', // Puede ser 'text', 'email', 'password', etc.
        },
        placeholder: {
            type: String,
            default: '',
        },
        required: {
            type: Boolean,
            default: false,
        },
        pattern: {
            type: RegExp, // Patrón opcional para validación (ej. correo)
            default: null,
        },
        errorMessage: {
            type: String,
            default: 'Este campo es obligatorio.',
        },
    },
    data() {
        return {
            inputValue: '',
            error: null,
        };
    },
    methods: {
        validateInput() {
            if (this.required && !this.inputValue) {
                this.error = this.errorMessage;
                return;
            }

            if (this.pattern && !this.pattern.test(this.inputValue)) {
                this.error = 'El formato no es válido.';
                return;
            }

            this.error = null;
        },
    },
    inheritAttrs: false,
};
</script>
