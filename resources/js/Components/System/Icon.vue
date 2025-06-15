<template>
    <component
        :is="iconComponent"
        :class="['w-6 h-6 transition-transform duration-200 ease-in-out', props.color]"
    />
</template>

<script setup>
import { computed } from 'vue'
import * as LucideIcons from 'lucide-vue-next'

const props = defineProps({
    name: { type: String, required: true },
    color: { type: String }
})

const iconComponent = computed(() => {
    const icon = LucideIcons[props.name]
    if (!icon) {
        console.warn(`Lucide icon "${props.name}" not found.`)
        return LucideIcons.HelpCircle
    }
    return icon
})
</script>
