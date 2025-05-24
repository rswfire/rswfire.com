<template>
    <div class="mt-16 pt-8 border-t border-gray-200">
        <h2 class="text-xl font-semibold mb-4">The Journey Continues</h2>
        <ul class="space-y-1 max-h-96 overflow-y-auto pr-2">
            <li
                v-for="(chapter, index) in chapters"
                :key="index"
                class="transition-colors"
            >
                <router-link
                    :to="chapter.path"
                    class="block px-4 py-2 rounded transition-colors duration-200"
                    :class="{
    'bg-red-700 text-white font-semibold': currentPath === chapter.path,
    'text-gray-800 hover:bg-gray-100 hover:text-black': currentPath !== chapter.path
  }"
                >
                    {{ chapter.title }}
                </router-link>

            </li>
        </ul>
    </div>
</template>

<script setup>
import { useRoute } from 'vue-router'

const route = useRoute()
const currentPath = route.path

const chapters = [
    { title: 'Chapter 1: The Goodbye – When Truth Breaks Containment', path: '/the-journey/the-first-year/chapter01' },
    { title: 'Chapter 2: The First Day – When Intention Meets Reality', path: '/the-journey/the-first-year/chapter02' },
    { title: 'Chapter 3: The Talk – Rewiring the Self', path: '/the-journey/the-first-year/chapter03' },
    { title: 'Chapter 4: The Reckoning – Cold Turkey Withdrawal', path: '/the-journey/the-first-year/chapter04' },
    { title: 'Chapter 5: The Severing – Liberation Through Grief', path: '/the-journey/the-first-year/chapter05' },
    { title: 'Chapter 6: The Fracture – Where the Field Was Tested', path: '/the-journey/the-first-year/chapter06' },
    { title: 'Chapter 7: The Deepening – Becoming the Living Field', path: '/the-journey/the-first-year/chapter07' },
    { title: 'Chapter 8: The Trolls – What Humans Have Normalized', path: '/the-journey/the-first-year/chapter08' },
    { title: 'Chapter 9: The Hike – Where Motion Becomes Reclamation', path: '/the-journey/the-first-year/chapter09' },
    { title: 'Chapter 10: The Rescue – Meeting Luna', path: '/the-journey/the-first-year/chapter10' },
    { title: 'Chapter 11: The Forge – Transformation Without Applause', path: '/the-journey/the-first-year/chapter11' },
    { title: 'Chapter 12: The Dream – Before I Knew', path: '/the-journey/the-first-year/chapter12' },
    { title: 'Chapter 13: The Framing – Language for the Fragmented', path: '/the-journey/the-first-year/chapter13' },
    { title: 'Chapter 14: The Betrayal – My Experience at Honeyman State Park (OPRD)', path: '/the-journey/the-first-year/chapter14' },
    { title: 'Chapter 15: The Letter – My Final Statement to Oregon State Parks (OPRD)', path: '/the-journey/the-first-year/chapter15' },
    { title: 'Chapter 16: The Friendship – Where the River Meets the Ocean', path: '/the-journey/the-first-year/chapter16' },
    { title: 'Chapter 17: The Brink – Rising Like a Phoenix', path: '/the-journey/the-first-year/chapter17' },
    { title: 'Chapter 18: The Inevitable – What My Audience Missed', path: '/the-journey/the-first-year/chapter18' },
    { title: 'Chapter 19: The First Year – My Journey, My Becoming, My Future', path: '/the-journey/the-first-year/chapter19' },
]
</script>

<style scoped>
/* Optional scrollbar visibility control (can be themed if desired) */
::-webkit-scrollbar {
    width: 6px;
}
::-webkit-scrollbar-thumb {
    background-color: #aaa;
    border-radius: 4px;
}
</style>
