<template>
    <div class="space-y-6 max-w-6xl mx-auto">

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
                                    <div class="text-xs font-mono tracking-tight text-gray-500 mb-1">
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

            <!-- Transformation Pattern -->
            <section v-if="surface?.transformation_pattern" class="space-y-4">
                <div class="my-6 text-center">
                    <h3 class="text-xs uppercase tracking-widest text-gray-500">Synthesis Pattern</h3>
                    <div class="text-sm text-gray-800 font-medium uppercase truncate">
                        {{ surface.transformation_pattern }}
                    </div>
                </div>
            </section>

        </div>

        <!-- Threshold Moments Filmstrip -->
        <section v-if="surface?.threshold_moments?.length" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Threshold Moments</h3>
            <p class="text-sm text-gray-600">Key phase shifts and crossings within this arc</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
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

const props = defineProps({
    cluster: Object,
    surface: Object,
    structure: Object,
    patterns: Object,
    signals: Array,
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

</script>

<style scoped>
.prose :deep(p) {
    margin-bottom: 1rem;
}

.prose :deep(p + p) {
    margin-top: 1rem;
}
</style>
