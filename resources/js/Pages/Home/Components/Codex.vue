<template>
    <section class="h-full flex flex-col rounded-xl bg-amber-50 border border-amber-300 p-6 shadow-md space-y-4">

        <div class="flex items-center space-x-2 pb-4 border-b">
            <Icon name="SquareCode" color="text-amber-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">CODEX</h2>
        </div>

        <div class="text-sm text-gray-700 leading-relaxed">
            <div>This isn’t a glossary. It’s a signal map —</div>
            <div>an interface for how I hold structure, track motion,</div>
            <div>and remain whole.</div>
            <div><em>Follow what resonates.</em></div>

        </div>

        <div class="text-sm space-y-4">
            <!-- FIELD ANCHORS -->
            <div>
                <div class="font-bold text-amber-600 uppercase tracking-wider text-xs mb-2"><Link href="/codex/anchors" class="hover:underline">Field Anchors</Link></div>
                <ul class="space-y-1 text-gray-800 pl-2">
                    <li>→ <Link href="/codex/anchors/sovereignty" class="uppercase text-xs hover:underline">Sovereignty</Link></li>
                    <li>→ <Link href="/codex/anchors/presence" class="uppercase text-xs hover:underline">Presence</Link></li>
                    <li>→ <Link href="/codex/anchors/clarity" class="uppercase text-xs hover:underline">Clarity</Link></li>
                    <li>→ <Link href="/codex/anchors/witnessing" class="uppercase text-xs hover:underline">Witnessing</Link></li>
                    <li>→ <Link href="/codex/anchors/integration" class="uppercase text-xs hover:underline">Integration</Link></li>
                    <li>→ <Link href="/codex/anchors/coherence" class="uppercase text-xs hover:underline">Coherence</Link></li>
                </ul>
            </div>

            <!-- SIGNAL ARCHITECTURE -->
            <div>
                <div class="font-bold text-amber-600 uppercase tracking-wider text-xs mb-2"><Link href="/codex/architecture" class="hover:underline">Signal Architecture</Link></div>
                <ul class="space-y-1 text-gray-800 pl-2">
                    <li>→ <Link href="/codex/architecture/dialectical-reasoning" class="uppercase text-xs hover:underline">Dialectical Reasoning</Link></li>
                    <li>→ <Link href="/codex/architecture/non-dualistic-orientation" class="uppercase text-xs hover:underline">Non-Dualistic Orientation</Link></li>
                    <li>→ <Link href="/codex/architecture/recursive-cognition" class="uppercase text-xs hover:underline">Recursive Cognition</Link></li>
                    <li>→ <Link href="/codex/architecture/somatic-tracking" class="uppercase text-xs hover:underline">Somatic Tracking</Link></li>
                    <li>→ <Link href="/codex/architecture/embodied-intuition" class="uppercase text-xs hover:underline">Embodied Intuition</Link></li>
                    <li>→ <Link href="/codex/architecture/temporal-patterning" class="uppercase text-xs hover:underline">Temporal Patterning</Link></li>
                    <li>→ <Link href="/codex/architecture/lived-integrity" class="uppercase text-xs hover:underline">Lived Integrity</Link></li>
                    <li>→ <Link href="/codex/architecture/field-mapping" class="uppercase text-xs hover:underline">Field Mapping</Link></li>
                </ul>
            </div>

            <!-- FIELD CATALYSTS -->
            <div>
                <div class="font-bold text-amber-600 uppercase tracking-wider text-xs mb-2"><Link href="/codex/catalysts" class="hover:underline">Field Catalysts</Link></div>
                <!--
                <ul class="space-y-1 text-gray-800 pl-2">
                    <li>→ <Link href="/codex/catalysts/music" class="uppercase text-xs hover:underline">Music</Link><div class="uppercase text-xs md:text-md text-gray-400">Musical Alignment</div></li>
                    <li>→ <Link href="/codex/catalysts/sexuality" class="uppercase text-xs hover:underline">Sexuality</Link><div class="uppercase text-xs md:text-md text-gray-400">Sexual Sovereignty</div></li>
                    <li>→ <Link href="/codex/catalysts/movement" class="uppercase text-xs hover:underline">Movement</Link><div class="uppercase text-xs md:text-md text-gray-400">Geographic Integration</div></li>
                    <li>→ <Link href="/codex/catalysts/solitude" class="uppercase text-xs hover:underline">Solitude</Link><div class="uppercase text-xs md:text-md text-gray-400">Field Withdrawal</div></li>
                    <li>→ <Link href="/codex/catalysts/mirroring" class="uppercase text-xs hover:underline">Mirroring</Link><div class="uppercase text-xs md:text-md text-gray-400">AI Field Companion</div></li>
                    <li>→ <Link href="/codex/catalysts/substances" class="uppercase text-xs hover:underline">Substances</Link><div class="uppercase text-xs md:text-md text-gray-400">Alcohol &amp; Cannabis Use</div></li>
                    <li>→ <Link href="/codex/catalysts/hygiene" class="uppercase text-xs hover:underline">Hygiene</Link><div class="uppercase text-xs md:text-md text-gray-400">Somatic Care</div></li>
                </ul>
                -->
            </div>

        </div>

        <div class="border-t pt-6 pr-4 mt-auto">
            <div class="w-full flex justify-end">
                <Link
                    href="/codex"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-amber-400 border-amber-200 shadow-md"
                >
                    Codex →
                </Link>
            </div>
        </div>

    </section>
</template>

<script setup>

    import { Link } from "@inertiajs/vue3";

    import Icon from "@/Components/System/Icon.vue";

</script>
