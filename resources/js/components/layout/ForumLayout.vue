<template>
    <div>
        <header class="bg-gray-800 text-white p-4">
            <h1 class="text-xl">Foro</h1>
        </header>
        <main class="p-4">
            <slot></slot>
        </main>
        <footer class="bg-gray-800 text-white p-4 text-center">
            <p>© 2024 Foro</p>
        </footer>
    </div>
</template>

<script>
export default {
    name: 'ForumLayout',
};
</script>
