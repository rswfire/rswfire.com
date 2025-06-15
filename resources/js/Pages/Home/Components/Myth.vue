<template>

    <section class="h-full flex flex-col gap-4 rounded-xl bg-white border p-6 shadow-md">

        <div class="flex items-center space-x-2 pb-4 border-b">
            <Icon name="ShieldCheck" color="text-yellow-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                MYTH
            </h2>
        </div>

        <div class="py-4 text-muted-foreground text-base leading-relaxed">

            <div><em>A page about myself.</em></div>
            <div>But not the kind you’d find on LinkedIn.</div>

            <div class="pt-4"><strong>This is more Dwarf Fortress meets psychospiritual memoir</strong>.</div>
            <div>Facts blend with metaphor.</div>
            <div>Biography bleeds into ritual.</div>

            <div class="pt-4">You’ll find:</div>
            <div>&bull; Iterative autobiographical fragments.</div>
            <div>&bull; Lore files and self-written mythos.</div>
            <div>&bull; Symbolic milestones mapped as if from a fantasy world.</div>

            <div class="pt-4">It’s not about who I am — but <em>how I became this node</em>.</div>

        </div>

        <div class="pt-6 border-t mt-auto">
            <div class="flex justify-end">
                <a
                    href="/myth"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-yellow-400 border-yellow-200 shadow-md"
                >
                    Myth →
                </a>
            </div>
        </div>

    </section>

</template>

<script setup>
    import Icon from "@/Components/System/Icon.vue";
</script>

<style>

</style>
