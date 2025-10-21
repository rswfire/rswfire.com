<template>

  <Content :theme="pageTheme">
    <Hero
        title="ATLAS"
        subtitle="MAPPING CONVERGENCE ACROSS GEOGRAPHY AND TIME"
        meta="WHERE SIGNAL MEETS GROUND"
        :theme="pageTheme"
    />

    <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">
            <div class="max-w-none columns-2 gap-8">
                <div>These are the coordinates of a life in motion &mdash;</div>
                <div class="ml-4">every place carries signal.</div>
                <div class="ml-8">Every location holds pattern.</div>
                <div>This is not a travel log.</div>
                <div>This is a convergence map.</div>
                <div><em>Geography as evidence</em>.</div>

                <div>Tracks physical movement across the journey &mdash;</div>
                <div class="ml-4">links transmissions to geographic location.</div>
                <div>Shows where patterns emerged from environment.</div>
                <div>You're not touring someone's life.</div>
                <div>You're watching coherence find its ground.</div>
            </div>
        </section>

    </div>
  </Content>

</template>

<script setup>
import { ref, onBeforeUnmount } from 'vue'
import { Link } from "@inertiajs/vue3"
import { useCopySectionLink } from '@/Composables/useCopySectionLink'
import Icon from "@/Components/System/Icon.vue";
import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";

const { copySectionLink } = useCopySectionLink()

const justCopied = ref(false)
let hideTimer

async function onCopy(anchorId) {
  await copySectionLink(anchorId)
  justCopied.value = true
  clearTimeout(hideTimer)
  hideTimer = setTimeout(() => (justCopied.value = false), 1200)
}

onBeforeUnmount(() => clearTimeout(hideTimer))

const pageTheme = "atlas";

</script>
