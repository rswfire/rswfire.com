<template>
    <div>
        <div v-if="!isPublicTransmission && !auth.user.value" class="max-w mx-auto text-center">
            <h3 class="text-lg font-semibold mb-3">This transmission is held within Sanctum.</h3>
            <SanctumAuth />
        </div>

        <!-- 🌐 Page visible -->
        <div v-else>
            <!-- Video & Transcript Section -->
            <div class="mt-2 border border-gray-200 shadow-sm rounded-md overflow-hidden bg-gray-100">
                <!-- Top stats bar -->
                <div class="grid grid-cols-3 text-center divide-x divide-gray-200 border-b py-4 bg-white">
                    <div class="px-4">
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-1">Energetic Quality</h4>
                        <div class="text-xs text-gray-800 font-medium uppercase truncate">
                            {{ reflection?.structure?.reflection_content?.energetic_quality || 'N/A' }}
                        </div>
                    </div>
                    <div class="px-4">
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-1">Journey Phase</h4>
                        <div class="text-xs text-gray-800 font-medium uppercase truncate">
                            {{ reflection?.structure?.reflection_content?.journey_phase || 'N/A' }}
                        </div>
                    </div>
                    <div class="px-4">
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-1">Directional Vector</h4>
                        <div class="text-xs text-gray-800 font-medium uppercase truncate">
                            {{ reflection?.structure?.reflection_content?.directional_vector || 'N/A' }}
                        </div>
                    </div>
                </div>

                <!-- Video + Transcript -->
                <div class="p-4">
                    <div class="flex flex-col lg:flex-row gap-4 items-stretch">
                        <!-- LEFT: Video + thumbnails -->
                        <div class="flex flex-col w-full lg:w-2/3" ref="videoColumn">
                            <div class="rounded-md overflow-hidden bg-white border">
                                <div :class="playerClass">
                                    <YoutubePlayer
                                        :video-id="transmission.signal_metadata.youtube.id"
                                        :is-portrait="effectiveIsPortrait"
                                    />
                                </div>
                            </div>

                            <!-- Prev/Next thumbnails -->
                            <div class="mt-3 flex justify-between w-full">
                                <div v-if="previous" class="w-40">
                                    <Link :href="`/transmission/${previous.signal_ulid}`" class="block group w-full">
                                        <div class="rounded-md overflow-hidden shadow-sm bg-white hover:shadow-md transition">
                                            <img :src="previous.signal_metadata?.youtube?.thumbnail" alt="Previous" class="w-full aspect-video object-cover" loading="lazy" />
                                            <div class="px-2 py-1 text-xs text-gray-600 group-hover:text-black">← Previous</div>
                                        </div>
                                    </Link>
                                </div>
                                <div class="flex-1"></div>
                                <div v-if="next" class="w-40 text-right">
                                    <Link :href="`/transmission/${next.signal_ulid}`" class="block group w-full">
                                        <div class="rounded-md overflow-hidden shadow-sm bg-white hover:shadow-md transition">
                                            <img :src="next.signal_metadata?.youtube?.thumbnail" alt="Next" class="w-full aspect-video object-cover" loading="lazy" />
                                            <div class="px-2 py-1 text-xs text-right text-gray-600 group-hover:text-black">Next →</div>
                                        </div>
                                    </Link>
                                </div>
                            </div>
                        </div>

                        <div class="hidden lg:block border-l border-gray-200/70"></div>

                        <!-- RIGHT: Transcript -->
                        <div v-if="mergedTranscript.length" class="w-full lg:w-1/3 rounded-md border bg-gray-50 p-3 overflow-y-auto flex-1" :style="{ maxHeight: videoColumnHeight + 'px' }">
                            <h3 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Transcript</h3>
                            <div class="space-y-1 text-sm leading-relaxed text-gray-700">
                                <template v-for="(item, index) in mergedTranscript" :key="index">
                                    <div v-if="item.type === 'topic'" class="pt-2 text-gray-700 font-semibold text-xs uppercase">
                                        {{ item.text }}
                                    </div>
                                    <div v-else class="flex items-baseline">
                                        <span class="text-gray-400 mr-2 shrink-0">[{{ formatTime(item.time) }}]</span>
                                        <span class="truncate">{{ item.text }}</span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="px-4 bg-white border-t border-gray-200">
                    <TimelineFilmstrip :items="timelineItems" :active-ulid="transmission.signal_ulid" :mobile-scrollable="true" />
                </div>
            </div>

            <!-- Reflection Tabs -->
            <div class="pt-8">
                <div class="flex border-b border-stone-300 text-sm pl-4">
                    <button
                        v-for="tab in reflectionTabs"
                        :key="tab.key"
                        @click="activeTab = tab.key"
                        :class="[
                            'relative -mb-px px-4 py-2 rounded-t-md transition-colors',
                            activeTab === tab.key
                                ? 'bg-stone-100 text-stone-800 border border-b border-stone-300 font-medium'
                                : 'text-stone-500 hover:text-stone-700'
                        ]"
                    >
                        <div class="flex items-center gap-2">
                            <span v-if="tab.locked" class="text-xs opacity-70">
                                <Icon name="Sprout" color="text-indigo-600" class="w-4 h-4" />
                            </span>
                            {{ tab.label }}
                        </div>
                    </button>
                </div>

                <!-- Tab Content -->
                <div class="mt-4 px-4">
                    <!-- 🔒 Patterns tab requires Sanctum access -->
                    <div v-if="activeTab === 'patterns' && !canAccessPatterns" class="max-w mx-auto text-center">
                        <h3 class="text-lg font-semibold mb-3">This reflection is held within Sanctum.</h3>
                        <SanctumAuth />
                    </div>

                    <!-- Surface Tab -->
                    <div v-else-if="activeTab === 'surface' && reflection?.surface" class="md:flex md:gap-6">
                        <div class="md:w-7/12 space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    {{ reflection.surface.reflection_content.title }}
                                </h3>
                            </div>
                            <div>
                                <h3 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Timestamp Context</h3>
                                <div class="text-sm text-gray-700">{{ reflection.surface.reflection_content.timestamp_context }}</div>
                            </div>
                            <div>
                                <h3 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Summary</h3>
                                <div class="prose prose-sm max-w-none text-gray-800" v-html="renderMarkdown(reflection.surface.reflection_content.summary)" />
                            </div>
                        </div>

                        <div class="hidden md:flex border-l border-gray-200"></div>

                        <div class="md:w-5/12 mt-6 md:mt-0 divide-y divide-gray-200">
                            <!-- Visible Actions -->
                            <div v-if="reflection.surface.reflection_content.visible_actions?.length" class="pb-4">
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide ml-4">Visible Actions</h4>
                                <p class="text-xs text-stone-500 mt-2 mb-4 ml-4">Recorded system or user-initiated action visible in this reflection.</p>
                                <div class="space-y-2">
                                    <div v-for="action in reflection.surface.reflection_content.visible_actions" :key="action"
                                         class="flex items-center gap-2 px-3 py-2 rounded-r-md border border-l-4 border-stone-200 bg-white hover:bg-stone-100/80 transition-all">
                                        <Icon name="Workflow" class="w-4 h-4 text-stone-400" />
                                        <span class="text-xs font-normal text-stone-700 uppercase">{{ action }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Mentioned Entities -->
                            <div v-if="reflection.surface.reflection_content.mentioned_entities?.length" class="py-4">
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide ml-4">Mentioned Entities</h4>
                                <p class="text-xs text-stone-500 mt-2 mb-4 ml-4">Referenced person, platform, or conceptual entity.</p>
                                <div class="space-y-2">
                                    <div v-for="entity in reflection.surface.reflection_content.mentioned_entities" :key="entity"
                                         class="flex items-center gap-2 px-3 py-2 rounded-r-md border border-l-4 border-stone-200 bg-white hover:bg-stone-100/80 transition-all">
                                        <Icon name="Milestone" class="w-4 h-4 text-stone-400" />
                                        <span class="text-xs font-normal text-stone-700 uppercase">{{ entity }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Tags -->
                            <div v-if="reflection.surface.reflection_content.tags?.length" class="py-4">
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide ml-4">Tags</h4>
                                <p class="text-xs text-stone-500 mt-2 mb-4 ml-4">Thematic or contextual descriptor for this transmission.</p>
                                <div class="space-y-2">
                                    <div v-for="tag in reflection.surface.reflection_content.tags" :key="tag"
                                         class="flex items-center gap-2 px-3 py-2 rounded-r-md border border-l-4 border-stone-200 bg-white hover:bg-stone-100/80 transition-all">
                                        <Icon name="Bookmark" class="w-4 h-4 text-stone-400" />
                                        <span class="text-xs font-normal text-stone-700 uppercase">{{ tag }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Structure Tab -->
                    <div v-else-if="activeTab === 'structure' && reflection?.structure" class="md:flex md:gap-6">
                        <div class="md:w-7/12 space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    {{ reflection.structure.reflection_content.title }}
                                </h3>
                            </div>
                            <div>
                                <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Structural Substrate</h4>
                                <div class="text-sm text-gray-800 leading-relaxed">
                                    {{ reflection.structure.reflection_content.structural_substrate }}
                                </div>
                            </div>
                        </div>

                        <div class="hidden md:flex border-l border-gray-200"></div>

                        <div class="md:w-5/12 divide-y divide-gray-200">
                            <!-- Symbolic Elements -->
                            <div v-if="reflection.structure.reflection_content.symbolic_elements?.length" class="pb-4">
                                <h4 class="text-xs font-semibold text-purple-700 uppercase tracking-wide ml-4">Symbolic Elements</h4>
                                <p class="text-xs text-purple-500 mt-2 mb-4 ml-4">Represented archetypes or recurring motifs.</p>
                                <div class="space-y-2">
                                    <div v-for="element in reflection.structure.reflection_content.symbolic_elements" :key="element"
                                         class="flex items-center gap-2 px-3 py-2 rounded-r-md border border-l-4 border-purple-200 bg-purple-50/50 hover:bg-purple-100/70 transition-all">
                                        <Icon name="Shapes" class="w-4 h-4 text-purple-400" />
                                        <span class="text-xs font-normal text-purple-700 uppercase">{{ element }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Ontological States -->
                            <div v-if="reflection.structure.reflection_content.ontological_states?.length" class="py-4">
                                <h4 class="text-xs font-semibold text-indigo-700 uppercase tracking-wide ml-4">Ontological States</h4>
                                <p class="text-xs text-indigo-500 mt-2 mb-4 ml-4">Expressed modes of being or awareness present in this reflection.</p>
                                <div class="space-y-2">
                                    <div v-for="state in reflection.structure.reflection_content.ontological_states" :key="state"
                                         class="flex items-center gap-2 px-3 py-2 rounded-r-md border border-l-4 border-indigo-200 bg-indigo-50/50 hover:bg-indigo-100/70 transition-all">
                                        <Icon name="SearchCode" class="w-4 h-4 text-indigo-400" />
                                        <span class="text-xs font-normal text-indigo-700 uppercase">{{ state }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Engaged Subsystems -->
                            <div v-if="reflection.structure.reflection_content.engaged_subsystems?.length" class="py-4">
                                <h4 class="text-xs font-semibold text-green-700 uppercase tracking-wide ml-4">Engaged Subsystems</h4>
                                <p class="text-xs text-green-500 mt-2 mb-4 ml-4">Architecture dynamically engaged in this reflection.</p>
                                <div class="space-y-2">
                                    <div v-for="subsystem in reflection.structure.reflection_content.engaged_subsystems" :key="subsystem"
                                         class="flex items-center gap-2 px-3 py-2 rounded-r-md border border-l-4 border-green-200 bg-green-50/50 hover:bg-green-100/70 transition-all">
                                        <Icon name="CircuitBoard" class="w-4 h-4 text-green-400" />
                                        <span class="text-xs font-normal text-green-700 uppercase">{{ subsystem }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patterns Tab -->
                    <div v-else-if="activeTab === 'patterns' && canAccessPatterns && reflection?.patterns" class="md:flex md:gap-6">
                        <div class="md:w-7/12 space-y-6">
                            <div>
                                <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-3">Emerging Patterns</h4>
                                <ul class="space-y-2">
                                    <li v-for="(pattern, index) in reflection.patterns.reflection_content.emerging_patterns" :key="index"
                                        class="text-sm text-gray-800 leading-relaxed pl-4 border-l-2 border-gray-300">
                                        {{ pattern }}
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Somatic Signature</h4>
                                <div class="text-sm text-gray-800 leading-relaxed">{{ reflection.patterns.reflection_content.somatic_signature }}</div>
                            </div>
                            <div>
                                <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Field Resonance</h4>
                                <div class="text-sm text-gray-800 leading-relaxed">{{ reflection.patterns.reflection_content.field_resonance }}</div>
                            </div>
                            <div>
                                <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Transmission Function</h4>
                                <div class="text-sm text-gray-800 leading-relaxed">{{ reflection.patterns.reflection_content.transmission_function }}</div>
                            </div>
                            <div>
                                <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Catalytic Pathway</h4>
                                <div class="text-sm text-gray-800 leading-relaxed">{{ reflection.patterns.reflection_content.catalytic_pathway }}</div>
                            </div>
                        </div>

                        <div class="hidden md:flex border-l border-gray-200"></div>

                        <div class="md:w-5/12 divide-y divide-gray-200">
                            <div v-if="reflection.patterns.reflection_content.dominant_language?.length">
                                <h4 class="text-xs font-semibold text-amber-700 uppercase tracking-wide ml-4">Dominant Language</h4>
                                <p class="text-xs text-amber-500 mt-2 mb-4 ml-4">Core motifs or linguistic fields shaping this reflection.</p>
                                <div class="space-y-2">
                                    <div v-for="motif in reflection.patterns.reflection_content.dominant_language" :key="motif"
                                         class="flex items-center gap-2 px-3 py-2 rounded-r-md border border-l-4 border-amber-200 bg-amber-50/50 hover:bg-amber-100/70 transition-all">
                                        <Icon name="Pilcrow" class="w-4 h-4 text-amber-400" />
                                        <span class="text-xs font-normal text-amber-700 uppercase">{{ motif }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fallback -->
                    <div v-else class="text-gray-400 italic text-sm">
                        No reflection data available for this tab.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, onMounted, ref, nextTick, watchEffect } from 'vue'
import { Link } from '@inertiajs/vue3'
import MarkdownIt from 'markdown-it'
import YoutubePlayer from '@/Components/System/YoutubePlayer.vue'
import TimelineFilmstrip from '@/Components/System/TimelineFilmstrip.vue'
import Icon from '@/Components/System/Icon.vue'
import SanctumAuth from '@/Components/Auth/Sanctum.vue'
import { useAuth } from '@/Composables/useAuth'

const props = defineProps({
    transmission: Object,
    reflection: Object,
    formatTime: Function,
    timeline: Object,
    previous: Object,
    next: Object,
})

const auth = useAuth()

// Check if transmission is public
const isPublicTransmission = computed(() => {
    return !!props.transmission?.signal_metadata?.flags?.is_public
})

// Check if user can access patterns
const canAccessPatterns = computed(() => {
    const sanctum = auth.user.value?.user_sanctum ?? 'none'
    return sanctum !== 'none'
})

const reflectionTabs = [
    { key: 'surface', label: 'Surface', locked: false },
    { key: 'structure', label: 'Structure', locked: false },
    { key: 'patterns', label: 'Patterns', locked: true }
]

const activeTab = ref('surface')

// Markdown rendering
const md = new MarkdownIt({ html: true, breaks: true, linkify: true })

function stripUnsafe(html = '') {
    const container = document.createElement('div')
    container.innerHTML = html
    container.querySelectorAll('script, iframe, object, embed').forEach(el => el.remove())
    container.querySelectorAll('*').forEach(el => {
        Array.from(el.attributes).forEach(attr => {
            if (/^on/i.test(attr.name)) el.removeAttribute(attr.name)
        })
    })
    return container.innerHTML
}

function renderMarkdown(input) {
    return stripUnsafe(md.render(input || ''))
}

// Video layout
const effectiveIsPortrait = computed(() => {
    return !!props.transmission?.signal_metadata?.flags?.['is_portrait-view']
})

const playerClass = computed(() =>
    effectiveIsPortrait.value
        ? 'relative aspect-[9/16] w-full max-w-[380px] mx-auto'
        : 'relative aspect-video w-full max-w-[820px] mx-auto'
)

// Timeline
const timelineItems = computed(() => {
    const items = Array.isArray(props.timeline?.items) ? props.timeline.items : []
    return items.map(i => ({
        ulid: i.ulid,
        title: i.title || i.ulid,
        date: i.date,
        duration: i.duration ?? 0,
        thumbnail: i.thumbnail || props.transmission?.signal_metadata?.youtube?.thumbnail || ''
    }))
})

// Transcript parsing
const parsedTranscript = computed(() => {
    try {
        const payload = props.transmission?.signal_payload
        if (!payload || typeof payload !== 'object') return []
        const arr = payload['timed-transcript']
        return Array.isArray(arr) ? arr : []
    } catch {
        return []
    }
})

const mergedTranscript = computed(() => {
    const transcript = parsedTranscript.value
    const topics = props.reflection?.surface?.reflection_content?.topic_timestamps || []

    if (!transcript.length) return []

    const normalizedTranscript = transcript.map(seg => ({
        ...seg,
        time: Number(seg.start),
    }))

    const normalizedTopics = topics.map(t => {
        const match = t.timestamp.match(/(\d+):(\d+):(\d+)/) || t.timestamp.match(/(\d+):(\d+)/)
        if (!match) return null

        let totalSeconds = 0
        if (match.length === 4) {
            totalSeconds = parseInt(match[1]) * 3600 + parseInt(match[2]) * 60 + parseInt(match[3])
        } else if (match.length === 3) {
            totalSeconds = parseInt(match[1]) * 60 + parseInt(match[2])
        }
        return { time: totalSeconds, topic: t.topic }
    }).filter(Boolean)

    normalizedTopics.sort((a, b) => a.time - b.time)

    const result = []
    let currentTopicIndex = 0

    for (const seg of normalizedTranscript) {
        const segTime = seg.time

        while (
            currentTopicIndex < normalizedTopics.length &&
            segTime >= normalizedTopics[currentTopicIndex].time
            ) {
            result.push({
                type: 'topic',
                text: normalizedTopics[currentTopicIndex].topic,
                time: normalizedTopics[currentTopicIndex].time,
            })
            currentTopicIndex++
        }

        result.push({
            type: 'line',
            time: seg.time,
            text: seg.text,
        })
    }

    while (currentTopicIndex < normalizedTopics.length) {
        result.push({
            type: 'topic',
            text: normalizedTopics[currentTopicIndex].topic,
            time: normalizedTopics[currentTopicIndex].time,
        })
        currentTopicIndex++
    }

    return result
})

// Video column height for transcript scroll
const videoColumn = ref(null)
const videoColumnHeight = ref(0)

onMounted(async () => {
    await nextTick()
    const updateHeight = () => {
        if (videoColumn.value) {
            videoColumnHeight.value = videoColumn.value.offsetHeight
        }
    }
    updateHeight()
    window.addEventListener('resize', updateHeight)
})
</script>
