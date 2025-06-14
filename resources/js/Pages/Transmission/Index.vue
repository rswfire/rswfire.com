<template>
    <Content>

        <Hero
            title="TRANSMISSION ARCHIVE"
            subtitle="A LIVING RECORD OF EMBODIED EXPRESSION"
            meta="UNFILTERED. UNPERFORMED. UNAPOLOGETIC."
        />

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">

            <div class="prose prose-lg prose-neutral max-w-none">
                <div><strong>Nothing here will wait for you to catch up</strong>.</div>
                <div>There is no summary to soften the blow.</div>
                <div>There is no title that reveals what it <em>means</em>.</div>
                <div>These transmissions were never meant to persuade.</div>
                <div>They exist because they had to.</div>

                <div class="pt-4">If you’re looking for polish, try somewhere else.</div>
                <div>If you’re looking for real, stay.</div>

                <div
                    class="py-4 cursor-pointer font-medium text-sm text-gray-600 hover:text-black transition inline-flex items-center gap-2 select-none"
                    @click="expanded = !expanded"
                >
                    <span>{{ expanded ? '▲' : '▼' }}</span>
                    <span>What is this?</span>
                </div>

                <transition name="fade">
                    <div
                        v-if="expanded"
                        class="pb-4 space-y-1 text-sm text-gray-700"
                    >

                        <div>These are not performances.</div>
                        <div>They are real-time captures—of clarity, of grief, of fire, of collapse, of truth.</div>
                        <div>700+ videos recorded over years of radical self-honesty.</div>

                        <div class="pt-4">This is the public memory of a sovereign life in progress.</div>
                        <div>Not curated for virality. Not optimized for branding.</div>
                        <div>They weren’t made <em>for</em> you. And still&mdash;they are offered.</div>

                        <div class="pt-4">You will not understand all of it. You are not supposed to.</div>
                        <div>You are supposed to feel it.</div>

                    </div>
                </transition>
            </div>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div v-for="transmission in transmissions.data" :key="transmission.transmission_id">

                    <img
                        :src="transmission.url_thumbnail"
                        :alt="transmission.transmission_title"
                        class="w-full h-48 object-cover"
                    />
                    <div class="p-4">
                        <h2 class="text-md font-semibold leading-tight text-gray-800">
                            {{ transmission.transmission_title }}
                        </h2>
                        <p class="text-sm text-gray-500 mt-1 truncate">
                            {{ transmission.transmission_description }}
                        </p>
                        <div class="text-xs text-gray-400 mt-2 flex justify-between">
                            <span>{{ formatDate(transmission.stamp_published) }}</span>
                            <span>{{ formatDuration(transmission.transmission_duration) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        <div class="mt-10 flex justify-center gap-2">
            <button
                v-if="transmissions.prev_page_url"
                @click="router.visit(transmissions.prev_page_url)"
                class="px-4 py-2 text-sm font-medium bg-white border rounded shadow hover:bg-gray-50"
            >
                ← Previous
            </button>

            <button
                v-if="transmissions.next_page_url"
                @click="router.visit(transmissions.next_page_url)"
                class="px-4 py-2 text-sm font-medium bg-white border rounded shadow hover:bg-gray-50"
            >
                Next →
            </button>
        </div>
    </Content>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import {computed, ref} from 'vue'
import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";

defineProps({
    transmissions: Object
})

const expanded = ref(false)
const goTo = (id) => {
    router.visit(`/transmission/${id}`)
}

const formatDate = (dateStr) => {
    const date = new Date(dateStr)
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    })
}

const formatDuration = (seconds) => {
    if (!seconds) return '—'
    const m = Math.floor(seconds / 60)
    const s = seconds % 60
    return `${m}m ${s}s`
}
</script>
