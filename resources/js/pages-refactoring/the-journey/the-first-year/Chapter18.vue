<template>
    <div class="px-6 py-12 max-w-4xl mx-auto">
        <!-- Hero Section -->
        <section class="mb-10">
            <h1 class="text-4xl font-bold mb-2">The Inevitable – What My Audience Missed</h1>
            <p class="text-sm text-gray-500 mb-4">April 10, 2025</p>
            <p class="text-lg text-gray-700">
                One year on the road. One year of peeling back illusions. This isn’t a story of isolation — it’s a story of preparation, and of an audience that failed to show up.
            </p>
        </section>

        <!-- YouTube Embed -->
        <section class="mb-10">
            <div class="w-full" style="position: relative; padding-bottom: 56.25%; height: 0;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/hH-OgeXTF1A"
                    title="The Inevitable"
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
                <li>Preparedness as praxis</li>
                <li>Disappointment in relational absence</li>
                <li>Off-grid learning as spiritual initiation</li>
                <li>The slow grief of unmet witness</li>
                <li>Self-trust as sovereign foundation</li>
            </ul>
        </section>

        <!-- Field Notes -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Field Notes</h2>
            <p class="text-gray-700 mb-4">
                This was the eve of my one-year anniversary. A milestone few could fully understand. Not just the act of living off-grid — but the choices that brought me here. I wasn’t camping. I was constructing a reality.
            </p>
            <p class="text-gray-700 mb-4">
                Every inverter wire, every battery draw, every satellite signal — all of it stitched into the fabric of my autonomy. This was deliberate design, not accidental survival. My audience watched, but few truly saw.
            </p>
            <p class="text-gray-700">
                I am not bitter. I am resolved. I opened a door for a year. And now I’ve closed it. Because the ones who were meant to walk through it — they already have.
            </p>
        </section>

        <!-- Integration Prompt -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Integration Prompt</h2>
            <p class="text-gray-700">
                Have you ever extended something sacred — an invitation, a vulnerability, a truth — and had it ignored? How did you know when it was time to close the door? And what did you find waiting for you on the other side of that closure?
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
