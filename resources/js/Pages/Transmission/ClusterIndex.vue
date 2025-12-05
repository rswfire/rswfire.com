<template>
    <Content :theme="pageTheme">
        <Hero
            title="TRANSFORMATION ARCS"
            meta="CLUSTER ANALYSIS THROUGH RECURSIVE AI REFLECTION"
            subtitle="COHERENT PHASES OF A SOVEREIGN JOURNEY"
            :theme="pageTheme"
        />

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">
            <div class="max-w-none columns-2 gap-8">
                <div>These are transformation arcs &mdash;</div>
                <div class="ml-4">clusters of signals</div>
                <div class="ml-8">spanning weeks or months.</div>
                <div><em>Each arc holds its own pattern</em>.</div>
                <div>Thresholds crossed.</div>
                <div>Integration achieved or deferred.</div>

                <div>11 clusters &mdash;</div>
                <div class="ml-4">tracked from RV transition to federal positioning.</div>
                <div>This is not timeline.</div>
                <div class="ml-4">It is <em>structural mapping</em> of becoming.</div>
                <div>You're not here to observe.</div>
                <div>You're here to recognize the pattern.</div>
            </div>
        </section>

        <div v-if="loading" class="py-16 text-center text-gray-400">
            Loading Clusters...
        </div>

        <div v-else-if="error" class="py-16 text-center text-red-600">
            {{ error }}
        </div>

        <template v-else-if="clusters">
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto px-6">
                <div
                    v-for="cluster in clusters"
                    :key="cluster.cluster_ulid"
                    @click="goTo(cluster.cluster_ulid)"
                    class="group cursor-pointer rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200 border border-gray-200 hover:border-black"
                    :class="cluster.cluster_state === 'active' ? 'bg-emerald-50' : 'bg-white'"
                >
                    <div class="p-6 space-y-4">
                        <!-- Header -->
                        <div class="flex items-start justify-between gap-3">
                            <h2 class="text-lg font-semibold leading-tight text-gray-900 group-hover:text-black flex-1">
                                {{ cluster.cluster_title }}
                            </h2>
                            <div
                                v-if="cluster.cluster_state === 'active'"
                                class="flex-shrink-0"
                            >
                                <Icon name="Zap" class="text-emerald-500 w-[24px] h-[24px]" />
                            </div>
                        </div>

                        <!-- Timespan -->
                        <div class="text-sm text-gray-500">
                            <span class="font-mono">{{ formatDate(cluster.stamp_cluster_start) }}</span>
                            <span class="mx-2">→</span>
                            <span class="font-mono">
                                {{ cluster.stamp_cluster_end ? formatDate(cluster.stamp_cluster_end) : 'present' }}
                            </span>
                        </div>

                        <!-- Pattern (if available) -->
                        <div
                            v-if="cluster.cluster_data?.pattern"
                            class="text-xs text-gray-600 italic"
                        >
                            {{ cluster.cluster_data.pattern }}
                        </div>

                        <!-- Themes -->
                        <div v-if="cluster.cluster_data?.themes?.length" class="space-y-2">
                            <div class="text-[10px] uppercase font-semibold text-gray-400 tracking-wide">
                                Themes
                            </div>
                            <div class="flex flex-wrap gap-1.5">
                                <span
                                    v-for="theme in cluster.cluster_data.themes"
                                    :key="theme"
                                    class="text-xs px-2 py-0.5 bg-purple-100 text-purple-700 rounded-full whitespace-nowrap"
                                >
                                    {{ theme }}
                                </span>
                            </div>
                        </div>

                        <!-- Signal Count -->
                        <div class="text-xs text-gray-400 flex justify-between pt-3 border-t border-gray-100">
                            <span>
                                {{ cluster.cluster_data?.signal_count_estimate || '~' }} signals
                            </span>
                            <span v-if="cluster.cluster_data?.geographic_scope" class="truncate ml-2">
                                {{ cluster.cluster_data.geographic_scope }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </template>
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
    router.visit(`/transmissions/clusters/${ulid}`)
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

const pageTheme = 'transmissions'
</script>
