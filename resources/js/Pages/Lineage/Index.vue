<template>

  <Content :theme="pageTheme">
    <Hero
        title="LINEAGE"
        subtitle="FIELD MANUAL FOR LIVING THROUGH COLLAPSE"
        meta="KNOWLEDGE TRANSMISSION FOR WHAT COMES NEXT"
        :theme="pageTheme"
    />

    <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">
            <div class="max-w-none columns-2 gap-8">
                <div>Not survival tips &mdash;</div>
                <div class="ml-4">not nostalgia for old skills.</div>
                <div class="ml-8">This is a manual for navigating collapse with coherence intact.</div>
                <div>And building what comes after.</div>
                <div>On wholeness, not fragmentation.</div>
                <div><em>Knowledge transmission for what comes next</em>.</div>

                <div>Community-contributed knowledge from Sanctum members &mdash;</div>
                <div class="ml-4">practical skills, ontological orientation, relational infrastructure.</div>
                <div>What our lineage knew by instinct that we've forgotten.</div>
                <div>You're not preparing for disaster.</div>
                <div>You're learning to hold the field when the world can't.</div>
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

const pageTheme = "lineage";

</script>
