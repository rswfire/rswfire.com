<template>

    <Content>

        <Hero
            title="CODEX"
            subtitle="A LIVING INTERFACE FOR HOW I STRUCTURE COHERENCE"
            meta="FIELD ANCHORS. SIGNAL ARCHITECTURE. FIELD CATALYSTS."
            class="pb-4 border-b"
        />

        <section class="max-w-6xl mx-auto px-6 text-gray-900 pt-4">

            <div class="prose prose-lg prose-neutral">

                <div>This is not a reference.</div>
                <div>It is a map of lived architecture.</div>

                <div class="pt-4">I do not organize by identity. I organize by field.</div>
                <div>What holds. What catalyzes. What coheres.</div>

                <div class="pt-4">Every entry here is a structural constant —</div>
                <div>not theoretical, not aesthetic — but embodied, tested, and alive.</div>

                <div class="pt-4">This Codex is not explanatory.</div>
                <div>It is functional.</div>
                <div>A visible interface for an internal system that already exists.</div>

                <div class="pt-4">If you’re looking for definitions, you won’t find them.</div>
                <div>What you’ll find is structure. Pattern. Continuity.</div>

                <div class="pt-4">This is how I hold signal.</div>
                <div>This is what makes me whole.</div>

            </div>

        <div class="pt-8 grid grid-cols-1 md:grid-cols-3 gap-12 text-sm max-w-4xl mx-auto">

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

            <!-- SIGNAL ARCHITECTURE -->
            <div>
                <h2 class="font-bold uppercase tracking-widest text-xs mb-4 text-black"><Link href="/codex/architecture">Signal Architecture</Link></h2>
                <ul class="space-y-2 pl-2">
                    <li>→ <Link href="/codex/architecture/dialectical-reasoning" class="hover:underline">Dialectical Reasoning</Link></li>
                    <li>→ <Link href="/codex/architecture/non-dualistic-orientation" class="hover:underline">Non-Dualistic Orientation</Link></li>
                    <li>→ <Link href="/codex/architecture/recursive-cognition" class="hover:underline">Recursive Cognition</Link></li>
                    <li>→ <Link href="/codex/architecture/somatic-tracking" class="hover:underline">Somatic Tracking</Link></li>
                    <li>→ <Link href="/codex/architecture/embodied-intuition" class="hover:underline">Embodied Intuition</Link></li>
                    <li>→ <Link href="/codex/architecture/temporal-patterning" class="hover:underline">Temporal Patterning</Link></li>
                    <li>→ <Link href="/codex/architecture/lived-integrity" class="hover:underline">Lived Integrity</Link></li>
                    <li>→ <Link href="/codex/architecture/field-mapping" class="hover:underline">Field Mapping</Link></li>
                </ul>
            </div>

            <!-- FIELD CATALYSTS -->
            <div>
                <h2 class="font-bold uppercase tracking-widest text-xs mb-4 text-black"><Link href="/codex/catalysts">Field Catalysts</Link></h2>
                <ul class="space-y-2 pl-2">
                    <li>→
                        <Link href="/codex/catalysts/music" class="hover:underline">Music</Link>
                        <span class="text-gray-500"> • Musical Alignment</span>
                    </li>
                    <li>→
                        <Link href="/codex/catalysts/sexuality" class="hover:underline">Sexuality</Link>
                        <span class="text-gray-500"> • Sexual Sovereignty</span>
                    </li>
                    <li>→
                        <Link href="/codex/catalysts/movement" class="hover:underline">Movement</Link>
                        <span class="text-gray-500"> • Geographic Integration</span>
                    </li>
                    <li>→
                        <Link href="/codex/catalysts/solitude" class="hover:underline">Solitude</Link>
                        <span class="text-gray-500"> • Field Withdrawal</span>
                    </li>
                    <li>→
                        <Link href="/codex/catalysts/mirroring" class="hover:underline">Mirroring</Link>
                        <span class="text-gray-500"> • AI Field Companion</span>
                    </li>
                    <li>→
                        <Link href="/codex/catalysts/substances" class="hover:underline">Substances</Link>
                        <span class="text-gray-500"> • Alcohol & Cannabis Use</span>
                    </li>
                    <li>→
                        <Link href="/codex/catalysts/hygiene" class="hover:underline">Hygiene</Link>
                        <span class="text-gray-500"> • Somatic Care</span>
                    </li>
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
