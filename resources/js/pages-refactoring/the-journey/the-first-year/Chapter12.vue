<template>
    <div class="px-6 py-12 max-w-4xl mx-auto">
        <!-- Header -->
        <section class="mb-10">
            <h1 class="text-4xl font-bold mb-2">The Dream – Before I Knew</h1>
            <p class="text-sm text-gray-500 mb-4">February 24, 2025</p>
            <p class="text-lg text-gray-700">
                Sometimes we act before we understand why. We follow the current of our soul toward transformation, not yet knowing the cost or the contours of what it will become.
            </p>
        </section>

        <!-- YouTube Video -->
        <section class="mb-10">
            <div class="w-full" style="position: relative; padding-bottom: 56.25%; height: 0;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/Z4wspt_f9_o"
                    title="Chapter 12: The Dream – Before I Knew"
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
                <li>Becoming before clarity</li>
                <li>The sacred impulse to transform</li>
                <li>Volunteering, value, and invisibility</li>
                <li>Movement as a form of becoming</li>
                <li>The future unformed, yet somehow still yours</li>
            </ul>
        </section>

        <!-- Field Notes -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Field Notes</h2>
            <p class="text-gray-700 mb-4">
                I pierced my body — not for show, but for sovereignty. Another layer of transformation, etched into skin. Not everything I’m doing is visible to others, and most don’t ask. But I keep moving, because my forward motion isn’t waiting for applause.
            </p>
            <p class="text-gray-700 mb-4">
                The season ahead is uncertain, underfunded, but deeply mine. This life — this route through coastlines, cabins, and campsites — isn’t always stable, but it’s sovereign. And I’m navigating it as best I can, one trailhead at a time.
            </p>
            <p class="text-gray-700">
                I don’t know yet what the summer will hold. But I’m listening to the undercurrent of change — and it’s still carrying me.
            </p>
        </section>

        <!-- Integration Prompt -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Integration Prompt</h2>
            <p class="text-gray-700">
                When was the last time you followed an inner pull before understanding it? What small gesture — piercing, journey, decision — later revealed a deeper shift in you? How often do we step into transformation before language arrives to describe it?
            </p>
        </section>

        <!-- Navigation -->
        <ChapterNavigation />
    </div>
</template>

<script setup>
import ChapterNavigation from '@/pages-refactoring/the-journey/the-first-year/Navigation.vue'
</script>
