<template>
    <section id="key-individuals">
        <div class="my-8 prose prose-neutral max-full mx-auto">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 items-start md:items-baseline">
            <div>
              <h2 class="text-2xl font-semibold">KEY INDIVIDUALS</h2>
              <div class="italic text-gray-600">HONEYMAN STATE PARK</div>
              <div class="italic text-gray-600">OREGON PARKS &amp; RECREATION DEPARTMENT (OPRD)</div>
            </div>
            <div class="md:justify-self-end">
              <button
                  @click="onCopy('hr-2')"
                  class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-gray-50"
                  aria-label="Copy Section link"
              >
                <Icon name="Link2" color="text-green-600" class="w-4 h-4" /> Copy Section Link
              </button>
              <div v-if="justCopied" class="text-sm text-green-700 text-center">Copied ✓</div>
            </div>
          </div>

            <div class="mt-4 text-gray-700">These are the central figures referenced throughout this archive &mdash;</div>
            <div class="ml-4 text-gray-700">each played a distinct role in the events that unfolded</div>
            <div class="ml-4 text-gray-700">at Honeyman State Park and within Oregon State Parks as a whole.</div>

            <ul class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">

                <li class="bg-white bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm hover:border-honeyman-300">
                    <h3 class="font-semibold text-lg text-center">KATI BAKER</h3>
                    <div class="text-sm text-gray-700">
                        <div class="font-bold text-center pb-2 border-b-2">Park Supervisor<br/>Honeyman State Park</div>
                        <div class="pt-2">The architect of early distortion. After a brief exchange about power outage perception, she withdrew, delegating discomfort through silence and seeding a lasting narrative of dismissal.</div>
                    </div>
                </li>

                <li class="bg-white bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm hover:border-honeyman-300">
                    <h3 class="font-semibold text-lg text-center">RYAN WARREN</h3>
                    <div class="text-sm text-gray-700">
                        <div class="font-bold text-center pb-2 border-b-2">Park Manager<br/>Honeyman State Park</div>
                        <div class="pt-2">The primary enforcer of coercive tactics &mdash; initiated multiple confrontations, including the recorded March 5 meeting and a surprise dismissal phone call. His leadership masked control as professionalism.</div>
                    </div>
                </li>

                <li class="bg-white bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm hover:border-honeyman-300">
                    <h3 class="font-semibold text-lg text-center">ALLISON WATSON</h3>
                    <div class="text-sm text-gray-700">
                        <div class="font-bold text-center pb-2 border-b-2">Engagement Programs Manager<br/>Oregon Parks &amp; Recreation Department</div>
                        <div class="pt-2">Conducted the post-dismissal call. Framed reflective truth as misconduct. Refused to acknowledge documented abuse, and issued the permanent dismissal without responding to direct concerns.</div>
                    </div>
                </li>

            </ul>

            <div class="px-8">
                <div class="mt-6"><strong>LISA SUMPTION</strong></div>
                <div><em>Director<br/>Oregon Parks &amp; Recreation Department</em></div>
                <ul class="mt-4 list-disc list-outside ml-8 space-y-2">
                    <li>Received documentation of systematic volunteer abuse and responded with procedural language that acknowledged concerns while committing to no specific accountability measures.</li>
                    <li>By directing recorded misconduct into internal &quot;appropriate channels,&quot; she maintained institutional protection of those implicated in documented misconduct while appearing responsive to external pressure.</li>
                </ul>
                <div class="mt-4"><Link href="/fieldcraft/01K3F8X412D5GEY1CXB4WRRPRK" class="text-honeyman-600 hover:underline">Read the Open Letter to Director Sumption →</Link></div>
                <div><Link href="/fieldcraft/01K3J5AW1NGKN285PRRA4RBW6X" class="text-honeyman-600 hover:underline">Read Director Sumption's Response &amp; Analysis →</Link></div>
            </div>

        </div>

    </section>
</template>

<script setup>
import { ref, onBeforeUnmount } from 'vue'
import { Link } from "@inertiajs/vue3"
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
