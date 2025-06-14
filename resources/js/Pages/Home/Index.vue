<template>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="md:col-span-2">
            <HelloCard />
        </div>

        <div class="md:col-span-1">
            <TechCard />
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch pt-6">
        <SignalCard />
        <TransmissionCard />
        <FieldworkCard />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6">
        <LexiconCard />
        <MythCard />
    </div>

    <div class="grid grid-cols-1 gap-6 pt-6">
        <HoneymanCard />
    </div>

    <div class="py-4 text-center text-sm">
        <div>This codebase is field-sovereign — <a class="underline" href="https://github.com/rswfire/rswfire.com" target="_blank">shared freely</a>, but not for extraction, resale, or repackaging.</div>
        <div>No open-source license is explicitly granted.</div>
        <div>&copy; Robert Samuel White, 2025.</div>
    </div>

</template>

<script setup>

import { Link } from '@inertiajs/vue3'
import FieldRecordsPreview from "../../Components/FieldRecordsPreview.vue";
import { useMeta } from '../../Components/useMeta.ts'

import Icon from "@/Components/System/Icon.vue";

import FieldworkCard from "@/Pages/Home/Components/Fieldwork.vue";
import HelloCard from "@/Pages/Home/Components/Hello.vue";
import HoneymanCard from "@/Pages/Home/Components/Honeyman.vue";
import LexiconCard from "@/Pages/Home/Components/Lexicon.vue";
import MythCard from "@/Pages/Home/Components/Myth.vue";
import SignalCard from "@/Pages/Home/Components/Signal.vue";
import TechCard from "@/Pages/Home/Components/Tech.vue";
import TransmissionCard from "@/Pages/Home/Components/Transmission.vue";

useMeta({
    title: 'rswfire.com',
    description: 'Robert Samuel White',
    keywords: 'rswfire',
    image: '',
    url: 'https://rswfire.com/',
    type: 'article',
})

</script>

<style>

</style>
