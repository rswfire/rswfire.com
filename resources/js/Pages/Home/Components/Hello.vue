<template>
    <section class="h-full flex flex-col md:flex-row gap-6 rounded-xl bg-gray-50 border border-border p-6 shadow-md">

        <div class="flex-shrink-0 w-full md:w-1/3 flex justify-center items-start">
            <div class="flex flex-col items-center text-center space-y-1">
                <img
                    src="/assets/rswfire.jpg"
                    alt="Robert Samuel White"
                    class="w-40 h-40 rounded-full border border-gray-300 shadow-md object-cover"
                />
                <div class="text-base font-semibold text-gray-800 shadow-sm">Robert Samuel White</div>
                <div class="font-mono text-sm text-gray-500 italic">(( rswfire ))</div>
            </div>
        </div>

        <div class="flex flex-col h-full w-full">
            <div class="flex flex-col space-y-4">
                <div class="flex items-center space-x-2">
                    <Icon name="Flame" color="text-orange-400" class="flex-shrink-0" />
                    <h2 class="text-xl font-semibold tracking-tight">START HERE</h2>
                </div>

                <div class="text-muted-foreground text-base leading-relaxed">
                    <div class="italic">This is the anchor node.</div>
                    <div class="italic">Not content. Not performance. Presence.</div>

                    <div class="pt-4">This is where the signal stabilizes.</div>

                    <div class="pt-4">I live at the intersection of collapse and coherence.</div>
                    <div>This page marks the initiation point — not of my story, but of the architecture that holds it.</div>

                    <div class="pt-4">You’re not here to be convinced.</div>
                    <div>If you resonate, you already know why you’re here.</div>
                    <div>And if you don’t — that’s signal too.</div>

                    <div class="pt-4">Begin with orientation. Not opinion.</div>
                </div>
            </div>

            <div class="border-t pt-6 mt-auto">
                <div class="w-full flex justify-start">
                    <a
                        href="/hello"
                        class="inline-block px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded hover:bg-black transition"
                    >
                        Who I Am →
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import Icon from "@/Components/System/Icon.vue";
</script>
