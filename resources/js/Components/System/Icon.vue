<template>
    <component
        :is="iconComponent"
        :class="['w-6 h-6 transition-transform duration-200 ease-in-out', props.color]"
    />
</template>

<script setup>
import { computed } from 'vue'
import {
    Activity,
    BookKey,
    Flame,
    Hammer,
    HandCoins,
    Key,
    Layers,
    LogIn,
    Map,
    MessageCircle,
    MessageSquareDot,
    SatelliteDish,
    ShieldCheck,
    SquareCode,
    SquareLibrary,
    TreeDeciduous,
    UserPlus
} from "lucide-vue-next"

const iconMap = {
    Activity,
    BookKey,
    Flame,
    Hammer,
    HandCoins,
    Key,
    Layers,
    LogIn,
    Map,
    MessageCircle,
    MessageSquareDot,
    SatelliteDish,
    ShieldCheck,
    SquareCode,
    SquareLibrary,
    TreeDeciduous,
    UserPlus
}

const props = defineProps({
    name: { type: String, required: true },
    color: { type: String }
})

const iconComponent = computed(() => {
    const icon = iconMap[props.name]
    if (!icon) {
        console.warn(`Lucide icon "${props.name}" is not in the whitelist.`)
        return iconMap.HelpCircle
    }
    return icon
})
</script>
