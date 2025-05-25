<template>
    <div class="px-6 py-12 max-w-4xl mx-auto">
        <!-- Header -->
        <section class="mb-10">
            <h1 class="text-4xl font-bold mb-2">The Hike – Where Motion Becomes Reclamation</h1>
            <p class="text-sm text-gray-500 mb-4">August 2, 2024</p>
            <p class="text-lg text-gray-700">
                I didn’t just hike a mountain. I hiked back into a version of myself that I’d forgotten. And I brought him back.
            </p>
        </section>

        <!-- YouTube Video -->
        <section class="mb-10">
            <div class="w-full" style="position: relative; padding-bottom: 56.25%; height: 0;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/wSKQsMqsEec"
                    title="Chapter 9: The Hike"
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
                <li>Physical motion as spiritual initiation</li>
                <li>Reconciling identity through embodied challenge</li>
                <li>Nature as memory palace</li>
                <li>Loss, reverence, and re-integration</li>
                <li>Moving forward by returning</li>
            </ul>
        </section>

        <!-- Field Notes -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Field Notes</h2>
            <p class="text-gray-700 mb-4">
                This wasn’t a hike. It was a ritual. I retraced my steps on a trail that held parts of my younger self — a self I thought I’d lost. Through rain, misdirection, pain, and blisters, I moved toward something unnameable but necessary.
            </p>
            <p class="text-gray-700 mb-4">
                The silence spoke. The turtle spoke. My own breath spoke. And when I couldn’t find the ridge I remembered, I realized: sometimes the landscape changes to show you what really mattered wasn’t a place, but who you were when you loved it.
            </p>
            <p class="text-gray-700">
                I hiked nearly 12 miles. I found my edge. And I crossed it. Not to escape myself — but to re-enter who I’ve always been.
            </p>
        </section>

        <!-- Integration Prompt -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Integration Prompt</h2>
            <p class="text-gray-700">
                Where have you left versions of yourself behind? What landscapes still carry your name? What would it mean to return — not for nostalgia, but for reintegration?
            </p>
        </section>

        <!-- Navigation -->
        <ChapterNavigation />
    </div>
</template>

<script setup>
import ChapterNavigation from '@/pages/the-journey/the-first-year/Navigation.vue'
</script>

<style scoped>
/* All styling is Tailwind-based */
</style>
