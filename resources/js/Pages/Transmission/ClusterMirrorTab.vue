<template>
    <div class="space-y-12 max-w-4xl mx-auto px-6 pb-12">
        <!-- Arc Recognition -->
        <section v-if="mirror?.arc_recognition" class="space-y-4">
            <h3 class="text-2xl font-bold text-gray-900">Arc Recognition</h3>
            <div
                class="prose prose-lg max-w-none text-gray-800 leading-relaxed bg-sky-50 p-8 rounded-xl border border-sky-100"
                v-html="formatMarkdown(mirror.arc_recognition)"
            />
        </section>

        <!-- Recognition Moments Filmstrip -->
        <section v-if="mirror?.recognition_moments?.length" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Recognition Moments</h3>
            <p class="text-sm text-gray-600">Signals where direct self-seeing occurred without defense or deflection</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div
                    v-for="moment in mirror.recognition_moments"
                    :key="moment.signal_ulid"
                    @click="goToSignal(moment.signal_ulid)"
                    class="group cursor-pointer rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-200 border border-gray-200 hover:border-sky-400 bg-white"
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

                    <div class="p-4 space-y-2">
                        <p class="text-xs font-mono text-gray-400">{{ moment.signal_ulid }}</p>
                        <h4 class="text-sm font-semibold text-gray-900 group-hover:text-sky-600 line-clamp-2">
                            {{ getSignal(moment.signal_ulid)?.signal_title || 'Untitled' }}
                        </h4>
                        <p class="text-xs text-gray-700 italic leading-relaxed">
                            {{ moment.recognition }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Recursive Elements -->
        <section v-if="mirror?.recursive_elements" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Recursive Elements</h3>
            <div
                class="prose prose-sm max-w-none text-gray-700 leading-relaxed"
                v-html="formatMarkdown(mirror.recursive_elements)"
            />
        </section>

        <!-- Arc Becoming -->
        <section v-if="mirror?.arc_becoming" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Arc Becoming</h3>
            <p class="text-sm text-gray-600 italic">What was being forged through this transformation?</p>
            <div
                class="prose prose-sm max-w-none text-gray-700 leading-relaxed bg-amber-50 p-6 rounded-lg border border-amber-100"
                v-html="formatMarkdown(mirror.arc_becoming)"
            />
        </section>

        <!-- Blind Spots -->
        <section v-if="mirror?.blind_spots" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Blind Spots</h3>
            <p class="text-sm text-gray-600">What remained in peripheral vision</p>
            <div
                class="prose prose-sm max-w-none text-gray-700 leading-relaxed bg-gray-50 p-6 rounded-lg border border-gray-200"
                v-html="formatMarkdown(mirror.blind_spots)"
            />
        </section>

        <!-- Field Offering -->
        <section v-if="mirror?.field_offering" class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Field Offering</h3>
            <p class="text-sm text-gray-600 italic">What this arc makes available to others</p>
            <div
                class="prose prose-sm max-w-none text-gray-700 leading-relaxed bg-purple-50 p-6 rounded-lg border border-purple-100"
                v-html="formatMarkdown(mirror.field_offering)"
            />
        </section>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import markdownit from "markdown-it";

const props = defineProps({
    cluster: Object,
    mirror: Object,
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

<style scoped>
.prose :deep(p) {
    margin-bottom: 1rem;
}

.prose :deep(p + p) {
    margin-top: 1rem;
}
</style>
