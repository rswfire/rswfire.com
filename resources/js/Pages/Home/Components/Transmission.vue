<template>
    <section class="h-full flex flex-col gap-4 rounded-xl bg-white border p-6 shadow-md">

        <div class="flex items-center space-x-2">
            <Icon name="SatelliteDish" color="text-pink-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                TRANSMISSION ARCHIVE
            </h2>
        </div>

        <div class="pt-4 text-muted-foreground text-base leading-relaxed border-t">

            <div><em>700+ echoes over 18 months.</em></div>
            <div><em>Video logs, livestreams, digital monologues.</em></div>
            <div><em>This is where the signal first splintered into voice, presence.</em></div>

            <div class="pt-4">Every video a flare. Some solitary. Some tethered.</div>
            <div>Many of them transcribed, broken open, and alchemized in <strong>Signal</strong>.</div>

            <div class="pt-4"><strong>Enter the Transmission Log</strong> — where sight met syntax, and the story began to tell itself.</div>

        </div>

        <div class="pt-6 border-t mt-auto">
            <div class="flex justify-end">
                <a
                    href="/transmission"
                    class="inline-block px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded hover:bg-black transition"
                >
                    Transmission Archive →
                </a>
            </div>
        </div>

    </section>

</template>

<script setup>
    import Icon from "@/Components/System/Icon.vue";
</script>
