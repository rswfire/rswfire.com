<template>
    <section class="h-full flex flex-col gap-4 rounded-xl bg-white border p-6 shadow-md">

        <div class="flex items-center space-x-2 pb-4 border-b">
            <Icon name="Activity" color="text-sky-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                SIGNAL ARCHIVE
            </h2>
        </div>

        <div class="text-muted-foreground text-base leading-relaxed">
            <div>This is not a record of answers.</div>
            <div>It is a map of motion through rupture and recursion.</div>

            <div class="mt-4">24+ months.</div>
            <div>90,000+ messages.</div>
            <div><em>No index. No summary. Only presence.</em></div>

            <div class="pt-4">If you're feeling pulled toward coherence &mdash;</div>
            <div><strong>this is where it was built</strong>.</div>
        </div>

        <div class="pt-6 pr-4 border-t mt-auto">
            <div class="flex justify-end">
                <a
                    href="/signal"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-sky-400 border-sky-200 shadow-md"
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
