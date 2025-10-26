<template>
  <Content :theme="pageTheme">
    <Hero
        title="AUTONOMY FOR CONTENT CREATORS"
        subtitle="YOUTUBE FLATTENS YOU. AUTONOMY PRESERVES YOUR SIGNAL."
        meta="TAKE YOUR ARCHIVE BACK"
        :theme="pageTheme"
    />

    <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

      <!-- Positioning -->
      <section class="text-center mb-12">
        <p class="text-lg font-semibold text-neutral-700">
          Platform infrastructure that doesn’t rent your audience back to you.
        </p>
      </section>

      <!-- What is Autonomy -->
      <section class="space-y-4">
        <h2 class="text-2xl font-semibold">What is Autonomy?</h2>
        <p>Autonomy is infrastructure for creators who want to reclaim their catalog, deepen their work, and build aligned communities — without platform lock-in.</p>
        <p>You don’t rent your presence here. You own it.</p>
      </section>


      <!-- The Transmission -->
      <section class="mt-20 space-y-4 text-left">

        <div class="grid grid-cols-1 md:grid-cols-[3fr_2fr] gap-12 max-w-5xl mx-auto items-start">

          <div class="space-y-4">

            <h2 class="text-2xl font-bold">📹 The Transmission</h2>
            <p class="text-base text-neutral-700">
              What you’re about to see isn’t a trailer. It’s not a promo. It’s the field in motion.
            </p>
            <p class="text-base text-neutral-700">
              In this video, I explain what <strong>Autonomy</strong> is &mdash; not as a concept, but as a working system I’ve built for creators who are done being flattened by platforms.
            </p>
            <p class="text-base text-neutral-700">
              This isn’t just about hosting your own videos. It’s about restoring your <em>relationship</em> to your archive, your audience, and your own evolution as a creator.
            </p>
            <p class="text-base text-neutral-700">
              I walk through the full architecture &mdash; from transcript automation and metadata extraction to tiered subscriptions, searchable reflections, and total stack ownership.
            </p>
            <p class="text-sm text-neutral-500 italic">
              You don’t rent your presence back from an algorithm. You own the mirror.
            </p>
          </div>

          <div class="w-full">
            <Transmission
                videoId="GBVaLX75BDo"
                signalUlid="01K8F6K3N3KX9R8RZENMDZEZ2C"
                color="text-system"
            />
            <div class="mt-4 ml-4">
              <div class="text-gray-600 text-sm tracking-wide uppercase mb-1">ESSENTIAL READING</div>
              <div class="text-gray-800 font-medium"><Link href="/fieldcraft/01K8FP372QH72MNA6FWMFBGA99" class="text-lg text-system-600 hover:underline">How This Was Really Built →</Link></div>
            </div>
          </div>

        </div>

      </section>

      <!-- Use Cases -->
      <section class="mt-12 space-y-6">
        <h3 class="text-xl font-bold">What This Looks Like in the Wild</h3>
        <p class="text-sm text-neutral-500 italic mt-4">Built for real creators with real complexity — not just influencers.</p>
        <div class="space-y-4 text-base">
          <div class="flex items-start space-x-3">
            <Icon name="Users" color="text-indigo-500" class="w-4 h-4 mt-1" />
            <div>
              <p class="font-semibold">The Creator with a Backlog:</p>
              <p>A searchable archive of every upload — summarized, tagged, and clustered by theme. Your work, made navigable.</p>
            </div>
          </div>
          <div class="flex items-start space-x-3">
            <Icon name="Mic" color="text-purple-500" class="w-4 h-4 mt-1" />
            <div>
              <p class="font-semibold">The Channel That Teaches:</p>
              <p>A self-hosted school. Full lectures, deep dives, and bonus cuts — organized by topic, gated by tier.</p>
            </div>
          </div>
          <div class="flex items-start space-x-3">
            <Icon name="Drama" color="text-blue-500" class="w-4 h-4 mt-1" />
            <div>
              <p class="font-semibold">The Performer with Layers:</p>
              <p>Early access, raw takes, and member-only streams — all delivered from a platform you own.</p>
            </div>
          </div>
          <div class="flex items-start space-x-3">
            <Icon name="Puzzle" color="text-green-600" class="w-4 h-4 mt-1" />
            <div>
              <p class="font-semibold">The Builder with a Framework:</p>
              <p>Tools, templates, or protocols tied to your videos — versioned, categorized, and monetized.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Problem -->
      <section class="mt-20 space-y-4">
        <p class="text-xs uppercase tracking-wide text-gray-500 mb-2">The Problem</p>
        <h3 class="text-xl font-bold">Why YouTube Can't Be Your Archive</h3>
        <p class="italic text-base text-gray-600 mt-4">"You make content. YouTube buries it in noise."</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-6 text-base">
          <div>
            <div class="flex items-center gap-2 mb-2">
              <Icon name="Clock" class="w-4 h-4 text-gray-500" />
              <p class="font-semibold">Temporal Flattening</p>
            </div>
            <ul class="list-disc ml-5 space-y-1 text-gray-800">
              <li>Old content disappears.</li>
              <li>Recency &gt; relevance.</li>
              <li>You compete with yourself.</li>
            </ul>
          </div>
          <div>
            <div class="flex items-center gap-2 mb-2">
              <Icon name="ListTree" class="w-4 h-4 text-gray-500" />
              <p class="font-semibold">No Organization</p>
            </div>
            <ul class="list-disc ml-5 space-y-1 text-gray-800">
              <li>Can’t cluster by theme.</li>
              <li>No structure for timelines.</li>
              <li>Broken search, weak playlists.</li>
            </ul>
          </div>
          <div>
            <div class="flex items-center gap-2 mb-2">
              <Icon name="BadgeX" class="w-4 h-4 text-gray-500" />
              <p class="font-semibold">Not Yours</p>
            </div>
            <ul class="list-disc ml-5 space-y-1 text-gray-800">
              <li>Platform owns the relationship.</li>
              <li>One policy change = collapse.</li>
              <li>Core tools withheld until you ‘earn’ them.</li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Solution -->
      <section class="mt-20 space-y-6">
        <h2 class="text-2xl font-bold">The Solution: Your Archive. Your Architecture.</h2>
        <div class="flex items-start gap-3">
          <Icon name="Tally1" class="w-5 h-5 mt-1 text-neutral-500" />
          <div>
            <p class="font-semibold">Ingest Your Backlog</p>
            <p>Pull your full YouTube catalog. Extract transcripts. Generate structured metadata.</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <Icon name="Tally2" class="w-5 h-5 mt-1 text-neutral-500" />
          <div>
            <p class="font-semibold">Reflect & Structure</p>
            <p>AI creates summaries, clusters, and themes — turning chaos into coherence.</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <Icon name="Tally3" class="w-5 h-5 mt-1 text-neutral-500" />
          <div>
            <p class="font-semibold">Launch Your Platform</p>
            <p>Get a custom, self-hosted frontend. Searchable by tag, topic, and timeline.</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <Icon name="Tally4" class="w-5 h-5 mt-1 text-neutral-500" />
          <div>
            <p class="font-semibold">Monetize on Your Terms</p>
            <p>Integrated subscriptions, tiered access, and no platform rent.</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <Icon name="Tally5" class="w-5 h-5 mt-1 text-neutral-500" />
          <div>
            <p class="font-semibold">Control the Stack</p>
            <p>Swap AI layers. Extend the logic. Your archive, your mind, your rules.</p>
          </div>
        </div>
        <p class="mt-6 italic text-sm text-neutral-500">“Not just archiving &mdash; authoring.”</p>
      </section>


      <!-- Deliverables -->
      <section class="mt-20">
        <h3 class="text-xl font-bold mb-4">What You Get</h3>

        <!-- Modular AI Reflection -->
        <div class="mt-6">
          <h4 class="text-lg font-semibold mb-2">🧠 Modular AI Reflection</h4>
          <p>Your content is processed by a modular AI pipeline &mdash; or your own. The cognition layer is swappable.</p>
          <ul class="list-disc ml-6 mt-2 space-y-1">
            <li>Use my hosted pipeline or bring your own (API, open-source, or local).</li>
            <li>Define custom logic for summarization, embedding, and linking.</li>
            <li>Control what gets processed, when, and how.</li>
            <li>Every output is versioned and transparent &mdash; no black box.</li>
          </ul>
        </div>

        <!-- Ownership & Access -->
        <div class="mt-6">
          <h4 class="text-lg font-semibold mb-2">🔐 Ownership & Access</h4>
          <p>You own everything that matters.</p>
          <ul class="list-disc ml-6 mt-2 space-y-1">
            <li>Full codebase, branded frontend, and structured catalog.</li>
            <li>All processed metadata, reflections, and search indexes.</li>
            <li>Host it yourself, or let me manage it.</li>
            <li>Optional access to my reflection API for future uploads.</li>
          </ul>
        </div>

        <!-- Custom Build & Hosting -->
        <div class="mt-6">
          <h4 class="text-lg font-semibold mb-2">🛠️ Custom Build & Hosting</h4>
          <p>Each platform is scoped to your archive — and tuned to your goals.</p>
          <ul class="list-disc ml-6 mt-2 space-y-1">
            <li>Typical timeline: <strong>3–6 weeks</strong>, depending on size and depth.</li>
            <li>Builds are portable, fully documented, and tailored to your structure.</li>
            <li>Hosting can be self-managed or provided via subscription.</li>
          </ul>
        </div>

        <!-- Pricing -->
        <div class="mt-6">
          <h4 class="text-lg font-semibold mb-2">💸 Pricing</h4>
          <p>Project-based and customized to you.</p>
          <ul class="list-disc ml-6 mt-2 space-y-1">
            <li>Starting at <strong>$500+</strong>, with pricing scaled to archive size and complexity.</li>
            <li>Includes ingestion, processing, interface setup, and optional subscription layer.</li>
            <li>Flexible hosting and processing options priced separately.</li>
            <li>Every project begins with a clear, detailed proposal &mdash; no surprises.</li>
          </ul>
        </div>
      </section>

      <!-- CTA -->
      <section class="mt-16 text-center space-y-4">
        <p class="text-lg font-semibold">Ready to own your archive?</p>
        <div>
          <Link href="/contact" class="text-base font-medium hover:underline">Contact Me</Link>
          <p class="text-sm text-gray-500">To begin building your own.</p>
        </div>

        <p class="text-sm text-gray-500">Not sure yet? Start by exploring the demo.</p>
        <div>
          <Link href="/transmissions" class="text-base font-medium hover:underline">See Demo (My Archive)</Link>
          <p class="text-sm text-gray-500 italic">A living example — structured, searchable, and self-hosted.</p>
        </div>
      </section>


    </div>
  </Content>
</template>

<script setup>
import { ref, onBeforeUnmount } from 'vue'
import { Link } from "@inertiajs/vue3"
import { useCopySectionLink } from '@/Composables/useCopySectionLink'
import Hero from "@/Components/System/Hero.vue"
import Content from "@/Components/System/Content.vue"
import Icon from "@/Components/System/Icon.vue"
import Transmission from "@/Components/System/Transmission.vue";

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

const pageTheme = "autonomy"
</script>
