<template>
    <div
        ref="container"
        class="relative overflow-hidden whitespace-nowrap"
        @mouseenter="paused = true"
        @mouseleave="paused = false"
    >
        <!-- optional soft fade; add back if you like -->
        <!--
        <div class="pointer-events-none absolute inset-0"
             style="mask-image:linear-gradient(to right,transparent,black 8%,black 92%,transparent);
                    -webkit-mask-image:linear-gradient(to right,transparent,black 8%,black 92%,transparent);"></div>
        -->

        <!-- STATIC offset wrapper: holds the off-screen start -->
        <div ref="offset" class="inline-block" :style="offsetStyle">
            <!-- LOOPING track: moves only by content width -->
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
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount, nextTick } from 'vue'

const props = defineProps({
    speedPxPerSec: { type: Number, default: 28 }, // px/s
    gapPx: { type: Number, default: 32 },
    respectReducedMotion: { type: Boolean, default: true },
    startOffscreen: { type: Boolean, default: true }, // start from right edge
})

const container = ref(null)
const copyA = ref(null)
const paused = ref(false)

const mql = window.matchMedia?.('(prefers-reduced-motion: reduce)')
const reduced = ref(!!mql?.matches)
mql?.addEventListener?.('change', e => (reduced.value = e.matches))

const isPaused = computed(() => paused.value || (props.respectReducedMotion && reduced.value))

const distancePx = ref(600)   // width of one copy + gap
const startOffsetPx = ref(0)  // container width (static offset)

function measure() {
    const content = (copyA.value?.scrollWidth || 0) + props.gapPx
    const cont = container.value?.clientWidth || 0

    // Only update if values actually changed to avoid animation restarts
    const newDist = Math.max(1, Math.round(content))
    const newStart = props.startOffscreen ? Math.max(0, Math.round(cont)) : 0

    if (newDist !== distancePx.value) distancePx.value = newDist
    if (newStart !== startOffsetPx.value) startOffsetPx.value = newStart
}

const durationSec = computed(() =>
    Math.max(0.001, distancePx.value / Math.max(1, props.speedPxPerSec))
)

const copyStyle = computed(() => ({ paddingRight: `${props.gapPx}px` }))

// Static offset on the parent wrapper
const offsetStyle = computed(() => ({
    transform: `translateX(${startOffsetPx.value}px)`,
}))

// Inner track loops by the content width only
const trackStyle = computed(() => ({
    '--dist': `${distancePx.value}px`,
    animationName: (props.respectReducedMotion && reduced.value) ? 'none' : 'ticker',
    animationDuration: `${durationSec.value}s`,
    animationTimingFunction: 'linear',
    animationIterationCount: 'infinite',
    animationPlayState: isPaused.value ? 'paused' : 'running',
}))

let ro
onMounted(async () => {
    await nextTick()
    measure()
    ro = new ResizeObserver(() => requestAnimationFrame(measure))
    if (copyA.value) ro.observe(copyA.value)
    if (container.value) ro.observe(container.value)
    window.addEventListener('resize', measure)
})

onBeforeUnmount(() => {
    ro?.disconnect?.()
    window.removeEventListener('resize', measure)
})
</script>

<!-- global (not scoped) so keyframes are always available -->
<style>
@keyframes ticker {
    from { transform: translateX(0); }
    to   { transform: translateX(calc(-1 * var(--dist))); }
}
</style>
