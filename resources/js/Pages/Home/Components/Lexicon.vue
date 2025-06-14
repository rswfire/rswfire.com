<template>

    <section class="h-full flex flex-col gap-4 rounded-xl bg-white border p-6 shadow-md">
        <div class="flex items-center space-x-2">
            <Icon name="SquareLibrary" color="text-red-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                LEXICON
            </h2>
        </div>

        <div class="py-4 text-muted-foreground text-base leading-relaxed border-t">

            <div>Language was never neutral. <em>Language is infrastructure</em>.</div>

            <div class="pt-4">Here, I reclaim the words.</div>

            <div class="pt-4">This section is a <strong>living glossary</strong> of terms you’ll encounter across this project.</div>

            <div class="pt-4">Many of them are:</div>
            <div>&bull; Coined terms or hybrid phrasings.</div>
            <div>&bull; Redefinitions of familiar words.</div>
            <div>&bull; Conceptual containers for personal or systemic insight.</div>

            <div class="pt-4"><strong>Browse the Lexicon</strong> to orient yourself — or disorient yourself more intentionally.</div>

        </div>

        <div class="pt-6 border-t mt-auto">
            <div class="flex justify-end">
                <a
                    href="/lexicon"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-red-400 border-red-200 shadow-md"
                >
                    Lexicon →
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
