<template>
    <div class="flex flex-col md:flex-row gap-2 py-0">
        <div class="w-full md:w-2/3 rounded-md border border-gray-200 shadow-sm">
            <div
                ref="videoContainer"
                class="relative w-full pt-[56.25%] rounded-lg overflow-hidden shadow-md border border-gray-200"
            >
                <div
                    ref="videoElement"
                    :id="`youtube-player-${videoId}`"
                    class="absolute top-0 left-0 w-full h-full"
                ></div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue'
import { onBeforeRouteLeave } from 'vue-router'

const props = defineProps({
    videoId: {
        type: String,
        required: true,
    },
})

const player = ref(null)
const playerReady = ref(false)
const videoElement = ref(null)
const videoContainer = ref(null)
const videoHeight = ref(0)

let resizeObserver = null

let youtubeApiReady

function loadYouTubeAPI() {
    if (youtubeApiReady) return youtubeApiReady

    youtubeApiReady = new Promise((resolve) => {
        if (window.YT && window.YT.Player) return resolve()

        window.onYouTubeIframeAPIReady = () => resolve()

        const tag = document.createElement('script')
        tag.src = 'https://www.youtube.com/iframe_api'
        tag.async = true
        document.head.appendChild(tag)
    })

    return youtubeApiReady
}

onMounted(async () => {
    await loadYouTubeAPI()

    nextTick(() => {
        if (!videoElement.value) {
            console.error('Video element missing.')
            return
        }

        player.value = new window.YT.Player(videoElement.value, {
            videoId: props.videoId,
            playerVars: {
                modestbranding: 1,
                rel: 0,
                enablejsapi: 1,
            },
            events: {
                onReady: () => {
                    playerReady.value = true
                    console.log(`YouTube Player Ready for ${props.videoId}`)

                    nextTick(() => {
                        if (videoContainer.value) {
                            videoHeight.value = videoContainer.value.offsetHeight
                            resizeObserver = new ResizeObserver(() => {
                                videoHeight.value = videoContainer.value.offsetHeight
                            })
                            resizeObserver.observe(videoContainer.value)
                        }
                    })
                },
            },
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

// Optional utility function for external control
function seekTo(seconds) {
    if (playerReady.value && player.value?.seekTo) {
        player.value.seekTo(seconds, true)
        player.value.playVideo()
    } else {
        console.warn('Player not ready yet.')
    }
}
</script>

<script>
export default {
    name: 'YoutubePlayer',
}
</script>
