<template>
    <div class="space-y-12 max-w-6xl mx-auto px-6 pb-12">
        <!-- Catalytic Sequence -->
        <section v-if="patterns?.catalytic_sequence?.length" class="space-y-4">
            <h3 class="text-2xl font-bold text-gray-900">Catalytic Sequence</h3>
            <p class="text-sm text-gray-600">Key triggers that drove the transformation</p>
            <ol class="space-y-3">
                <li
                    v-for="(catalyst, index) in patterns.catalytic_sequence"
                    :key="index"
                    class="flex items-start gap-3"
                >
                    <span class="flex-shrink-0 w-6 h-6 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center text-xs font-bold">
                        {{ index + 1 }}
                    </span>
                    <span class="text-gray-700 pt-0.5">{{ catalyst }}</span>
                </li>
            </ol>
        </section>

        <!-- Integration Markers -->
        <section v-if="patterns?.integration_markers" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Integration Markers</h3>
            <div
                class="prose prose-sm max-w-none text-gray-700 leading-relaxed bg-green-50 p-6 rounded-lg border border-green-100"
                v-html="formatMarkdown(patterns.integration_markers)"
            />
        </section>

        <!-- Teaching Moments Filmstrip -->
        <section v-if="patterns?.teaching_moments?.length" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Teaching Moments</h3>
            <p class="text-sm text-gray-600">Signals where frameworks and concepts are explicitly demonstrated</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <SignalCard
                    v-for="moment in patterns.teaching_moments"
                    :key="moment.signal_ulid"
                    :signal="getSignal(moment.signal_ulid)"
                    :ulid="moment.signal_ulid"
                    :description="moment.lesson"
                    color="purple"
                />
            </div>
        </section>

        <!-- Quirky Moments Filmstrip -->
        <section v-if="patterns?.quirky_moments?.length" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Quirky Moments</h3>
            <p class="text-sm text-gray-600">Memorable textures that make the arc human</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <SignalCard
                    v-for="moment in patterns.quirky_moments"
                    :key="moment.signal_ulid"
                    :signal="getSignal(moment.signal_ulid)"
                    :ulid="moment.signal_ulid"
                    :description="moment.note"
                    color="pink"
                />
            </div>
        </section>

        <!-- Technical Milestones Filmstrip -->
        <section v-if="patterns?.technical_milestones?.length" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Technical Milestones</h3>
            <p class="text-sm text-gray-600">Infrastructure and skill development moments</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <SignalCard
                    v-for="moment in patterns.technical_milestones"
                    :key="moment.signal_ulid"
                    :signal="getSignal(moment.signal_ulid)"
                    :ulid="moment.signal_ulid"
                    :description="moment.milestone"
                    color="blue"
                />
            </div>
        </section>

        <!-- Relational Threads Filmstrip -->
        <section v-if="patterns?.relational_threads?.length" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Relational Threads</h3>
            <p class="text-sm text-gray-600">Parallel arcs in relationships and connections</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <SignalCard
                    v-for="thread in patterns.relational_threads"
                    :key="thread.signal_ulid"
                    :signal="getSignal(thread.signal_ulid)"
                    :ulid="thread.signal_ulid"
                    :description="thread.thread"
                    color="rose"
                />
            </div>
        </section>

        <!-- Place Markers Filmstrip -->
        <section v-if="patterns?.place_markers?.length" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Place Markers</h3>
            <p class="text-sm text-gray-600">Geographic moments of significance</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <SignalCard
                    v-for="place in patterns.place_markers"
                    :key="place.signal_ulid"
                    :signal="getSignal(place.signal_ulid)"
                    :ulid="place.signal_ulid"
                    :description="place.location"
                    color="emerald"
                />
            </div>
        </section>

        <!-- Emerging Meta-Patterns -->
        <section v-if="patterns?.emerging_meta_patterns" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Emerging Meta-Patterns</h3>
            <div
                class="prose prose-sm max-w-none text-gray-700 leading-relaxed"
                v-html="formatMarkdown(patterns.emerging_meta_patterns)"
            />
        </section>

        <!-- Unresolved Threads -->
        <section v-if="patterns?.unresolved_threads?.length" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Unresolved Threads</h3>
            <ul class="space-y-2">
                <li
                    v-for="thread in patterns.unresolved_threads"
                    :key="thread"
                    class="flex items-start gap-2 text-sm text-gray-700"
                >
                    <span class="text-amber-500 mt-1">○</span>
                    <span>{{ thread }}</span>
                </li>
            </ul>
        </section>

        <!-- Cluster Resonance -->
        <section v-if="patterns?.cluster_resonance" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Cluster Resonance</h3>
            <p class="text-sm text-gray-600 italic">Who would recognize themselves in this arc pattern?</p>
            <div
                class="prose prose-sm max-w-none text-gray-700 leading-relaxed bg-purple-50 p-6 rounded-lg border border-purple-100"
                v-html="formatMarkdown(patterns.cluster_resonance)"
            />
        </section>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import markdownit from 'markdown-it'
import SignalCard from './SignalCard.vue'

const props = defineProps({
    cluster: Object,
    patterns: Object,
    signals: Array,
    pageTheme: String
})

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
