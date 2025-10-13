<template>
  <Content :theme="pageTheme">
    <Hero
        :title="transmission.signal_ulid || 'Untitled Transmission'"
        :subtitle="formatDate(transmission?.stamp_created) || 'NULL'"
        meta="TRANSMISSION"
        :theme="pageTheme"
        align="center"
    />


    <div class="mt-6">
      <Link
          href="/transmission"
          class="inline-flex items-center gap-1 text-[11px] uppercase tracking-wide text-gray-500 hover:text-black"
      >
        ← Return to Archive
      </Link>
    </div>


    <div class="mt-2 border border-gray-200 shadow-sm rounded-md overflow-hidden bg-gray-100">
      <div class="px-4 pb-2">
          <div class="grid gap-3 grid-cols-2 sm:grid-cols-[auto,1fr,auto] sm:gap-4 sm:items-stretch">

            <div
                class="col-span-2 sm:col-span-1
             order-1 sm:order-2"
            >
              <div class="rounded-md overflow-hidden bg-white border">
                <div :class="playerClass">
                  <YoutubePlayer
                      :video-id="transmission.signal_metadata.youtube.id"
                      :is-portrait="effectiveIsPortrait"
                  />
                </div>
              </div>
            </div>

            <div
                v-if="previous"
                class="col-span-1 w-full sm:w-40
             order-2 sm:order-1
             sm:h-full sm:flex sm:items-center"
            >
              <Link :href="`/transmission/${previous.signal_ulid}`" class="block group w-full">
                <div class="rounded-md overflow-hidden shadow-sm bg-white hover:shadow-md transition">
                  <img :src="previous.signal_metadata?.youtube?.thumbnail" alt="Previous thumbnail"
                       class="w-full aspect-video object-cover" loading="lazy" />
                  <div class="px-2 py-1 text-[10px] sm:text-xs text-gray-600 group-hover:text-black">← Previous</div>
                </div>
              </Link>
            </div>
            <div v-else class="col-span-1 w-full sm:w-40 order-2 sm:order-1"></div>

            <div
                v-if="next"
                class="col-span-1 w-full sm:w-40
             order-3 sm:order-3
             sm:h-full sm:flex sm:items-center sm:justify-end"
            >
              <Link :href="`/transmission/${next.signal_ulid}`" class="block group w-full">
                <div class="rounded-md overflow-hidden shadow-sm bg-white hover:shadow-md transition">
                  <img :src="next.signal_metadata?.youtube?.thumbnail" alt="Next thumbnail"
                       class="w-full aspect-video object-cover" />
                  <div class="px-2 py-1 text-[10px] sm:text-xs text-right text-gray-600 group-hover:text-black">Next →</div>
                </div>
              </Link>
            </div>
            <div v-else class="col-span-1 w-full sm:w-40 order-3 sm:order-3"></div>
          </div>
        </div>

      <div class="px-4 pb-3">
        <TimelineFilmstrip
            :items="timelineItems"
            :active-ulid="transmission.signal_ulid"
            :mobile-scrollable="true"
        />
      </div>
    </div>

    <div class="flex justify-end mt-6">
      <div class="flex gap-2 items-center text-sm text-gray-600">
        <span class="uppercase tracking-wider text-xs font-semibold">Share</span>
        <template v-for="link in shareLinks" :key="link.name">
          <button
              v-if="!link.href"
              @click="link.action"
              class="flex items-center gap-1 px-2 py-1 bg-gray-100 rounded hover:bg-gray-200 transition"
          >
            <Icon :name="link.icon" class="w-[16px] h-[16px] text-gray-500" />
            {{ link.name }}
          </button>
          <a
              v-else
              :href="link.href"
              target="_blank"
              rel="noopener"
              class="flex items-center gap-1 px-2 py-1 bg-gray-100 rounded hover:bg-gray-200 transition"
          >
            <Icon :name="link.icon" class="w-[16px] h-[16px] text-gray-500" />
            {{ link.name }}
          </a>
        </template>
      </div>
    </div>

    <div class="mt-10 px-4">
      <div class="flex justify-start space-x-4 border-b border-gray-200">

        <button
            v-for="tab in mainTabs"
            :key="tab.key"
            @click="activeMainTab = tab.key"
            class="group relative pb-3 -mb-px flex items-center gap-2 px-4 text-md font-semibold transition-colors"
            :class="[
              activeMainTab === tab.key
                ? 'text-black'
                : 'text-gray-400 hover:text-black'
            ]"
        >
          <Icon :name="tab.icon" :color="activeMainTab === tab.key ? tab.color : 'text-gray-300'" class="w-[24px] h-[24px]" />
          <span>{{ tab.label }}</span>

          <span
              v-if="activeMainTab === tab.key"
              class="absolute bottom-0 left-0 w-full h-[2px] rounded"
              :class="tab.background"
          />
        </button>

      </div>

      <div class="mt-4">
        <EntryRecordTab
            v-if="activeMainTab === 'Transmission'"
            :transmission="transmission"
            :reflection="reflection"
            :parsed-transcript="parsedTranscript"
            :format-time="formatTime"
            :to-list-array="toListArray"
        />


        <EntrySanctumTab
            v-else-if="activeMainTab === 'Sanctum'"
        />
      </div>
    </div>
  </Content>
</template>

<script setup>
import { router, Link } from "@inertiajs/vue3"
import Content from "@/Components/System/Content.vue"
import EntryRecordTab from "./EntryRecordTab.vue"
import EntrySanctumTab from "@/Pages/Transmission/EntrySanctumTab.vue";
import Hero from "@/Components/System/Hero.vue"
import TimelineFilmstrip from "@/Components/System/TimelineFilmstrip.vue"
import YoutubePlayer from "@/Components/System/YoutubePlayer.vue"
import MarkdownIt from "markdown-it"
import { computed, ref, watchEffect } from "vue"
import Icon from "@/Components/System/Icon.vue";

const props = defineProps({
    transmission: Object,
    previous: Object,
    next: Object,
    reflection: Object,
    isPortrait: Boolean,
    timeline: Object,
})

const mainTabs = [
  {
    key: "Transmission",
    label: "Transmission",
    icon: "SatelliteDish",
    color: "text-pink-400",
    background: "bg-pink-400",
  },
  {
    key: "Sanctum",
    label: "Sanctum",
    icon: "Sprout",
    color: "text-indigo-400",
    background: "bg-indigo-400",
  }
];

const activeMainTab = ref("Transmission")

const url = ref(window.location.href)

const shareLinks = [
  { name: 'Copy Link', icon: 'Link2', action: () => navigator.clipboard.writeText(url.value) },
]

const timelineItems = computed(() => {
    // Trust the API’s shape; fall back gracefully
    const items = Array.isArray(props.timeline?.items) ? props.timeline.items : []
    return items.map(i => ({
        ulid: i.ulid,
        title: i.title || i.ulid,
        date: i.date,
        duration: i.duration ?? 0,
        thumbnail: i.thumbnail || props.transmission?.signal_metadata?.youtube?.thumbnail || ""
    }))
})

/**
 * Derived flags / id
 */
const flags = computed(() => props.transmission?.signal_metadata?.flags ?? {})
const youtubeId = computed(() => props.transmission?.signal_metadata?.youtube?.id ?? "")
const isPortraitFromSignal = computed(() => {
    // data shape uses "is_portrait-view"
    const f = flags.value
    if (typeof f["is_portrait-view"] === "boolean") return f["is_portrait-view"]
    if (typeof f["is_portrait-view"] === "number") return f["is_portrait-view"] === 1
    return undefined
})

const flagPortrait = computed(() => {
    const f = flags.value
    // accept either flag the API may emit
    if (typeof f["is_portrait"] === "boolean") return f["is_portrait"]
    if (typeof f["is_portrait"] === "number") return f["is_portrait"] === 1
    if (typeof f["is_portrait-view"] === "boolean") return f["is_portrait-view"]
    if (typeof f["is_portrait-view"] === "number") return f["is_portrait-view"] === 1
    return undefined
})

const effectiveIsPortrait = computed(() => {
    // precedence: explicit prop -> flags -> false
    return (flagPortrait.value ?? false)
})

const playerClass = computed(() =>
    effectiveIsPortrait.value
        ? "relative aspect-[9/16] w-full max-w-[300px] sm:max-w-[340px] md:max-w-[380px] mx-auto"
        : "relative aspect-video w-full max-w-[820px] mx-auto"
)

const containerClass = computed(() =>
    effectiveIsPortrait.value
        ? "relative aspect-[9/16] w-full max-w-sm mx-auto"
        : "relative aspect-video w-full"
)

/**
 * Markdown setup
 * We permit markdown HTML but strip scripts / inline handlers as a minimal sanitizer.
 */
const md = new MarkdownIt({
    html: true,
    breaks: true,
    linkify: true
})

function stripUnsafe(html = "") {
    if (typeof html !== "string" || html.length === 0) return ""

    const container = document.createElement("div")
    container.innerHTML = html

    // Remove dangerous nodes
    container.querySelectorAll("script, iframe, object, embed").forEach((el) => el.remove())

    // Strip inline event handlers (onclick, onload, etc.)
    container.querySelectorAll("*").forEach((el) => {
        // Copy to array because NamedNodeMap isn't a real array
        Array.from(el.attributes).forEach((attr) => {
            if (/^on/i.test(attr.name)) {
                el.removeAttribute(attr.name)
            }
        })
    })

    return container.innerHTML
}

function renderMarkdown(input) {
const raw = md.render(input || "")
return stripUnsafe(raw)
}

/**
* Tabs: choose first available pane based on available data
*/
const tabs = ["Surface", "Ontological", "Structural"]
const active = ref("Surface")

const hasSurface = computed(() => !!props.reflection?.surface?.reflection_content)
const hasOntological = computed(() => !!props.reflection?.narrative?.reflection_content)
const hasStructural = computed(() => !!props.transmission)

const availableTabs = computed(() => {
const t = []
if (hasSurface.value) t.push("Surface")
if (hasOntological.value) t.push("Ontological")
if (hasStructural.value) t.push("Structural")
return t
})

// ensure active is always valid
watchEffect(() => {
if (!availableTabs.value.includes(active.value)) {
active.value = availableTabs.value[0] ?? "Structural"
}
})

/**
* Description / Tags
*/
const htmlDescription = computed(() => {
const input = props.transmission?.signal_description || ""
return renderMarkdown(input)
})

const parsedTags = computed(() => {
try {
const raw = props.transmission?.signal_tags
const parsed = Array.isArray(raw)
? raw
: typeof raw === "string"
? JSON.parse(raw)
: []

return parsed
.filter(tag => typeof tag === "string")
.sort((a, b) => a.localeCompare(b))
.map(tag => tag.toUpperCase())
} catch {
return []
}
})

/**
* Transcript
*/
const parsedTranscript = computed(() => {
try {
const payload = props.transmission?.signal_payload
if (!payload || typeof payload !== "object") return []
const arr = payload["timed-transcript"]
return Array.isArray(arr) ? arr : []
} catch {
return []
}
})

/**
* Formatting
*/
const formatTime = seconds => {
const mins = Math.floor((Number(seconds) || 0) / 60)
const secs = Math.floor((Number(seconds) || 0) % 60)
return `${mins}:${secs.toString().padStart(2, "0")}`
}

const formatDate = str => {
if (!str) return ""
const date = new Date(str)
if (Number.isNaN(date.getTime())) return ""
return date.toLocaleDateString(undefined, {
year: "numeric",
month: "long",
day: "numeric"
}).toUpperCase()
}

const goTo = path => {
router.visit(`/${path}`)
}

/**
* Bullet list helper from newline text
*/
function toListArray(raw, bullet = true) {
if (!raw || typeof raw !== "string") return []
return raw
.split("\n")
.map(line => {
const cleaned = line.trim()
return bullet ? cleaned.replace(/^[-•*]+\s*/, "") : cleaned
})
.filter(Boolean)
}

/**
* Page theme
*/
const pageTheme = "transmissions"
</script>
