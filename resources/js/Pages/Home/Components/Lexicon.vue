<template>

    <section class="h-full flex flex-col gap-4 rounded-xl bg-white border p-6 shadow-md">
        <div class="flex items-center space-x-2 pb-4 border-b">
            <Icon name="SquareLibrary" color="text-orange-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                LEXICON
            </h2>
        </div>

        <div class="text-muted-foreground text-base leading-relaxed">

            <div>Language was never neutral.</div>
            <div><em>Language is infrastructure</em>.</div>

            <div class="pt-4">Here, I reclaim the words.</div>

            <div class="pt-4">This section is a <strong>living glossary</strong> of terms you’ll encounter across this project.</div>

            <div class="pt-4">Many of them are:</div>
            <div>&bull; Coined terms or hybrid phrasings.</div>
            <div>&bull; Redefinitions of familiar words.</div>
            <div>&bull; Conceptual containers for personal or systemic insight.</div>

        </div>

        <div class="pt-6 pr-4 border-t mt-auto">
            <div class="flex justify-end">
                <a
                    href="/lexicon"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-orange-400 border-orange-200 shadow-md"
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
