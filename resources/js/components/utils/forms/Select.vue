<template>
    <div class="mb-4">
        <label :for="id" class="block text-sm font-medium text-gray-700">{{ label }}</label>
        <select :id="id" v-bind="attrs"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option v-for="(option, index) in options" :key="index" :value="option.value">
                {{ option.text }}
            </option>
        </select>
    </div>
</template>

<script>
export default {
    name: 'Select',
    props: {
        id: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },
        options: {
            type: Array,
            required: true,
        },
    },
    inheritAttrs: false,
};
</script>
