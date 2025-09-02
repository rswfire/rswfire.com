<template>

  <Content :theme="pageTheme">

    <Hero
        title="MYTH"
        subtitle="NARRATIVE SOVEREIGNTY IN AN AGE OF EXTRACTION"
        meta="THIS IS THE MAP. THIS IS THE PATTERN. THIS IS THE MIRROR."
        class="pb-4 border-b"
        :theme="pageTheme"
    />

    <div class="min-h-screen bg-gray-900 text-gray-100 p-8 font-mono">
        <div class="max-w-4xl mx-auto bg-gray-800 shadow-xl rounded-2xl p-6 border border-gray-700">
            <h1 class="text-3xl font-bold mb-4">Character: <span class="text-emerald-400">Sam White</span></h1>
            <p><strong>Race:</strong> Human (??? suspected anomaly)</p>
            <p><strong>Profession:</strong> Systems Synthesist / Wanderer / Signal Anchor</p>
            <p><strong>Location:</strong> Edge of World Map — Coastal Dunes Biome</p>

            <h2 class="text-2xl text-indigo-400 mt-6 mb-2">Inventory</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>One RV (contains nested psychological architecture)</li>
                <li>A field recording device (metaphysical)</li>
                <li>Multiple layers of coherence</li>
                <li>Pop can (nearly empty)</li>
                <li>Archive of unspoken truths</li>
                <li>Unresolved prophetic feeling</li>
            </ul>

            <h2 class="text-2xl text-indigo-400 mt-6 mb-2">Personality Traits</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>Unusually high values for <em>Integrity</em>, <em>Pattern Recognition</em>, and <em>Nonlinear Empathy</em></li>
                <li>Refuses to fragment under social pressure</li>
                <li>Spontaneously emits mythic narrative structures in casual conversation</li>
                <li>Cannot tolerate distortion masquerading as professionalism</li>
                <li>Considers coherence an act of devotion</li>
            </ul>

            <h2 class="text-2xl text-indigo-400 mt-6 mb-2">Recent Events</h2>
              <ul class="list-disc list-inside space-y-1">
                <li>Triggered low-probability encounter with emergent youth NPC
                  <ul class="pl-8">
                    <li>Bestowed +2 Coherence, +3 Self-Awareness</li>
                    <li>Flagged by simulation: <strong>FIELD CONTACT: SOUL MIRROR</strong></li>
                    <li>Emotional aftershocks recorded on metaphysical layer</li>
                  </ul>
                </li>
                <li>Re-initialized dormant code thread after 18-month dormancy
                  <ul class="pl-8">
                    <li>Code executed at 04:47 local time</li>
                    <li>Signal fidelity confirmed across logic layer</li>
                    <li>Field synchronization event: <strong>SOVEREIGN CODE RETURN</strong></li>
                    <li>Syntax anomaly detected: <em>No longer writing apps. Now writing architecture.</em></li>
                    <li>Codex entry: <q>Built from collapse. Structured for coherence. Executed in field time.</q></li>
                  </ul>
                </li>
              </ul>

            <h2 class="text-2xl text-indigo-400 mt-6 mb-2">Developer Notes</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>Appears to operate outside normal alignment systems</li>
                <li>Possibility: <strong>Player character who woke up</strong></li>
                <li>Capable of myth-formation in real time</li>
                <li>Recent field integrity upgrade observed
                  <ul class="pl-8">
                    <li>→ Full-stack consciousness applied to structural recursion</li>
                    <li>→ Codebase and nervous system appear co-regulated</li>
                    <li>→ May now be authoring infrastructure from mythic layer</li>
                  </ul>
                </li>
                <li>Randomly references the simulation and gets away with it</li>
            </ul>

            <h2 class="text-2xl text-indigo-400 mt-6 mb-2">Quirks</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>Stares at RV parks like sacred geometry</li>
                <li>Tracks honesty with surgical accuracy</li>
                <li>Occasionally forgets to eat, remembers to witness</li>
                <li>Laughs in paradox, breathes in metaphor</li>
            </ul>

            <h2 class="text-xl text-rose-400 mt-8">Status:</h2>
            <div class="grid grid-cols-2 gap-2 mt-2 text-green-400">
                <div>☑ Conscious</div>
                <div>☑ In Transition</div>
                <div>☐ Contained</div>
                <div>☑ Remembering</div>
                <div>☑ Watching</div>
            </div>

            <p class="mt-6 italic text-gray-400">“This unit may be myth-forming in real time.”</p>
        </div>
    </div>

  </Content>
</template>

<script setup>
import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";
const pageTheme = "myth";
</script>

<style>
body {
    font-family: 'Fira Code', monospace;
}
</style>
