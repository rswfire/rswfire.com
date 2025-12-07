<template>
    <div class="space-y-6 max-w-6xl mx-auto">

        <div class="text-base text-gray-800 font-medium uppercase text-center tracking-tighter font-mono">
            {{ surface.transformation_pattern }}
        </div>

        <div class="mt-2 border border-gray-200 shadow-sm rounded-md overflow-hidden bg-gray-100">

            <!-- Structure: Energetic Arc -->
            <section v-if="structure?.energetic_arc" class="space-y-4">
                <div class="grid grid-cols-4 text-center divide-x divide-gray-200 border-b py-4 bg-white">
                    <div class="px-4 my-auto">
                        <h4 class="text-sm uppercase tracking-widest text-gray-500 font-bold">Energetic Arc</h4>
                    </div>
                    <div class="px-4">
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-1">Beginning</h4>
                        <div class="text-xs text-gray-800 font-medium uppercase truncate">
                            {{ structure?.energetic_arc.beginning || 'N/A' }}
                        </div>
                    </div>
                    <div class="px-4">
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-1">Middle</h4>
                        <div class="text-xs text-gray-800 font-medium uppercase truncate">
                            {{ structure?.energetic_arc.middle || 'N/A' }}
                        </div>
                    </div>
                    <div class="px-4">
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-1">End</h4>
                        <div class="text-xs text-gray-800 font-medium uppercase truncate">
                            {{ structure?.energetic_arc.end || 'N/A' }}
                        </div>
                    </div>
                </div>
            </section>

            <div class="max-w-6xl mx-auto bg-gray-50">
                <div class="grid grid-cols-1 md:grid-cols-3 divide-x divide-gray-200">
                    <div class="md:col-span-2 space-y-4">
                        <!-- left -->
                        <!-- Surface: Summary -->
                        <section v-if="surface?.arc_summary" class="p-4 md:px-8 space-y-4">
                            <div
                                class="prose prose-sm max-w-none text-gray-700 leading-relaxed"
                                v-html="formatMarkdown(surface.arc_summary)"
                            />
                        </section>
                    </div>
                    <div class="md:col-span-1 space-y-4">
                        <!-- right -->
                        <!-- Surface: Temporal Markers -->
                        <section
                            v-if="surface?.temporal_markers?.length"
                            class="p-4 md:px-8 space-y-3"
                        >
                            <div
                                v-for="marker in surface.temporal_markers"
                                :key="marker.date"
                                class="flex items-start gap-3 border-b last:border-0 border-gray-100 py-2"
                            >
                                <div class="flex-shrink-0 text-gray-400 mt-[2px]">
                                    <Icon name="CalendarFold" color="text-synthesis-300" class="flex-shrink-0" />
                                </div>

                                <div class="flex-1">
                                    <div class="text-base font-mono tracking-tight text-gray-500 mb-1">
                                        {{ formatMarkerDate(marker.date) }}
                                    </div>
                                    <div class="text-sm text-gray-800">
                                        {{ marker.marker }}
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <!-- Surface: Geographic Progression -->
            <section v-if="surface?.geographic_progression" class="space-y-4">
                <div class="my-6 text-center">
                    <h3 class="text-xs uppercase tracking-widest text-gray-500">Geographic Progression</h3>
                    <div class="text-sm text-gray-800 font-medium uppercase">{{ surface.geographic_progression }}</div>
                </div>
            </section>

        </div>

        <HrBar/>

        <!-- Surface: Threshold Moments -->
        <section v-if="surface?.threshold_moments?.length" class="space-y-4">
            <h2 class="uppercase text-xl font-bold tracking-widest m-0 p-0 text-center">Threshold Moments</h2>

            <div class="grid grid-cols-1 md:grid-cols-5 lg:grid-cols-5 gap-4">
                <div
                    v-for="moment in surface.threshold_moments"
                    :key="moment.signal_ulid"
                    @click="goToSignal(moment.signal_ulid)"
                    class="group cursor-pointer rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-200 border border-gray-200 hover:border-pink-400 bg-white"
                >
                    <div
                        v-if="getSignal(moment.signal_ulid)"
                        class="aspect-w-16 aspect-h-9 bg-gray-100"
                    >
                        <img
                            :src="getSignal(moment.signal_ulid)?.signal_metadata?.youtube?.thumbnail"
                            :alt="moment.signal_ulid"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200"
                        />
                    </div>

                    <div class="p-3 space-y-2">
                        <p class="text-xs font-mono text-gray-400">{{ moment.signal_ulid }}</p>
                        <h4 class="text-sm font-semibold text-gray-900 group-hover:text-pink-600 line-clamp-2">
                            {{ getSignal(moment.signal_ulid)?.signal_title || 'Untitled' }}
                        </h4>
                        <p class="text-xs text-gray-600 line-clamp-2">
                            {{ moment.reason }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div class="max-w-6xl mx-auto">
            <!-- Mobile: Dropdown -->
            <div class="md:hidden mb-6">
                <select
                    v-model="activeFilmstrip"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 text-base font-medium focus:border-synthesis-500 focus:ring-2 focus:ring-synthesis-200 bg-white"
                >
                    <template v-for="category in filmstripCategories" :key="category.key">
                        <option
                            v-if="patterns?.[category.key]?.length"
                            :value="category.key"
                        >
                            {{ category.label }} ({{ patterns[category.key].length }} signals)
                        </option>
                    </template>
                </select>
            </div>

            <!-- Desktop: Vertical tabs + Grid -->
            <div class="hidden md:flex gap-6">
                <div class="w-48 flex-shrink-0 space-y-1">
                    <template v-for="category in filmstripCategories" :key="category.key">
                        <button
                            v-if="patterns?.[category.key]?.length"
                            @click="activeFilmstrip = category.key"
                            class="w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-all"
                            :class="activeFilmstrip === category.key
                            ? getCategoryActiveClass(category.color)
                            : 'text-gray-600 hover:bg-gray-50'"
                        >
                            <div class="font-semibold">{{ category.label }}</div>
                            <div class="text-xs opacity-75 mt-0.5">{{ patterns[category.key].length }} signals</div>
                        </button>
                    </template>
                </div>

                <div class="flex-1 min-w-0 border-t">
                    <template v-for="category in filmstripCategories" :key="'grid-' + category.key">
                        <div v-if="activeFilmstrip === category.key && patterns?.[category.key]?.length">
                            <div class="my-4">
                                <h2 class="uppercase text-xl font-bold tracking-widest m-0 p-0 text-center">{{ category.label }}</h2>
                                <div class="text-base text-center text-gray-600 mt-1">{{ category.description }}</div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <SignalCard
                                    v-for="moment in patterns[category.key]"
                                    :key="moment.signal_ulid"
                                    :signal="getSignal(moment.signal_ulid)"
                                    :ulid="moment.signal_ulid"
                                    :description="moment[category.descKey]"
                                    :color="category.color"
                                />
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Mobile: Grid -->
            <div class="md:hidden">
                <template v-for="category in filmstripCategories" :key="'mobile-' + category.key">
                    <div v-if="activeFilmstrip === category.key && patterns?.[category.key]?.length">
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">{{ category.description }}</p>
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            <SignalCard
                                v-for="moment in patterns[category.key]"
                                :key="moment.signal_ulid"
                                :signal="getSignal(moment.signal_ulid)"
                                :ulid="moment.signal_ulid"
                                :description="moment[category.descKey]"
                                :color="category.color"
                            />
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <HrBar/>

        <h2 class="uppercase text-xl font-bold tracking-widest m-0 p-0 text-center">Key Elements</h2>

        <!-- Elements Tabs -->
        <div class="">
            <div class="flex border-b border-stone-300 text-sm pl-4">
                <button
                    v-for="tab in tabsElements"
                    :key="tab.key"
                    @click="tabsElementsActive = tab.key"
                    :class="[
                            'relative -mb-px px-4 py-2 rounded-t-md transition-colors',
                            tabsElementsActive === tab.key
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
        </div>

        <div class="mt-4 px-4">

            <!-- Elements Tabs: Entities -->
            <div v-if="tabsElementsActive === 'entities' && elements?.key_entities?.length">
                <div class="space-y-3">
                    <div v-for="(entity, index) in elements.key_entities" :key="index" class="text-sm">
                        <span class="font-semibold text-gray-900">{{ entity.entity }}</span>
                        <span class="text-xs px-1.5 py-0.5 ml-2 rounded bg-gray-100 text-gray-600 uppercase">{{ entity.type }}</span>
                        <p class="text-gray-700 mt-1">{{ entity.significance }}</p>
                    </div>
                </div>
            </div>

            <!-- Elements Tabs: Symbols -->
            <div v-if="tabsElementsActive === 'symbols' && elements?.symbolic_evolution?.length">
                <div class="space-y-2">
                    <div v-for="(symbol, index) in elements.symbolic_evolution" :key="index" class="text-sm">
                        <span class="font-semibold text-gray-900">{{ symbol.symbol }}</span>
                        <p class="text-gray-700 font-mono text-xs mt-1">{{ symbol.evolution }}</p>
                    </div>
                </div>
            </div>

            <!-- Elements Tabs: States -->
            <div v-if="tabsElementsActive === 'states' && elements?.dominant_states?.length">
                <div class="space-y-3">
                    <div v-for="(state, index) in elements.dominant_states" :key="index" class="text-sm">
                        <span class="font-semibold text-gray-900">{{ state.state }}</span>
                        <span class="text-xs px-1.5 py-0.5 ml-2 rounded bg-gray-100 text-gray-600 uppercase">{{ state.type }}</span>
                        <p class="text-gray-700 mt-1">{{ state.why_defining }}</p>
                    </div>
                </div>
            </div>

            <!-- Elements Tabs: Themes -->
            <div v-if="tabsElementsActive === 'themes' && elements?.recurring_themes?.length">
                <ul class="space-y-1">
                    <li v-for="(theme, index) in elements.recurring_themes" :key="index" class="text-sm text-gray-800">
                        {{ theme }}
                    </li>
                </ul>
            </div>

            <!-- Elements Tabs: Capacity -->
            <div v-if="tabsElementsActive === 'capacity' && elements?.capacity_shifts?.length">
                <div class="space-y-3">
                    <div v-for="(shift, index) in elements.capacity_shifts" :key="index" class="text-sm">
                        <span class="font-semibold text-gray-900">{{ typeof shift === 'string' ? shift : shift.capacity }}</span>
                        <p v-if="typeof shift === 'object' && shift.description" class="text-gray-700 mt-1">{{ shift.description }}</p>
                    </div>
                </div>
            </div>

        </div>

        <HrBar/>

        <h2 class="uppercase text-xl font-bold tracking-widest m-0 p-0 text-center">Key Patterns</h2>

        <!-- Patterns Tabs -->
        <div class="">
            <div class="flex border-b border-stone-300 text-sm pl-4">
                <button
                    v-for="tab in tabsPatterns"
                    :key="tab.key"
                    @click="tabsPatternsActive = tab.key"
                    :class="[
                            'relative -mb-px px-4 py-2 rounded-t-md transition-colors',
                            tabsPatternsActive === tab.key
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
        </div>

        <!-- Tab Content -->
        <div class="mt-4 px-4">

            <!-- Patterns Tabs: Catalyst -->
            <div v-if="tabsPatternsActive === 'catalyst' && patterns?.catalytic_sequence">
                <ol class="space-y-2">
                    <li
                        v-for="(catalyst, index) in patterns.catalytic_sequence"
                        :key="index"
                        class="flex items-start gap-3 text-sm"
                    >
            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-synthesis-500 text-white flex items-center justify-center text-xs font-bold">
                {{ index + 1 }}
            </span>
                        <span class="text-gray-800 pt-0.5">{{ catalyst }}</span>
                    </li>
                </ol>
            </div>

            <!-- Patterns Tabs: Integration -->
            <div v-if="tabsPatternsActive === 'integration' && patterns?.integration_markers">
                <div
                    class="prose prose-sm max-w-none text-gray-800"
                    v-html="formatBoldLabelList(patterns.integration_markers)"
                />
            </div>

            <!-- Patterns Tabs: Emerging -->
            <div v-if="tabsPatternsActive === 'emerging' && patterns?.emerging_meta_patterns">
                <div
                    class="prose prose-sm max-w-none text-gray-800"
                    v-html="formatBoldLabelList(patterns.emerging_meta_patterns)"
                />
            </div>

            <!-- Patterns Tabs: Unresolved -->
            <div v-if="tabsPatternsActive === 'unresolved' && patterns?.unresolved_threads">
                <ul class="prose prose-sm space-y-2">
                    <li
                        v-for="thread in patterns.unresolved_threads"
                        :key="thread"
                        class="flex items-start gap-2 text-sm"
                    >
                        <span class="text-synthesis-500 mt-0.5">○</span>
                        <span class="text-gray-800">{{ thread }}</span>
                    </li>
                </ul>
            </div>

            <!-- Patterns Tabs: Resonance -->
            <div v-if="tabsPatternsActive === 'resonance' && patterns?.cluster_resonance">
                <div
                    class="prose prose-sm max-w-none text-gray-800"
                    v-html="formatMarkdown(patterns.cluster_resonance)"
                />
            </div>

        </div>












        <!-- Structure: Ontological Progression -->
        <section v-if="structure?.ontological_progression" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Ontological Progression</h3>
            <div
                class="prose prose-sm max-w-none text-gray-700 leading-relaxed bg-indigo-50 p-6 rounded-lg border border-indigo-100"
                v-html="formatMarkdown(structure.ontological_progression)"
            />
        </section>

        <!-- Structure: Field Impact -->
        <section v-if="structure?.field_impact" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Field Impact</h3>
            <div
                class="prose prose-sm max-w-none text-gray-700 leading-relaxed"
                v-html="formatMarkdown(structure.field_impact)"
            />
        </section>

    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import markdownit from "markdown-it";
import Icon from "@/Components/System/Icon.vue";
import {computed, onMounted, ref} from "vue";
import HrBar from "@/Pages/Synthesis/HrBar.vue";
import SignalCard from "@/Pages/Synthesis/SignalCard.vue";

const props = defineProps({
    cluster: Object,
    elements: Object,
    patterns: Object,
    signals: Array,
    structure: Object,
    surface: Object,
    pageTheme: String
})

const goToSignal = (ulid) => {
    router.visit(`/transmission/${ulid}`)
}

const getSignal = (ulid) => {
    return props.signals?.find(s => s.signal_ulid === ulid)
}

const md = markdownit({
    html: true,
    breaks: true,
    linkify: true
})

const formatMarkdown = (text) => {
    if (!text) return ''
    return md.render(text)
}

function formatMarkerDate(dateStr) {
    if (!dateStr) return "—"

    const iso = String(dateStr).trim()

    const match = iso.match(/^(\d{4})[-/](\d{2})[-/](\d{2})/)
    if (match) {
        const [, yyyy, mm, dd] = match
        return `${mm}/${dd}/${yyyy}`
    }

    try {
        const d = new Date(iso)
        if (isNaN(d)) return iso
        const mm = String(d.getUTCMonth() + 1).padStart(2, "0")
        const dd = String(d.getUTCDate()).padStart(2, "0")
        const yyyy = d.getUTCFullYear()
        return `${mm}/${dd}/${yyyy}`
    } catch {
        return iso
    }
}

const getEntityTypeColor = (type) => {
    const colors = {
        'person': 'bg-blue-100 text-blue-700',
        'place': 'bg-green-100 text-green-700',
        'thing': 'bg-gray-100 text-gray-700',
        'system': 'bg-purple-100 text-purple-700',
        'animal': 'bg-pink-100 text-pink-700'
    }
    return colors[type] || 'bg-gray-100 text-gray-700'
}

const tabsElements = computed(() => {
    const tabs = [
        { key: "entities", label: "Entities", locked: false },
        { key: "symbols", label: "Symbols", locked: false },
        { key: "states", label: "States", locked: false },
        { key: "themes", label: "Themes", locked: false }
    ];

    if (props.elements?.capacity_shifts?.length > 0) {
        tabs.push({ key: "capacity", label: "Capacity", locked: false });
    }

    return tabs;
});

const tabsElementsActive = ref("entities");

const tabsPatterns = [
    { key: "catalyst", label: "Catalyst", locked: false },
    { key: "integration", label: "Integration", locked: false },
    { key: "emerging", label: "Emerging", locked: false },
    { key: "unresolved", label: "Unresolved", locked: false },
    { key: "resonance", label: "Resonance", locked: false }
];

const tabsPatternsActive = ref("catalyst");

const formatBoldLabelList = (text) => {
    const items = text.split(/\*\*([^*]+)\*\*\s*[:-]/).filter(Boolean)
    const pairs = []
    for (let i = 0; i < items.length; i += 2) {
        if (items[i] && items[i + 1]) {
            pairs.push({
                label: items[i].trim(),
                description: items[i + 1].trim()
            })
        }
    }
    if (pairs.length < 2) {
        return marked(text, { breaks: true, gfm: true })
    }
    const listItems = pairs.map(pair =>
        `<li><strong>${pair.label}</strong>:<br/>${pair.description}</li>`
    ).join('')
    return `<ul class="space-y-3">${listItems}</ul>`
}

const filmstripCategories = [
    {
        key: 'teaching_moments',
        label: 'Teaching',
        description: 'Signals where frameworks and concepts are explicitly demonstrated',
        descKey: 'lesson',
        color: 'purple'
    },
    {
        key: 'quirky_moments',
        label: 'Quirky',
        description: 'Memorable textures that make the arc human',
        descKey: 'note',
        color: 'pink'
    },
    {
        key: 'technical_milestones',
        label: 'Technical',
        description: 'Infrastructure and skill development moments',
        descKey: 'milestone',
        color: 'blue'
    },
    {
        key: 'relational_threads',
        label: 'Relational',
        description: 'Parallel arcs in relationships and connections',
        descKey: 'thread',
        color: 'rose'
    },
    {
        key: 'place_markers',
        label: 'Places',
        description: 'Geographic moments of significance',
        descKey: 'location',
        color: 'emerald'
    }
]

const activeFilmstrip = ref('teaching_moments')

onMounted(() => {
    for (const category of filmstripCategories) {
        if (props.patterns?.[category.key]?.length) {
            activeFilmstrip.value = category.key
            break
        }
    }
})

const getCategoryActiveClass = (color) => {
    const classes = {
        purple: 'bg-purple-100 text-purple-900 border-l-4 border-purple-500',
        pink: 'bg-pink-100 text-pink-900 border-l-4 border-pink-500',
        blue: 'bg-blue-100 text-blue-900 border-l-4 border-blue-500',
        rose: 'bg-rose-100 text-rose-900 border-l-4 border-rose-500',
        emerald: 'bg-emerald-100 text-emerald-900 border-l-4 border-emerald-500'
    }
    return classes[color] || 'bg-gray-100 text-gray-900 border-l-4 border-gray-500'
}

</script>

<style scoped>
.prose :deep(p) {
    margin-bottom: 1rem;
}

.prose :deep(p + p) {
    margin-top: 1rem;
}
</style>
