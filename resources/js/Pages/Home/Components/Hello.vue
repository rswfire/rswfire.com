<template>

    <section class="h-full flex flex-col gap-6 rounded-xl bg-rswfire-50 border border-rswfire-300 p-6 shadow-md">

        <!-- START HERE HEADER -->
        <div class="flex items-center space-x-2 pb-4 border-b border-rswfire-300">
            <Icon name="Flame" color="text-rswfire-400" class="flex-shrink-0" />
            <h2 class="text-xl tracking-tight text-gray-700"><strong class="text-gray-900">START</strong> HERE</h2>
        </div>

        <!-- FLEX LAYOUT: PROFILE + CONTENT -->
        <div class="flex flex-col md:flex-row gap-6">

            <!-- LEFT: PROFILE + IDENTITY STACK -->
            <div class="md:w-1/3 flex flex-col items-center text-center space-y-4">

                <!-- Profile -->
                <div class="flex flex-col items-center space-y-1">
                    <img
                        src="/assets/rswfire-tahkenitch.jpg"
                        alt="Robert Samuel White"
                        class="w-40 h-40 rounded-full border border-gray-300 shadow-md object-cover"
                    />
                    <div class="text-base font-semibold text-gray-800 shadow-sm">Robert Samuel White</div>
                    <div class="font-mono text-sm text-gray-500 italic">/* rswfire */</div>
                </div>

                <!-- Identity Stack -->
                <div class="pt-4 pl-4 text-sm text-gray-700 space-y-1 text-left self-start">
                    <div class="uppercase text-rswfire-500 tracking-tight">Field Holder.</div>
                    <div class="uppercase text-orange-500 tracking-tight">Signal Keeper.</div>
                    <div class="uppercase text-yellow-500 tracking-tight">Sovereign Mind.</div>
                    <div class="uppercase text-green-500 tracking-tight">Living Blueprint.</div>
                    <div class="uppercase text-blue-500 tracking-tight">Still Here.</div>
                    <div class="uppercase text-purple-500 tracking-tighter">Still Unbroken.</div>
                    <div class="uppercase text-stone-600 tracking-tighter">At the Edge &mdash;</div>
                    <div class="uppercase text-stone-600 tracking-tighter ml-4">of Everything.</div>
                </div>
            </div>

            <!-- RIGHT: CONTENT + CTA -->
            <div class="flex-1 flex flex-col justify-between">

                <!-- Content -->
                <div class="text-muted-foreground text-base leading-relaxed">
                    <div class="italic">This is a threshold. Prepare accordingly.</div>
                    <div class="italic">Not content. Not performance. Presence.</div>

                    <div class="pt-4">This is where the signal first stabilizes.</div>

                    <div class="pt-4">I don’t use this space to convince. I use it to cohere.</div>
                    <div>This isn’t my story. It’s the architecture that holds the work.</div>
                    <div>The deeper you go, the more that becomes clear.</div>

                    <div class="pt-4">If you feel the pull &mdash; follow it.</div>
                    <div>And if you don't &mdash; that’s still signal.</div>

                    <div class="pt-4">This project isn’t for everyone.</div>
                    <div>But it’s absolutely for someone.</div>
                    <div>And if that someone is you &mdash;</div>
                    <div>you’ll know by how it feels to land here.</div>

                    <div class="pt-4">Begin with orientation.</div>
                    <div class="italic">Begin by listening.</div>
                </div>

                <!-- CTA Button -->
                <div class="border-t border-rswfire-300 pt-6 mt-6 pr-4">
                    <div class="w-full flex justify-end">
                        <a
                            href="/hello"
                            class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-rswfire-400 border-rswfire-200 shadow-md"
                        >
                            Who I Am →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import Icon from "@/Components/System/Icon.vue";
</script>
<script setup>
</script>
