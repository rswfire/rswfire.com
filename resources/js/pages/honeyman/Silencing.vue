<template>
    <content>
        <hero
            title="HONEYMAN STATE PARK, OPRD &mdash; MEETING WITH ALLISON WATSON"
            subtitle="The Silencing"
            meta="Last Updated: 05/27/25 &mdash; WIP"
        />

        <para class="mt-5">
            This wasn’t a conversation. It was a containment protocol.
        </para>

        <para>
            On March 25, 2025, I received a call from Allison Watson — Volunteer Engagement Coordinator at Oregon State Parks. I recorded the conversation for documentation and review. This was one day after Ryan Warren dismissed me from Honeyman State Park, and one day before Allison made the decision to end my entire volunteer relationship with the agency.
        </para>

        <para>
            In this call, you will hear:
        </para>

        <ul class="list-disc list-inside mb-6 space-y-2">
            <li class="pt-5 prose prose-neutral">Allison justifying my dismissal using vague, unverified third-party reports</li>
            <li class="prose prose-neutral">Repeated reframing of my reflective statements into misconduct</li>
            <li class="prose prose-neutral">A refusal to acknowledge the hourlong gaslighting session conducted by Ryan and Kati</li>
            <li class="prose prose-neutral">An attempt to characterize a poem as unprofessional behavior</li>
            <li class="prose prose-neutral">Systemic deflection of accountability — cloaked in faux empathy</li>
        </ul>

        <para class="mt-5">
            I remained calm, direct, and honest throughout. The recording is difficult to hear — not because of the audio, but because of what it reveals.
        </para>

        <div class="mt-10 mb-6">
            <h2 class="text-2xl font-medium mb-2">The Recording</h2>
            <!-- Embedded Video -->
            <div>
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
                <p><a href="#">🔊 Full Recording — March 25 Call with Allison Watson</a></p>
                <p>(30 minutes – recorded via mobile mic)</p>
            </div>
        </div>

        <h2 class="text-2xl font-medium mt-12 mb-4">Why This Matters</h2>
        <p class="mb-6">
            This wasn’t just about me. It was about what institutions do when truth becomes inconvenient:
        </p>

        <ul class="list-disc list-inside mb-6 space-y-2">
            <li>When directness is framed as threat</li>
            <li>When reflective integrity is cast as instability</li>
            <li>When leadership chooses silence over responsibility</li>
        </ul>

        <p class="mb-6">
            I did not raise my voice. I did not violate any rules. I asked to be treated fairly. And in response — I was dismissed, discredited, and silenced.
        </p>

        <p class="mb-6">
            But the record speaks.
        </p>

        <p class="mt-12 text-gray-400 text-sm">— Sam White · <a href="https://rswfire.com/honeyman" class="underline">rswfire.com/honeyman</a></p>

    </content>
</template>

<script setup>
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
