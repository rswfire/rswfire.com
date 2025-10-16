<template>
    <div class="relative select-none">
        <!-- Scrollable rail wrapper (mobile-first) -->
        <div
            ref="scrollWrap"
            class="bg-gray-100 py-3 px-2 sm:px-0 hide-scrollbar"
            :class="isMobile ? 'overflow-x-auto' : 'overflow-x-hidden'"
        >
            <div
                ref="rail"
                class="relative h-1 bg-gray-300/70 rounded mx-0"
                :style="{ width: isMobile ? `${railWidth}px` : '100%' }"
            >
                <!-- ticks -->
                <button
                    v-for="(t, i) in ticks"
                    :key="t.ulid"
                    :data-index="i"
                    ref="tickEls"
                    class="group absolute -translate-x-1/2 -translate-y-1/2 top-1/2 outline-none"
                    :style="{ left: `${t.x}px` }"
                    @click="onTickClick(i, t)"
                    @mouseenter="onTickEnter(i)"
                    @focus="onTickEnter(i)"
                    :aria-label="t.title || t.ulid"
                >
                  <span
                      class="block rounded-full border transition will-change-transform group-hover:scale-105"
                      :class="t.ulid === activeUlid
                      ? 'h-5 w-5 bg-black border-black shadow-sm'   // filled active
                      : 'h-4 w-4 bg-white border-gray-400'          // normal
                    "
                      aria-hidden="true"
                  />
                </button>
            </div>
        </div>

        <!-- Mobile inline popover (tap) -->
        <transition name="fade">
            <div
                v-if="isMobile && mobileCard.visible && current"
                class="mt-2 px-2"
            >
                <div class="w-full rounded-xl overflow-hidden shadow-lg bg-white border border-gray-200">
                    <div class="relative">
                        <img
                            :src="current.thumbnail || fallbackThumb"
                            :alt="current.title || current.ulid"
                            class="w-full aspect-video object-cover"
                            loading="lazy"
                        />
                        <div class="absolute bottom-1 right-1 text-[10px] px-1.5 py-0.5 rounded bg-black/70 text-white">
                            {{ formatDuration(current.duration) }}
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="text-sm font-semibold line-clamp-2">{{ current.title || current.ulid }}</div>
                        <div class="text-[11px] text-gray-600">{{ formatDate(current.date) }}</div>
                        <div class="mt-2 flex justify-end gap-2">
                            <button class="text-xs px-2 py-1 rounded border" @click="mobileCard.visible = false">Close</button>
                            <button class="text-xs px-2 py-1 rounded bg-black text-white" @click="navigate(current)">Open</button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script setup>
import { computed, onMounted, onUnmounted, ref, watch } from "vue"
import { router } from "@inertiajs/vue3"
import tippy, { followCursor, createSingleton } from "tippy.js"
import "tippy.js/dist/tippy.css"
import "tippy.js/animations/shift-away-subtle.css"
import "tippy.js/themes/light-border.css"

const props = defineProps({
    // [{ ulid, title?, date, duration?, thumbnail?, url? }]
    items: { type: Array, default: () => [] },
    activeUlid: { type: String, default: "" },
    minGapPx: { type: Number, default: 18 },
    mobileScrollable: { type: Boolean, default: true }
})

/* responsive mode */
const isMobile = ref(false)
function setMode() { isMobile.value = window.matchMedia("(max-width: 640px)").matches }
onMounted(() => { setMode(); window.addEventListener("resize", setMode) })
onUnmounted(() => window.removeEventListener("resize", setMode))

/* measure + virtual width with min spacing */
const scrollWrap = ref(null)
const rail = ref(null)
const viewport = ref(0)
const railWidth = ref(0)

function measure() {
    const w = scrollWrap.value ? scrollWrap.value.clientWidth : 0
    if (isMobile.value) {
        const n = Math.max(1, normalized.value.length - 1)
        railWidth.value = Math.max(w, n * props.minGapPx + 32)
    } else {
        railWidth.value = w  // full width, no gap
    }
}
onMounted(() => { measure(); window.addEventListener("resize", measure) })
onUnmounted(() => window.removeEventListener("resize", measure))
watch([() => props.items, isMobile], () => nextTick().then(measure))

/* normalize + time scale */
const normalized = computed(() => {
    return (props.items || [])
        .filter(i => i && i.ulid && i.date)
        .map(i => ({
            ulid: String(i.ulid),
            title: i.title || "",
            date: new Date(i.date),
            duration: Number.isFinite(i.duration) ? i.duration : 0,
            thumbnail: i.thumbnail || "",
            url: i.url || `/transmission/${i.ulid}`
        }))
        .sort((a, b) => a.date - b.date)
})

const domain = computed(() => {
    const min = normalized.value[0]?.date?.getTime() ?? 0
    const max0 = normalized.value[normalized.value.length - 1]?.date?.getTime() ?? 1
    const max = max0 === min ? min + 1 : max0
    return { min, max }
})

const MOBILE_INNER_PAD = 16
const DESKTOP_INNER_PAD = 6  // tighter to edges
const innerPad = computed(() => (isMobile.value ? MOBILE_INNER_PAD : DESKTOP_INNER_PAD))
const rNormal = 8
const rActive = 10

const ticks = computed(() => {
    const span = domain.value.max - domain.value.min || 1
    const usable = Math.max(1, railWidth.value - innerPad.value * 2)

    return normalized.value.map(n => {
        const ratio = (n.date.getTime() - domain.value.min) / span
        const xRaw = innerPad.value + ratio * usable
        const isActive = n.ulid === props.activeUlid
        const r = isActive ? rActive : rNormal
        const x = Math.min(Math.max(xRaw, innerPad.value + r), railWidth.value - innerPad.value - r)
        return { ...n, x }
    })
})

/* center active on mount */
function centerActive() {
    if (!scrollWrap.value || !ticks.value.length) return
    const idx = ticks.value.findIndex(t => t.ulid === props.activeUlid)
    if (idx < 0) return
    const t = ticks.value[idx]
    const target = Math.max(0, t.x - scrollWrap.value.clientWidth / 2)
    scrollWrap.value.scrollTo({ left: target, behavior: "smooth" })
}
onMounted(centerActive)
watch(() => props.activeUlid, centerActive)

/* tippy (desktop only) */
const tickEls = ref([])
let instances = []
let singleton = null

function mountTippies() {
    // teardown
    instances.forEach(i => i.destroy())
    instances = []
    if (singleton) { singleton.destroy(); singleton = null }

    if (isMobile.value) return

    // build instances with explicit content()
    instances = (tickEls.value || [])
        .filter(Boolean)
        .map(el => {
            const i = Number(el.dataset.index || -1)
            return tippy(el, {
                content: tippyPayload(i),   // HTML string
                allowHTML: true,            // IMPORTANT
                maxWidth: 320,
                placement: "top",
                animation: "shift-away-subtle",
                theme: "light-border",
                appendTo: () => document.body,
                followCursor: "horizontal",
                plugins: [followCursor],
                offset: [0, 10],
                delay: [50, 0],
                interactive: false,
                zIndex: 60
            })
        })

    if (instances.length) {
        singleton = createSingleton(instances, {
            delay: 50,
            moveTransition: "transform 0.08s ease",
            allowHTML: true // ALSO IMPORTANT
        })
    }
}


onMounted(mountTippies)
watch([ticks, isMobile], () => requestAnimationFrame(mountTippies))

/* hover prefetch (desktop) */
function onTickEnter(i) {
    if (isMobile.value) return
    const t = ticks.value[i]
    if (!t || !t.thumbnail) return
    const img = new Image()
    img.decoding = "async"
    img.src = t.thumbnail
}

/* mobile popover state */
const mobileCard = ref({ visible: false, index: -1 })
const current = computed(() => (mobileCard.value.index >= 0 ? ticks.value[mobileCard.value.index] : null))

function onTickClick(i, t) {
    if (!isMobile.value) {
        navigate(t) // desktop: click opens directly
    } else {
        if (mobileCard.value.index === i && mobileCard.value.visible) {
            navigate(t) // second tap = open
        } else {
            mobileCard.value.index = i
            mobileCard.value.visible = true
            // ensure the selected tick is centered
            centerSpecific(t)
        }
    }
}

function centerSpecific(t) {
    if (!scrollWrap.value) return
    const target = Math.max(0, t.x - scrollWrap.value.clientWidth / 2)
    scrollWrap.value.scrollTo({ left: target, behavior: "smooth" })
}

/* payload for tippy */
function tippyPayload(i) {
    const t = ticks.value[i]; if (!t) return ""
    const dur = formatDuration(t.duration)
    const date = formatDate(t.date)
    const thumb = encodeURI(t.thumbnail || fallbackThumb)
    return `
    <div class="w-56 rounded-xl overflow-hidden bg-white shadow-lg border border-gray-200">
      <div class="relative">
        <img src="${thumb}" alt="${escapeHtml(t.title || t.ulid)}" class="w-full aspect-video object-cover" loading="lazy" />
        <div class="absolute bottom-1 right-1 text-[10px] px-1.5 py-0.5 rounded bg-black/70 text-white">${dur}</div>
      </div>
      <div class="p-2">
        <div class="text-xs font-semibold truncate">${escapeHtml(t.title || t.ulid)}</div>
        <div class="text-[11px] text-gray-600">${escapeHtml(date)}</div>
      </div>
    </div>
  `
}

/* nav */
function navigate(item) {
    router.visit(item.url)
}

/* utils */
const fallbackThumb =
    "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='800' height='450'><rect width='100%' height='100%' fill='%23f3f4f6'/></svg>"

function formatDuration(s) {
    const n = Math.max(0, Math.floor(Number(s) || 0))
    const m = Math.floor(n / 60)
    const sec = String(n % 60).padStart(2, "0")
    return `${m}:${sec}`
}
function formatDate(d) {
    const dt = d instanceof Date ? d : new Date(d)
    return dt.toLocaleDateString(undefined, { year: "numeric", month: "short", day: "numeric" })
}
function escapeHtml(s) {
    return String(s).replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;")
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity .12s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
.scrollbar-thin::-webkit-scrollbar { height: 6px; }
.scrollbar-thin::-webkit-scrollbar-thumb { background: rgba(0,0,0,.2); border-radius: 9999px; }
.hide-scrollbar {
    -ms-overflow-style: none;      /* IE/Edge */
    scrollbar-width: none;         /* Firefox */
}
.hide-scrollbar::-webkit-scrollbar {
    display: none;                 /* Chrome/Safari */
}
</style>
