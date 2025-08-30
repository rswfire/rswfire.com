<template>
    <div
        ref="container"
        class="relative overflow-hidden whitespace-nowrap"
        @mouseenter="paused = true"
        @mouseleave="paused = false"
    >
        <div
            ref="track"
            class="inline-flex items-center will-change-transform"
            :style="trackStyle"
        >
            <div ref="copyA" class="inline-flex items-center" :style="copyStyle">
                <slot />
            </div>
            <div class="inline-flex items-center" :style="copyStyle" aria-hidden="true">
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount, nextTick } from 'vue'

const props = defineProps({
    speedPxPerSec: { type: Number, default: 28 }, // px/s
    gapPx: { type: Number, default: 32 },
    respectReducedMotion: { type: Boolean, default: true },
    // NEW: start offscreen by the container width
    startOffscreen: { type: Boolean, default: true },
})

const container = ref(null)
const copyA = ref(null)
const paused = ref(false)

const mql = window.matchMedia?.('(prefers-reduced-motion: reduce)')
const reduced = ref(!!mql?.matches)
mql?.addEventListener?.('change', e => (reduced.value = e.matches))

const isPaused = computed(() => paused.value || (props.respectReducedMotion && reduced.value))

const distancePx = ref(600)      // one copy width + gap
const startOffsetPx = ref(0)     // how far to start from the right

function measure() {
    const wContent = (copyA.value?.scrollWidth || 0) + props.gapPx
    const wContainer = container.value?.clientWidth || 0
    distancePx.value = Math.max(1, wContent)
    startOffsetPx.value = props.startOffscreen ? Math.max(0, wContainer) : 0
}

const durationSec = computed(() =>
    Math.max(0.001, (distancePx.value + startOffsetPx.value) / Math.max(1, props.speedPxPerSec))
)

const copyStyle = computed(() => ({ paddingRight: `${props.gapPx}px` }))

const trackStyle = computed(() => ({
    '--ticker-distance': `${distancePx.value}px`,
    '--ticker-start': `${startOffsetPx.value}px`,
    animationName: (props.respectReducedMotion && reduced.value) ? 'none' : 'tickerFromRight',
    animationDuration: `${durationSec.value}s`,
    animationTimingFunction: 'linear',
    animationIterationCount: 'infinite',
    animationPlayState: isPaused.value ? 'paused' : 'running',
}))

let ro
onMounted(async () => {
    await nextTick()
    measure()
    ro = new ResizeObserver(measure)
    ro.observe(copyA.value)
    container.value && ro.observe(container.value)
    window.addEventListener('resize', measure)
})

onBeforeUnmount(() => {
    ro?.disconnect?.()
    window.removeEventListener('resize', measure)
})
</script>

<style>
/* global (not scoped) to avoid keyframe scoping quirks */
@keyframes tickerFromRight {
    from { transform: translateX(var(--ticker-start)); }
    to   { transform: translateX(calc(-1 * (var(--ticker-distance) + var(--ticker-start)))); }
}
</style>
