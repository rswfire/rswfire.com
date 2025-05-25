<template>
    <div class="px-6 py-12 max-w-4xl mx-auto">
        <!-- Hero Section -->
        <section class="mb-10">
            <h1 class="text-4xl font-bold mb-2">The Friendship – Where the River Meets the Ocean</h1>
            <p class="text-sm text-gray-500 mb-4">March 28, 2025</p>
            <p class="text-lg text-gray-700">
                A day on the coast with John, a fellow volunteer and friend. Ocean wind, migrating birds, laughter, light. This wasn’t about healing. It was about remembering how it feels to be whole.
            </p>
        </section>

        <!-- YouTube Embed -->
        <section class="mb-10">
            <div class="w-full" style="position: relative; padding-bottom: 56.25%; height: 0;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/x0pSkstwtHA"
                    title="The Friendship"
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
                <li>Friendship as mutual witnessing, not codependence</li>
                <li>Queer joy as resistance to institutional erasure</li>
                <li>Water as metaphor: movement, connection, memory</li>
                <li>Humor as embodied reclamation</li>
                <li>Time recalibrated through shared presence</li>
            </ul>
        </section>

        <!-- Field Notes -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Field Notes</h2>
            <p class="text-gray-700 mb-4">
                John and I had been friends for three months. What began with tension evolved into a grounded rhythm of mutual respect. This wasn’t our beginning. This was our continuation — a day on the Oregon coast that held laughter, curiosity, silence, and wonder.
            </p>
            <p class="text-gray-700 mb-4">
                We walked dunes and river edges. Talked about lighthouses, crabbing, gay stereotypes, dune buggies, and weather. We ducked Jeeps, made fun of each other, and paused for wind, rain, and wild birds.
            </p>
            <p class="text-gray-700">
                This was a chapter not marked by collapse or transformation — but by reminder. There is life worth living beyond survival. There is joy that asks for nothing in return.
            </p>
        </section>

        <!-- Integration Prompt -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Integration Prompt</h2>
            <p class="text-gray-700">
                Think of someone who has witnessed you without trying to fix you. What was it about their presence that made you feel safe? How might you offer that same kind of witnessing to someone else — or to yourself?
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
