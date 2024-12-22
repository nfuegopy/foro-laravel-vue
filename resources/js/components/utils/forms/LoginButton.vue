<template>
    <button :class="[
        'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white',
        type === 'primary' ? 'bg-blue-500 hover:bg-blue-600 focus:ring-blue-500' : 'bg-gray-500 hover:bg-gray-600 focus:ring-gray-500',
    ]" :disabled="disabled" @click="handleClick">
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: 'LoginButton',
    props: {
        type: {
            type: String,
            default: 'primary', // Puede ser 'primary' o 'secondary'
        },
        disabled: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        handleClick(event) {
            if (!this.disabled) {
                this.$emit('click', event);
            }
        },
    },
};
</script>
