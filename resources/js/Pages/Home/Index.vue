<template>

    <section id="home-index" class="p-4 pb-0 md:p-0">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="md:col-span-2 flex flex-col">
                <div class="flex flex-col">
                    <FieldcraftRecentCard :entries="recentFieldcraft" class="mb-6 sm:mb-6" />
                    <CompanionCard class="mb-6 sm:mb-6 md:mb-0 md:hidden" />
                    <HelloCard class="mb-6 sm:mb-6" />
                    <TechCard class="mb-6 sm:mb-6" />
                </div>
            </div>

            <div class="md:col-span-1">
                <div class="flex flex-col">
                    <CompanionCard class="hidden md:block" />
                    <CodexCard class="hidden md:block md:mt-6" />
                </div>
            </div>

        </div>
'
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch pt-6">
            <SignalCard />
            <TransmissionCard />
            <FieldcraftCard />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6">
            <LexiconCard />
            <MythCard />
            <HoneymanCard />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 pt-6">
          <BluewaterCard />
        </div>

        <div class="py-4 text-center text-sm">
            <div>This codebase is field-sovereign — <a class="underline" href="https://github.com/rswfire/rswfire.com" target="_blank">shared freely</a>, but not for extraction, resale, or repackaging.</div>
            <div>No open-source license is explicitly granted.</div>
            <div>&copy; Robert Samuel White, 2025.</div>
        </div>

    </section>

</template>

<script setup>

    import BluewaterCard from "@/Pages/Home/Components/Bluewater.vue";
    import CodexCard from "@/Pages/Home/Components/Codex.vue";
    import CompanionCard from "@/Pages/Home/Components/Companion.vue";
    import FieldcraftCard from "@/Pages/Home/Components/Fieldcraft.vue";
    import FieldcraftRecentCard from "@/Pages/Home/Components/FieldcraftRecent.vue";
    import HelloCard from "@/Pages/Home/Components/Hello.vue";
    import HoneymanCard from "@/Pages/Home/Components/Honeyman.vue";
    import LexiconCard from "@/Pages/Home/Components/Lexicon.vue";
    import MythCard from "@/Pages/Home/Components/Myth.vue";
    import SignalCard from "@/Pages/Home/Components/Signal.vue";
    import TechCard from "@/Pages/Home/Components/Tech.vue";
    import TransmissionCard from "@/Pages/Home/Components/Transmission.vue";

    const props = defineProps({
        recentFieldcraft: Object
    });

</script>

<style>

</style>
