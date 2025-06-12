<template>
    <div class="px-6 py-12 max-w-4xl mx-auto">
        <!-- Header -->
        <section class="mb-10">
            <h1 class="text-4xl font-bold mb-2">The Rescue – Meeting Luna</h1>
            <p class="text-sm text-gray-500 mb-4">August 9, 2024</p>
            <p class="text-lg text-gray-700">
                I wasn’t expecting to adopt a kitten. But the world had other plans. This is the story of how Luna found me.
            </p>
        </section>

        <!-- YouTube Video -->
        <section class="mb-10">
            <div class="w-full" style="position: relative; padding-bottom: 56.25%; height: 0;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/DyjjK-L0dCw"
                    title="Chapter 10: The Rescue – Meeting Luna"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
        </section>

        <!-- Themes -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Themes</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>The intimacy of first trust</li>
                <li>Unexpected responsibility and the heart’s readiness</li>
                <li>The sacredness of small gestures</li>
                <li>Mutual rescue: what it means to be found</li>
                <li>The quiet power of compassion</li>
            </ul>
        </section>

        <!-- Field Notes -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Field Notes</h2>
            <p class="text-gray-700 mb-4">
                I named her Luna. She showed up out of nowhere, living under a golf cart, frail and unsure. Within hours, she was purring in my hands and on her way to the vet.
            </p>
            <p class="text-gray-700 mb-4">
                The vet didn’t think she’d make it. I did. I had to. Her arrival cracked something open in me — some buried tenderness I thought I’d exhausted. And it reminded me of this: to care is to be vulnerable, to say yes to life even when you weren’t ready.
            </p>
            <p class="text-gray-700">
                I didn’t plan for Luna. But she planned for me.
            </p>
        </section>

        <!-- Integration Prompt -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Integration Prompt</h2>
            <p class="text-gray-700">
                What have you said “yes” to even when you didn’t feel ready? When has life handed you something fragile and unexpected — and in saying yes, you found a new version of yourself?
            </p>
        </section>

        <!-- Navigation -->
        <ChapterNavigation />
    </div>
</template>

<script setup>
import ChapterNavigation from '@/pages-refactoring/the-journey/the-first-year/Navigation.vue'
</script>

<style scoped>
/* All styling is Tailwind-based */
</style>
