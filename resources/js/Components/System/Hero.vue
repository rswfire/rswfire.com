<template>
    <section class="mt-4 bg-transparent">
        <div :class="wrapperClass">
            <div class="w-full flex justify-center pb-2"><Icon :name="currentTheme.icon" color="text-black" class="w-[40px] h-[40px]" /></div>
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
import Icon from "@/Components/System/Icon.vue";

const props = defineProps({
    title: { type: String, required: true },
    subtitle: { type: String, default: '' },
    meta: { type: String, default: '' },
    align: { type: String, default: 'center' },
    theme: { type: String, default: "rswfire" }
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

const themeIcons = [
  { label: "About",         icon: "Layers",           color: "text-black",     bg: "bg-white",          border: "border-black",           hover: "hover:bg-white",           url: "/about" },
  { label: "Contact",       icon: "MessageSquareDot", color: "text-black",     bg: "bg-white",          border: "border-black",           hover: "hover:bg-white",           url: "/contact" },
  { label: "Contribute",    icon: "HandCoins",        color: "text-black",      bg: "bg-white",          border: "border-black",           hover: "hover:bg-white",           url: "/contribute" },
  { label: "Updates",       icon: "Squirrel",         color: "text-black",      bg: "bg-white",          border: "border-black",           hover: "hover:bg-white",           url: "/updates" },

  { label: "Home",          icon: "Radar",          color: "text-indigo-400",  bg: "bg-indigo-50",      border: "border-indigo-200",      hover: "hover:bg-indigo-100",      url: "/" },
  { label: "Hello",         icon: "Flame",          color: "text-red-400",     bg: "bg-red-50",         border: "border-red-200",         hover: "hover:bg-red-100",         url: "/hello" },
  { label: "Tech",          icon: "Hammer",         color: "text-purple-400",  bg: "bg-purple-50",      border: "border-purple-200",      hover: "hover:bg-purple-100",      url: "/tech" },
  { label: "Signals",       icon: "Activity",       color: "text-sky-400",     bg: "bg-sky-50",         border: "border-sky-200",         hover: "hover:bg-sky-100",         url: "/signal" },
  { label: "Transmissions", icon: "SatelliteDish",  color: "text-pink-400",    bg: "bg-pink-50",        border: "border-pink-200",        hover: "hover:bg-pink-100",        url: "/transmission" },
  { label: "Fieldcraft",    icon: "Map",            color: "text-green-500",   bg: "bg-green-50",       border: "border-green-200",       hover: "hover:bg-green-100",       url: "/fieldcraft" },
  { label: "Codex",         icon: "SquareCode",     color: "text-amber-400",   bg: "bg-amber-50",       border: "border-amber-200",       hover: "hover:bg-amber-100",       url: "/codex" },
  { label: "Sanctuary",     icon: "Sprout",         color: "text-teal-400",    bg: "bg-teal-50",        border: "border-teal-200",        hover: "hover:bg-teal-100",        url: "/sanctuary" },
  { label: "Lexicon",       icon: "SquareLibrary",  color: "text-orange-400",  bg: "bg-orange-50",      border: "border-orange-200",      hover: "hover:bg-orange-100",      url: "/lexicon" },
  { label: "Myth",          icon: "ShieldCheck",    color: "text-yellow-400",  bg: "bg-yellow-50",      border: "border-yellow-200",      hover: "hover:bg-yellow-100",      url: "/myth" },
  { label: "Honeyman",      icon: "TreeDeciduous",  color: "text-emerald-400", bg: "bg-emerald-50",     border: "border-emerald-200",     hover: "hover:bg-emerald-100",     url: "/honeyman" },
  { label: "Bluewater",     icon: "WavesLadder",    color: "text-blue-400",    bg: "bg-blue-50",        border: "border-blue-200",        hover: "hover:bg-blue-100",        url: "/bluewater" },

]

const currentTheme = computed(() => {
  const found = themeIcons.find(item => item.label.toLowerCase() === props.theme)
  return found || { icon: "HelpCircle", color: "text-black" }
})

</script>
