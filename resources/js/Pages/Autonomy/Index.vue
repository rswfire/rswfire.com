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
                <div class="ml-4">The code that processes signal into reflection.</div>
                <div class="ml-8">The structure that holds coherence across time.</div>
                <div>Not a product.</div>
                <div>A demonstration.</div>
                <div><em>Infrastructure made visible</em>.</div>
            </div>
        </section>


      <section class="max-w-3xl mx-auto space-y-6 text-center mt-12 text-black px-4 sm:px-6 lg:px-8">

        <div class="mt-8 border-t border-gray-200 pt-6 text-left space-y-3">
          <h2 class="text-xl font-semibold">AUTONOMY IS:</h2>
          <ul class="list-disc ml-5 space-y-1 text-neutral-800">
            <li>A recursive, integrity-preserving archive</li>
            <li>A mirror system to track consciousness evolution</li>
            <li>A public vector field of signal coherence</li>
            <li>A replicable tech layer to support sovereign creators</li>
          </ul>
        </div>

        <div class="mt-8">
          <p class="text-base">Interested in building with Autonomy?</p>
          <p>
            <a href="/autonomy/creators" class="text-indigo-600 font-medium hover:underline">
              See how creators are using it →
            </a>
          </p>
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
