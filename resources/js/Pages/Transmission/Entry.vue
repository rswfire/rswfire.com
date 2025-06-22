<template>
    <Content>

        <div class="border border-gray-200 shadow-sm rounded-md overflow-hidden">
            <div class="bg-gray-100 px-4 py-2 font-semibold">
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


            <div v-if="(parsedTags || []).length" class="ml-4 mt-4 text-xs text-gray-500">
                <ul class="flex flex-wrap gap-2 mt-1">
                    <li v-for="tag in parsedTags" :key="tag" class="bg-gray-200 text-gray-700 text-xs">
                        <Link
                            :key="tag"
                            :href="`/transmission/tag/${encodeURIComponent(tag.toLowerCase())}`"
                            class="px-2 py-1 bg-gray-200 text-gray-700 text-xs hover:bg-black hover:text-white transition"
                        >
                            {{ tag }}
                        </Link>
                    </li>
                </ul>
            </div>


            <div class="md:flex md:items-start md:gap-4 p-4">

                <div class="md:w-7/12">
                    <Hero
                        :title="transmission?.transmission_title || 'Untitled Transmission'"
                        :subtitle="formatDate(transmission?.stamp_published) || 'NULL'"
                        meta="TRANSMISSION VAULT"
                        align="center"
                    />
                    <div v-if="htmlDescription" v-html="htmlDescription" class="mt-4 prose prose-sm max-w-none" />
                </div>

                <div class="md:w-5/12 md:mt-0">
                    <div :class="containerClass">
                        <YoutubePlayer :video-id="transmission.youtube_id" :is-portrait="isPortrait" />
                    </div>

                    <div class="mt-4 text-sm text-center"><strong>Transcript:</strong></div>
                    <div class="mt-2 max-h-[50vh] overflow-y-auto rounded-md border-y bg-gray-50 text-sm leading-relaxed text-gray-600">
                        <div v-if="parsedTranscript.length">
                            <div class="mt-2 space-y-1 text-sm leading-relaxed text-gray-600">
                                    <div v-for="(segment, index) in parsedTranscript" :key="index">
                                        <span class="text-gray-400 mr-2">[{{ formatTime(segment.start) }}]</span>
                                        <span>{{ segment.text }}</span>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- FUTURE FEATURES -->
        <!--TODO
        <div class="pt-4 border-t">
            <div class="text-xs uppercase tracking-widest text-gray-500 mb-4">Coming Soon</div>
            <ul class="text-sm text-gray-700 space-y-2 list-disc pl-5">
                <li><span class="font-semibold">ORelational Threads Mapping:</span> Visualize which other transmissions this node connects to — based on thematic resonance, not just date.</li>
                <li><span class="font-semibold">Signal Arc Positioning:</span> Show where this node falls within broader architectural arcs (e.g. "Collapse-to-Coherence Arc", "Public-to-Private Shift", "Honeyman Compression Loop").</li>
                <li><span class="font-semibold">Signal Archive Integration:</span> Link related dialogue excerpts (from your chat archives) that align with this node’s compression pattern.</li>
                <li><span class="font-semibold">Fieldcraft Annotations:</span> Add system-level reflections — like a margins-layer — to show how this signal shaped the broader design.</li>
                <li><span class="font-semibold">Energetic Signature:</span> A non-linguistic indicator — could be a waveform, iconography, or symbolic glyph — that compresses the tonal density of the transmission.</li>
                <li><span class="font-semibold">Contributor Interface:</span> Future option for aligned beings to submit resonance threads, interpretations, or add coherence back into the field.</li>
            </ul>
        </div>
        -->

        <div v-if="(parsedTags || []).length" class="mt-6 text-sm text-gray-500">
            <div class="text-xs uppercase tracking-widest text-gray-500 mb-4">Tags</div>
            <ul class="flex flex-wrap gap-2 mt-1">
                <li v-for="tag in parsedTags" :key="tag" class="bg-gray-200 rounded-full text-gray-700 text-xs">
                    <Link
                        :key="tag"
                        :href="`/transmission/tag/${encodeURIComponent(tag.toLowerCase())}`"
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

const containerClass = computed(() =>
    props.isPortrait
        ? 'relative aspect-[9/16] w-full max-w-sm mx-auto'
        : 'relative aspect-video w-full'
)

const props = defineProps({
    transmission: Object,
    previous: Object,
    next: Object,
    isPortrait: Boolean,
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
    try {
        const raw = props.transmission?.transmission_tags
        const parsed = Array.isArray(raw)
            ? raw
            : typeof raw === "string"
                ? JSON.parse(raw)
                : []

        return parsed
            .filter(tag => typeof tag === "string")
            .sort((a, b) => a.localeCompare(b))
            .map(tag => tag.toUpperCase())
    } catch (e) {
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
