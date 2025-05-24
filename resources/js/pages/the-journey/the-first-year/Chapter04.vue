<template>
    <div class="px-6 py-12 max-w-4xl mx-auto">
        <!-- Hero Section -->
        <section class="mb-10">
            <h1 class="text-4xl font-bold mb-2">The Reckoning – Cold Turkey Withdrawal</h1>
            <p class="text-sm text-gray-500 mb-4">April 29, 2024</p>
            <p class="text-lg text-gray-700">
                My first out-of-state campsite. Tennessee. Day three of cold turkey. Two videos, one transmission: disorientation, longing, and the raw edge of becoming.
            </p>
        </section>

        <!-- YouTube Embed: Part 1 -->
        <section class="mb-10">
            <h2 class="text-xl font-semibold mb-2">Part 1</h2>
            <div class="w-full" style="position: relative; padding-bottom: 56.25%; height: 0;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/Zr7rX1HTmsU"
                    title="The Reckoning – Part 1"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
        </section>

        <!-- YouTube Embed: Part 2 -->
        <section class="mb-10">
            <h2 class="text-xl font-semibold mb-2">Part 2</h2>
            <div class="w-full" style="position: relative; padding-bottom: 56.25%; height: 0;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/PvzyoDBfWn4"
                    title="The Reckoning – Part 2"
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
                <li>Withdrawal as spiritual initiation</li>
                <li>The nervous system as oracle</li>
                <li>Grief for a life left behind</li>
                <li>The mirror of loneliness during transformation</li>
                <li>Hiking as memory-retrieval and field repair</li>
            </ul>
        </section>

        <!-- Field Notes -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Field Notes</h2>
            <p class="text-gray-700 mb-4">
                I didn’t sleep. My arms pulsed with something I didn’t have language for. Cold turkey began, and the body became its own battlefield. My awareness was clouded but still intact — and so I filmed. Not to explain. But to bear witness.
            </p>
            <p class="text-gray-700 mb-4">
                The second video is a walking meditation. I wandered the campground to reconnect with sensation, memory, the trees, the map. Hiking used to anchor me. I remembered the old man on the trail — and for a moment, I remembered my future self.
            </p>
            <p class="text-gray-700">
                I didn’t hide my longing. I missed my mother. I questioned if the cats were happy. I considered public showers. I faced what most people mask. This wasn’t collapse. This was the cost of coherence: everything unprocessed made visible.
            </p>
        </section>

        <!-- Integration Prompt -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Integration Prompt</h2>
            <p class="text-gray-700">
                What pain have you learned to hide from others — or from yourself — in order to seem functional? What would it mean to tell the truth about that pain, not for sympathy, but for liberation?
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
/* All styling handled by Tailwind */
</style>
