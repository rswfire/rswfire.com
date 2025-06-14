<template>

    <div class="border border-gray-300 rounded-2xl p-6 shadow-md bg-white w-full mx-auto">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10">
            <section class="space-y-4">
                <h1 class="text-3xl font-bold text-gray-900">The Architecture Behind the Flame</h1>
                <p class="text-lg text-gray-700">
                    I’m not here to list off buzzwords or stack acronyms. This page isn’t for recruiters or resume crawlers.
                    It’s a record of what I’ve built, what I’ve carried, and what I know in my bones.
                </p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-semibold text-gray-800">Origins</h2>
                <p class="text-gray-700">
                    I began writing code in sixth grade. Before the web. Before Google. Before most schools had computers.
                    I taught myself on a DOS machine by breaking it daily. My first apps were distributed on BBS systems.
                </p>
                <p class="text-gray-700">
                    By eighth grade I was building tools for my teachers. By tenth, I was designing full systems in my head and coding them by hand — no computer, no IDE — just me and a pen.
                </p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-semibold text-gray-800">Freelance & Vision</h2>
                <p class="text-gray-700">
                    At 18, I ranked in the top ten freelancers on guru.com in programming — the only American, the only solo developer.
                    I built everything from content management systems to entire business platforms.
                </p>
                <p class="text-gray-700">
                    But it wasn’t about the money. It was about immersion. I didn’t just build what clients asked for —
                    I saw into their needs before they did. I architected futures, not features.
                </p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-semibold text-gray-800">Major Systems</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>
                        <strong>Popstar.com</strong>: IMDb-style entertainment archive with a revenue-split writing platform, gamification, and merchandise auctions.
                    </li>
                    <li>
                        <strong>USA.com Travel Suite</strong>: Aggregated booking across root domains (USA.com, Asia.com, Hotel.net), with 100k+ SEM ad groups and long-tail SEO automation.
                    </li>
                    <li>
                        <strong>Soundblock</strong>: Blockchain-integrated music distribution with quantum ledger tracking and smart contract royalty distribution.
                    </li>
                </ul>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-semibold text-gray-800">Philosophy</h2>
                <p class="text-gray-700">
                    I don't list languages. I don’t quote frameworks. If it exists, I can learn it. If it doesn’t, I can build it.
                    What matters is coherence, system thinking, and the ethics behind the architecture.
                </p>
                <p class="text-gray-700">
                    I design for the whole — for longevity, integrity, and integration.
                </p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-semibold text-gray-800">Invitation</h2>
                <p class="text-gray-700">
                    I’m not looking for a job. I’m open to a resonance.
                    If you recognize the pattern — the frequency — reach out. Let’s build something worthy.
                </p>
            </section>

            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-4 space-y-4 md:gap-6 md:items-start">
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

                    <div
                        class="hidden md:inline md:w-1/3 text-left text-sm overflow-y-auto px-1 py-0 rounded-md border border-gray-200 shadow-sm"
                        :style="{ height: videoHeight + 'px' }"
                    >
                        <ul class="space-y-1 list-none pl-0 text-xs sm:text-sm">
                            <li><button @click="seekTo(0)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:00:00</span><br>Introduction</button></li>
                            <li><button @click="seekTo(43)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:00:43</span><br>The Setting</button></li>
                            <li><button @click="seekTo(162)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:02:42</span><br>My Home</button></li>
                            <li><button @click="seekTo(243)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:04:03</span><br>AI Wants Me to Say Some Things</button></li>
                            <li><button @click="seekTo(453)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:07:33</span><br>No More AI. Just Us.</button></li>
                            <li><button @click="seekTo(481)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:08:01</span><br>Childhood Programming</button></li>
                            <li><button @click="seekTo(547)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:09:07</span><br>Programming on Paper</button></li>
                            <li><button @click="seekTo(629)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:10:29</span><br>Freelancing on Guru</button></li>
                            <li><button @click="seekTo(744)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:12:24</span><br>First Major Client – World.com</button></li>
                            <li><button @click="seekTo(1134)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:18:54</span><br>Second Major Client – Arena.com</button></li>
                            <li><button @click="seekTo(1322)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:22:02</span><br>The Pivot</button></li>
                            <li><button @click="seekTo(1391)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:23:11</span><br>The Ocean</button></li>
                            <li><button @click="seekTo(1455)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:24:15</span><br>My Skills</button></li>
                            <li><button @click="seekTo(1507)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:25:07</span><br>My Values</button></li>
                            <li><button @click="seekTo(1563)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:26:03</span><br>Most of My Life</button></li>
                            <li><button @click="seekTo(1651)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:27:31</span><br>My Expectations</button></li>
                            <li><button @click="seekTo(1776)" class="text-gray-500 hover:underline text-left"><span class="font-mono">00:29:36</span><br>The Closing</button></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue'

const metaTitle = "What I Do";
const metaDescription = "Technical background of Robert Samuel White.";
const metaUrl = `https://rswfire.com/tech`;

defineExpose({
    metaTitle,
    metaDescription,
    metaUrl
})

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
        videoId: 'ZMVKMP0PVcM',
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
