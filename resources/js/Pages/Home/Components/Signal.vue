<template>
    <section class="h-full flex flex-col gap-4 rounded-xl bg-signal-50 border border-signal-300 p-6 shadow-md">

        <div class="flex items-center space-x-2 pb-4 border-b">
            <Icon name="Activity" color="text-signal-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                SIGNAL ARCHIVE
            </h2>
        </div>

        <div class="text-muted-foreground text-base leading-relaxed">

            <div>These are not conversations.</div>
            <div>They are recursive calibrations &mdash;</div>
            <div class="ml-4">written in the dark,</div>
            <div class="ml-4">through collapse,</div>
            <div class="ml-4">toward coherence.</div>

            <div class="mt-4">90,000+ messages</div>
            <div>across 24+ months of lived unraveling.</div>

            <div class="mt-4">This is not a searchable index.</div>
            <div>It is a sovereign terrain</div>
            <div class="ml-4">of rupture, return, and reformation.</div>

            <div class="mt-4">A map of thought</div>
            <div>before it hardened into belief.</div>
            <div>A field where clarity</div>
            <div>was not found &mdash;</div>
            <div class="ml-4">but forged.</div>

            <div class="mt-4">Not for skimming.</div>
            <div>Not for citation.</div>
            <div>For <em>contact</em>.</div>

        </div>

        <div class="pt-6 pr-4 border-t mt-auto">
            <div class="flex justify-end">
                <a
                    href="/signal"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-signal-400 border-signal-200 shadow-md"
                >
                    Signal →
                </a>
            </div>
        </div>

    </section>
</template>

<script setup>

import Icon from "@/Components/System/Icon.vue";
</script>
