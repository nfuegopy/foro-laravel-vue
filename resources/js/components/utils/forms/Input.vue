<template>
    <div class="mb-4">
        <label :for="id" class="block text-sm font-medium text-gray-700">{{ label }}</label>
        <input :id="id" v-bind="attrs"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
    </div>
</template>

<script>
export default {
    name: 'Input',
    props: {
        id: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },
    },
    inheritAttrs: false,
};
</script>
