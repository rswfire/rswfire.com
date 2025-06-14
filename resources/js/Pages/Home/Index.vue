<template>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="md:col-span-2">
            <HelloCard />
        </div>

        <div class="md:col-span-1">
            <TechCard />
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch pt-6">
        <SignalCard />
        <TransmissionCard />
        <FieldworkCard />
    </div>


    <!-- Myth Card -->
    <section class="mt-6 rounded-xl border border-border p-6 shadow-md bg-gray-100/75 space-y-4">
        <div class="flex items-center space-x-2">
            <span class="text-2xl">🛡️</span>
            <h2 class="text-xl font-semibold tracking-tight">
                MYTH
            </h2>
        </div>

        <div class="py-4 text-muted-foreground text-base leading-relaxed border-t border-b">

            <div><em>A page about myself.</em></div>
            <div>But not the kind you’d find on LinkedIn.</div>

            <div class="pt-4"><strong>This is more Dwarf Fortress meets psychospiritual memoir</strong>.</div>
            <div>Facts blend with metaphor.</div>
            <div>Biography bleeds into ritual.</div>

            <div class="pt-4">You’ll find:</div>
            <div>&bull; Iterative autobiographical fragments.</div>
            <div>&bull; Lore files and self-written mythos.</div>
            <div>&bull; Symbolic milestones mapped as if from a fantasy world.</div>

            <div class="pt-4">It’s not about who I am — but <em>how I became this node</em>.</div>

        </div>

        <div class="text-left">
            <a
                href="/myth"
                class="inline-block px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded hover:bg-black transition"
            >
                Descend into the Myth →
            </a>
        </div>
    </section>


    <!-- Lexicon Card -->
    <section class="mt-6 rounded-xl bg-gray-50 border border-border p-6 shadow-md space-y-4">
        <div class="flex items-center space-x-2">
            <span class="text-2xl">🧬</span>
            <h2 class="text-xl font-semibold tracking-tight">
                LEXICON
            </h2>
        </div>

        <div class="py-4 text-muted-foreground text-base leading-relaxed border-t border-b">

            <div>Language was never neutral. <em>Language is infrastructure</em>.</div>

            <div class="pt-4">Here, I reclaim the words.</div>

            <div class="pt-4">This section is a <strong>living glossary</strong> of terms you’ll encounter across this project.</div>

            <div class="pt-4">Many of them are:</div>
            <div>&bull; Coined terms or hybrid phrasings.</div>
            <div>&bull; Redefinitions of familiar words.</div>
            <div>&bull; Conceptual containers for personal or systemic insight.</div>

            <div class="pt-4"><strong>Browse the Lexicon</strong> to orient yourself — or disorient yourself more intentionally.</div>

        </div>

        <div class="text-left">
            <a
                href="/lexicon"
                class="inline-block px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded hover:bg-black transition"
            >
                Decode the Signal →
            </a>
        </div>
    </section>


    <!-- Honeyman Card -->
    <section class="mt-6 rounded-xl border border-border p-6 shadow-md bg-green-50 space-y-4">
        <div class="flex items-center space-x-2">
            <span class="text-2xl">🌲</span>
            <h2 class="text-xl font-semibold tracking-tight">
                HONEYMAN STATE PARK, OREGON STATE PARKS (OPRD)
            </h2>
        </div>

        <div class="py-4 text-muted-foreground text-base leading-relaxed border-t border-b">
            <div><strong>This is the story of a fracture</strong>.</div>

            <div class="pt-4">A real place. A real name. A real archive of institutional dysfunction.</div>

            <div class="pt-4">Here you'll find documentation, surveillance, retaliation, and silence — all directed at an unpaid volunteer who served with integrity.</div>

            <div class="pt-4">This page holds the receipts.</div>
            <div>But more than that, <em>it holds the field that refused to collapse</em>.</div>
        </div>

        <div class="text-left">
            <a
                href="/honeyman"
                class="inline-block px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded hover:bg-black transition"
            >
                Trace the Fracture →
            </a>
        </div>
    </section>

    <div class="pt-4 text-center text-sm">
        <div>This codebase is field-sovereign — <a class="underline" href="https://github.com/rswfire/rswfire.com" target="_blank">shared freely</a>, but not for extraction, resale, or repackaging.</div>
        <div>No open-source license is explicitly granted.</div>
        <div>&copy; Robert Samuel White, 2025.</div>
    </div>

</template>

<script setup>

import { Link } from '@inertiajs/vue3'
import FieldRecordsPreview from "../../Components/FieldRecordsPreview.vue";
import { useMeta } from '../../Components/useMeta.ts'

import Icon from "@/Components/System/Icon.vue";

import FieldworkCard from "@/Pages/Home/Components/Fieldwork.vue";
import HelloCard from "@/Pages/Home/Components/Hello.vue";
import SignalCard from "@/Pages/Home/Components/Signal.vue";
import TechCard from "@/Pages/Home/Components/Tech.vue";
import TransmissionCard from "@/Pages/Home/Components/Transmission.vue";

useMeta({
    title: 'rswfire.com',
    description: 'Robert Samuel White',
    keywords: 'rswfire',
    image: '',
    url: 'https://rswfire.com/',
    type: 'article',
})

</script>

<style>

</style>
