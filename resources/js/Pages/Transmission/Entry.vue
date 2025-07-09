<template>
    <Content>

        <div class="border border-gray-200 shadow-sm rounded-md overflow-hidden">
            <div class="bg-gray-100 px-4 py-2 font-semibold">
                <div class="flex justify-between text-md">
                    <div v-if="previous">
                        <Link :href="`/transmission/${previous.signal_ulid}`" class="hover:text-black hover:underline">
                            ← Previous Video
                        </Link>
                    </div>
                    <div v-else></div>
                    <Link href="/transmission" class="hover:text-black hover:underline">[ Return to Archive ]</Link>
                    <div v-if="next">
                        <Link :href="`/transmission/${next.signal_ulid}`" class="hover:text-black hover:underline">
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
                        :title="reflection.narrative_title || 'Untitled Transmission'"
                        :subtitle="formatDate(transmission?.stamp_created) || 'NULL'"
                        meta="TRANSMISSION VAULT"
                        align="center"
                    />
                    <!-- <div v-if="htmlDescription" v-html="htmlDescription" class="mt-4 prose prose-sm max-w-none" /> -->

                    <section v-if="reflection.tags" class="bg-white border border-gray-200 p-6 rounded-xl mt-8 space-y-6">

                        <!-- Narrative Reflection -->
                        <div>
                            <h3 class="text-sm font-bold text-gray-700 uppercase tracking-wide">Narrative Reflection   <span class="text-sm font-bold text-gray-400 uppercase tracking-wide">LLAMA3:70B</span></h3>
                            <p class="mt-1 whitespace-pre-line text-gray-800 text-base leading-relaxed">
                                {{ reflection.narrative_reflection }}
                            </p>
                        </div>

                        <!-- Symbolic Elements & Tags -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="text-sm font-medium text-gray-600">Symbolic Elements</h4>
                                <ul class="list-disc list-inside mt-1 text-gray-700">
                                    <li v-for="(symbol, index) in reflection.symbolic_elements" :key="index">
                                        {{ symbol }}
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <h4 class="text-sm font-medium text-gray-600">Tags</h4>
                                <div class="flex flex-wrap gap-2 mt-1">
                                  <span
                                      v-for="(tag, i) in reflection.tags"
                                      :key="i"
                                      class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2 py-1 rounded-full"
                                  >
                                    {{ tag }}
                                  </span>
                                </div>
                            </div>
                        </div>

                        <!-- Signature, Vector, Phase -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm text-gray-700 mt-4">
                            <div>
                                <strong class="text-gray-500">Energetic Signature:</strong><br>
                                {{ reflection.energetic_signature }}
                            </div>
                            <div>
                                <strong class="text-gray-500">Alignment Vector:</strong><br>
                                {{ reflection.alignment_vector }}
                            </div>
                            <div>
                                <strong class="text-gray-500">Field Phase:</strong><br>
                                {{ reflection.field_phase }}
                            </div>
                        </div>

                        <!-- Notes -->
                        <div v-if="reflection.notes" class="mt-4 text-gray-700">
                            <h4 class="text-sm font-semibold text-gray-600 uppercase">Notes</h4>
                            <p class="mt-1 text-base leading-relaxed">
                                {{ reflection.notes }}
                            </p>
                        </div>
                    </section>

                </div>

                <div class="md:w-5/12 md:mt-0">
                    <div :class="containerClass">
                        <YoutubePlayer :video-id="transmission.signal_metadata.youtube.id" :is-portrait="isPortrait" />
                    </div>

                    <div class="text-xs uppercase tracking-widest text-gray-500 mt-4">Transcript</div>
                    <div class="mt-2 max-h-[50vh] overflow-y-auto rounded-md border-y bg-gray-50 text-sm leading-relaxed text-gray-600">

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
                    <Link :href="`/transmission/${previous.signal_ulid}`" class="hover:text-black hover:underline">
                        ← Previous Video
                    </Link>
                </div>
                <div v-else></div>

                <Link href="/transmission" class="hover:text-black hover:underline">[ Return to Archive ]</Link>

                <div v-if="next">
                    <Link :href="`/transmission/${next.signal_ulid}`" class="hover:text-black hover:underline">
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
    reflection: Object,
    isPortrait: Boolean,
})

const md = new MarkdownIt({
    html: true,
    breaks: true,
    linkify: true,
})

const htmlDescription = computed(() => {
    const input = props.transmission?.signal_description || ''
    return md.render(input)
})

const parsedTags = computed(() => {
    try {
        const raw = props.transmission?.signal_tags
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
        return props.transmission?.signal_payload["timed-transcript"] || [];
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
