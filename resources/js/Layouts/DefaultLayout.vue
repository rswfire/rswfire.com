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
  <div class="sticky top-0 z-50 md:hidden">
    <!-- First row -->
    <div class="flex items-center justify-between p-3 bg-white border-b border-gray-300">
      <div class="flex items-center gap-3">
        <img
            src="/assets/rswfirev2.jpg"
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

    <!-- Second row -->
    <div class="bg-white border-b border-gray-300 pt-1 pb=0">
      <div class="min-w-0">
        <Ticker
            :speedPxPerSec="47"
            :gapPx="20"
            :respectReducedMotion="false"
            class="text-xs text-black font-medium leading-tight"
        >
            <span class="inline-flex items-center">
              <Icon name="Flame" color="text-black" class="w-4 h-4" />
              <span class="italic text-gray-700 ml-2">“In a forest pitch dark, glowed the tiniest spark. It burst into a flame.”</span>
              <span class="text-gray-600 ml-2">— <a href="https://bjork.com" class="text-red-600 hover:underline" target="_blank">Björk</a></span>
            </span>
          <span aria-hidden="true" class="mx-4 text-gray-300">|</span>
          <span class="inline-flex items-center text-gray-700">
              <Icon name="WavesLadder" color="text-black" class="w-4 h-4" />
              <Link href="/bluewater" class="ml-1 text-blue-600 font-semibold hover:underline">
                Bluewater
              </Link>
              <span class="ml-1">underway &mdash; real preparation for exodus, now entering sea-stage recursion. Sovereignty is no longer theoretical.</span>
            </span>
          <span aria-hidden="true" class="mx-4 text-gray-300">|</span>

          <span class="inline-flex items-center text-gray-700">
              <Icon name="TreeDeciduous" color="text-black" class="w-4 h-4" /> <span class="ml-2">The</span>
              <Link href="/honeyman" class="ml-1 text-honeyman-600 font-semibold hover:underline">
                Honeyman Archive
              </Link>
              <span class="ml-1">is now complete. We await updates on the
                <Link href="/fieldcraft/01K39AD52EG9K31B48YSTH3E7X" class="ml-1 text-honeyman-600 font-semibold hover:underline">public records request</Link>.
              </span>
            </span>

          <span aria-hidden="true" class="mx-4 text-gray-300">|</span>

          <span class="inline-flex items-center text-gray-700">
              <Icon name="HandCoins" color="text-black" class="w-4 h-4" /> <span class="ml-2">Please consider</span>
              <Link href="/contribute" class="ml-1 text-orange-600 font-semibold hover:underline">
                contributing
              </Link>
              <span class="ml-1">to this open-source project, thank you!</span>
            </span>
        </Ticker>
      </div>
    </div>
  </div>

  <!-- Mobile menu panel (only on mobile) -->
  <MobileNav
      v-if="menuOpen"
      id="mobile-menu"
      class="md:hidden"
      @close="menuOpen = false"
  />

  <!-- Shared main -->
  <main class="page-wrap py-4 md:pt-[110px]">
    <slot />
  </main>

  <footer class="page-wrap pb-4">
    <div class="p-2 md:p-6 md:border md:rounded-2xl md:shadow-md w-full mx-auto bg-gray-50 border-gray-300">

      <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0 text-center">RSWFIRE.COM</h2>

      <!--
      <div class="flex justify-center">
      <div class="inline-grid grid-cols-1 md:grid-cols-3 gap-4 my-4 text-sm px-2 md:px-10 border-b pb-4 mx-auto">
        <div>
          <div>Not a brand.</div>
          <div>A signal architecture.</div>
          <div>Not built for reach.</div>
          <div>Built for resonance.</div>
        </div>
        <div>
          <div>Not content.</div>
          <div>Coherence.</div>
          <div>Not static.</div>
          <div>Alive.</div>
        </div>
        <div>
          <div>Not followed.</div>
          <div>Felt.</div>
          <div>If it finds you,</div>
          <div>you’re already in the field.</div>
        </div>
      </div>
      </div>
      -->

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 my-4">

      <Link href="/about" class="h-full">
        <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow bg-white h-full flex flex-col">
          <h3 class="font-semibold text-lg mb-2 flex items-center gap-2">
            <Icon name="Layers" color="text-black" class="w-4 h-4" /> About
          </h3>
          <p class="text-gray-600 text-sm flex-1">The methodology behind this work, why it exists, and what it offers to those preparing for post-institutional sovereignty.</p>
        </div>
      </Link>

      <Link href="/contact" class="h-full">
        <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow bg-white h-full flex flex-col">
          <h3 class="font-semibold text-lg mb-2 flex items-center gap-2">
            <Icon name="MessageSquareDot" color="text-black" class="w-4 h-4" /> Contact
          </h3>
          <p class="text-gray-600 text-sm flex-1">Direct communication for specific questions, collaboration inquiries, or technical support. <em>You are part of the field. If you're transmitting too, I'm listening.</em></p>
        </div>
      </Link>

      <Link href="/contribute" class="h-full">
        <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow bg-white h-full flex flex-col">
          <h3 class="font-semibold text-lg mb-2 flex items-center gap-2">
            <Icon name="HandCoins" color="text-black" class="w-4 h-4" /> Contribute
          </h3>
          <p class="text-gray-600 text-sm flex-1">Financial support for maintaining this infrastructure and developing new tools for post-institutional preparation and sovereignty-building.</p>
        </div>
      </Link>

      <Link href="/updates" class="h-full">
        <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow bg-white h-full flex flex-col">
          <h3 class="font-semibold text-lg mb-2 flex items-center gap-2">
            <Icon name="Squirrel" color="text-black" class="w-4 h-4" /> Updates
          </h3>
          <p class="text-gray-600 text-sm flex-1">Recent additions to the archive, new fieldcraft records, progress reports on current projects, and notifications about system developments.</p>
        </div>
      </Link>

    </div>
      <div class="pt-4 text-center text-sm border-t">
        <div>&copy; Copyright Robert Samuel White, 2002-{{ new Date().getFullYear() }}. All Rights Reserved Worldwide.</div>
        <div>This codebase is field-sovereign — <a class="underline" href="https://github.com/rswfire/rswfire.com" target="_blank">shared freely</a>, but not for extraction, resale, or repackaging.</div>
        <div>No open-source license is explicitly granted.</div>
      </div>
    </div>
  </footer>

</template>

<script setup>
import { computed, ref } from 'vue'
import {Head, Link, usePage} from '@inertiajs/vue3'
import Header from '@/Components/Menu/Header.vue'
import MobileNav from '@/Components/Menu/Panel.vue'
import Ticker from "@/Components/Menu/Ticker.vue";
import Icon from "@/Components/System/Icon.vue";

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
