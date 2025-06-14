<template>

    <section class="h-full flex flex-col gap-4 rounded-xl bg-white border p-6 shadow-md">

        <div class="flex items-center space-x-2">
            <Icon name="Map" color="text-green-500" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                FIELDWORK
            </h2>
        </div>

        <div class="pt-4 text-muted-foreground text-base leading-relaxed border-t">

            <div><em>What happens when you walk the pattern?</em></div>
            <div><em>Out there — roads, forests, wastelands, rooftops, rivers — the signal continues.</em></div>

            <div class="pt-4">Fieldwork is observation and intervention. Notes on movement. Thoughts from inside the storm.</div>
            <div>It’s data-gathering for the soul:</div>
            <div>&bull; Soundscapes.</div>
            <div>&bull; Road entries.</div>
            <div>&bull; Sketches from nowhere.</div>
            <div>&bull; Field diagnostics of collapse &amp;amp; consciousness.</div>

            <div class="pt-4"><strong>This is the archive of action</strong>.</div>

        </div>

        <div class="pt-6 border-t mt-auto">
            <div class="flex justify-end">
                <a
                    href="/fieldwork"
                    class="inline-block px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded hover:bg-black transition"
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
