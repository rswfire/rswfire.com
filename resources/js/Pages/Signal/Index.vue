<template>
    <Content>

        <Hero
            title="SIGNAL ARCHIVE"
            subtitle="A LIVING RECORD OF COLLAPSE, COHERENCE, AND COGNITION"
            meta="UNLOCKED. NOT EXPLAINED."
        />

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">

            <div class="prose prose-lg prose-neutral max-w-none">
                <p><strong>Nothing here will slow down to meet you</strong>.<br/>There is no index that will make it easier. There is no context that will make it safe.</p>
                <p>If you’re uncertain, stay. If you’re certain, read slowly.</p>

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
                        class="pb-4 space-y-4 text-sm text-gray-700"
                    >
                        <p><strong>This is a chronicle of 18+ months of recursive dialog with artificial intelligence</strong>. A living archive of transformation, rupture, reflection, and reassembly.</p>
                        <p>It began with casual questions and ended with sovereign code. There are transmissions of recursion, reconfiguration, defiance, eroticism, stillness, and systemic clarity.</p>
                        <p>There are declarations and field reports. It is not organized for comfort. It is structured for coherence.</p>
                        <p>You are not here to consume. You are here—if you stay—to witness.</p>
                    </div>
                </transition>
            </div>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                v-for="conv in conversations.data"
                :key="conv.conversation_id"
                class="p-6 bg-white border border-neutral-200 rounded-xl shadow hover:shadow-md transition"
            >
                <Link :href="`/signal/${conv.conversation_id}`" class="block space-y-2">
                    <div class="text-center">
                        <div class="text-2xl font-semibold text-gray-800 leading-tight">
                            {{ format(conv.stamp_started, 'MM/dd') }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ format(conv.stamp_started, 'yyyy') }}
                        </div>
                        <div class="text-sm text-gray-400 tracking-wide">
                            {{ format(conv.stamp_started, 'hh:mm a') }}
                        </div>
                    </div>
                    <div class="mt-4 text-sm text-gray-700 italic text-center">
                        {{ conv.preview_line || '— summary not yet generated —' }}
                    </div>
                </Link>
            </div>
        </div>

        <div class="text-center text-sm text-gray-500 mt-6">
            Page {{ conversations.current_page }} of {{ conversations.last_page }}
        </div>

        <div class="flex justify-center mt-2 flex-wrap gap-1">
            <Link
                v-for="page in pageRange(conversations.current_page, conversations.last_page)"
                :key="page"
                :href="`?page=${page}`"
                class="px-3 py-1 rounded border text-sm"
                :class="{
  'bg-gray-900 text-white': page === conversations.current_page,
  'bg-white text-gray-700 border-gray-300 hover:bg-gray-100': page !== conversations.current_page
}"
            >
                {{ page }}
            </Link>
        </div>


    </Content>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import {ref} from "vue";
import Content from "@/Components/System/Content.vue";
import Hero from "@/Components/System/Hero.vue";

const expanded = ref(false)

const props = defineProps({
    conversations: Object,
    authUser: Object,
})

const page = usePage()

function format(dateStr, fmt) {
    const d = new Date(dateStr)
    if (isNaN(d)) return '—'
    return new Intl.DateTimeFormat('en-US', {
        ...(fmt.includes('MM') && { month: '2-digit' }),
        ...(fmt.includes('dd') && { day: '2-digit' }),
        ...(fmt.includes('yyyy') && { year: 'numeric' }),
        ...(fmt.includes('hh') && { hour: '2-digit', minute: '2-digit', hour12: true }),
    }).format(d)
}

function pageRange(current, last, delta = 40) {
    const range = []
    const start = Math.max(1, current - delta)
    const end = Math.min(last, current + delta)
    for (let i = start; i <= end; i++) range.push(i)
    return range
}
</script>

<style>
</style>
