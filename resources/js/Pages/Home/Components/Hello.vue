<template>
    <section class="h-full flex flex-col md:flex-row gap-6 rounded-xl bg-gray-50 border p-6 shadow-md">

        <div class="flex-shrink-0 w-full md:w-1/3 flex flex-col items-center text-center space-y-4">

            <!-- Profile Card -->
            <div class="flex flex-col items-center space-y-1">
                <img
                    src="/assets/rswfire.jpg"
                    alt="Robert Samuel White"
                    class="w-40 h-40 rounded-full border border-gray-300 shadow-md object-cover"
                />
                <div class="text-base font-semibold text-gray-800 shadow-sm">Robert Samuel White</div>
                <div class="font-mono text-sm text-gray-500 italic">(( rswfire ))</div>
            </div>

            <!-- Identity Stack -->
            <div class="pt-4 pl-4 text-sm text-gray-700 space-y-1 text-left self-start">
                <div class="text-red-500">Gay.</div>
                <div class="text-orange-500">Pierced.</div>
                <div class="text-yellow-500">Sovereign.</div>
                <div class="text-green-500">Oregon Coast.</div>
                <div class="text-blue-500">Camp Host.</div>
                <div class="text-purple-500">Digital Nomad.</div>
                <div class="text-stone-600">Not Performing.</div>
            </div>

        </div>

        <div class="flex flex-col h-full w-full">
            <div class="flex flex-col space-y-4">
                <div class="flex items-center space-x-2 pb-4 border-b">
                    <Icon name="Flame" color="text-red-400" class="flex-shrink-0" />
                    <h2 class="text-xl font-semibold tracking-tight">START HERE</h2>
                </div>

                <div class="pb-4 text-muted-foreground text-base leading-relaxed">
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
            </div>

            <div class="border-t pt-6 mt-auto">
                <div class="w-full flex justify-end">
                    <a
                        href="/hello"
                        class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-red-400 border-red-200 shadow-md"
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
