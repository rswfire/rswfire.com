<template>
  <Head>
    <title>{{ metaTitle }}</title>
    <meta name="description" :content="metaDescription" />
    <meta property="og:title" :content="metaTitle" />
    <meta property="og:description" :content="metaDescription" />
    <meta property="og:url" :content="metaUrl" />
  </Head>

  <!-- Desktop header (fixed; md+) -->
  <Header :authUser="authUser" class="hidden md:block" />

  <!-- Mobile top bar (sticky; <md) -->
  <div
      class="flex items-center justify-between p-3 sticky top-0 z-50 bg-white border-b border-gray-300 md:hidden"
  >
    <div class="flex items-center gap-3">
      <img
          src="/assets/rswfire.jpg"
          alt="RSWFIRE"
          class="w-16 h-16 rounded-full border border-gray-800 shadow-sm"
      />
      <div class="flex flex-col">
        <div class="text-sm font-semibold tracking-wide text-gray-800">RSWFIRE 🔥</div>
        <div class="text-xs text-gray-800 uppercase">ROBERT SAMUEL WHITE</div>
      </div>
    </div>

    <button
        @click="menuOpen = true"
        class="flex items-center gap-2 px-4 py-2 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-red-50 hover:border-red-400 hover:text-red-600 transition"
        :aria-expanded="menuOpen ? 'true' : 'false'"
        aria-controls="mobile-menu"
        aria-label="Open menu"
    >
      <span class="text-lg">☰</span>
      <span class="text-sm font-semibold uppercase tracking-wide">Menu</span>
    </button>
  </div>

  <!-- Mobile menu panel (only on mobile) -->
  <MobileNav
      v-if="menuOpen"
      id="mobile-menu"
      class="md:hidden"
      @close="menuOpen = false"
  />

  <!-- Shared main -->
  <main class="page-wrap py-4 md:pt-[125px]">
    <slot />
  </main>

</template>

<script setup>
import { computed, ref } from 'vue'
import { Head, usePage } from '@inertiajs/vue3'
import Header from '@/Components/Menu/Header.vue'
import MobileNav from '@/Components/Menu/Panel.vue'

defineProps(['metaTitle', 'metaDescription', 'metaKeywords', 'metaUrl'])

const page = usePage()
const authUser = computed(() => page.props.auth?.user)
const menuOpen = ref(false)
</script>

<style>
.page-wrap {
  @apply max-w-6xl mx-auto px-0 sm:px-6;
}

/* optional but nice: smooth native anchor jumps sitewide */
html { scroll-behavior: smooth; }
</style>
