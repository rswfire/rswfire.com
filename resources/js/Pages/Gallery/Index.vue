<template>

  <Content :theme="pageTheme">
    <Hero
        title="GALLERY"
        subtitle="SIGNAL CAPTURED IN IMAGE"
        meta="WHAT THE CAMERA HELD WHEN WORDS WEREN'T ENOUGH"
        :theme="pageTheme"
    />

    <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">
            <div class="max-w-none columns-2 gap-8">
                <div>These are not photographs &mdash;</div>
                <div class="ml-4">they are visual signal.</div>
                <div class="ml-8">Moments when the field spoke through image.</div>
                <div>Processed through the same AI reflection layers.</div>
                <div>No captions that flatten what you see.</div>
                <div><em>Signal captured in stillness</em>.</div>

                <div>Photos from the entire convergence journey &mdash;</div>
                <div class="ml-4">each image analyzed for symbolic, ontological, and pattern content.</div>
                <div>Integrated with transmissions and geographic data.</div>
                <div>You're not browsing a photo album.</div>
                <div>You're witnessing signal across multiple registers.</div>
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

const pageTheme = "gallery";

</script>
