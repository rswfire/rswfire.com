<script setup>
defineOptions({ layout: null });

import { ref, onMounted, onBeforeUnmount } from 'vue';

const slides = [
    {
        title: "EARLY FREELANCING CAREER",
        points: [
            "25 Separate Freelance Projects",
            "41 5-Star Reviews",
            "Varied Projects and Scope"
        ]
    }
];

const currentSlide = ref(0);
const nextSlide = () => {
    if (currentSlide.value < slides.length) currentSlide.value++;
};
const prevSlide = () => {
    if (currentSlide.value > 0) currentSlide.value--;
};

const handleKeyPress = (event) => {
    if (event.key === 'ArrowRight' || event.key === ' ') {
        nextSlide();
    } else if (event.key === 'ArrowLeft') {
        prevSlide();
    }
};

onMounted(() => window.addEventListener('keydown', handleKeyPress));
onBeforeUnmount(() => window.removeEventListener('keydown', handleKeyPress));
</script>

<template>
    <div class="w-[800px] h-[600px] bg-white flex items-center justify-center overflow-hidden">
        <div
            class="w-full h-full bg-[#f9fafb] border-4 border-gray-300 rounded-2xl p-6 flex flex-col justify-between shadow-2xl font-sans"
        >
            <!-- Top: Metadata + Title -->
            <div>
                <div class="text-sm text-gray-500 tracking-widest uppercase mb-2">
                    Slide {{ currentSlide + 1 }} of {{ slides.length }}
                </div>
                <h1 class="text-3xl font-bold uppercase tracking-tight mb-6 text-gray-900 leading-snug">
                    {{ slides[currentSlide].title }}
                </h1>
            </div>

            <!-- Middle: points -->
            <ul class="flex-1 overflow-hidden text-lg leading-relaxed space-y-4 text-gray-800 pr-2">
                <li v-for="(point, i) in slides[currentSlide].points" :key="i" class="flex items-start">
                    <span class="text-purple-600 text-3xl leading-none mr-4">•</span>
                    <span>{{ point }}</span>
                </li>
            </ul>

            <!-- Bottom: Nav -->
            <div class="flex justify-between items-center mt-4">
                <button
                    @click="prevSlide"
                    class="text-base px-5 py-2 bg-purple-100 text-purple-800 rounded hover:bg-purple-200"
                >
                    Back
                </button>
                <div class="flex space-x-2">
          <span
              v-for="(slide, i) in slides"
              :key="i"
              :class="[
              'w-3 h-3 rounded-full transition-all duration-300',
              currentSlide === i ? 'bg-purple-600 scale-110' : 'bg-gray-300'
            ]"
          ></span>
                </div>
                <button
                    @click="nextSlide"
                    class="text-base px-5 py-2 bg-purple-600 text-white rounded hover:bg-purple-700"
                >
                    Next
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>
:root {
    font-family: 'Inter', 'system-ui', sans-serif;
}
</style>
