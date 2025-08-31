<template>
  <Teleport to="body">
    <!-- Mobile FAB -->
    <button
        class="fixed md:hidden z-[70] shadow-md rounded-full px-4 py-2 bg-white/90 backdrop-blur border border-gray-300 text-sm font-medium hover:bg-white focus:outline-none focus:ring-2 focus:ring-honeyman-400"
        :style="fabStyle"
        aria-label="Open table of contents"
        @click="open = true"
    >
      TOC
    </button>

    <!-- Desktop rail (open by default, anchored to window edge) -->
    <div class="hidden md:block fixed z-[70]" :style="railStyle">
      <div :class="['transition-all duration-200', railOpen ? 'opacity-90' : 'opacity-70']">
        <div v-if="!railOpen" class="flex justify-end">
          <button
              @click="railOpen = true"
              class="shadow-md rounded-full px-3 py-2 bg-white/90 backdrop-blur border border-gray-300 text-xs uppercase tracking-wide hover:bg-white focus:outline-none focus:ring-2 focus:ring-honeyman-400"
              aria-label="Open table of contents"
          >TOC</button>
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

    <!-- Mobile bottom sheet -->
    <div v-if="open" class="fixed inset-0 z-[80] md:hidden" role="dialog" aria-modal="true" @keydown.esc="open = false">
      <div class="absolute inset-0 bg-black/30" @click="open = false"></div>
      <div class="absolute inset-x-0 bottom-0 rounded-t-2xl bg-white shadow-2xl p-4 max-h-[70vh] overflow-auto">
        <div class="flex items-center justify-between mb-2">
          <div class="text-xs font-semibold tracking-wide uppercase text-gray-600">Contents</div>
          <button
              @click="open = false"
              class="text-sm px-3 py-1 rounded-md border border-gray-300 hover:bg-gray-50"
              aria-label="Close"
          >Close</button>
        </div>
        <nav>
          <ul class="grid grid-cols-1 gap-1">
            <li v-for="s in sections" :key="s.id">
              <a
                  :href="'#' + s.id"
                  class="block px-3 py-2 rounded-md text-base"
                  :class="activeId === s.id ? 'bg-honeyman-50 text-honeyman-900 font-medium' : 'text-gray-800 hover:bg-gray-50'"
                  @click="open = false"
              >
                {{ s.label }}
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </Teleport>
</template>

<script setup>
import { onMounted, onBeforeUnmount, ref, computed } from 'vue'

const props = defineProps({
  sections: { type: Array, required: true },

  // placement controls
  anchorTo:      { type: String, default: 'window' }, // 'window' | 'container'
  containerMax:  { type: String, default: '72rem' },  // used only for 'container'
  gutter:        { type: String, default: '1rem' },
  topOffset:     { type: String, default: '6rem' },
  defaultOpenDesktop: { type: Boolean, default: true }
})

const open     = ref(false)            // mobile sheet
const railOpen = ref(true)             // desktop rail default open
const activeId = ref(null)

// Mobile FAB placement (safe-area aware)
const fabStyle = computed(() => ({
  right: 'max(16px, env(safe-area-inset-right, 0px))',
  bottom: 'max(16px, env(safe-area-inset-bottom, 0px))'
}))

// Desktop rail placement
const railStyle = computed(() => {
  if (props.anchorTo === 'container') {
    return {
      top: props.topOffset,
      right: `max(16px, calc((100vw - ${props.containerMax}) / 2 + ${props.gutter}))`
    }
  }
  return {
    top: props.topOffset,
    right: `max(16px, env(safe-area-inset-right, 0px))`
  }
})

let spyObserver

function setupSpy () {
  const els = props.sections
      .map(s => document.getElementById(s.id))
      .filter(Boolean)

  spyObserver = new IntersectionObserver((entries) => {
    const visible = entries
        .filter(e => e.isIntersecting)
        .sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top)

    if (visible.length) {
      activeId.value = visible[0].target.id
      return
    }

    const tops = els.map(el => ({ id: el.id, top: el.getBoundingClientRect().top }))
    const above = tops.filter(t => t.top <= 100).sort((a,b) => b.top - a.top)
    if (above.length) activeId.value = above[0].id
  }, { threshold: [0, 0.2], rootMargin: '0px 0px -70% 0px' })

  els.forEach(el => spyObserver.observe(el))
}

function onKey(e) {
  if (e.key === 't' || (e.key === 'k' && (e.ctrlKey || e.metaKey))) {
    e.preventDefault()
    if (window.matchMedia('(min-width: 768px)').matches) {
      railOpen.value = !railOpen.value
    } else {
      open.value = !open.value
    }
  } else if (e.key === 'Escape') {
    open.value = false
  }
}

onMounted(() => {
  // ensure smooth native anchor jumps
  document.documentElement.style.scrollBehavior = 'smooth'
  railOpen.value = props.defaultOpenDesktop
  setupSpy()
  window.addEventListener('keydown', onKey)
})
onBeforeUnmount(() => {
  window.removeEventListener('keydown', onKey)
  spyObserver?.disconnect()
})
</script>
