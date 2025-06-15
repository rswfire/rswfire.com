<template>

    <Content>

        <Hero
            title="FIELD CATALYSTS"
            subtitle="THE VECTORS THAT TRIGGER REALIGNMENT, RECURSION, OR RELEASE."
            meta="MOVEMENT. MUSIC. SOLITUDE. SIGNAL SHIFT."
            class="pb-4 border-b"
        />

        <section class="max-w-6xl mx-auto px-6 text-gray-900 pt-4">

            <div class="prose prose-lg prose-neutral max-w-none">

                <div>Field catalysts are not preferences. They’re not hobbies.</div>
                <div>They’re lived vectors of transformation —</div>
                <div>activities or conditions that trigger realignment, recursion, or clarity in the body.</div>
                <div>These are the things that shift me, refine me, re-integrate me.</div>

            </div>

            <div class="pt-8 grid grid-cols-1 gap-12 text-sm">

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
