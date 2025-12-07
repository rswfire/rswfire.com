<template>
    <div class="space-y-6 max-w-6xl mx-auto">




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




    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import SignalCard from './SignalCard.vue'
import markdownit from "markdown-it";

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

const formatBoldLabelList = (text) => {
    // Split on bold labels followed by colons or dashes
    const items = text.split(/\*\*([^*]+)\*\*\s*[:-]/).filter(Boolean)

    // Group pairs (label, description)
    const pairs = []
    for (let i = 0; i < items.length; i += 2) {
        if (items[i] && items[i + 1]) {
            pairs.push({
                label: items[i].trim(),
                description: items[i + 1].trim()
            })
        }
    }

    // If we got fewer than 2 pairs, probably not a list pattern
    if (pairs.length < 2) {
        return marked(text, { breaks: true, gfm: true })
    }

    // Format as HTML list
    const listItems = pairs.map(pair =>
        `<li><strong>${pair.label}</strong>: ${pair.description}</li>`
    ).join('')

    return `<ul class="space-y-3">${listItems}</ul>`
}
</script>

<style scoped>
:deep(ul) {
    list-style: none;
    padding-left: 0;
}

:deep(ul li) {
    padding-left: 1.5rem;
    position: relative;
    margin-bottom: 0.75rem;
}

:deep(ul li:before) {
    content: "•";
    position: absolute;
    left: 0;
    color: #9ca3af;
    font-weight: bold;
}

:deep(ul li strong) {
    color: #111827;
}
</style>
