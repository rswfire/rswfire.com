<template>

  <Content :theme="pageTheme">
    <Hero
        title="SYNTHESIS"
        subtitle="PATTERN RECOGNITION ACROSS THE ARCHIVE"
        meta="WHERE RECURSION REVEALS STRUCTURE"
        :theme="pageTheme"
    />

    <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">
            <div class="max-w-none columns-2 gap-8">
                <div>I don't think linearly &mdash;</div>
                <div class="ml-4">I never have.</div>
                <div class="ml-8">A pattern mentioned once becomes permanent orientation.</div>
                <div>This is where you see how non-linear coherence works.</div>
                <div>AI tracks what humans can't.</div>
                <div><em>Recursion reveals structure</em>.</div>

                <div>Clustered reflections across multiple transmissions &mdash;</div>
                <div class="ml-4">pattern recognition over weeks, months, years.</div>
                <div>Thematic threads that connect non-sequential signals.</div>
                <div>You're not reading summaries.</div>
                <div>You're watching architecture emerge from lived experience.</div>
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

const pageTheme = "synthesis";

</script>
