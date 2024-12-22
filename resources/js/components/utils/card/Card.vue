<template>
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="p-4 border-b">
            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ title }}</h3>
        </div>
        <div class="p-4">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: {
        title: {
            type: String,
            required: true,
        },
    },
};
</script>
