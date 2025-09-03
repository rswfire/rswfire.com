<template>
    <section id="logan">
        <div class="my-8 prose prose-neutral max-full mx-auto">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 items-start md:items-baseline">
            <div>
              <h2 class="text-2xl font-semibold">LOGAN</h2>
              <div class="italic text-gray-600">MARCH 2, 2025 &mdash; THE MOMENT TRUST WAS BROKEN</div>
            </div>
            <div class="md:justify-self-end">
              <button
                  @click="onCopy('hr-8')"
                  class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-gray-50"
                  aria-label="Copy section link"
              >
                <Icon name="Link2" color="text-green-600" class="w-4 h-4" /> Copy Section Link
              </button>
              <div v-if="justCopied" class="text-sm text-green-700 text-center">Copied ✓</div>
            </div>
          </div>
            <div class="mt-4">Logan was my direct supervisor. From the beginning, we formed something like a friendship. I saw in him a mix of depth and integrity, sometimes in quiet tension with the institution he served. I chose to make space for that. What I didn’t see &mdash; or didn’t want to &mdash; was that his integrity is compartmentalized.</div>
            <div class="mt-4">Logan participated in many of the dynamics detailed in this archive, though his role was tertiary &mdash; directives seeded by Ryan and Kati. When it became clear they were actively sabotaging my trajectory, I acted to protect myself. I wrote the &quot;Trust&quot; email to sever a dynamic that had become harmful.</div>
            <div class="mt-4">This letter requires context &mdash; context I would have preferred to leave private. I navigated this relationship with care. That care was later used against me.</div>
            <div class="mt-4">During the March 5 meeting, Ryan said &mdash; with mocking tone &mdash; that I &quot;thought I had a future with Logan.&quot; It was absurd. I laughed. But I understood the insinuation. It was an accusation of inappropriate feelings &mdash; a weaponization of my sexuality, and a distortion of ordinary human emotion. And I’m nearly certain it only entered the narrative with Logan’s consent.</div>
            <div class="mt-4">He also disclosed vulnerable, personal information I shared with him in <Lexicon term="trust">trust</Lexicon> &mdash; information later used by Allison Watson to pathologize my character during dismissal proceedings.</div>
            <div><Link href="/fieldcraft/01K3EZWG5AS64E152MTTS9DEKR" class="text-honeyman-600 underline">Full documentation here →</Link></div>
            <div class="mt-4">That is not just unethical. It is betrayal.</div>
            <div>But I will not center their <lexicon term="distortion">distortions</lexicon>.</div>
            <div class="mt-4">For the record: nothing inappropriate ever happened between us. He was simply someone I <Lexicon term="trust">trusted</Lexicon> &mdash; and someone I now understand I should not have.</div>
            <div class="mt-4">I’ve chosen not to center him &mdash; not because his actions were minor, but because they were embedded in proximity and <Lexicon term="trust">trust</Lexicon>. That dynamic requires precision, not amplification.</div>
            <div class="mt-4">I think it deserves consequences &mdash; but perhaps private ones. He’s a younger ranger, in a toxic, fragmented environment. That’s not an excuse. But it is part of the system he’s inside.</div>
            <div class="mt-4">When Logan lied to me &mdash; and there’s no other word for it &mdash; I saw the writing on the wall. They were creating conditions they hoped would lead to my removal.</div>
            <div class="mt-4">That moment made clear: Logan was acting under instruction from people who were persistently unethical. And yet, in a different environment &mdash; with support, with reflection, and without distortion &mdash; I still believe Logan could thrive.</div>

            <h3 class="mt-8 text-lg font-semibold">📝 The &quot;Trust&quot; Email &mdash; Letter to Volunteer Coordinator Logan</h3>

            <div class="mt-4 max-h-[40rem] overflow-y-auto border border-gray-300 rounded-md shadow-inner bg-white p-4 leading-relaxed font-mono">

                <div>Logan,</div>

                <div class="mt-4">I don’t trust you, and that’s because your actions have given me no reason to.</div>

                <div class="mt-4">When I confided in you about the situation with Kati, you escalated it instead of protecting me. Then you disappeared.</div>

                <div class="mt-4">When I applied for a job here, you distanced yourself again. The moment I withdrew my application, you reappeared &mdash; spending ninety minutes talking about yourself.</div>

                <div class="mt-4">When I finally opened up to you about why I’m here, what I sacrificed to be here, and why this matters to me, you responded by trying to manage my perception instead of actually listening.</div>

                <div class="mt-4">And then? You distanced yourself again.</div>

                <div class="mt-4">When I warned you &mdash; privately &mdash; to prevent a repeat of the Kati situation, you assured me Leaf would train me. That didn’t happen.</div>

                <div class="mt-4">At every critical moment, you have failed to act with integrity.</div>
                <div>At every opportunity to lead, you have instead chosen avoidance.</div>

                <div class="mt-4">I will continue to do my job professionally for the next month.</div>
                <div>You will ensure that my contributions are recognized appropriately in your system.</div>

                <div class="mt-4">I will not allow the dysfunction here to interfere with my larger trajectory.</div>
                <div>If there is any pushback on this, understand that I am fully prepared for it.</div>

                <div class="mt-4">Sam</div>

            </div>

        </div>

    </section>
</template>

<script setup>
import { ref, onBeforeUnmount } from 'vue'
import { useCopySectionLink } from '@/Composables/useCopySectionLink'
import { Link } from "@inertiajs/vue3"
import Icon from "@/Components/System/Icon.vue";
import Lexicon from "@/Components/System/Lexicon.vue";

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
