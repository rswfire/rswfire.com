<template>
    <div
        ref="videoContainer"
        class="relative w-full pt-[56.25%] rounded-lg overflow-hidden shadow-md border border-gray-200"
    >
        <div
            :id="playerId"
            class="absolute top-0 left-0 w-full h-full"
        ></div>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue'

const props = defineProps({
    videoId: { type: String, required: true },
})

const player = ref(null)
const playerReady = ref(false)
const videoContainer = ref(null)
const playerId = `youtube-player-${Math.random().toString(36).substring(2, 10)}`
let resizeObserver = null

const loadYouTubeAPI = () => {
    return new Promise((resolve) => {
        if (window.YT && window.YT.Player) return resolve()

        window.onYouTubeIframeAPIReady = () => resolve()

        const tag = document.createElement('script')
        tag.src = 'https://www.youtube.com/iframe_api'
        document.body.appendChild(tag)
    })
}

onMounted(async () => {
    await loadYouTubeAPI()

    nextTick(() => {
        player.value = new window.YT.Player(playerId, {
            videoId: props.videoId,
            playerVars: {
                modestbranding: 1,
                rel: 0,
                enablejsapi: 1
            },
            events: {
                onReady: () => {
                    playerReady.value = true
                    if (videoContainer.value) {
                        resizeObserver = new ResizeObserver(() => {
                            /* Optional: react to size changes */
                        })
                        resizeObserver.observe(videoContainer.value)
                    }
                }
            }
        })
    })
})

onBeforeUnmount(() => {
    if (player.value?.destroy) player.value.destroy()
    if (resizeObserver && videoContainer.value) resizeObserver.unobserve(videoContainer.value)
    player.value = null
    resizeObserver = null
    playerReady.value = false
})
</script>
