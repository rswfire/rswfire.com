<template>
    <Content>

        <Hero
            :title="transmission?.transmission_title || 'Untitled Transmission'"
            :subtitle="formatDate(transmission?.stamp_published) || 'NULL'"
            meta="TRANSMISSION VAULT"
        />

        <div class="mt-6 border border-gray-200 shadow-sm rounded-md overflow-hidden">
            <div class="bg-gray-100 px-4 py-2 font-semibold">
                <div class="flex justify-between text-md">
                    <div v-if="previous">
                        <Link :href="`/transmission/${previous.transmission_id}`" class="hover:text-black hover:underline">
                            ← Previous Video
                        </Link>
                    </div>
                    <div v-else></div>

                    <div v-if="next">
                        <Link :href="`/transmission/${next.transmission_id}`" class="hover:text-black hover:underline">
                            Next Video →
                        </Link>
                    </div>
                </div>
            </div>

            <div class="p-4">
                <YoutubePlayer :video-id="transmission.youtube_id" :is-portrait="transmission.is_portrait"  />
            </div>
            <div v-if="htmlDescription" v-html="htmlDescription" class="prose max-w-none p-4" />
        </div>

        <div class="prose max-w-none text-gray-800 mt-6">
            <div v-if="parsedTranscript.length">
                <strong>Transcript:</strong>
                <div class="mt-2 space-y-1 text-sm leading-relaxed text-gray-600">
                    <div class="max-h-96 overflow-y-auto border rounded-md p-3 bg-white shadow-inner text-sm leading-relaxed text-gray-700 space-y-1">
                        <div v-for="(segment, index) in parsedTranscript" :key="index">
                            <span class="text-gray-400 mr-2">[{{ formatTime(segment.start) }}]</span>
                            <span>{{ segment.text }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="(parsedTags || []).length" class="mt-6 text-sm text-gray-500">
            <strong>Tags:</strong>
            <ul class="flex flex-wrap gap-2 mt-1">
                <li v-for="tag in parsedTags" :key="tag" class="px-2 py-1 bg-gray-200 rounded-full text-gray-700 text-xs">
                    <Link
                        :key="tag"
                        :href="`/transmission/tag/${encodeURIComponent(tag)}`"
                        class="px-2 py-1 bg-gray-200 rounded-full text-gray-700 text-xs hover:bg-black hover:text-white transition"
                    >
                        {{ tag }}
                    </Link>
                </li>
            </ul>
        </div>



        <div class="mt-4 bg-gray-100 px-4 py-2 font-semibold">
            <div class="flex justify-between text-md">
                <div v-if="previous">
                    <Link :href="`/transmission/${previous.transmission_id}`" class="hover:text-black hover:underline">
                        ← Previous Video
                    </Link>
                </div>
                <div v-else></div>

                <Link href="/transmission" class="hover:text-black hover:underline">[ Return to Archive ]</Link>

                <div v-if="next">
                    <Link :href="`/transmission/${next.transmission_id}`" class="hover:text-black hover:underline">
                        Next Video →
                    </Link>
                </div>
                <div v-else></div>
            </div>
        </div>

    </Content>
</template>

<script setup>
import { router } from '@inertiajs/vue3';
import Content from "@/Components/System/Content.vue";
import Hero from "@/Components/System/Hero.vue";
import YoutubePlayer from '@/Components/System/YoutubePlayer.vue';
import MarkdownIt from 'markdown-it';
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    transmission: Object,
    previous: Object,
    next: Object,
})

const md = new MarkdownIt({
    html: true,
    breaks: true,
    linkify: true,
})

const htmlDescription = computed(() => {
    const input = props.transmission?.transmission_description || ''
    return md.render(input)
})

const parsedTags = computed(() => {
    const raw = props.transmission?.transmission_tags
    try {
        return Array.isArray(raw) ? raw : JSON.parse(raw)
    } catch {
        return []
    }
})

const parsedTranscript = computed(() => {
    try {
        return JSON.parse(props.transmission?.transmission_transcript || '[]');
    } catch {
        return [];
    }
})

const formatTime = (seconds) => {
    const mins = Math.floor(seconds / 60);
    const secs = Math.floor(seconds % 60);
    return `${mins}:${secs.toString().padStart(2, '0')}`;
}

const formatDate = (str) => {
    const date = new Date(str)
    return date.toLocaleDateString(undefined, {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    })
}

const goTo = (path) => {
    router.visit(`/${path}`)
}

</script>
