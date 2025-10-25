<template>
  <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">

    <div class="px-6 pt-4 pb-6">
      <YouTubePlayer :videoId="videoId" :isPortrait="false" />
    </div>

    <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 text-sm text-center font-mono">
      <div class="flex items-center justify-center gap-1 w-full mx-auto">
        <Icon name="SatelliteDish" :color="color" class="w-[16px] h-[16px]" />
        <Link
            :href="`/transmission/${signalUlid}`"
            class="hover:underline font-medium"
            :class="color || 'text-black'"
        >
          {{ signalUlid }}
        </Link>
      </div>
    </div>

  </div>
</template>

<script setup>
import YouTubePlayer from '@/Components/System/YoutubePlayer.vue'
import { Link } from '@inertiajs/vue3'
import Icon from "@/Components/System/Icon.vue";

const props = defineProps({
  videoId: {
    type: String,
    required: true,
  },
  signalUlid: {
    type: String,
    required: true,
  },
  color: {
    type: String,
    required: false,
  }
})
</script>
