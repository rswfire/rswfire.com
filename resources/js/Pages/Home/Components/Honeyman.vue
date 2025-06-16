<template>

    <section class="h-full flex flex-col gap-4 rounded-xl bg-green-50 border border-green-300 p-6 shadow-md">
        <div class="flex items-center space-x-2 pb-4 border-b">
            <Icon name="TreeDeciduous" color="text-emerald-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                HONEYMAN STATE PARK, OREGON STATE PARKS (OPRD)
            </h2>
        </div>

        <div class="text-muted-foreground text-base leading-relaxed">
            <div><strong>This is the story of a fracture</strong>.</div>

            <div class="pt-4">A real place. A real name. A real archive of institutional dysfunction.</div>

            <div class="pt-4">Here you'll find documentation, surveillance, retaliation, and silence &mdash;</div>
            <div>all directed at an unpaid volunteer who served with integrity.</div>

            <div class="pt-4">This page holds the receipts.</div>
            <div>But more than that, <em>it holds the field that refused to collapse</em>.</div>
        </div>

        <div class="pt-6 border-t mt-auto pr-4">
            <div class="flex justify-end">
                <a
                    href="/honeyman"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-emerald-400 border-emerald-200 shadow-md"
                >
                    Honeyman →
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
