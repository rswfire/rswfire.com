<template>
    <Content theme="transmission">

        <Hero
            :title="`${tag}`"
            subtitle="A Filtered View of the Transmission Vault"
            meta="TRANSMISSION VAULT"
        />

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">

            <div class="prose prose-lg prose-neutral max-w-none">
                <div><strong>Nothing here will wait for you to catch up</strong>.</div>
                <div>There is no summary to soften the entry.</div>
                <div>There is no title that reveals what it <em>means</em>.</div>
                <div>These transmissions were never meant to persuade.</div>
                <div>They weren’t made <em>for</em> you.</div>
                <div>And still &mdash;</div>
                <div class="ml-4">they are offered.</div>

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
            <div
                v-for="transmission in transmissions.data"
                :key="transmission.transmission_id"
                @click="goTo(transmission.transmission_id)"
                class="group cursor-pointer rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-md transition-shadow duration-200 border border-gray-200 hover:border-black"
            >

                <div class="aspect-w-16 aspect-h-9 bg-gray-100">
                    <img
                        :src="transmission.url_thumbnail"
                        :alt="transmission.transmission_title"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200"
                    />
                </div>

                <div class="p-4 space-y-1">
                    <h2 class="text-md font-semibold leading-tight text-gray-900 group-hover:text-black line-clamp-2">
                        {{ transmission.transmission_title }}
                    </h2>
                    <p class="text-sm text-gray-500 line-clamp-2">
                        {{ transmission.transmission_description }}
                    </p>
                    <div class="text-xs text-gray-400 flex justify-between pt-2">
                        <span>{{ formatDate(transmission.stamp_published) }}</span>
                        <span>{{ formatDuration(transmission.transmission_duration) }}</span>
                    </div>
                </div>

            </div>

        </div>

        <Pagination :links="transmissions.links" />

    </Content>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import {computed, ref} from 'vue'
import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";
import Pagination from '@/Components/System/Pagination.vue'

defineProps({
    transmissions: Object,
    tag: String,
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
