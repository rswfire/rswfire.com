<template>
  <Teleport to="body">
    <!-- FAB (mobile) stays the same ... -->

    <!-- Desktop rail (anchored to content column's right edge) -->
    <div
        v-show="showFab"
        class="hidden md:block fixed z-40"
        :style="railStyle"
    >
    <div :class="['transition-all duration-200', railOpen ? 'opacity-90' : 'opacity-70']">
      <div v-if="!railOpen" class="flex justify-end">
        <button
            @click="railOpen = true"
            class="shadow-md rounded-full px-3 py-2 bg-white/90 backdrop-blur border border-gray-300 text-xs uppercase tracking-wide hover:bg-white focus:outline-none focus:ring-2 focus:ring-honeyman-400"
            aria-label="Open table of contents"
        >
          TOC
        </button>
      </div>

      <aside
          v-else
          class="w-[280px] max-h-[70vh] overflow-auto shadow-xl rounded-2xl bg-white/90 backdrop-blur border border-gray-200 p-3"
          role="complementary"
          aria-label="Table of contents"
      >
        <div class="flex items-center justify-between mb-2">
          <div class="text-xs font-semibold tracking-wide uppercase text-gray-600">Contents</div>
          <button
              @click="railOpen = false"
              class="text-xs px-2 py-1 rounded-md border border-gray-300 hover:bg-gray-50"
              aria-label="Close table of contents"
          >Close</button>
        </div>

        <nav>
          <ul class="space-y-1">
            <li v-for="s in sections" :key="s.id">
              <a
                  :href="'#' + s.id"
                  class="block px-2 py-1 rounded-md text-sm transition"
                  :class="activeId === s.id ? 'bg-honeyman-50 text-honeyman-900 font-medium' : 'text-gray-700 hover:bg-gray-50'"
              >
                {{ s.label }}
              </a>
            </li>
          </ul>
        </nav>
      </aside>
    </div>
    </div>

    <!-- Mobile bottom sheet ... -->
  </Teleport>
</template>

<script setup>
import { onMounted, onBeforeUnmount, ref, computed } from 'vue'

const props = defineProps({
  sections: { type: Array, required: true },
  revealAfterId: { type: String, default: 'hr-1' },

  // placement controls
  containerMax: { type: String, default: '72rem' }, // used only for 'container' mode
  gutter:       { type: String, default: '1rem' },
  topOffset:    { type: String, default: '6rem' },

  // NEW: choose where to anchor the rail
  //  - 'window'    => to the viewport’s right edge (what you want)
  //  - 'container' => to the content column’s right edge (previous behavior)
  anchorTo: { type: String, default: 'window' },

  defaultOpenDesktop: { type: Boolean, default: true }
})

const open = ref(false)
const railOpen = ref(false)
const showFab = ref(false)
const activeId = ref(null)

// ⭐ compute placement based on anchorTo
const railStyle = computed(() => {
  if (props.anchorTo === 'container') {
    // right edge of your centered column + custom gutter
    return {
      top: props.topOffset,
      right: `max(16px, calc((100vw - ${props.containerMax}) / 2 + ${props.gutter}))`
    }
  }
  // window edge: keep a little breathing room + safe-area
  return {
    top: props.topOffset,
    right: `max(16px, env(safe-area-inset-right, 0px))`
  }
})

let spyObserver, revealObserver

// ⭐ desktop: open by default, show controls from the start
onMounted(() => {
  const isDesktop = window.matchMedia('(min-width: 768px)').matches
  if (isDesktop) {
    railOpen.value = props.defaultOpenDesktop
    showFab.value = true
  }
  document.documentElement.style.scrollBehavior = 'smooth'
  setupRevealObserver()
  setupSpy()
  window.addEventListener('keydown', onKey)
})

onBeforeUnmount(() => {
  window.removeEventListener('keydown', onKey)
  spyObserver?.disconnect()
  revealObserver?.disconnect()
})

function setupRevealObserver() {
  // Keep mobile behavior (hide near hero, show after) — desktop already forced visible
  const target = document.getElementById(props.revealAfterId) || document.body
  revealObserver = new IntersectionObserver(
      (entries) => {
        if (!window.matchMedia('(max-width: 767.98px)').matches) return
        showFab.value = !entries[0].isIntersecting
      },
      { root: null, threshold: 0 }
  )
  revealObserver.observe(target)
}

function setupSpy() {
  const ids = props.sections.map(s => s.id)
  const els = ids.map(id => document.getElementById(id)).filter(Boolean)
  spyObserver = new IntersectionObserver(
      (entries) => {
        const visible = entries.filter(e => e.isIntersecting).sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top)
        if (visible.length) {
          activeId.value = visible[0].target.id
        } else {
          const tops = els.map(el => ({ id: el.id, top: el.getBoundingClientRect().top }))
          const above = tops.filter(t => t.top <= 100).sort((a, b) => b.top - a.top)
          if (above.length) activeId.value = above[0].id
        }
      },
      { root: null, threshold: [0, 0.2], rootMargin: '0px 0px -70% 0px' }
  )
  els.forEach(el => spyObserver.observe(el))
}

function onKey(e) {
  if (e.key === 't' || (e.key === 'k' && (e.ctrlKey || e.metaKey))) {
    e.preventDefault()
    if (window.matchMedia('(min-width: 768px)').matches) {
      railOpen.value = !railOpen.value
      showFab.value = true
    } else {
      open.value = !open.value
    }
  } else if (e.key === 'Escape') {
    open.value = false
  }
}
</script>
