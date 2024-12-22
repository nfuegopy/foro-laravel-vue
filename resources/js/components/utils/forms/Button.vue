<template>
    <button :class="[
        'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md',
        type === 'primary'
            ? 'text-white bg-blue-500 hover:bg-blue-600 focus:ring-blue-500'
            : 'text-gray-700 bg-gray-100 hover:bg-gray-200 focus:ring-gray-500',
    ]" v-bind="attrs">
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: 'Button',
    props: {
        type: {
            type: String,
            default: 'primary',
        },
    },
    inheritAttrs: false,
};
</script>
