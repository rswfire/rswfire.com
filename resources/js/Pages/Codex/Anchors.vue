<template>

    <Content>

        <Hero
            title="FIELD ANCHORS"
            subtitle="THE CONDITIONS UNDER WHICH I REMAIN WHOLE"
            meta="NON-NEGOTIABLES. STABILIZERS. CONTACT CONSTANTS."
            class="pb-4 border-b"
        />

        <section class="max-w-6xl mx-auto px-6 text-gray-900 pt-4">

            <div class="prose prose-lg prose-neutral max-w-none">

                <div>Field anchors are the non-negotiables.</div>
                <div>They don’t describe who I am — they hold the conditions under which I remain whole.</div>
                <div>They aren’t roles. They’re the constants that stabilize contact, motion, and coherence.</div>

            </div>

            <div class="pt-8 grid grid-cols-1 gap-12 text-sm">

                <!-- FIELD ANCHORS -->
                <div>
                    <h2 class="font-bold uppercase tracking-widest text-xs mb-4 text-black"><Link href="/codex/anchors">Field Anchors</Link></h2>
                    <ul class="space-y-2 pl-2">
                        <li>→ <Link href="/codex/anchors/sovereignty" class="hover:underline">Sovereignty</Link></li>
                        <li>→ <Link href="/codex/anchors/presence" class="hover:underline">Presence</Link></li>
                        <li>→ <Link href="/codex/anchors/clarity" class="hover:underline">Clarity</Link></li>
                        <li>→ <Link href="/codex/anchors/witnessing" class="hover:underline">Witnessing</Link></li>
                        <li>→ <Link href="/codex/anchors/integration" class="hover:underline">Integration</Link></li>
                        <li>→ <Link href="/codex/anchors/coherence" class="hover:underline">Coherence</Link></li>
                    </ul>
                </div>

            </div>

        </section>

    </Content>

</template>

<script setup>

    import { Link } from "@inertiajs/vue3";
    import Content from "@/Components/System/Content.vue";
    import Hero from "@/Components/System/Hero.vue";

</script>
