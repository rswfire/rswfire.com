<template>
    <div class="max-w-6xl mx-auto py-12 px-6">
        <h1 class="text-4xl font-bold text-gray-900 mb-10">Chronicle</h1>

        <div v-if="!isAuthenticated">
            <div class="w-full">
            <LoginInline />
            </div>
        </div>

        <div v-else>
            <!-- Listing grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    v-for="conv in conversations.data"
                    :key="conv.conversation_id"
                    class="p-6 bg-white border border-neutral-200 rounded-xl shadow hover:shadow-md transition"
                >
                    <Link :href="`/chronicle/${conv.conversation_id}`" class="block space-y-2">
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

            <!-- Pagination Info -->
            <div class="text-center text-sm text-gray-500 mt-6">
                Page {{ conversations.current_page }} of {{ conversations.last_page }}
            </div>

            <!-- Page Number Links -->
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

        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import LoginInline from '@/Pages/Auth/LoginInline.vue'

const props = defineProps({
    conversations: Object,
    authUser: Object,
})

const page = usePage()
const isAuthenticated = props.authUser || page.props.auth?.user

function format(dateStr, format) {
    const d = new Date(dateStr)
    if (isNaN(d)) return '—'
    return new Intl.DateTimeFormat('en-US', {
        ...(format.includes('MM') && { month: '2-digit' }),
        ...(format.includes('dd') && { day: '2-digit' }),
        ...(format.includes('yyyy') && { year: 'numeric' }),
        ...(format.includes('hh') && { hour: '2-digit', minute: '2-digit', hour12: true }),
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
