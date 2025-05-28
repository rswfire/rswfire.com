<template>

    <div class="text-sm text-gray-600 border-t border-gray-200 pt-4">
        <div class="text-xs uppercase font-semibold text-gray-500 mb-2 tracking-wider">Navigation</div>

        <nav class="space-y-1 ml-1">
            <router-link
                to="/"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>🏠</span> <span>Home</span>
            </router-link>

            <router-link
                to="/hello"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>👤</span> <span>About Me</span>
            </router-link>

            <router-link
                to="/the-journey"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>🜂</span> <span>The Journey</span>
            </router-link>

            <router-link
                to="/honeyman"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>🌲</span> <span>Honeyman</span>
            </router-link>

            <router-link
                to="/tech"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>🛠</span> <span>Tech History</span>
            </router-link>

            <router-link
                to="/lexicon"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>🪶</span> <span>Lexicon</span>
            </router-link>

            <router-link
                to="/field-records"
                class="flex items-center gap-2 hover:text-red-600 transition"
            >
                <span>📁</span> <span>Field Records</span>
            </router-link>

        </nav>
    </div>

</template>

<script setup>
const highlights = [
    { time: "00:12", segment: "Opening Setup", summary: "Ryan begins reframing emails as problematic" },
    { time: "09:17", segment: "Patrick Conflict", summary: "Sam explains miscommunication; Ryan calls it a 'trigger'" },
    { time: "17:40", segment: "Email Style", summary: "Objection to clarity and tone" },
    { time: "23:56", segment: "“Chew Glass”", summary: "Ryan shares 'chewing glass' metaphor" },
    { time: "39:30", segment: "No Benefit of Doubt", summary: "Ryan admits he never gave Sam the benefit of the doubt" },
    { time: "42:12", segment: "Shifting Blame", summary: "Accusations of negativity despite clean conduct" },
    { time: "49:00", segment: "Assume Positive Intent", summary: "Sam told to trust those who broke trust" },
    { time: "56:05", segment: "Exit Pressure", summary: "Pressure to leave cloaked as support" },
    { time: "01:00:30", segment: "Closing Line", summary: "Sam reiterates his integrity and fairness" }
];
import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue'

const player = ref(null)
const playerReady = ref(false)
const videoElement = ref(null)
const videoContainer = ref(null)
const videoHeight = ref(0)

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

    if (!videoElement.value) {
        console.error('Video element missing.')
        return
    }

    player.value = new window.YT.Player(videoElement.value, {
        videoId: 'Px_pCUo78w4',
        playerVars: {
            modestbranding: 1,
            rel: 0,
            enablejsapi: 1
        },
        events: {
            onReady: () => {
                playerReady.value = true
                console.log('YouTube Player Ready')

                nextTick(() => {
                    if (videoContainer.value) {
                        videoHeight.value = videoContainer.value.offsetHeight
                        resizeObserver = new ResizeObserver(() => {
                            videoHeight.value = videoContainer.value.offsetHeight
                        })
                        resizeObserver.observe(videoContainer.value)
                    }
                })
            }
        }
    })
})

onBeforeUnmount(() => {
    if (player.value?.destroy) player.value.destroy()
    if (resizeObserver && videoContainer.value) resizeObserver.unobserve(videoContainer.value)
    player.value = null
    resizeObserver = null
    playerReady.value = false
})

function seekTo(seconds) {
    if (playerReady.value && player.value?.seekTo) {
        player.value.seekTo(seconds, true)
        player.value.playVideo()
    } else {
        console.warn('Player not ready yet.')
    }
}
</script>
