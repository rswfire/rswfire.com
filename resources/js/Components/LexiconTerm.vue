<template>
  <span class="relative group cursor-help inline-flex items-center space-x-1">
    <slot>{{ definition?.label || slug }}</slot>
    ℹ️
    <div class="absolute z-50 hidden group-hover:block left-1/2 -translate-x-1/2 top-full mt-2 w-64 bg-white text-gray-800 text-sm p-3 rounded-md shadow-lg border border-gray-200">
      {{ definition?.short }}
    </div>
  </span>
</template>

<script setup>
import { computed } from 'vue'
import { lexicon } from '@/lexicon.js'

const props = defineProps({
    slug: { type: String, required: true }
})

const definition = computed(() => lexicon[props.slug])
</script>
