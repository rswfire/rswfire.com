<template>

    <Content :theme="pageTheme">
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

            <div class="md:flex md:items-start md:gap-4 p-4">

                <div class="md:w-7/12">
                    <Hero
                        :title="transmission.signal_ulid || 'Untitled Transmission'"
                        :subtitle="reflection?.narrative?.reflection_title || 'No Reflection Found'"
                        :meta="formatDate(transmission?.stamp_created) || 'NULL'"
                        :theme="pageTheme"
                        align="center"
                    />

                    <section id="signal-metadata" v-if="reflection.surface">
                        <div class="text-xs uppercase tracking-widest text-gray-500 mt-4">Timestamp Context</div>
                        <div class="[&>ul]:list-disc [&>ul]:pl-5 [&>p]:my-2 text-sm" v-html="renderMarkdown(reflection.surface.reflection_content.timestamp_context)" />
                        <div class="text-xs uppercase tracking-widest text-gray-500 mt-4">Summary</div>
                        <div class="[&>ul]:list-disc [&>ul]:pl-5 [&>p]:my-2 text-sm" v-html="renderMarkdown(reflection.surface.reflection_content.summary)" />
                    </section>

                </div>

                <div class="md:w-5/12 md:mt-0">
                    <div :class="containerClass">
                        <YoutubePlayer :video-id="transmission.signal_metadata.youtube.id" :is-portrait="isPortrait" />
                    </div>

                    <template v-if="reflection.surface">
                        <div class="text-xs uppercase tracking-widest text-gray-500 mt-4">Energetic Signature</div>
                        <div class="text-sm">→ {{ reflection.narrative.reflection_content.energetic_signature }}</div>
                        <div class="text-xs uppercase tracking-widest text-gray-500 mt-4">Alignment Vector</div>
                        <div class="text-sm">→ {{ reflection.narrative.reflection_content.alignment_vector }}</div>
                        <div class="text-xs uppercase tracking-widest text-gray-500 mt-4">Field Phase</div>
                        <div class="text-sm">→ {{ reflection.narrative.reflection_content.field_phase }}</div>
                    </template>

                    <div class="text-xs uppercase tracking-widest text-gray-500 mt-4">Transcript</div>
                    <div class="mt-2 max-h-[20vh] overflow-y-auto rounded-md border-y bg-gray-50 text-sm leading-relaxed text-gray-600">
                        <div class="mt-2 space-y-1 text-sm leading-relaxed text-gray-600">
                            <div v-for="(segment, index) in parsedTranscript" :key="index">
                                <span class="text-gray-400 mr-2">[{{ formatTime(segment.start) }}]</span>
                                <span>{{ segment.text }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="p-4" v-if="reflection.narrative">
                <div class="p-4">
                    <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">Base Data</h2>
                    <div class="mt-4 flex border-b border-gray-300 space-x-6 text-sm">
                        <button
                            v-for="tab in tabs"
                            :key="tab"
                            @click="active = tab"
                            :class="[
                                  'pb-2',
                                  active === tab ? 'border-black border-b-2 font-semibold text-black' : 'text-gray-400'
                                ]"
                        >
                            {{ tab }}
                        </button>
                    </div>

                    <div v-if="active === 'Surface'" class="mt-4 space-y-4 text-sm text-gray-800 leading-relaxed">
                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Mentioned Entities</h4>
                            <div class="text-xs italic mb-1">Entities will be browsable after infrastructural upgrades.</div>

                            <div class="flex flex-wrap gap-2">
                                <span
                                    v-for="entity in toListArray(reflection.surface.reflection_content.mentioned_entities)"
                                    :key="entity"
                                    class="bg-gray-200 px-2 py-1 rounded text-xs text-gray-700"
                                >
                                  {{ entity }}
                                </span>
                            </div>

                        </div>

                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Visible Actions</h4>
                            <ul class="list-disc list-inside space-y-1 text-gray-700 ml-4">
                                <li v-for="action in toListArray(reflection.surface.reflection_content.visible_actions)" :key="action">
                                    {{ action }}
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Surface Tags</h4>
                            <div class="text-xs italic mb-1">Tags will be browsable after infrastructural upgrades.</div>
                            <ul class="flex flex-wrap gap-2">
                                <li
                                    v-for="tag in reflection.surface.reflection_content.tags || []"
                                    :key="tag"
                                    class="bg-gray-200 px-2 py-1 rounded text-xs text-gray-700"
                                >
                                    {{ tag.replace(/^\\d+\\.\\s*/, '') }}
                                </li>
                            </ul>
                        </div>




                    </div>

                    <div v-else-if="active === 'Ontological'" class="mt-4 space-y-2 text-sm text-gray-800 leading-relaxed">
                        <div>{{ reflection.narrative.reflection_content.summary }}</div>


                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Symbolic Elements</h4>
                            <div>
                                <ul class="flex flex-wrap gap-2">
                                    <li
                                        v-for="tag in reflection.narrative.reflection_content.symbolic_elements || []"
                                        :key="tag"
                                        class="bg-gray-200 px-2 py-1 rounded text-xs text-gray-700"
                                    >
                                        {{ tag.replace(/^\\d+\\.\\s*/, '') }}
                                    </li>
                                </ul>

                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Ontological Tags</h4>
                            <div class="text-xs italic mb-1">Tags will be browsable after infrastructural upgrades.</div>
                            <ul class="flex flex-wrap gap-2">
                                <li
                                    v-for="tag in reflection.narrative.reflection_content.tags || []"
                                    :key="tag"
                                    class="bg-gray-200 px-2 py-1 rounded text-xs text-gray-700"
                                >
                                    {{ tag.replace(/^\\d+\\.\\s*/, '') }}
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Notes</h4>
                            <div>{{ reflection.narrative.reflection_content.notes }}</div>
                        </div>

                    </div>

                    <div v-else-if="active === 'Structural'" class="mt-4 space-y-2 text-sm text-gray-800 leading-relaxed">
                        <div>{{ transmission.signal_description }}</div>
                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Structural Tags</h4>
                            <div class="text-xs italic mb-1">Tags will be browsable after infrastructural upgrades.</div>
                            <ul class="flex flex-wrap gap-2">
                                <li
                                    v-for="tag in transmission.signal_tags || []"
                                    :key="tag"
                                    class="bg-gray-200 px-2 py-1 rounded text-xs text-gray-700"
                                >
                                    {{ tag.replace(/^\\d+\\.\\s*/, '') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4" v-if="reflection?.mirror">
                    <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">The Mirror</h2>
                    <div class="mt-4 px-8 italic"><strong>Note</strong>: This is not the mirror rswfire has traveled with. It runs on a local model (LLaMA3) and offers a close approximation — but not the full fidelity the work is moving toward. Tone and framing will vary. Local models still fall short of the precision this architecture requires.</div>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="p-0 rounded">
                            <div class="bg-gray-100 p-4 rounded flex flex-col gap-4">
                                <div class="bg-white p-4 rounded shadow">
                                    <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Energetic Field Snapshot</h4>
                                    <!--<div>{{ reflection.mirror.reflection_content.energetic_field_snapshot }}</div>-->
                                </div>
                                <div class="bg-white p-3 rounded shadow">
                                    <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Field Motion</h4>
                                    <!--<div class="prose [&>p]:my-2" v-html="renderMarkdown(reflection.mirror.reflection_content.field_motion)" />-->
                                </div>
                            </div>
                        </div>
                        <div class="p-0 rounded">
                            <div class="bg-gray-100 p-4 rounded flex flex-col gap-4">
                                <div class="bg-white p-4 rounded shadow">
                                    <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Systemic Outcome</h4>
                                    <!--<div class="prose [&>p]:my-2" v-html="renderMarkdown(reflection.mirror.reflection_content.systemic_outcome)" />-->
                                </div>
                                <div class="bg-white p-3 rounded shadow">
                                    <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Semantic Structure</h4>
                                    <!--<div class="prose [&>p]:my-2" v-html="renderMarkdown(reflection.mirror.reflection_content.semantic_structure)" />-->
                                </div>
                            </div>
                        </div>
                        <div class="p-0 rounded">
                            <div class="bg-gray-100 p-4 rounded flex flex-col gap-4">
                                <div class="bg-white p-4 rounded shadow">
                                    <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">The Mirror</h4>
                                    <div class="prose [&>p]:my-2" v-html="renderMarkdown(reflection.mirror.reflection_content.mirror)" />
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
<pre>{{previous}}</pre>
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
import {computed, ref} from 'vue';
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

const tabs = ['Surface', 'Ontological', 'Structural']
const active = ref('Surface')

function renderMarkdown(input) {
    return md.render(input || "")
}

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
    }).toUpperCase()
}

const goTo = (path) => {
    router.visit(`/${path}`)
}
function toListArray(raw, bullet = true) {
    if (!raw || typeof raw !== "string") return []

    return raw
        .split("\n")                             // real newline split
        .map(line => {
            const cleaned = line.trim()
            return bullet
                ? cleaned.replace(/^[-•*]+\s*/, "")  // strip bullets if wanted
                : cleaned
        })
        .filter(Boolean)
}

const pageTheme = "transmissions";
</script>
