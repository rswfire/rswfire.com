<template>
  <Teleport to="body">

    <button
        class="fixed md:hidden z-[70] shadow-md rounded-full px-4 py-2 bg-white/90 backdrop-blur border border-gray-300 text-sm font-medium hover:bg-white focus:outline-none focus:ring-2 focus:ring-honeyman-400"
        :style="fabStyle"
        aria-label="Open table of contents"
        @click="open = true"
    >
      TOC
    </button>

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

const open     = ref(false)
const railOpen = ref(true)
const activeId = ref(null)

const props = defineProps({
  sections: { type: Array, required: true },
  anchorTo: { type: String, default: 'window' },
  containerMax: { type: String, default: '72rem' },
  gutter: { type: String, default: '1rem' },
  topOffset: { type: String, default: '6rem' },
  defaultOpenDesktop: { type: Boolean, default: true },
  fabRight:  { type: String, default: '20px' },
  fabBottom: { type: String, default: '16px' },
})

const fabStyle = computed(() => ({
  position: 'fixed',
  right:  `calc(env(safe-area-inset-right, 0px) + ${props.fabRight})`,
  bottom: `calc(env(safe-area-inset-bottom, 0px) + ${props.fabBottom})`,
}))

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
  // clean any previous observer
  if (spyObserver) {
    spyObserver.disconnect()
    spyObserver = null
  }

  const ids = (props.sections || []).map(s => s.id)
  const els = ids
      .map(id => document.getElementById(id))
      .filter(Boolean)

  if (!els.length) return

  const isAtBottom = () => {
    const d = document.documentElement
    // ceil guards tiny FP rounding differences
    return Math.ceil(window.scrollY + window.innerHeight) >= d.scrollHeight - 1
  }

  spyObserver = new IntersectionObserver((entries) => {
    // 1) bottom-of-page: lock to the last section
    if (isAtBottom()) {
      const lastId = ids[ids.length - 1]
      if (lastId && activeId.value !== lastId) activeId.value = lastId
      return
    }

    // 2) prefer the topmost intersecting marker (in a reduced viewport)
    const visible = entries
        .filter(e => e.isIntersecting)
        .sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top)

    if (visible.length) {
      const id = visible[0].target.id
      if (id && activeId.value !== id) activeId.value = id
      return
    }

    // 3) fallback: choose the closest anchor that is on-screen or above the fold
    const candidate = els
        .map(el => ({ id: el.id, top: el.getBoundingClientRect().top }))
        .filter(t => t.top <= window.innerHeight - 8) // in view or already above
        .sort((a, b) => b.top - a.top)[0]

    if (candidate && activeId.value !== candidate.id) {
      activeId.value = candidate.id
    }
  }, {
    root: null,
    threshold: [0, 0.2],
    // shrink the "active zone" to the top 50% so we highlight what you've scrolled to
    rootMargin: '0px 0px -50% 0px'
  })

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
