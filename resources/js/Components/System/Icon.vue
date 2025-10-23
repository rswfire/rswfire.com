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
    Bookmark,
    BringToFront,
    Check,
    CircuitBoard,
    Cpu,
    Crosshair,
    ExternalLink,
    Feather,
    FileSliders,
    Flame,
    FlaskConical,
    GalleryHorizontal,
    Hammer,
    HandCoins,
    HelpCircle,
    Info,
    Key,
    Layers,
    Link2,
    Loader2,
    LogIn,
    LogOut,
    Map,
    MapPinHouse,
    MessageCircle,
    MessageSquareDot,
    Milestone,
    Pilcrow,
    Radar,
    SatelliteDish,
    ScanLine,
    SearchCode,
    Send,
    Shapes,
    ShieldCheck,
    Sparkles,
    Sprout,
    SquareCode,
    SquareLibrary,
    Squirrel,
    TreeDeciduous,
    Trees,
    User,
    UserPlus,
    WavesLadder,
    Workflow
} from "lucide-vue-next"

const iconMap = {
    Activity,
    BookKey,
    Bookmark,
    BringToFront,
    Check,
    CircuitBoard,
    Cpu,
    Crosshair,
    ExternalLink,
    Feather,
    FileSliders,
    Flame,
    FlaskConical,
    GalleryHorizontal,
    Hammer,
    HandCoins,
    HelpCircle,
    Info,
    Key,
    Layers,
    Link2,
    Loader2,
    LogIn,
    LogOut,
    Map,
    MapPinHouse,
    MessageCircle,
    MessageSquareDot,
    Milestone,
    Pilcrow,
    Radar,
    SatelliteDish,
    ScanLine,
    SearchCode,
    Send,
    Shapes,
    ShieldCheck,
    Sparkles,
    Sprout,
    SquareCode,
    SquareLibrary,
    Squirrel,
    TreeDeciduous,
    Trees,
    User,
    UserPlus,
    WavesLadder,
    Workflow
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
