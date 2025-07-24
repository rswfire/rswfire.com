<template>
    <section class="mt-4 bg-transparent">
        <div :class="wrapperClass">
            <h1 :class="['text-4xl font-bold tracking-tight uppercase', titleAlignClass]">
                {{ title }}
            </h1>
            <div v-if="subtitle" :class="['mt-2 text-lg uppercase', titleAlignClass]">
                {{ subtitle }}
            </div>
            <div v-if="meta" :class="['mt-2 text-xs text-gray-500', titleAlignClass]">
                {{ meta }}
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    title: { type: String, required: true },
    subtitle: { type: String, default: '' },
    meta: { type: String, default: '' },
    align: { type: String, default: 'center' }
})

const wrapperClass = computed(() => {
    switch (props.align) {
        case 'left':
            return 'max-w-4xl mx-auto text-left'
        case 'right':
            return 'max-w-4xl mx-auto text-right'
        default:
            return 'max-w-4xl mx-auto text-center'
    }
})

const titleAlignClass = computed(() => {
    switch (props.align) {
        case 'left': return 'text-left'
        case 'right': return 'text-right'
        default: return 'text-center'
    }
})
</script>
