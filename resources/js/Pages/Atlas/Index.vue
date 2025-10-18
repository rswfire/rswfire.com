<template>

  <Content :theme="pageTheme">
    <Hero
        title="ATLAS"
        subtitle="GEO-TEMPORAL NAVIGATION THROUGH TIME AND PLACE"
        meta="UNDER CONSTRUCTION"
        :theme="pageTheme"
    />

    <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

      <section id="introduction">
        <div class="my-8 prose prose-neutral max-full mx-auto">

            <div class="mt-4">Coming Soon!</div>
            <div>Subscribe to <Link href="/updates" class="underline">Updates</Link> to find out when it launches.</div>

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
