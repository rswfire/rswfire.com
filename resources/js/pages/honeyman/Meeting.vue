
<template>
    <section class="min-h-screen bg-gray-100 text-gray-900 px-6 py-12">
        <div class="max-w-4xl mx-auto space-y-12">

            <!-- Title -->
            <div>
                <h1 class="text-4xl font-bold">The Interrogation — March 5, 2025</h1>
                <p class="mt-2 text-lg text-gray-600">// Coercion, Gaslighting, and Constructive Dismissal on Record</p>
            </div>

            <!-- Opening Statement -->
            <div class="space-y-4 text-base leading-relaxed">
                <p>This is not a leak. This is not a spectacle.</p>
                <p class="font-bold">This is a record.</p>
                <p>
                    On March 5, 2025, I was summoned to a day-use area at Honeyman State Park for what was presented as a meeting.
                    What took place was over an hour of psychological manipulation, coded threats, and institutional gaslighting —
                    intended to destabilize me just enough to make me leave on my own.
                </p>
                <p>I didn’t. I stayed. I recorded. You are now witnessing what they never expected would surface.</p>
            </div>

            <!-- Legal Disclosure -->
            <div>
                <h2 class="text-2xl font-semibold mt-10 mb-4">Legal Disclosure</h2>
                <div class="space-y-2">
                    <p>Oregon is a two-party consent state for recording. I was unaware of this at the time of the recording. However, there are critical exceptions under Oregon law:</p>
                    <ul class="list-disc list-inside ml-4">
                        <li>Public officials in performance of their duties</li>
                        <li>No reasonable expectation of privacy in a public location</li>
                        <li>Public interest in exposing coercive or retaliatory behavior</li>
                        <li>My legal interest in documenting a meeting that had the potential to impact my future opportunities and reputation</li>
                    </ul>
                    <p>This meeting was held in a public area, conducted by state employees in uniform, and was not preceded by confidentiality notices. I believe I acted within my rights.</p>
                </div>
            </div>

            <!-- Embedded Video -->
            <div>
                <h2 class="text-2xl font-semibold mt-10 mb-4">The Recording</h2>
                <div class="flex flex-col md:flex-row gap-2 py-0">

                    <div class="w-full md:w-2/3 rounded-md border border-gray-200 shadow-sm">
                        <div ref="videoContainer" class="relative w-full pt-[56.25%] rounded-lg overflow-hidden shadow-md border border-gray-200">
                            <div
                                ref="videoElement"
                                id="youtube-player-tech"
                                class="absolute top-0 left-0 w-full h-full"
                            ></div>
                        </div>
                    </div>
                </div>
                <p class="mt-2 text-sm text-gray-600">Length: 1 hour, 3 minutes | Location: Honeyman Day Use Area</p>
            </div>

            <!-- Time Index -->
            <div>
                <h2 class="text-2xl font-semibold mt-10 mb-4">Time-Indexed Highlights</h2>
                <table class="min-w-full table-auto text-sm text-left border border-gray-300">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">Time</th>
                        <th class="px-4 py-2">Segment</th>
                        <th class="px-4 py-2">Summary</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in highlights" :key="item.time">
                        <td class="border px-4 py-2">{{ item.time }}</td>
                        <td class="border px-4 py-2">{{ item.segment }}</td>
                        <td class="border px-4 py-2">{{ item.summary }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Importance -->
            <div>
                <h2 class="text-2xl font-semibold mt-10 mb-4">Why This Matters</h2>
                <p>
                    This is not about one meeting. It's an exhibit of systemic behavior:
                </p>
                <ul class="list-disc list-inside ml-4">
                    <li>Discomfort manufactured to avoid accountability</li>
                    <li>Clarity framed as threat</li>
                    <li>Psychological exit pressure normalized as “support”</li>
                </ul>
            </div>

            <!-- Closing -->
            <div class="pt-8 text-sm text-gray-600 border-t border-gray-300">
                <p>
                    I wanted to let it go. I was days from leaving Honeyman and continuing my year-long volunteer commitment across Oregon.
                    Instead, they dismissed me early. They tried to erase me.
                </p>
                <p class="mt-2">But the record remained. And so did I.</p>
                <p class="mt-4 font-semibold">— Sam White | rswfire.com/honeyman</p>
            </div>
        </div>
    </section>
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
        videoId: 'iOuaufCH_I8',
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
