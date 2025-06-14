<template>

    <section class="h-full flex flex-col gap-4 rounded-xl bg-white border p-6 shadow-md">

        <div class="flex items-center space-x-2">
            <Icon name="Map" color="text-green-500" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                FIELDWORK
            </h2>
        </div>

        <div class="pt-4 text-muted-foreground text-base leading-relaxed border-t">

            <div class="italic">The pattern doesn’t end at the page.</div>
            <div class="italic">It walks. It listens.</div>

            <div class="pt-4">Out there — rooftops, riverbanks, wastelands, quiet roads —</div>
            <div>the signal reshapes itself.</div>

            <div class="pt-4">This is fieldwork:</div>
            <div>Soundscapes. Sketches.</div>
            <div>Diagnostics of collapse.</div>
            <div>Coordinates of coherence.</div>

            <div class="pt-4">Every step a listening post.</div>

            <div class="pt-4"><strong>This is the archive of action</strong>.</div>

        </div>

        <div class="pt-6 border-t mt-auto">
            <div class="flex justify-end">
                <a
                    href="/fieldwork"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-green-400 border-green-200 shadow-md"
                >
                    Fieldwork →
                </a>
            </div>
        </div>

    </section>

</template>

<script setup>

import Icon from "@/Components/System/Icon.vue";
</script>
