<template>
    <div
        v-if="signal"
        @click="goToSignal(ulid)"
        class="group cursor-pointer rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-200 border bg-white"
        :class="borderColor"
    >
        <div class="aspect-w-16 aspect-h-9 bg-gray-100">
            <img
                :src="signal.signal_metadata?.youtube?.thumbnail"
                :alt="ulid"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200"
            />
        </div>

        <div class="p-3 space-y-2">
            <p class="text-xs font-mono text-gray-400">{{ ulid }}</p>
            <h4 class="text-sm font-semibold text-gray-900 line-clamp-2" :class="hoverColor">
                {{ signal.signal_title || 'Untitled' }}
            </h4>
            <p class="text-xs text-gray-600 line-clamp-2">
                {{ description }}
            </p>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    signal: Object,
    ulid: String,
    description: String,
    color: {
        type: String,
        default: 'gray'
    }
})

const colorMap = {
    purple: {
        border: 'border-gray-200 hover:border-purple-400',
        hover: 'group-hover:text-purple-600'
    },
    pink: {
        border: 'border-gray-200 hover:border-pink-400',
        hover: 'group-hover:text-pink-600'
    },
    blue: {
        border: 'border-gray-200 hover:border-blue-400',
        hover: 'group-hover:text-blue-600'
    },
    rose: {
        border: 'border-gray-200 hover:border-rose-400',
        hover: 'group-hover:text-rose-600'
    },
    emerald: {
        border: 'border-gray-200 hover:border-emerald-400',
        hover: 'group-hover:text-emerald-600'
    },
    amber: {
        border: 'border-gray-200 hover:border-amber-400',
        hover: 'group-hover:text-amber-600'
    },
    gray: {
        border: 'border-gray-200 hover:border-gray-400',
        hover: 'group-hover:text-gray-900'
    }
}

const borderColor = computed(() => colorMap[props.color]?.border || colorMap.gray.border)
const hoverColor = computed(() => colorMap[props.color]?.hover || colorMap.gray.hover)

const goToSignal = (ulid) => {
    router.visit(`/transmission/${ulid}`)
}
</script>
