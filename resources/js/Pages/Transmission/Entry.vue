<template>
    <Content :theme="pageTheme">
        <!-- Hero -->
        <Hero
            v-if="!loading"
            :title="reflection?.surface?.reflection_content?.title || transmission?.signal_ulid || 'Untitled Transmission'"
            :subtitle="transmission?.signal_ulid || 'TRANSMISSION'"
            :meta="formatDate(transmission?.stamp_created) || 'NULL'"
            :theme="pageTheme"
            align="center"
        />
        <div v-else class="py-16 text-center text-gray-400">
            Loading transmission...
        </div>

        <!-- Main Content -->
        <div v-if="!loading" class="mt-8">
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

                <!-- Right-aligned container for return link + share buttons -->
                <div class="flex items-center gap-2 ml-auto mr-4">
                    <Link
                        href="/transmission"
                        class="inline-flex items-center gap-1 text-[11px] uppercase tracking-wide text-gray-500 hover:text-black mb-2"
                    >
                        ← Return to Archive
                    </Link>

                    <span class="text-gray-300 mb-2">|</span>

                    <template v-for="link in shareLinks" :key="link.name">
                        <button
                            v-if="!link.href"
                            @click="link.action"
                            class="flex items-center gap-1 px-2 py-1 bg-gray-100 rounded hover:bg-gray-200 transition text-xs mb-2"
                        >
                            <Icon :name="link.icon" class="w-[16px] h-[16px] text-gray-500" />
                            {{ link.name }}
                        </button>

                        <a
                            v-else
                            :href="link.href"
                            target="_blank"
                            rel="noopener"
                            class="flex items-center gap-1 px-2 py-1 bg-gray-100 rounded hover:bg-gray-200 transition text-xs"
                        >
                            <Icon :name="link.icon" class="w-[16px] h-[16px] text-gray-500" />
                            {{ link.name }}
                        </a>
                    </template>
                </div>
            </div>

            <!-- Tabs content -->
            <div class="mt-6">
                <EntryRecordTab
                    v-if="activeMainTab === 'Transmission'"
                    :transmission="transmission"
                    :reflection="reflection"
                    :format-time="formatTime"
                />

                <EntryMirrorTab
                    v-else-if="activeMainTab === 'Mirror'"
                    :transmission="transmission"
                    :reflection="reflection"
                />

                <EntrySanctumTab
                    v-else-if="activeMainTab === 'Sanctum'"
                />
            </div>
        </div>
    </Content>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { Link } from '@inertiajs/vue3'

import Content from '@/Components/System/Content.vue'
import Hero from '@/Components/System/Hero.vue'
import Icon from '@/Components/System/Icon.vue'
import EntryRecordTab from './EntryRecordTab.vue'
import EntryMirrorTab from './EntryMirrorTab.vue'
import EntrySanctumTab from '@/Pages/Transmission/EntrySanctumTab.vue'

import { useTransmission } from '@/Composables/useTransmission'

/**
 * Props
 */
const props = defineProps({
    ulid: String,
    domain: String
})

/**
 * Composables
 */
const { transmission, reflection, loading, error, load } = useTransmission()

onMounted(() => load(props.ulid))

/**
 * Tabs
 */
const mainTabs = [
    {
        key: 'Transmission',
        label: 'Transmission',
        icon: 'SatelliteDish',
        color: 'text-pink-400',
        background: 'bg-pink-400',
    },
    {
        key: 'Mirror',
        label: 'Mirror',
        icon: 'FlaskConical',
        color: 'text-sky-400',
        background: 'bg-sky-400',
    },
    {
        key: 'Sanctum',
        label: 'Sanctum',
        icon: 'Sprout',
        color: 'text-indigo-400',
        background: 'bg-indigo-400',
    }
]

const activeMainTab = ref('Transmission')

/**
 * Share links
 */
const url = ref(window.location.href)
const shareLinks = [
    { name: 'Copy Link', icon: 'Link2', action: () => navigator.clipboard.writeText(url.value) },
]

/**
 * Formatting utilities
 */
const formatTime = seconds => {
    const mins = Math.floor((Number(seconds) || 0) / 60)
    const secs = Math.floor((Number(seconds) || 0) % 60)
    return `${mins}:${secs.toString().padStart(2, '0')}`
}

const formatDate = str => {
    if (!str) return ''
    const date = new Date(str)
    if (Number.isNaN(date.getTime())) return ''
    return date.toLocaleDateString(undefined, {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }).toUpperCase()
}

/**
 * Page theme
 */
const pageTheme = 'transmissions'
</script>
