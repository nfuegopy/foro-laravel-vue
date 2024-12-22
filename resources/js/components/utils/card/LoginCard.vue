<template>
    <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full max-w-md mx-auto">
        <div class="p-6 sm:p-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
                {{ title }}
            </h2>
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: 'LoginCard',
    props: {
        title: {
            type: String,
            required: true,
        },
    },
};
</script>
