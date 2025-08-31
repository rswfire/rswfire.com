<template>
    <section id="call-with-allison-watson">
        <div class="my-8 prose prose-neutral max-full mx-auto">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 items-start md:items-baseline">
            <div>
              <h2 class="text-2xl font-semibold">CALL WITH ALLISON WATSON</h2>
              <div class="italic text-gray-600">MARCH 25, 2025 &mdash; THE MOMENT THEY TRIED TO ERASE ME</div>
            </div>
            <div class="md:justify-self-end">
              <button
                  @click="onCopy('hr-13')"
                  class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-gray-50"
                  aria-label="Copy section link"
              >
                <Icon name="Link2" color="text-green-600" class="w-4 h-4" /> Copy Section Link
              </button>
              <div v-if="justCopied" class="text-sm text-green-700 text-center">Copied ✓</div>
            </div>
          </div>
            <div class="mt-4">This wasn’t a conversation. It was a containment protocol.</div>

            <div>One day after my dismissal from Honeyman &mdash;</div>
            <div class="ml-4">and one day before my entire volunteer role was terminated &mdash;</div>
            <div>I received a phone call from Allison Watson, Volunteer Engagement Coordinator for Oregon State Parks.</div>
            <div>I recorded the call for documentation and clarity.</div>

            <div class="mt-4">This call revealed the coordinated nature of my removal. Questions and framing that echoed the March 5 meeting. Personal information shared in confidence with Logan now <Link href="/fieldcraft/01K3EZWG5AS64E152MTTS9DEKR" class="text-honeyman-600 underline">weaponized</Link> as &quot;concerning behavior.&quot; Each response I gave was filtered through a predetermined narrative of problematic conduct.</div>

            <div class="mt-4">What you’ll hear is not a leader showing up in presence.</div>
            <div>It is institutional posture cloaked in empathy &mdash; a soft tone used to reroute accountability,</div>
            <div>a performance that frames legitimacy as disruption.</div>

            <div class="mt-4">In this call, you will hear:</div>
            <ul class="list-disc list-outside ml-8">
                <li>Vague, unverifiable third-party reports used to justify my removal.</li>
                <li>Reflective statements reframed as misconduct.</li>
                <li>Complete refusal to engage the March 5 coercion meeting.</li>
                <li>A poem treated as a behavioral issue.</li>
                <li>Empathy used not to connect &mdash; but to contain.</li>
            </ul>

            <div class="mt-4">That is who Allison Watson revealed herself to be at OPRD.</div>
            <div>And this from someone who is or was the <strong>Belonging, Equity &amp; Engagement Coordinator</strong></div>
            <div class="ml-4">&mdash; at Washington State University.</div>

            <div class="mt-4">The audio is clear. The subtext is clearer. This is what it sounds like when a system</div>
            <div>pretends to listen &mdash; while making sure nothing changes.</div>

            <div class="mt-6 border border-gray-200 shadow-sm rounded-md overflow-hidden">
                <div class="bg-gray-100 px-4 py-2 font-semibold">🔊 Full Recording &mdash; March 25 Call with Allison Watson</div>
                <div class="p-4">
                    <youtube-player videoId="Px_pCUo78w4" />
                </div>
                <para class="text-sm italic text-gray-500 m-0 p-2 ml-6 mb-4">
                    <div>That first breath you hear at the start?</div>
                    <div>It was me centering. I knew I was stepping into distortion &mdash;</div>
                    <div class="ml-4">and I held my clarity anyway.</div>
                </para>
            </div>

        </div>

    </section>
</template>

<script setup>
import YoutubePlayer from "@/Components/System/YoutubePlayer.vue";
import Para from "@/Components/System/Para.vue";
import { ref, onBeforeUnmount } from 'vue'
import { useCopySectionLink } from '@/Composables/useCopySectionLink'
import { Link } from "@inertiajs/vue3"
import Icon from "@/Components/System/Icon.vue";

const { copySectionLink } = useCopySectionLink()

const justCopied = ref(false)
let hideTimer

async function onCopy(anchorId) {
  await copySectionLink(anchorId)
  justCopied.value = true
  clearTimeout(hideTimer)
  hideTimer = setTimeout(() => (justCopied.value = false), 1200)
}

onBeforeUnmount(() => clearTimeout(hideTimer))
</script>
