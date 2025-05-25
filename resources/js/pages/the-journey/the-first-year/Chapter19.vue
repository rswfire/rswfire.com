<template>
    <div class="px-6 py-12 max-w-4xl mx-auto">
        <!-- Hero Section -->
        <section class="mb-10">
            <h1 class="text-4xl font-bold mb-2">The First Year</h1>
            <p class="text-sm text-gray-500 mb-4">April 12, 2025</p>
            <p class="text-lg text-gray-700">
                One year into the journey. One year since I chose to live — truly live. This reflection captures the weight, the grief, and the grace of choosing a different path.
            </p>
        </section>

        <!-- YouTube Embed -->
        <section class="mb-10">
            <div class="w-full" style="position: relative; padding-bottom: 56.25%; height: 0;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/YNIpfo7IMEQ"
                    title="The First Year"
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
                <li>Marking time through transformation</li>
                <li>Self-love after decades of suppression</li>
                <li>Witnessing your own growth</li>
                <li>Ethics of storytelling and discernment</li>
                <li>Archiving trauma, triumph, and truth</li>
            </ul>
        </section>

        <!-- Field Notes -->
        <section class="mb-10">
            <h2 class="text-2xl text-semibold mb-4">Field Notes</h2>
            <p class="text-gray-700 mb-4">
                This wasn’t a birthday video. It was a ledger. A year marked not by cake or candles, but by courage and clear decisions. Each chapter I named was a turning point. Not one chosen lightly. Not one without cost.
            </p>
            <p class="text-gray-700 mb-4">
                In naming them — *The Rupture*, *The Goodbye*, *The Forge*, *The Betrayal* — I created a living lexicon. A way for others to follow not just the events, but the shape of transformation. Some watched. Fewer understood. But I understand. And that's enough.
            </p>
            <p class="text-gray-700">
                I built this archive for those who will find it when they are ready. Because I was ready, and I answered that readiness with action. This was the first year.
            </p>
        </section>

        <!-- Integration Prompt -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Integration Prompt</h2>
            <p class="text-gray-700">
                What are the chapters of your last year — not as months, but as moments of rupture and remaking? If you were to name them as turning points, what language would honor their depth?
            </p>
        </section>

        <!-- Chapter Navigation -->
        <ChapterNavigation />
    </div>
</template>

<script setup>
import ChapterNavigation from '@/pages/the-journey/the-first-year/Navigation.vue'
</script>

<style scoped>
/* Tailwind handles structure and spacing */
</style>
