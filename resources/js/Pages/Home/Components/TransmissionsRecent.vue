<template>

    <div class="rounded-xl bg-stone-50 border border-stone-300 p-4 shadow-sm">
        <h3 class="text-sm font-semibold text-stone-800 uppercase tracking-wide mb-2">
            Recent <Link href="/transmission" class="hover:underline">Transmissions</Link>
        </h3>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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

                    <div class="text-xs text-gray-400 flex justify-between pt-2">
                        <span>{{ formatDate(transmission.stamp_created) }}</span>
                        <span>{{ formatDuration(transmission.signal_metadata.duration) }}</span>
                    </div>
                </div>

            </div>

        </div>

    </div>

</template>

<script setup>
import {Link, router} from '@inertiajs/vue3'

defineProps({
    transmissions: Object
})

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
