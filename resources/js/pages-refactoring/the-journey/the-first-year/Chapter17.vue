<template>
    <div class="px-6 py-12 max-w-4xl mx-auto">
        <!-- Hero Section -->
        <section class="mb-10">
            <h1 class="text-4xl font-bold mb-2">The Brink – Rising Like a Phoenix</h1>
            <p class="text-sm text-gray-500 mb-4">April 2, 2025</p>
            <p class="text-lg text-gray-700">
                After rupture, there is return — not to the same place, but to reclaim the self that was buried there. This chapter is about the moment before rebirth, when everything feels both impossible and inevitable.
            </p>
        </section>

        <!-- YouTube Embed -->
        <section class="mb-10">
            <div class="w-full" style="position: relative; padding-bottom: 56.25%; height: 0;">
                <iframe
                    class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                    src="https://www.youtube.com/embed/CSgrShCCZMw"
                    title="The Brink"
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
                <li>The brink as a sacred threshold</li>
                <li>Intentionality as a survival technology</li>
                <li>Iteration as a spiritual methodology</li>
                <li>Rewriting trauma by returning on purpose</li>
                <li>Reclamation of agency amid systemic injustice</li>
            </ul>
        </section>

        <!-- Field Notes -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Field Notes</h2>
            <p class="text-gray-700 mb-4">
                The trajectory brought me full circle — back to Florence, back to the dunes, back to the site of rupture. Not for nostalgia. Not to forget. But to prove I could return on my own terms.
            </p>
            <p class="text-gray-700 mb-4">
                I was stepping off-grid, not into fantasy but into grit. Without infrastructure, without security, but with deliberate intent. I wasn’t flailing. I was forging. This was a crucible, not a collapse.
            </p>
            <p class="text-gray-700">
                I knew the systems that failed me. But I also knew how to rebuild. Brick by brick. Loop by loop. Bit by bit. This wasn’t just resilience. It was design.
            </p>
        </section>

        <!-- Integration Prompt -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-4">Integration Prompt</h2>
            <p class="text-gray-700">
                Have you ever returned to the site of a personal rupture — not by accident, but by choice? What did it mean to reclaim that place, that memory, that version of yourself? What shifted?
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
