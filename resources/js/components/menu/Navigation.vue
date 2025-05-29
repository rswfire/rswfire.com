<template>

    <div class="text-sm text-gray-600 border-t border-gray-200 pt-4">
        <div class="text-xs uppercase font-semibold text-gray-500 mb-2 tracking-wider">Navigation</div>

        <nav class="space-y-1 ml-1">
            <router-link
                to="/"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>🏠</span> <span>Home</span>
            </router-link>

            <router-link
                to="/hello"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>👤</span> <span>Who I Am</span>
            </router-link>

            <router-link
                to="/tech"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>🛠</span> <span>What I Do</span>
            </router-link>

            <router-link
                to="/the-journey"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>🜂</span> <span>My Journey</span>
            </router-link>

            <router-link
                to="/honeyman"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>🌲</span> <span>Honeyman</span>
            </router-link>

            <router-link
                to="/field-records"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>📁</span> <span>Field Records</span>
            </router-link>

        </nav>

    </div>
    <div class="text-center">
        <router-link
            to="/lexicon"
            class="flex items-center gap-2 hover:text-red-600 transition"
        >
            <span>Lexicon</span>
        </router-link>
    </div>
</template>

<script setup>

</script>

<style>

</style>
