<template>
    <section id="permanent-dismissal">
        <div class="my-8 prose prose-neutral max-full mx-auto">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 items-start md:items-baseline">
            <div>
              <h2 class="text-2xl font-semibold">PERMANENT DISMISSAL</h2>
              <div class="italic text-gray-600">MARCH 27, 2025 &mdash; THE DOCUMENT THAT GAVE THEM AWAY</div>
            </div>
            <div class="md:justify-self-end">
              <button
                  @click="onCopy('hr-15')"
                  class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-gray-50"
                  aria-label="Copy section link"
              >
                <Icon name="Link2" color="text-green-600" class="w-4 h-4" /> Copy Section Link
              </button>
              <div v-if="justCopied" class="text-sm text-green-700 text-center">Copied ✓</div>
            </div>
          </div>
            <div class="mt-4 text-lg"><strong>This was my first attempt at institutional belonging. They didn't just harm a volunteer &mdash; they corrupted someone's introduction to civic participation. The betrayal I had to metabolize operates at the level of citizenship itself. That is a stain they will never be able to wash off.</strong></div>

            <div class="mt-4">It’s important to be precise about the sequence.</div>
            <div>Ryan dismissed me from Honeyman on March 24. That dismissal came suddenly, without paperwork, and without cause &mdash; documented on video.</div>

            <div class="mt-4">Only after that rupture, once Ryan had already dismissed me without paperwork or cause, did I make a video describing my experience. It wasn’t performance &mdash; it was necessity. I had been ordered to vacate the park, and I needed financial support to comply with that demand. Speaking publicly was how I ensured I could leave safely, with fuel, food, and stability intact.</div>

            <div class="mt-4">The video wasn’t provocation. It was survival. It was the act of telling the truth, not to attack the system, but to explain to my own community what had just happened &mdash; and to ask for help in meeting the consequences they imposed.</div>

            <div class="mt-4">That necessity &mdash; the very thing they created by expelling me &mdash; became the justification for expelling me again, permanently.</div>
            <div>Days later, that act of truth-telling became the justification for my permanent dismissal from all Oregon State Parks volunteer programs.</div>

            <div class="mt-4">Allison Watson sent me a formal email and letter. The language was vague and polished, but the fingerprint is unmistakable:</div>

            <div class="mt-4">&quot;While you are able to share your opinion, perspective, and experience as an individual with the public, the public comments made about staff regarding your volunteer service, were not in line with expectations set forth in the agreement.&quot;</div>

            <div class="mt-4">This was not about conduct at the park.</div>
            <div>This was not about my work &mdash; which had been praised.</div>
            <div>This was about the act of speaking.</div>

            <div class="mt-4">I was removed from Honeyman for refusing to fracture.</div>
            <div>I was removed from the program for refusing to stay silent.</div>

            <div class="mt-4">The irony is brutal:</div>
            <div>I documented my dismissal.</div>
            <div>And they dismissed me again for documenting it.</div>

            <div class="mt-4">This letter is proof.</div>
            <div>It ties my permanent exclusion not to behavior on duty, but to public witness afterward.</div>
            <div>It is a written acknowledgment that Oregon State Parks punishes whistleblowing &mdash; not misconduct.</div>

            <h3 class="mt-8 text-lg font-semibold">📝 Dismissal Email from Allison Watson</h3>

            <div class="mt-4 max-h-[40rem] overflow-y-auto border border-gray-300 rounded-md shadow-inner bg-white p-4 leading-relaxed font-mono">
                <div>Hello Sam,</div>

                <div class="mt-4">After reviewing the dismissal as a park host from Jessie M. Honeyman State Park, your service, and communications with and about OPRD these past three months, we’ve identified that this volunteer relationship is no longer mutually beneficial.</div>

                <div class="mt-4">As stated in your volunteer service agreement, we require volunteers to &quot;Engage in welcoming interactions with the public, staff, and other volunteers: volunteers must be … professional towards…other volunteers, employees….at all times.&quot; While you are able to share your opinion, perspective, and experience as an individual with the public, the public comments made about staff regarding your volunteer service, were not in line with expectations set forth in the agreement. At this time, OPRD has found that you are not able to professionally represent the volunteer park host program.</div>

                <div class="mt-4">As part of your dismissal, any future assignments you had scheduled will be cancelled. If you have not already returned your volunteer uniform items at Honeyman, please drop uniform items off on the bench outside of Umpqua Lighthouse State Park’s office door.</div>

                <div class="mt-4">Thank you for the time you did dedicate to support our state park system and state park properties. I wish you the best in any other volunteer opportunities you may pursue with other organizations. Please find an official letter of dismissal and your volunteer agreement attached to this email.</div>

                <div class="mt-4">Respectfully,</div>

                <div class="mt-4">Allison Watson</div>
            </div>

            <div class="mt-4 text-center font-bold italic">This is the loop: dismissed, then punished for naming the dismissal. A logic so thin it reveals itself.</div>
            <div class="text-center italic">On a letterhead so hastily written, the date itself has a typo.</div>
            <div class="text-center"><a class="text-honeyman-600 underline" href="/oprd-dismissal.pdf" download>Download the Dismissal Letter (PDF)</a></div>

        </div>

    </section>
</template>

<script setup>
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
