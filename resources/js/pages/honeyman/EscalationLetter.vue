<template>
    <content>
        <hero
            title="HONEYMAN STATE PARK, OPRD &mdash; ALLISON IGNORES SERIOUS ALLEGATIONS"
            subtitle="The Letter Allison Watson Ignored"
            meta="Last Updated: 05/27/25 &mdash; WIP"
        />

        <div class="mt-5 p-4 pt-0 border border-gray-300 bg-gray-50 rounded-md shadow-sm">
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


        <para class="mt-5"><strong>This letter was sent to Allison Watson on March 25, 2025 — the evening before I was permanently dismissed from the Oregon State Parks volunteer program.</strong></para>
        <para><strong>It was not acknowledged. It was not referenced in the dismissal.</strong></para>
        <para><strong>It remains one of the most direct, measured attempts to bring clarity, truth, and accountability into an environment that rejected all three.</strong></para>
        <para><strong>To this day, it has never been answered.</strong></para>

        <para class="mt-5">Hi Allison,</para>

        <para>Thank you again for taking the time to speak with me. I’ve reflected on our conversation and want to offer some additional context for the record—both to clarify key points and to express concern about how some of what I shared may be interpreted.</para>

        <para>Throughout our conversation, I sensed a familiar pattern—where thoughtful, human interactions were being reframed post hoc as “inappropriate” or “concerning.” That reframing is not new to me. I experienced it often during my time at Honeyman, and it appeared again during our call. I want to be transparent about what I witnessed, and how it continues to shape my understanding of the institutional dynamics at play.</para>

        <para>Some moments I feel are important to emphasize:</para>
        <ul>

            <li class="pt-5 prose prose-neutral">Ryan telling me to "eat glass" during our March 5 meeting was not a miscommunication—it was inappropriate and aggressive. What I did not mention in the call, but now want to add, is that he used this same phrase in the Welcome Center the very first time he confronted me. That makes it a pattern. I have reason to believe this is not an isolated incident.</li>

            <li class="pt-5 prose prose-neutral">At the end of that March 5 meeting, Ryan spent five minutes repeating that “I could just leave” if I felt uncomfortable. That wasn’t support—it was pressure. The interaction felt coercive and deeply unprofessional. And you can hear it clearly in his tone.</li>

            <li class="pt-5 prose prose-neutral">Logan’s behavior, including doing stretches in front of me during a long shift at the Welcome Center, created discomfort and blurred boundaries. As a new volunteer, I didn’t know how to respond appropriately to a situation where I felt my professionalism was being tested by someone in a position of authority.</li>

            <li class="pt-5 prose prose-neutral">Logan also told me that Ranger Leaf would train me, a commitment he never followed through on—Leaf had no knowledge of it. That breach was the final breakdown of trust in what was already a fragile dynamic.</li>

            <li class="pt-5 prose prose-neutral">Ryan admitted in our meeting that he never gave me the benefit of the doubt, beginning with my initial interaction with Kati. That admission confirms the feeling I carried throughout my time at Honeyman: that I was being judged through a fixed lens, regardless of my conduct.</li>

            <li class="pt-5 prose prose-neutral">The journal incident was misrepresented. My comment to the ranger assistant—"not all rangers are helpful"—was not a criticism of staff. It was an appeal to ensure the journal was not ignored in the lost and found. As someone who has been homeless, I know the emotional significance of a journal, and I was simply asking that extra care be taken.</li>

            <li class="pt-5 prose prose-neutral">The issue of guest perception was related to my early text message to Kati when the power went out. My statement that “I own this problem in the eyes of guests” was not a misunderstanding of my role. It was an accurate reflection of how guests see park hosts—as the first point of contact. My message was about optics, not blame or misalignment.</li>

        </ul>

        <para class="pt-5">The common thread in all of this, and what I believe is the real issue, is how I’ve held leadership accountable in writing. The primary concern Ryan raised in that March 5 meeting was not my behavior—it was my emails. The vast majority of that meeting centered on my written communication, which I’ve always approached with clarity and intent. The discomfort, in my view, stemmed not from what I said—but from the fact that I said it in a format that created a record. This is an undeniable pattern that strikes at the heart of accountability and transparency.</para>

        <para>Additionally, I want to acknowledge something I did not bring up on the call: I am aware of at least three other volunteers who have had similar challenges with Ryan. His behavior is not isolated. His approach to volunteers appears to follow a consistent pattern. I raise this not to accuse, but to suggest that what I experienced fits into a broader pattern that may be worth further attention.</para>

        <para>I’m not sharing this to escalate or attack, but to ensure that the story doesn’t get flattened into something it never was. I’ve remained calm, communicative, and reflective throughout my time in this program. I’ve adapted, learned, and tried to contribute with sincerity and care. If there are aspects of my communication style that feel different, that is not a threat—it’s a strength. And it should not be weaponized to create distance or distrust.</para>

        <para>All I ask is that this be viewed with honesty and fairness. I am not asking for special treatment—just integrity in how this is held and assessed.</para>

        <para>The integrity of any volunteer program depends not only on the contributions of its volunteers—but on the willingness of leadership to be accountable when trust is compromised.</para>

        <para>Please include this message in my file as part of the ongoing review.</para>

        <para>Warm Regards,</para>

        <para>Sam White</para>

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

