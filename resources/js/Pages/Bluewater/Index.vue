<template>

  <Content theme="bluewater">
    <Hero
        title="BLUEWATER"
        subtitle="FROM RVLIFE TO OCEAN LIFE"
        meta="THE NEXT CHAPTER STARTS HERE"
    />

    <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

  <section id="bluewater-introduction">
    <div class="my-8 prose prose-neutral max-full mx-auto">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 items-start md:items-baseline">
        <div>
          <h2 class="text-2xl font-semibold">BLUEWATER</h2>
          <div class="italic text-gray-600">THE NEXT CHAPTER</div>
        </div>
        <div class="md:justify-self-end">
          <button
              @click="onCopy('hr-1')"
              class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-gray-50"
              aria-label="Copy Section link"
          >
            <Icon name="Link2" color="text-blue-600" class="w-4 h-4" /> Copy Section Link
          </button>
          <div v-if="justCopied" class="text-sm text-blue-700 text-center">Copied ✓</div>
        </div>
      </div>

      <div class="mt-4">This is the next chapter.</div>

      <div class="mt-4">The archive is complete. The land has held me. Now the ocean calls.</div>

      <div class="mt-4">Bluewater is not a brand, not a blog, not a performance. It is the unfolding record of an apprenticeship &mdash; one life turning itself toward the sea.</div>

      <div class="mt-4">Here you will find fragments, notations, and waypoints:</div>
      <ul class="mt-4 list-disc list-outside ml-8 space-y-2">
        <li>Notes on lighthouses seen from the water, not the parking lot.</li>
        <li>Experiments in self-sufficiency: solar, watermaking, fishing, navigation.</li>

        <li>Reflections on sovereignty in motion &mdash; what it means to carry a life whole into saltwater space.</li>

        <li>Preparations for passages, short and long. Oregon coast. Hawaii. Beyond.</li>
      </ul>
      <div class="mt-4">This page will hold the shape of transition: from land-based witness to ocean-based apprentice.</div>

      <div class="mt-4">The ocean does not ask for productivity or performance. It asks for presence, patience, and courage.</div>

      <div class="mt-4">To step onto bluewater is to accept apprenticeship to something older, vaster, and more coherent than the systems now collapsing on shore.</div>

      <div class="mt-4">This is where my one life turns outward. This is where it counts.</div>

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
</script>
