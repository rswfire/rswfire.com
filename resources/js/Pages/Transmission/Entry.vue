<template>
    <Content>

        <Hero
            :title="transmission?.transmission_title || 'Untitled Transmission'"
            :subtitle="formatDate(transmission?.stamp_published) || 'NULL'"
            meta="TRANSMISSION ARCHIVE"
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
                <YoutubePlayer :video-id="transmission.youtube_id" />
            </div>
            <div v-if="htmlDescription" v-html="htmlDescription" class="prose max-w-none p-4" />
        </div>

        <div class="prose max-w-none text-gray-800">
            <p v-if="transmission.transmission_transcript" class="mt-6">
                <strong>Transcript:</strong><br>
                <span class="whitespace-pre-line text-sm leading-relaxed text-gray-600">
          {{ transmission.transmission_transcript }}
        </span>
            </p>
        </div>

        <div class="pt-4 text-sm text-gray-400 hover:text-black hover:underline cursor-pointer" @click="goTo('transmission')">
                ← Return to Archive
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
import { Link } from '@inertiajs/vue3'

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
