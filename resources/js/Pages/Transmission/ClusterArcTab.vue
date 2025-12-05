<template>
    <div class="space-y-12 max-w-5xl mx-auto px-6 pb-12">
        <!-- Arc Summary -->
        <section v-if="surface?.arc_summary" class="space-y-4">
            <h3 class="text-2xl font-bold text-gray-900">Arc Summary</h3>
            <div
                class="prose prose-sm max-w-none text-gray-700 leading-relaxed"
                v-html="formatMarkdown(surface.arc_summary)"
            />
        </section>

        <!-- Transformation Pattern -->
        <section v-if="surface?.transformation_pattern" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Transformation Pattern</h3>
            <div class="text-lg text-gray-700 font-mono bg-gray-50 p-4 rounded-lg border border-gray-200">
                {{ surface.transformation_pattern }}
            </div>
        </section>

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

        <!-- Structure: Energetic Arc -->
        <section v-if="structure?.energetic_arc" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Energetic Arc</h3>
            <div class="grid grid-cols-3 gap-4">
                <div class="text-center p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="text-xs uppercase text-gray-500 mb-2">Beginning</div>
                    <div class="text-sm font-semibold text-gray-900">{{ structure.energetic_arc.beginning }}</div>
                </div>
                <div class="text-center p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="text-xs uppercase text-gray-500 mb-2">Middle</div>
                    <div class="text-sm font-semibold text-gray-900">{{ structure.energetic_arc.middle }}</div>
                </div>
                <div class="text-center p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="text-xs uppercase text-gray-500 mb-2">End</div>
                    <div class="text-sm font-semibold text-gray-900">{{ structure.energetic_arc.end }}</div>
                </div>
            </div>
        </section>

        <!-- Structure: Field Impact -->
        <section v-if="structure?.field_impact" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Field Impact</h3>
            <div
                class="prose prose-sm max-w-none text-gray-700 leading-relaxed"
                v-html="formatMarkdown(structure.field_impact)"
            />
        </section>

        <!-- Geographic & Temporal -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <section v-if="surface?.geographic_progression" class="space-y-3">
                <h3 class="text-lg font-semibold text-gray-900">Geographic Progression</h3>
                <p class="text-sm text-gray-700">{{ surface.geographic_progression }}</p>
            </section>

            <section v-if="surface?.temporal_markers?.length" class="space-y-3">
                <h3 class="text-lg font-semibold text-gray-900">Temporal Markers</h3>
                <ul class="space-y-2">
                    <li
                        v-for="marker in surface.temporal_markers"
                        :key="marker.date"
                        class="text-sm"
                    >
                        <span class="font-mono text-gray-500">{{ marker.date }}</span>
                        <span class="mx-2">—</span>
                        <span class="text-gray-700">{{ marker.marker }}</span>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import markdownit from "markdown-it";

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
</script>
