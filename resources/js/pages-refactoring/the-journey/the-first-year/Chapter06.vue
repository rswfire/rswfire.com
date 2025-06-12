<template>
    <div class="px-6 py-12 max-w-4xl mx-auto">
        <!-- Hero Section -->
        <section class="mb-10">
            <h1 class="text-4xl font-bold mb-2">The Fracture – Where the Field Was Tested</h1>
            <p class="text-sm text-gray-500 mb-4">June 7, 2024</p>
            <p class="text-lg text-gray-700">
                Everything cracked this day — not metaphorically. Tires, alignment, judgment, self-trust, a broken monitor. And yet, I walked a trail. I chose not to break.
            </p>
        </section>

        <!-- YouTube Embed -->
        <section class="mb-10">
            <div class="w-full" style="position: relative; padding-bottom: 56.25%; height: 0;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/DVEg9RuoAzw"
                    title="The Fracture"
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
                <li>The nervous system under strain</li>
                <li>Judgment as an internalized architecture</li>
                <li>Material sacrifice in service of coherence</li>
                <li>Resilience not as optimism, but as refusal to retreat</li>
                <li>Reclaiming presence through micro-grounding</li>
            </ul>
        </section>

        <!-- Field Notes -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Field Notes</h2>
            <p class="text-gray-700 mb-4">
                This day nearly broke me. Not because of one catastrophic event — but because of the compound pressure of the little failures. Misalignment, feline stress, technical losses, and human eyes that reminded me of a father’s constant scrutiny. The old wounds reopened.
            </p>
            <p class="text-gray-700 mb-4">
                I lost my monitor — the symbol of digital order and control. I lost confidence in my alignment, in my judgment. And yet I took to a trail. Small, barely scenic. But it gave me something unspoken: breath. I didn’t walk to escape. I walked to stay.
            </p>
            <p class="text-gray-700">
                This was not my collapse. This was my fracture. And the field held.
            </p>
        </section>

        <!-- Integration Prompt -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Integration Prompt</h2>
            <p class="text-gray-700">
                Think back to a moment when everything seemed to go wrong at once. What judgment did you turn inward that wasn’t yours to carry? If you could speak to that past self now, what would you say — not to fix them, but to acknowledge their strength in surviving it?
            </p>
        </section>

        <!-- Chapter Navigation -->
        <ChapterNavigation />
    </div>
</template>

<script setup>
import ChapterNavigation from '@/pages-refactoring/the-journey/the-first-year/Navigation.vue'
</script>

<style scoped>
/* Tailwind handles structure and spacing */
</style>
