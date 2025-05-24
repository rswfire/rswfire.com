<template>
    <div class="px-6 py-12 max-w-4xl mx-auto">
        <!-- Hero Section -->
        <section class="mb-10">
            <h1 class="text-4xl font-bold mb-2">The Talk – Rewiring the Self</h1>
            <p class="text-sm text-gray-500 mb-4">April 25, 2024</p>
            <p class="text-lg text-gray-700">The final day at my first campground. I sat at a picnic table, rolling cigarettes and transmitting truth. No polish, no performance—just presence and reckoning.</p>
        </section>

        <!-- YouTube Embed -->
        <section class="mb-10">
            <div class="w-full" style="position: relative; padding-bottom: 56.25%; height: 0;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/aMzHDd8xgNY"
                    title="The Talk"
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
                <li>Withdrawal, both chemical and structural</li>
                <li>Embodied discomfort as an evolutionary signal</li>
                <li>Loneliness as a mirror, not a void</li>
                <li>Adaptive self-witnessing in motion</li>
                <li>The cost of coherence: doubt, detachment, clarity</li>
            </ul>
        </section>

        <!-- Field Notes -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Field Notes</h2>
            <p class="text-gray-700 mb-4">
                I didn’t script this. I didn’t filter it. I let the self speak, raw and tangled. The camera caught a fragment of what I was actually holding: nervous system disarray, chemical ghosts, and the quiet dread of transformation. I smoked while speaking. I cursed the birds. I worried about rejection. I told the truth.
            </p>
            <p class="text-gray-700 mb-4">
                My cats were wild. My fuse blew. I didn't shower. And yet I was more alive than ever. This was not coherence as comfort. This was coherence as confrontation — the field recalibrating from codependency to sovereignty.
            </p>
            <p class="text-gray-700">
                Rewiring the self means making contact with the uncomfortable. Not once. Repeatedly. Until it stops feeling foreign. Until it starts feeling like home.
            </p>
        </section>

        <!-- Integration Prompt -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Integration Prompt</h2>
            <p class="text-gray-700">
                What internal withdrawal are you avoiding? Whether from a substance, a pattern, or a role you’ve outgrown — name the thing you're still gripping. Then ask: who might I be if I let it go, even while afraid?
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
/* Tailwind handles the rest */
</style>
