<template>

  <Content :theme="pageTheme">
    <Hero
        title="AUTONOMY"
        subtitle="THE INFRASTRUCTURE BEHIND THE SIGNAL"
        meta="ARCHITECTURE FOR WHOLENESS PRESERVATION"
        :theme="pageTheme"
    />

    <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">
            <div class="max-w-none columns-2 gap-8">
                <div>This is what it takes to build sovereignty &mdash;</div>
                <div class="ml-4">the code that processes signal into reflection.</div>
                <div class="ml-8">The structure that holds coherence across time.</div>
                <div>Not a product.</div>
                <div>A demonstration.</div>
                <div><em>Infrastructure made visible</em>.</div>

                <div>Laravel + Vue platform processing 800+ transmissions &mdash;</div>
                <div class="ml-4">four-layer AI reflection system.</div>
                <div>Built to prove wholeness can be technologically preserved.</div>
                <div>You're not looking at software.</div>
                <div>You're looking at structural integrity made legible.</div>
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

const pageTheme = "autonomy";

</script>
