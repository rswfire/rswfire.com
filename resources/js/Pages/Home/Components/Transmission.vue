<template>
    <section class="h-full flex flex-col gap-4 rounded-xl bg-white border p-6 shadow-md">

        <div class="flex items-center space-x-2 pb-4 border-b">
            <Icon name="SatelliteDish" color="text-pink-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                TRANSMISSION VAULT
            </h2>
        </div>

        <div class="text-muted-foreground text-base leading-relaxed">

            <div>These are not performances.</div>
            <div>They are real-time captures &mdash;</div>
            <div class="ml-4">of clarity,</div>
            <div class="ml-4">of grief,</div>
            <div class="ml-4">of fire,</div>
            <div class="ml-4">of collapse,</div>
            <div class="ml-4">of truth.</div>

            <div class="mt-4">700+ videos recorded</div>
            <div class="ml-4">over years of radical self-honesty.</div>
            <div>This is the public memory</div>
            <div class="ml-4">of a sovereign life in progress.</div>

            <div class="mt-4">Not curated for virality.</div>
            <div>Not optimized for branding.</div>
            <div>They weren’t made <em>for</em> you.</div>
            <div>And still &mdash;</div>
            <div class="ml-4">they are offered.</div>

            <div class="mt-4">You will not understand all of it.</div>
            <div>You are not supposed to.</div>
            <div>You are supposed to <em>feel</em> it.</div>

        </div>

        <div class="pt-6 pr-4 border-t mt-auto">
            <div class="flex justify-end">
                <a
                    href="/transmission"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-pink-400 border-pink-200 shadow-md"
                >
                    Transmission →
                </a>
            </div>
        </div>

    </section>

</template>

<script setup>
    import Icon from "@/Components/System/Icon.vue";
</script>
