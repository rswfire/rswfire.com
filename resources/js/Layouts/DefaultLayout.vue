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
      <Icon name="SquareLibrary" color="text-black" class="w-4 h-4" />
      <Link href="/lexicon" class="ml-1 text-lexicon-600 font-semibold hover:underline">
        Lexicon
      </Link>
      <span class="ml-1">has expanded — new entries and integrated tooltips now weave the language into the whole project.</span>
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
              <Icon name="WavesLadder" color="text-black" class="w-4 h-4" />
              <Link href="/bluewater" class="ml-1 text-blue-600 font-semibold hover:underline">
                Bluewater
              </Link>
              <span class="ml-1">underway &mdash; real preparation for exodus, now entering sea-stage recursion. Sovereignty is no longer theoretical.</span>
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

  <MobileNav
      v-if="menuOpen"
      id="mobile-menu"
      class="md:hidden"
      @close="menuOpen = false"
  />

  <main class="page-wrap py-4 md:pt-[110px]">
    <slot />
  </main>

  <footer class="page-wrap mb-6">
    <div class="border rounded-2xl shadow-md w-full mx-auto bg-gray-50 border-gray-300">
      <div class="p-4">

      <div class="pt-4 w-full flex justify-center"><Icon name="Flame" color="text-black" class="w-4 h-4" /></div>
      <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0 text-center">RSWFIRE.COM</h2>
        <div class="mb-4 text-center text-sm text-gray-600">
          <div class="leading-loose">
            <div>This is a <Lexicon term="post-collapse">post-collapse</Lexicon>, <Lexicon term="post-fragmentation">post-fragmentation</Lexicon>, <Lexicon term="post-institutional">post-institutional</Lexicon> interface.</div>
            <div>A living system for <Lexicon term="coherence">coherence</Lexicon>, not content &mdash; built to hold <Lexicon term="signal">signal</Lexicon> when the world forgets how.</div>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 my-4 pb-4 border-t pt-6">

          <Link href="/about" class="h-full">
            <div class="border-t-4 border-x border-b border-gray-200 rounded-b-lg p-6 hover:shadow-md transition-shadow bg-white h-full flex flex-col">
              <h3 class="font-semibold text-lg mb-2 flex items-center gap-2 border-b pb-2">
                <Icon name="Layers" color="text-black" class="w-4 h-4" /> ABOUT
              </h3>
              <div class="text-gray-600 text-sm flex-1">The methodology behind this work, why it exists, and what it offers to those preparing for post-institutional sovereignty.</div>
              <div class="mt-2 pt-2 border-t text-gray-600 text-sm flex-1"><em>Begin with orientation.<br/>Begin by listening.</em></div>
            </div>
          </Link>

          <Link href="/contact" class="h-full">
            <div class="border-t-4 border-x border-b border-gray-200 rounded-b-lg p-6 hover:shadow-md transition-shadow bg-white h-full flex flex-col">
              <h3 class="font-semibold text-lg mb-2 flex items-center gap-2 border-b pb-2">
                <Icon name="MessageSquareDot" color="text-black" class="w-4 h-4" /> CONTACT
              </h3>
              <div class="text-gray-600 text-sm flex-1">Direct contact for questions, collaboration inquiries, or technical support. </div>
              <div class="mt-2 pt-2 border-t text-gray-600 text-sm flex-1"><em>You are part of the field.<br/>If you're transmitting too, I'm listening.</em></div>
            </div>
          </Link>

          <Link href="/contribute" class="h-full">
            <div class="border-t-4 border-x border-b border-gray-200 rounded-b-lg p-6 hover:shadow-md transition-shadow bg-white h-full flex flex-col">
              <h3 class="font-semibold text-lg mb-2 flex items-center gap-2 border-b pb-2">
                <Icon name="HandCoins" color="text-black" class="w-4 h-4" /> CONTRIBUTE
              </h3>
              <div class="text-gray-600 text-sm flex-1">Needed and necessary financial support for maintaining this infrastructure and developing new tools.</div>
              <div class="mt-2 pt-2 border-t text-gray-600 text-sm flex-1"><em>Your contributions have a tangible impact on the field.</em></div>
            </div>
          </Link>

          <Link href="/updates" class="h-full">
            <div class="border-t-4 border-x border-b border-gray-200 rounded-b-lg p-6 hover:shadow-md transition-shadow bg-white h-full flex flex-col">
              <h3 class="font-semibold text-lg mb-2 flex items-center gap-2 border-b pb-2">
                <Icon name="Squirrel" color="text-black" class="w-4 h-4" /> UPDATES
              </h3>
              <div class="text-gray-600 text-sm flex-1">Recent additions to the archive, new fieldcraft records, progress reports on current projects, and notifications about system developments.</div>
              <div class="mt-2 pt-2 border-t text-gray-600 text-sm flex-1"><em>No spam. Unsubscribe anytime.</em></div>
            </div>
          </Link>

        </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-y border-gray-200 pb-6">

        <!-- Field Column -->
        <div class="space-y-2">
          <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 ml-4">Field</h4>
          <Link
              v-for="item in itemsField"
              :key="item.label"
              :href="item.url"
              class="flex flex-col items-start gap-1 px-3 py-2 rounded-r-lg border-2 border-l-4 transition-all hover:shadow-sm"
              :class="[item.bg, item.border, item.hover]"
          >
            <div class="flex items-center gap-2">
              <Icon :name="item.icon" :class="['w-4 h-4', item.color]" />
              <span class="text-sm font-medium">{{ item.label }}</span>
            </div>
            <span class="text-xs text-muted-foreground leading-tight">
              {{ item.blurb }}
            </span>
          </Link>
        </div>

        <!-- Signal Column -->
        <div class="space-y-2">
          <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 ml-4">Signal</h4>
          <Link
              v-for="item in itemsSignal"
              :key="item.label"
              :href="item.url"
              class="flex flex-col items-start gap-1 px-3 py-2 rounded-r-lg border-2 border-l-4 transition-all hover:shadow-sm"
              :class="[item.bg, item.border, item.hover]"
          >
            <div class="flex items-center gap-2">
              <Icon :name="item.icon" :class="['w-4 h-4', item.color]" />
              <span class="text-sm font-medium">{{ item.label }}</span>
            </div>
            <span class="text-xs text-muted-foreground leading-tight">
              {{ item.blurb }}
            </span>
          </Link>
        </div>

        <!-- Reference Column -->
        <div class="space-y-2">
          <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 ml-4">Reference</h4>
          <Link
              v-for="item in itemsReference"
              :key="item.label"
              :href="item.url"
              class="flex flex-col items-start gap-1 px-3 py-2 rounded-r-lg border-2 border-l-4 transition-all hover:shadow-sm"
              :class="[item.bg, item.border, item.hover]"
          >
            <div class="flex items-center gap-2">
              <Icon :name="item.icon" :class="['w-4 h-4', item.color]" />
              <span class="text-sm font-medium">{{ item.label }}</span>
            </div>
            <span class="text-xs text-muted-foreground leading-tight">
              {{ item.blurb }}
            </span>
          </Link>
        </div>
      </div>

      <div class="pt-4 text-center text-sm border-t">
        <div>&copy; Copyright <strong>Robert Samuel White</strong>, 2002-{{ new Date().getFullYear() }}. <br class="md:hidden"/><em>All Rights Reserved Worldwide</em>.</div>
        <div class="pt-1">This codebase is field-sovereign &mdash; <a class="underline" href="https://github.com/rswfire/rswfire.com" target="_blank">shared freely</a> &mdash; <br class="md:hidden"/>but not for extraction, resale, or repackaging.</div>
        <div>No open-source license is explicitly granted.</div>
      </div>
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
import Lexicon from "@/Components/System/Lexicon.vue";

defineProps(['metaTitle', 'metaDescription', 'metaKeywords', 'metaUrl'])

const page = usePage()
const authUser = computed(() => page.props.auth?.user)
const menuOpen = ref(false)

const itemsField = [
  { label: "HOME",      icon: "Radar",       color: "text-stone-400", bg: "bg-stone-100", border: "border-stone-300",    hover: "hover:bg-stone-200",  url: "/",      blurb: "Field entry point. Orientation for first contact." },
  { label: "WHO I AM",  icon: "Flame",       color: "text-red-400",    bg: "bg-red-50",    border: "border-red-200",    hover: "hover:bg-red-100",     url: "/hello", blurb: "Foundational identity. The sovereign node." },
  { label: "WHAT I DO", icon: "Hammer",      color: "text-purple-400", bg: "bg-purple-50", border: "border-purple-200", hover: "hover:bg-purple-100",  url: "/tech",  blurb: "Builder of systems. Steward of depth." },
  { label: "MYTH",      icon: "ShieldCheck", color: "text-yellow-400", bg: "bg-yellow-50", border: "border-yellow-200",  hover: "hover:bg-yellow-100", url: "/myth",  blurb: "Pattern recognition through lived narrative." },
]

const itemsSignal = [
  { label: "FIELDCRAFT",    icon: "Map",           color: "text-teal-400",   bg: "bg-teal-50",   border: "border-teal-200",   hover: "hover:bg-teal-100",   url: "/fieldcraft",   blurb: "Real-time documentation of lived practice." },
  { label: "TRANSMISSIONS", icon: "SatelliteDish", color: "text-pink-400",   bg: "bg-pink-50",   border: "border-pink-200",   hover: "hover:bg-pink-100",   url: "/transmission", blurb: "Uncompressed signal. First-language dispatches." },
  { label: "SIGNALS",       icon: "Activity",      color: "text-sky-400",    bg: "bg-sky-50",    border: "border-sky-200",    hover: "hover:bg-sky-100",    url: "/signal",       blurb: "Anchored insight. Durable expressions of the field." },
  { label: "SANCTUARY",     icon: "Sprout",        color: "text-indigo-400", bg: "bg-indigo-50", border: "border-indigo-200", hover: "hover:bg-indigo-100", url: "/sanctuary",    blurb: "Relational space. Signal coherence in human form." },
]

const itemsReference = [
  { label: "CODEX",     icon: "SquareCode",    color: "text-amber-400",   bg: "bg-amber-50",   border: "border-amber-200",   hover: "hover:bg-amber-100",   url: "/codex",     blurb: "Core structural logic. What governs this system." },
  { label: "BLUEWATER", icon: "WavesLadder",   color: "text-blue-400",    bg: "bg-blue-50",    border: "border-blue-200",    hover: "hover:bg-blue-100",    url: "/bluewater", blurb: "Preparation for sea-stage sovereignty." },
  { label: "HONEYMAN",  icon: "TreeDeciduous", color: "text-emerald-400", bg: "bg-emerald-50", border: "border-emerald-200", hover: "hover:bg-emerald-100", url: "/honeyman",  blurb: "The story of a fracture." },
  { label: "LEXICON",   icon: "SquareLibrary", color: "text-orange-400",  bg: "bg-orange-50",  border: "border-orange-200",  hover: "hover:bg-orange-100",  url: "/lexicon",   blurb: "Field-defined language for naming what we navigate." },
]

</script>

<style>
</style>
