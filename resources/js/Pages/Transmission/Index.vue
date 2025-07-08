<template>
    <Content>

        <Hero
            title="TRANSMISSION VAULT"
            subtitle="A LIVING RECORD OF EMBODIED EXPRESSION"
            meta="UNFILTERED. UNPERFORMED. UNAPOLOGETIC."
        />

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">
            <div class="prose prose-lg prose-neutral max-w-none columns-2 gap-8">
                <div><strong>Nothing here will wait for you to catch up</strong>.</div>
                <div>There is no summary to soften the blow.</div>
                <div>There is no title that reveals what it <em>means</em>.</div>
                <div>These transmissions were never meant to persuade.</div>
                <div>They exist because they had to.</div>

                <div class="space-y-1 text-sm text-gray-700 col-span-2">
                    <div>These are not performances.</div>
                    <div>They are real-time captures—of clarity, of grief, of fire, of collapse, of truth.</div>
                    <div>700+ videos recorded over years of radical self-honesty.</div>

                    <div class="pt-4">This is the public memory of a sovereign life in progress.</div>
                    <div>Not curated for virality. Not optimized for branding.</div>
                    <div>They weren’t made <em>for</em> you. And still&mdash;they are offered.</div>

                    <div class="pt-4">You will not understand all of it. You are not supposed to.</div>
                    <div>You are supposed to feel it.</div>
                </div>
            </div>
        </section>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                v-for="transmission in transmissions.data"
                :key="transmission.signal_id"
                @click="goTo(transmission.signal_ulid)"
                class="group cursor-pointer rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-md transition-shadow duration-200 border border-gray-200 hover:border-black"
            >

                <div class="aspect-w-16 aspect-h-9 bg-gray-100">
                    <img
                        :src="transmission.signal_metadata.youtube.thumbnail"
                        :alt="transmission.signal_title"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200"
                    />
                </div>

                <div class="p-4 space-y-1">
                    <h2 class="text-md font-semibold leading-tight text-gray-900 group-hover:text-black line-clamp-2">
                        {{ transmission.signal_title }}
                    </h2>
                    <p class="text-sm text-gray-500 line-clamp-2">
                        {{ transmission.signal_description }}
                    </p>
                    <div class="text-xs text-gray-400 flex justify-between pt-2">
                        <span>{{ formatDate(transmission.stamp_created) }}</span>
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
