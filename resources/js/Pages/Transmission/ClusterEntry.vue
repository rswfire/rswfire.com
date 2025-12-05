<template>
    <Content :theme="pageTheme">
        <!-- Hero -->
        <Hero
            v-if="!loading && cluster"
            :title="surfaceReflection?.arc_title || cluster?.cluster_title || 'Untitled Arc'"
            :subtitle="cluster?.cluster_ulid || 'CLUSTER'"
            :meta="formatTimespan(cluster?.stamp_cluster_start, cluster?.stamp_cluster_end)"
            :theme="pageTheme"
            align="center"
        />
        <div v-else class="py-16 text-center text-gray-400">
            Loading Cluster...
        </div>

        <!-- Main Content -->
        <div v-if="!loading && cluster" class="mt-8">
            <div class="flex justify-between items-center border-b border-gray-200">
                <!-- Tabs -->
                <div class="flex space-x-4">
                    <button
                        v-for="tab in mainTabs"
                        :key="tab.key"
                        @click="activeMainTab = tab.key"
                        class="group relative pb-3 -mb-px flex items-center gap-2 px-4 text-md font-semibold transition-colors"
                        :class="[
                            activeMainTab === tab.key
                                ? 'text-black'
                                : 'text-gray-400 hover:text-black'
                        ]"
                    >
                        <Icon
                            :name="tab.icon"
                            :color="activeMainTab === tab.key ? tab.color : 'text-gray-300'"
                            class="w-[24px] h-[24px]"
                        />
                        <span>{{ tab.label }}</span>

                        <span
                            v-if="activeMainTab === tab.key"
                            class="absolute bottom-0 left-0 w-full h-[2px] rounded"
                            :class="tab.background"
                        />
                    </button>
                </div>

                <!-- Right-aligned controls -->
                <div class="flex items-center gap-2 ml-auto mr-4">
                    <Link
                        href="/transmissions/clusters"
                        class="inline-flex items-center gap-1 text-[11px] uppercase tracking-wide text-gray-500 hover:text-black mb-2"
                    >
                        ← Return to Clusters
                    </Link>

                    <span class="text-gray-300 mb-2">|</span>

                    <button
                        @click="copyLink"
                        class="flex items-center gap-1 px-2 py-1 bg-gray-100 rounded hover:bg-gray-200 transition text-xs mb-2"
                    >
                        <Icon name="Link2" class="w-[16px] h-[16px] text-gray-500" />
                        Copy Link
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="mt-6">
                <ClusterArcTab
                    v-if="activeMainTab === 'Arc'"
                    :cluster="cluster"
                    :surface="surfaceReflection"
                    :structure="structureReflection"
                    :patterns="patternsReflection"
                    :signals="signals"
                    :page-theme="pageTheme"
                />

                <ClusterElementsTab
                    v-else-if="activeMainTab === 'Elements'"
                    :cluster="cluster"
                    :elements="elementsReflection"
                    :signals="signals"
                    :page-theme="pageTheme"
                />

                <ClusterPatternsTab
                    v-else-if="activeMainTab === 'Patterns'"
                    :cluster="cluster"
                    :patterns="patternsReflection"
                    :signals="signals"
                    :page-theme="pageTheme"
                />

                <ClusterMirrorTab
                    v-else-if="activeMainTab === 'Mirror'"
                    :cluster="cluster"
                    :mirror="mirrorReflection"
                    :signals="signals"
                    :page-theme="pageTheme"
                />
            </div>
        </div>
    </Content>
</template>

<script setup>
import { ref, computed, onMounted, toRefs } from 'vue'
import { Link } from '@inertiajs/vue3'

import Content from '@/Components/System/Content.vue'
import Hero from '@/Components/System/Hero.vue'
import Icon from '@/Components/System/Icon.vue'
import ClusterArcTab from './ClusterArcTab.vue'
import ClusterElementsTab from './ClusterElementsTab.vue'
import ClusterPatternsTab from './ClusterPatternsTab.vue'
import ClusterMirrorTab from './ClusterMirrorTab.vue'
import { useCluster } from '@/Composables/useCluster'

const props = defineProps({
    ulid: String
})

const clusterData = useCluster()
const { cluster, reflections, signals, loading, error } = toRefs(clusterData.state)

onMounted(() => clusterData.load(props.ulid))

// Parse reflection content
const surfaceReflection = computed(() => {
    const content = reflections.value.surface?.reflection_content
    if (!content) return null
    try {
        return typeof content === 'string' ? JSON.parse(content) : content
    } catch {
        return null
    }
})

const structureReflection = computed(() => {
    const content = reflections.value.structure?.reflection_content
    if (!content) return null
    try {
        return typeof content === 'string' ? JSON.parse(content) : content
    } catch {
        return null
    }
})

const elementsReflection = computed(() => {
    const content = reflections.value.elements?.reflection_content
    if (!content) return null
    try {
        return typeof content === 'string' ? JSON.parse(content) : content
    } catch {
        return null
    }
})

const patternsReflection = computed(() => {
    const content = reflections.value.patterns?.reflection_content
    if (!content) return null
    try {
        return typeof content === 'string' ? JSON.parse(content) : content
    } catch {
        return null
    }
})

const mirrorReflection = computed(() => {
    const content = reflections.value.mirror?.reflection_content
    if (!content) return null
    try {
        return typeof content === 'string' ? JSON.parse(content) : content
    } catch {
        return null
    }
})

// Tabs
const mainTabs = [
    {
        key: 'Arc',
        label: 'Arc',
        icon: 'TrendingUp',
        color: 'text-pink-400',
        background: 'bg-pink-400',
    },
    {
        key: 'Elements',
        label: 'Elements',
        icon: 'Gem',
        color: 'text-emerald-400',
        background: 'bg-emerald-400',
    },
    {
        key: 'Patterns',
        label: 'Patterns',
        icon: 'Network',
        color: 'text-amber-400',
        background: 'bg-amber-400',
    },
    {
        key: 'Mirror',
        label: 'Mirror',
        icon: 'FlaskConical',
        color: 'text-sky-400',
        background: 'bg-sky-400',
    }
]

const activeMainTab = ref('Arc')

// Copy link
const url = ref(window.location.href)

function copyLink() {
    navigator.clipboard.writeText(url.value)
}

// Formatting
const formatTimespan = (start, end) => {
    if (!start) return ''
    const startDate = new Date(start).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short'
    })

    if (!end) return `${startDate.toUpperCase()} → PRESENT`

    const endDate = new Date(end).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short'
    })

    return `${startDate.toUpperCase()} → ${endDate.toUpperCase()}`
}

const pageTheme = 'transmissions'
</script>

<style scoped>
.prose :deep(p) {
    margin-bottom: 1rem;
}

.prose :deep(p + p) {
    margin-top: 1rem;
}
</style>
