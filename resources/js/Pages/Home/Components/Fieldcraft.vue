<template>

    <section class="h-full flex flex-col gap-4 rounded-xl bg-fieldcraft-50 border border-fieldcraft-300 p-6 shadow-md">
        <div class="flex items-center space-x-2 pb-4 border-b">
            <Icon name="Map" color="text-fieldcraft-500" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                FIELDCRAFT BLOG
            </h2>
        </div>

        <div class="text-muted-foreground text-base leading-relaxed">

            <div>This is not content.</div>
            <div>It is contact with terrain.</div>

            <div class="mt-4">This is the record</div>
            <div>of embedded traversal &mdash;</div>
            <div class="ml-4">of sovereign motion</div>
            <div class="ml-4">through the post-collapse world.</div>

            <div class="mt-4">Beaches. Dunes. Campgrounds.</div>
            <div>Institutional edges.</div>
            <div>Hidden ridgelines of grief, grit, and grace.</div>

            <div class="mt-4">These aren’t reflections after the fact.</div>
            <div>They are transmissions</div>
            <div class="ml-4">from inside the moment.</div>

            <div class="mt-4">Not memoir. Not metaphor.</div>
            <div>Just clarity under pressure &mdash;</div>
            <div class="ml-4">written down before distortion could rewrite it.</div>

            <div class="mt-4">You don’t read fieldcraft.</div>
            <div>You <em>attune</em> to it.</div>

        </div>

        <div class="pt-6 pr-4 border-t mt-auto">
            <div class="flex justify-end">
                <a
                    href="/fieldcraft"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-fieldcraft-400 border-fieldcraft-200 shadow-md"
                >
                    Fieldcraft →
                </a>
            </div>
        </div>

    </section>

</template>

<script setup>

import Icon from "@/Components/System/Icon.vue";
</script>
