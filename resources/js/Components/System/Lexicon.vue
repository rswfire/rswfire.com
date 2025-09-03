<template>
  <span
      v-if="entry"
      :data-term="term"
      class="underline decoration-dotted cursor-help lexicon-term inline-flex items-center gap-1 whitespace-nowrap"
  >
    {{ term }}
    <Icon name="SquareLibrary" color="text-lexicon-600" class="w-3 h-3 flex-shrink-0"/>
  </span>

  <span v-else class="text-red-600 italic">
    <slot />
  </span>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import axios from 'axios'
import tippy from 'tippy.js'
import 'tippy.js/dist/tippy.css'
import Icon from "@/Components/System/Icon.vue";

const props = defineProps({ term: String })
const entry = ref(null)
const triggerRef = ref(null)
let tippyInstance = null

onMounted(async () => {
  try {
    const res = await axios.get(`/api/lexicon/lookup/${encodeURIComponent(props.term)}`)
    entry.value = res.data

    setTimeout(() => {
      const element = document.querySelector(`[data-term="${props.term}"]`)

      if (element && entry.value) {
        tippyInstance = tippy(element, {
          content: `
        <div class="lexicon-tooltip">
          <p class="font-semibold text-gray-900 mb-1">${entry.value.lexicon_term}</p>
          <p class="text-sm text-gray-700 leading-snug">${entry.value.lexicon_essence}</p>
          <a href="/lexicon/${entry.value.lexicon_slug}" class="text-lexicon-600 text-sm font-medium mt-2 block hover:underline">
            View Full Entry →
          </a>
        </div>
      `,
          allowHTML: true,
          interactive: true,
          placement: 'top',
          delay: [100, 300],
          maxWidth: 320,
        })
      }
    }, 100)

  } catch (err) {
    console.warn(`Lexicon entry for "${props.term}" not found.`)
  }
})

onUnmounted(() => {
  if (tippyInstance) {
    tippyInstance.destroy()
  }
})
</script>

<style>
.tippy-box {
  background-color: white !important;
  color: #111 !important;
  border: 1px solid #e5e7eb !important;
  border-radius: 8px !important;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
  font-size: 14px !important;
}

.tippy-box[data-placement^='top'] > .tippy-arrow::before {
  bottom: -7px !important;
  left: 0 !important;
  border-width: 8px 8px 0 !important;
  border-top-color: white !important;
  transform-origin: center top !important;
}

.tippy-arrow {
  width: 16px !important;
  height: 16px !important;
  color: white !important;
}

.tippy-arrow::before {
  content: '' !important;
  position: absolute !important;
  border-color: transparent !important;
  border-style: solid !important;
}

.lexicon-tooltip {
  padding: 12px;
}

.lexicon-tooltip p {
  margin: 0 0 8px 0;
}

.lexicon-tooltip a {
  text-decoration: none;
}

.lexicon-tooltip a:hover {
  text-decoration: underline;
}
</style>
