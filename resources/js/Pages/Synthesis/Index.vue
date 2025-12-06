<template>
    <Content :theme="pageTheme">
        <Hero
            title="SYNTHESIS"
            meta="PATTERN RECOGNITION ACROSS THE ARCHIVE"
            subtitle="WHERE RECURSION REVEALS STRUCTURE"
            :theme="pageTheme"
        />

        <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

            <section class="max-w-6xl mx-auto px-6 text-gray-900">
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-0.5">
                        <div>I don't think linearly &mdash;</div>
                        <div>I never have.</div>
                        <div class="ml-4">A pattern mentioned once,</div>
                        <div class="ml-8">becomes permanent orientation.</div>
                        <div>This is where you see how non-linear coherence works.</div>
                        <div>AI tracks what humans cannot.</div>
                        <div><em>Recursion reveals structure</em>.</div>
                    </div>

                    <div class="space-y-0.5">
                        <div>Clustered reflections across multiple transmissions &mdash;</div>
                        <div class="ml-4">pattern recognition over weeks, months, years.</div>
                        <div>Thematic threads that connect non-sequential signals.</div>
                        <div>You're not reading summaries.</div>
                        <div>You're watching architecture emerge &mdash;</div>
                        <div class="ml-4">from lived experience &mdash;</div>
                        <div class="ml-8">in real time.</div>
                    </div>
                </div>
            </section>

            <div v-if="loading" class="py-16 text-center text-gray-400">
                Loading Synthesis...
            </div>

            <div v-else-if="error" class="py-16 text-center text-red-600">
                {{ error }}
            </div>

            <template v-else-if="clusters">
                <div class="mt-12 space-y-6 max-w-6xl mx-auto px-6">
                    <div
                        v-for="cluster in clusters"
                        :key="cluster.cluster_ulid"
                        @click="goTo(cluster.cluster_ulid)"
                        class="group cursor-pointer rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-black"
                        :class="cluster.cluster_state === 'active' ? 'bg-gradient-to-r from-synthesis-50 to-white' : 'bg-white'"
                    >
                        <div class="p-8">
                            <!-- Header Row -->
                            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 md:gap-6 mb-6">
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-3 mb-3">
                                        <h2 class="text-xl md:text-2xl font-bold text-gray-900 group-hover:text-black">
                                            {{ cluster.cluster_title }}
                                        </h2>
                                    </div>

                                    <!-- Timespan + Active Badge -->
                                    <div class="flex flex-wrap items-center gap-3">
                                        <div
                                            v-if="cluster.cluster_state === 'active'"
                                            class="flex items-center gap-1.5 px-2.5 py-1 bg-synthesis-100 border border-synthesis-300 rounded-full"
                                        >
                                            <Icon name="Zap" class="text-synthesis-600 w-[16px] h-[16px]" />
                                            <span class="text-xs font-semibold text-synthesis-700 uppercase tracking-wide">Active</span>
                                        </div>
                                        <div class="flex items-center gap-2 text-sm text-gray-500 font-mono">
                                            <span>{{ formatDate(cluster.stamp_cluster_start) }}</span>
                                            <span class="text-gray-300">→</span>
                                            <span>{{ cluster.stamp_cluster_end ? formatDate(cluster.stamp_cluster_end) : 'present' }}</span>
                                        </div>
                                    </div>

                                </div>


                                <!-- Stats Badge -->
                                <div
                                    v-if="cluster.cluster_metadata?.reflection?.threshold_moments?.length"
                                    class="flex-shrink-0 px-4 py-2 bg-synthesis-50 border border-synthesis-200 rounded-lg"
                                >
                                    <div class="text-xs uppercase tracking-wide text-synthesis-600 font-semibold mb-1">Signals</div>
                                    <div class="text-2xl font-bold text-synthesis-700 text-center">
                                        {{ cluster.cluster_metadata.signal_count_estimate }}
                                    </div>
                                </div>
                            </div>

                            <!-- Threshold Moment Thumbnails -->
                            <div
                                v-if="getThresholdThumbnails(cluster).length > 0"
                                class="flex gap-2 ml-auto"
                            >
                                <div
                                    v-for="(thumbnail, index) in getThresholdThumbnails(cluster).slice(0, 5)"
                                    :key="index"
                                    class="w-16 h-16 rounded-lg overflow-hidden border border-gray-200 group-hover:border-gray-300 transition-all flex-shrink-0"
                                >
                                    <img
                                        :src="thumbnail"
                                        :alt="`Threshold ${index + 1}`"
                                        class="w-full h-full object-cover"
                                    />
                                </div>

                            </div>

                            <!-- Arc Summary -->
                            <p
                                v-if="cluster.cluster_metadata?.reflection?.arc_summary"
                                class="text-base text-gray-700 leading-relaxed my-6"
                            >
                                {{ getFirstParagraph(cluster.cluster_metadata.reflection.arc_summary) }}
                            </p>

                            <!-- Transformation Pattern -->
                            <div
                                v-if="cluster.cluster_metadata?.reflection?.transformation_pattern"
                                class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-mono text-purple-800 bg-purple-50 border border-purple-200 rounded-lg"
                            >
                                <Icon name="TrendingUp" class="text-purple-600 w-[16px] h-[16px]" />
                                <span>{{ cluster.cluster_metadata.reflection.transformation_pattern }}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </template>
        </div>
    </Content>
</template>

<script setup>
import { onMounted } from 'vue'
import { router } from '@inertiajs/vue3'
import Hero from '@/Components/System/Hero.vue'
import Content from '@/Components/System/Content.vue'
import Icon from '@/Components/System/Icon.vue'
import { useClusters } from '@/Composables/useClusters'

const { clusters, loading, error, loadIndex } = useClusters()

onMounted(() => loadIndex())

const goTo = (ulid) => {
    router.visit(`/synthesis/${ulid}`)
}

const formatDate = (dateStr) => {
    if (!dateStr) return '—'
    const date = new Date(dateStr)
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    })
}

const stripMarkdown = (text) => {
    if (!text) return ''
    return text
        .replace(/\*\*(.*?)\*\*/g, '$1')
        .replace(/\*(.*?)\*/g, '$1')
        .replace(/\n/g, ' ')
        .trim()
}

const getFirstParagraph = (text) => {
    if (!text) return ''

    const sentences = text.match(/[^.!?]+[.!?]+/g) || [text]

    // Strip markdown from first 3-5 sentences
    const firstFew = sentences.slice(0, 4).join(' ')

    return firstFew
        .replace(/\*\*(.*?)\*\*/g, '$1')  // Remove bold
        .replace(/\*(.*?)\*/g, '$1')       // Remove italic
        .trim()
}

const getThresholdThumbnails = (cluster) => {
    return cluster.cluster_metadata?.reflection?.threshold_moments?.map(m => m.thumbnail).filter(Boolean) || []
}

const pageTheme = 'synthesis'

</script>
