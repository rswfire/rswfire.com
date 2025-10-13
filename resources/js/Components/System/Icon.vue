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
    Crosshair,
    ExternalLink,
    Feather,
    Flame,
    Hammer,
    HandCoins,
    HelpCircle,
    Key,
    Layers,
    Link2,
    LogIn,
    Map,
    MessageCircle,
    MessageSquareDot,
    Radar,
    SatelliteDish,
    ScanLine,
    Send,
    SendHorizonal,
    ShieldCheck,
    Sparkles,
    Sprout,
    SquareCode,
    SquareLibrary,
    Squirrel,
    TreeDeciduous,
    UserPlus,
    WavesLadder
} from "lucide-vue-next"

const iconMap = {
    Activity,
    BookKey,
    Crosshair,
    ExternalLink,
    Feather,
    Flame,
    Hammer,
    HandCoins,
    HelpCircle,
    Key,
    Layers,
    Link2,
    LogIn,
    Map,
    MessageCircle,
    MessageSquareDot,
    Radar,
    SatelliteDish,
    ScanLine,
    Send,
    ShieldCheck,
    Sparkles,
    Sprout,
    SquareCode,
    SquareLibrary,
    Squirrel,
    TreeDeciduous,
    UserPlus,
    WavesLadder
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
