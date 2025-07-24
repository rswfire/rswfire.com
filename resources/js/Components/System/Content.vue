<template>
    <div :class="containerClass">
        <slot />
    </div>
    <div class="hidden md:block">&nbsp;</div>
</template>

<script setup>
const props = defineProps({
    theme: {
        type: String,
        default: "gray",
    },
})

const bgShade = "50"
const borderShade = "300"
const theme = "gray";
const containerClass = `p-2 md:p-6 md:border md:rounded-2xl md:shadow-md w-full mx-auto
  bg-${theme}-${bgShade}
  border-${theme}-${borderShade}`
</script>

