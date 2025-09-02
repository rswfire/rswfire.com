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
      <Link href="/" class="flex items-center gap-3">
        <img
            src="/assets/rswfirev3.jpg"
            alt="RSWFIRE"
            class="w-16 h-16 rounded-full border border-gray-300 shadow-sm"
        />
        <div class="flex items-center gap-2">
          <div class="flex flex-col justify-center">
            <Icon name="Flame" color="text-rswfire-600" class="w-6 h-6 flex-shrink-0"/>
          </div>
          <div class="flex flex-col justify-center">
            <div class="text-sm font-semibold">Robert Samuel White</div>
            <div class="text-xs font-mono text-gray-500 tracking-wide">rswfire.com</div>
          </div>
        </div>
      </Link>

      <button
          @click="menuOpen = true"
          class="flex items-center gap-2 px-4 py-2 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-red-50 hover:border-red-400 hover:text-red-600 transition"
          :aria-expanded="menuOpen ? 'true' : 'false'"
          aria-controls="mobile-menu"
          aria-label="Open menu"
      >
        <span class="text-lg">☰</span>
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
    <div class="p-2 pt-4 md:p-6 md:border md:rounded-2xl md:shadow-md w-full mx-auto bg-gray-50 border-gray-300">

      <div class="w-full flex justify-center"><Icon name="Flame" color="text-black" class="w-4 h-4" /></div>
      <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0 pb-4 text-center">RSWFIRE.COM</h2>

      <div class="flex flex-wrap justify-center pb-4 border-t">
        <Link
            v-for="item in items"
            :key="item.label"
            :href="item.url"
            class="inline-flex items-center justify-center rounded-full border hover:shadow-sm transition group relative z-10 hover:z-20"
            :class="[item.bg, item.hover]"
        >
          <Icon :name="item.icon" :class="['w-3 h-3 flex-shrink-0', item.color]" />
          <span class="hidden group-hover:inline ml-1">{{ item.label }}</span>
        </Link>
      </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 my-4 pb-4">

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
          <p class="text-gray-600 text-sm flex-1">Direct contact for questions, collaboration inquiries, or technical support. <em>You are part of the field. If you're transmitting too, I'm listening.</em></p>
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
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4 pt-4 border-y border-gray-200 pb-6">

        <!-- Field Column -->
        <div class="space-y-2">
          <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 ml-4">Field</h4>
          <Link
              v-for="item in itemsField"
              :key="item.label"
              :href="item.url"
              class="flex items-center gap-2 px-3 py-2 rounded-r-lg border-l-4 transition-all hover:shadow-sm"
              :class="[item.bg, item.border, item.hover]"
          >
            <Icon :name="item.icon" :class="['w-4 h-4', item.color]" />
            <span class="text-sm">{{ item.label }}</span>
          </Link>
        </div>

        <!-- Signal Column -->
        <div class="space-y-2">
          <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 ml-4">Signal</h4>
          <Link
              v-for="item in itemsSignal"
              :key="item.label"
              :href="item.url"
              class="flex items-center gap-2 px-3 py-2 rounded-r-lg border-l-4 transition-all hover:shadow-sm"
              :class="[item.bg, item.border, item.hover]"
          >
            <Icon :name="item.icon" :class="['w-4 h-4', item.color]" />
            <span class="text-sm">{{ item.label }}</span>
          </Link>
        </div>

        <!-- Archive Column -->
        <div class="space-y-2">
          <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 ml-4">Reference</h4>
          <Link
              v-for="item in itemsReference"
              :key="item.label"
              :href="item.url"
              class="flex items-center gap-2 px-3 py-2 rounded-r-lg border-l-4 transition-all hover:shadow-sm"
              :class="[item.bg, item.border, item.hover]"
          >
            <Icon :name="item.icon" :class="['w-4 h-4', item.color]" />
            <span class="text-sm">{{ item.label }}</span>
          </Link>
        </div>

      </div>
      <div class="pt-4 text-center text-sm border-t">
        <div>&copy; Copyright <strong>Robert Samuel White</strong>, 2002-{{ new Date().getFullYear() }}. <br class="md:hidden"/><em>All Rights Reserved Worldwide</em>.</div>
        <div class="pt-1">This codebase is field-sovereign &mdash; <a class="underline" href="https://github.com/rswfire/rswfire.com" target="_blank">shared freely</a> &mdash; <br class="md:hidden"/>but not for extraction, resale, or repackaging.</div>
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

const itemsField = [
  { label: "Home",      icon: "Radar",       color: "text-stone-400", bg: "bg-stone-100", border: "border-stone-300",    hover: "hover:bg-stone-200",  url: "/" },
  { label: "Who I Am",  icon: "Flame",       color: "text-red-400",    bg: "bg-red-50",    border: "border-red-200",    hover: "hover:bg-red-100",     url: "/hello" },
  { label: "What I Do", icon: "Hammer",      color: "text-purple-400", bg: "bg-purple-50", border: "border-purple-200", hover: "hover:bg-purple-100",  url: "/tech" },
  { label: "Myth",      icon: "ShieldCheck", color: "text-yellow-400", bg: "bg-yellow-50", border: "border-yellow-200",  hover: "hover:bg-yellow-100", url: "/myth" },
]

const itemsSignal = [
  { label: "Fieldcraft",    icon: "Map",           color: "text-teal-400",   bg: "bg-teal-50",   border: "border-teal-200",   hover: "hover:bg-teal-100",   url: "/fieldcraft" },
  { label: "Transmissions", icon: "SatelliteDish", color: "text-pink-400",   bg: "bg-pink-50",   border: "border-pink-200",   hover: "hover:bg-pink-100",   url: "/transmission" },
  { label: "Signals",       icon: "Activity",      color: "text-sky-400",    bg: "bg-sky-50",    border: "border-sky-200",    hover: "hover:bg-sky-100",    url: "/signal" },
  { label: "Sanctuary",     icon: "Sprout",        color: "text-indigo-400", bg: "bg-indigo-50", border: "border-indigo-200", hover: "hover:bg-indigo-100", url: "/sanctuary" },
]

const itemsReference = [
  { label: "Codex",     icon: "SquareCode", color: "text-amber-400",  bg: "bg-amber-50",  border: "border-amber-200",  hover: "hover:bg-amber-100",  url: "/codex" },
  { label: "Bluewater",            icon: "WavesLadder",   color: "text-blue-400",  bg: "bg-blue-50",  border: "border-blue-200",  hover: "hover:bg-blue-100",  url: "/bluewater" },
  { label: "Honeyman", icon: "TreeDeciduous", color: "text-emerald-400", bg: "bg-emerald-50", border: "border-emerald-200", hover: "hover:bg-emerald-100", url: "/honeyman" },
  { label: "Lexicon",  icon: "SquareLibrary", color: "text-orange-400",  bg: "bg-orange-50",  border: "border-orange-200",  hover: "hover:bg-orange-100",  url: "/lexicon" },
]

</script>

<style>
.page-wrap {
  @apply max-w-6xl mx-auto px-0 sm:px-6;
}

/* optional but nice: smooth native anchor jumps sitewide */
html { scroll-behavior: smooth; }
</style>
