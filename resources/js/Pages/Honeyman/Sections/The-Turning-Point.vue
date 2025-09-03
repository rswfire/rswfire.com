<template>
    <section id="the-turning-point">
        <div class="my-8 prose prose-neutral max-full mx-auto">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 items-start md:items-baseline">
            <div>
              <h2 class="text-2xl font-semibold">HOW IT STARTED</h2>
              <div class="italic text-gray-600">FEBRUARY 9, 2025 &mdash; THE MOMENT SHE SAW ME</div>
            </div>
            <div class="md:justify-self-end">
              <button
                  @click="onCopy('hr-7')"
                  class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-gray-50"
                  aria-label="Copy section link"
              >
                <Icon name="Link2" color="text-green-600" class="w-4 h-4" /> Copy Section Link
              </button>
              <div v-if="justCopied" class="text-sm text-green-700 text-center">Copied ✓</div>
            </div>
          </div>
            <div class="mt-4">This email marked the pivot from a minor operational issue into a full-scale campaign of escalation. I sent it for two reasons:</div>
            <ul class=" list-decimal list-outside ml-8">
                <li>
                    <div><strong>To Set a Boundary</strong></div>
                    <div>I made it clear that dismissive responses were not acceptable. I had reached out in good faith about handling guest concerns during a power outage, and the response I received left me feeling minimized. In this message, I asserted &mdash; calmly but firmly &mdash; that my role deserved respect and that my questions were valid.</div>
                </li>
                <li>
                    <div><strong>To Insist on Clarity</strong></div>
                    <div>My questions weren’t abstract. As a volunteer host positioned directly across from the gate, I was the first point of contact for frustrated guests during overnight outages. I needed to know: Who should I call in off-hours? How do I get accurate updates? What information can I share with guests to keep them reassured? These are basic operational needs, and without answers, I was left exposed &mdash; responsible to the public, but unsupported by leadership.</div>
                </li>
            </ul>

            <div class="mt-4">By drawing this line &mdash; respect for my role, and clear answers for performing it effectively &mdash; I disrupted an unspoken norm: that volunteers should quietly accept whatever treatment they receive, even when it undermines their ability to do the work.</div>
            <div class="mt-4">Instead of responding with clarity or collaboration, leadership escalated. From this point forward, I was treated not as someone trying to serve responsibly, but as a problem to be neutralized. This email is therefore <strong>the hinge of the entire story</strong>: a good-faith request for guidance and respect that revealed the organization’s unwillingness to provide either. Everything that followed &mdash; humiliation, intimidation, surveillance, dismissal &mdash; was a reaction not to misconduct, but to the simple act of asserting boundaries and insisting on answers that mattered.</div>
            <div class="mt-4">This single incident &mdash; my request for clarity and respect &mdash; was repeatedly brought up as justification for later treatment. It resurfaced in conversations and meetings long after the fact, including the orchestrated day-use area meeting and the call with Allison Watson. What should have been a straightforward exchange about utility protocols became the foundation of the narrative used against me.</div>
            <div class="mt-4"><em>This started everything</em>.</div>

            <h3 class="mt-8 text-lg font-semibold">📝 Letter to Kati Baker</h3>

            <div class="mt-4 max-h-[40rem] overflow-y-auto border border-gray-300 rounded-md shadow-inner bg-white p-4 leading-relaxed font-mono">

                <div>Hi Kati,</div>

                <div class="mt-4">I wanted to follow up on our exchange about the H Loop power outage. When I choose my sites as a volunteer host, I'm always conscious of what each position means for guest interaction. Being across from the gate means being a natural point of contact, especially during overnight issues.</div>

                <div class="mt-4">I'm a systems thinker by nature and profession. When I reached out at 6 AM, after interacting with concerned guests since 3 AM, I was seeking to understand how to best serve within this system. Having clear protocols helps me provide better service, especially during situations like yesterday's water outage where guests became agitated.</div>

                <div class="mt-4">I hesitated to contact you at that hour because I wasn’t sure if other volunteers had already done so or if that was the correct protocol. And when I did reach out, the response I received made me feel small &mdash; like my concern wasn’t valid, when in reality, I was simply trying to do my job well. That hesitation is something I shouldn’t have to feel when I’m only seeking to be as effective as possible in a role that ultimately serves both guests and the park.</div>

                <div class="mt-4">I’m still seeking clarity on:</div>

                <div class="mt-4">1. Who to contact during off-hours utility issues</div>

                <div class="mt-4">2. How status updates are communicated so that volunteers and staff can access the same information</div>

                <div class="mt-4">3. What specific details I should provide to guests to ensure they feel informed</div>

                <div class="mt-4">I choose to be here because I care about making these parks work well for everyone. I want to be a valuable resource, but I also need to know my role is respected. Having clearer guidance on these points would help me serve both guests and staff more effectively.</div>

                <div class="mt-4">Additionally, I see an opportunity to improve how real-time updates are shared across teams. If there’s interest, I’d be happy to discuss a simple system for tracking and communicating outages, reducing redundant contacts while keeping everyone better informed.</div>

                <div class="mt-4">Best,</div>
                <div>Sam</div>

            </div>

        </div>

    </section>
</template>

<script setup>
import { ref, onBeforeUnmount } from 'vue'
import { useCopySectionLink } from '@/Composables/useCopySectionLink'
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
