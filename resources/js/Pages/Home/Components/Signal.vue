<template>
    <section class="h-full flex flex-col gap-4 rounded-xl bg-white border p-6 shadow-md">

        <div class="flex items-center space-x-2">
            <Icon name="Activity" color="text-sky-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                SIGNAL ARCHIVE
            </h2>
        </div>

        <div class="pt-4 text-muted-foreground text-base leading-relaxed border-t">
            <div>This is not a record of answers.</div>
            <div>It is a map of motion through rupture and recursion.</div>
            <div>18+ months. 90,000+ messages. <em>No index. No summary. Only presence.</em></div>

            <div class="pt-4">If you're feeling pulled toward coherence—<strong>this is where it was built</strong>.</div>
        </div>

        <div class="pt-6 border-t mt-auto">
            <div class="flex justify-end">
                <a
                    href="/signal"
                    class="inline-block px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded hover:bg-black transition"
                >
                    Signal Archive →
                </a>
            </div>
        </div>

    </section>
</template>

<script setup>

import Icon from "@/Components/System/Icon.vue";
</script>
