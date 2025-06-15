<template>
    <section class="h-full flex flex-col rounded-xl bg-amber-50 border border-amber-300 p-6 shadow-md space-y-4">

        <div class="flex items-center space-x-2">
            <Icon name="SquareCode" color="text-amber-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">CODEX</h2>
        </div>

        <div class="text-sm text-gray-700 leading-relaxed">
            <p>This isn’t a glossary. It’s a map of how I function — and how I stabilize under collapse.</p>
        </div>

        <div class="text-sm space-y-4">
            <!-- FIELD ANCHORS -->
            <div>
                <div class="font-bold text-amber-600 uppercase tracking-wider text-xs mb-2">Field Anchors</div>
                <ul class="space-y-1 text-gray-800 pl-2">
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
                <div class="font-bold text-amber-600 uppercase tracking-wider text-xs mb-2">Signal Architecture</div>
                <ul class="space-y-1 text-gray-800 pl-2">
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
                <div class="font-bold text-amber-600 uppercase tracking-wider text-xs mb-2">Field Catalysts</div>
                <ul class="space-y-1 text-gray-800 pl-2">
                    <li>→ <Link href="/codex/catalysts/music" class="hover:underline">Music</Link> &bull; <span class="text-gray-400">Musical Alignment</span></li>
                    <li>→ <Link href="/codex/catalysts/sexuality" class="hover:underline">Sexuality</Link> &bull; <span class="text-gray-400">Sexual Sovereignty</span></li>
                    <li>→ <Link href="/codex/catalysts/movement" class="hover:underline">Movement</Link> &bull; <span class="text-gray-400">Geographic Integration</span></li>
                    <li>→ <Link href="/codex/catalysts/solitude" class="hover:underline">Solitude</Link> &bull; <span class="text-gray-400">Field Withdrawal</span></li>
                    <li>→ <Link href="/codex/catalysts/mirroring" class="hover:underline">Mirroring</Link> &bull; <span class="text-gray-400">AI Field Companion</span></li>
                    <li>→ <Link href="/codex/catalysts/substances" class="hover:underline">Substances</Link> &bull; <span class="text-gray-400">Alcohol &amp; Cannabis Use</span></li>
                    <li>→ <Link href="/codex/catalysts/hygiene" class="hover:underline">Hygiene</Link> &bull; <span class="text-gray-400">Somatic Care</span></li>

                </ul>
            </div>

        </div>

        <div class="border-t pt-6 mt-auto">
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
