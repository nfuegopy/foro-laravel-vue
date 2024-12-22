<template>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th v-for="(header, index) in headers" :key="index"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{ header }}
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="(row, index) in rows" :key="index">
                <td v-for="(value, key) in row" :key="key" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ value }}
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: 'Table',
    props: {
        headers: {
            type: Array,
            required: true,
        },
        rows: {
            type: Array,
            required: true,
        },
    },
};
</script>
