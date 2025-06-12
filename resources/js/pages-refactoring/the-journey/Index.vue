<template>
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8 space-y-10">
        <section class="space-y-4">
            <h1 class="text-3xl font-bold text-gray-900">The Journey</h1>
            <p class="text-lg text-gray-700">
                This section is a record of my becoming — of the unraveling and reassembly that led me here.
                These aren’t polished stories. They are ruptures. Awakenings. Realignments.
            </p>
        </section>

        <section class="space-y-2">
            <h2 class="text-2xl font-semibold text-gray-800">The First Year</h2>
            <p class="text-gray-600">
                A chronicle of my departure from sedation — from Kentucky to Oregon, from collapse to clarity.
            </p>

            <ul class="mt-4 space-y-3">
                <li>
                    <router-link
                        to="/the-journey/the-first-year/chapter01"
                        class="flex items-center space-x-2 text-blue-600 hover:underline"
                    >
                        <span class="text-xl">📽️</span>
                        <span class="text-sm font-medium">Chapter 01: The Goodbye – When Truth Breaks Containment</span>
                    </router-link>
                </li>
                <!-- More chapters can be added here -->
            </ul>
        </section>

        <!-- Future arcs -->
        <section class="space-y-2">
            <h2 class="text-2xl font-semibold text-gray-800 text-opacity-50">Other Arcs (Coming Soon)</h2>
            <p class="text-gray-500 italic">More journeys will be documented here, each with their own arc and rhythm.</p>
        </section>
    </div>
</template>

<script setup>
// No JS needed for this static page, unless you want to load chapter lists from JSON
</script>

<style scoped>
</style>
