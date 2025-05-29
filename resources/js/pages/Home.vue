<template>

    <div class="border border-gray-300 rounded-2xl p-6 shadow-md bg-white w-full mx-auto">
        <div class="mb-4 flex items-center gap-2">
            <div class="relative flex items-center justify-center w-8 h-8">
                <span class="absolute w-full h-full rounded-full bg-orange-200 opacity-50 animate-ping"></span>
                <span class="relative text-lg">🔥</span>
            </div>
            <h3 class="text-2xl font-semibold text-gray-900">Start Here</h3>
        </div>

        <div class="text-gray-600 text-md leading-relaxed mb-4">
            <div>This isn’t a blog. It’s not a pitch.</div>
            <div>It’s a field anchor — a living architecture of coherence.</div>
            <div>A record of one man’s motion through fragmentation, holding wholeness as the world frays.</div>

            <div>You don’t have to understand it.</div>
            <div>But if you feel it — then yes, this part is for you.</div>
        </div>

        <div><router-link
            to="/hello"
            class="inline-block text-red-600 hover:text-red-800 transition font-medium border border-red-200 hover:border-red-400 px-4 py-2 rounded-lg"
        >
            About Me →
        </router-link></div>
    </div>

    <div class="mt-10 rounded-xl border border-gray-200 bg-white shadow-sm p-6 space-y-4">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-900 flex items-center">
            ⛰️ The Journey
        </h2>

        <div class="border-l-4 border-gray-300 ml-4 pl-4 italic space-y-1">
            <div>The journey didn’t start when I left.</div>
            <div>It started when I woke up.</div>
            <div>Leaving was just the first thing I did as a free man.</div>
        </div>

        <p>This is not a story of escape.</p>
        <p>It’s a story of return — to self, to coherence, to the real.</p>

        <router-link
            to="/the-journey"
            class="inline-block mt-2 px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-md transition"
        >
            Enter the Journey →
        </router-link>
    </div>

    <div class="mt-10 rounded-xl border border-gray-200 bg-white shadow-sm p-6 space-y-3">
        <div class="flex items-center gap-3">
            <span class="text-2xl">🛠️</span>
            <h2 class="text-xl font-semibold text-gray-900">Builder of Systems. Steward of Depth.</h2>
        </div>

        <div class="text-gray-700 text-sm leading-relaxed space-y-3">
            <p><strong>I’ve been programming since DOS.</strong> At age 11, I was shipping batch scripts to BBS systems. By 13, I was writing grading software for teachers. By 15, I was coding CMS platforms on paper — entire systems, mentally compiled, handwritten line by line.</p>

            <p><strong>By 18, I was a top-ten freelancer on Guru.com.</strong> The only American. The only solo dev. I didn’t undercut — I overdelivered. I built what clients asked for, and what their systems would need six months later.</p>

            <p><strong>Now I live in an off-grid RV by the sea.</strong> Because depth doesn’t need a tower. And clarity doesn’t come from noise.</p>

            <p><em>This isn’t hustle. It’s frequency. If you feel it, we’re already in conversation.</em></p>
        </div>

        <router-link
            to="/tech"
            class="inline-block px-4 py-2 border border-red-300 text-red-600 hover:bg-red-50 hover:border-red-500 rounded-md text-sm font-semibold transition"
        >
            See the Full Story →
        </router-link>
    </div>

    <FieldRecordsPreview />

    <div class="w-64 mx-auto bg-black text-white rounded-lg p-4 text-center shadow mt-10">
        <a href="/duners" class="block">
            <div class="text-2xl mb-2">🏁</div>
            <div class="italic text-sm leading-tight">
                To The Ones Who Ride The Sand
                <br />
                <span class="text-xs">(Click Here)</span>
            </div>
        </a>
    </div>

</template>

<script>

import {defineComponent} from "vue";
import FieldRecordsPreview from "../components/FieldRecordsPreview.vue";
import { useMeta } from '../components/useMeta.ts'

useMeta({
    title: 'rswfire.com',
    description: 'Robert Samuel White',
    keywords: 'rswfire',
    image: '',
    url: 'https://rswfire.com/',
    type: 'article',
})
export default defineComponent({
    components: {FieldRecordsPreview}
})
</script>

<style>

</style>
