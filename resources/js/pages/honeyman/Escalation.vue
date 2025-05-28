<template>

    <content>
        <hero
            title="HONEYMAN STATE PARK, OPRD &mdash; ESCALATION"
            subtitle="A System in Panic: The Chain Reaction That Broke Trust"
            meta="Last Updated: 05/27/25 &mdash; WIP"
        />

        <para><em>How a single moment of reactivity exposed institutional incoherence</em></para>
        <para>
            <div>On March 30, I was scheduled to depart Honeyman and begin my next volunteer assignment at Tugman State Park.</div>
            <div>I was days away from moving on — but Ryan Warren, acting on personal offense, escalated the situation beyond recovery.</div>
        </para>

        <h2 class="text-2xl font-bold tracking-tight text-black">📆 The Sequence</h2>
        <ul>
            <li class="prose prose-neutral"><para><strong>March 24, 2025</strong> – I receive a phone call from Ryan Warren, ostensibly to schedule a meeting. When I ask why, he reacts emotionally, and dismisses me on the spot — over the phone.</para></li>
            <li class="prose prose-neutral"><para><strong>One hour later</strong> – Ryan shows up at my site in person. I record him taking my keys and documents. He admits he has no paperwork, offers no formal explanation, and tells me I have 24 hours to vacate the park.</para></li>
            <li class="prose prose-neutral"><para><strong>March 25, 2025</strong> – I speak with Allison Watson. That conversation is now public. I refute each of the frames used to justify my dismissal — calmly, clearly, without evasion.</para></li>
            <li class="prose prose-neutral"><para><strong>Later that day</strong> – I relocate to Tugman, as planned. Rangers are visibly uncertain — the ripple from Honeyman has reached them. I had volunteered there previously without issue.</para></li>
            <li class="prose prose-neutral"><para><strong>That evening</strong> – I send Allison the following email. She never acknowledges it. Less than 24 hours later, I am permanently dismissed.</para></li>
            <li class="prose prose-neutral"><para><strong>March 26, 2025</strong> – I receive a formal permanent dismissal from OPRD via email. The language is as vague as all of their previous accusations.</para></li>
        </ul>

        <h2 class="text-2xl font-bold tracking-tight text-black">🎯 What This Reveals</h2>
        <para>This was never about performance.<br />
            It was about control.</para>

        <para>It wasn’t a response to conduct.<br />
            It was a response to clarity — especially when that clarity took written form.</para>

        <para>Leadership wasn’t protecting a standard.<br />
            They were preserving a narrative — and reacting to the disruption of their internal hierarchy.</para>

        <para>This wasn’t a misunderstanding.<br />
            It was a calculated displacement, cloaked in policy, triggered by presence, and finalized with silence.</para>

        <para><strong>🔗 <router-link to="/honeyman/meeting">See the March 5 Interrogation</router-link>.</strong></para>
        <para><strong>🔗 <router-link to="/honeyman/escalation/letter">Read my letter to Allison</router-link>.</strong></para>

        <div class="mt-0 p-4 pt-0 border border-gray-300 bg-gray-50 rounded-md shadow-sm">
            <h2 class="text-lg font-semibold mb-2">🎥 Watch the Reading</h2>
            <p class="mb-3 text-sm text-gray-700">I recorded this reading on March 27, after Allison permanently dismissed me from the volunteer program — without ever acknowledging the letter. To this day, it remains unanswered.</p>
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
        videoId: 'j7awLxjn4_4',
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



<style scoped>

</style>
