<template>

    <Content theme="rswfire">

        <Hero
            title="UPDATES"
            subtitle="UPDATES FROM THE FIELD"
            meta="UNDER CONSTRUCTION"
        />

        <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">
            <div>This page will provide a form that allows you to receive update notifications by email or text message.</div>
        </div>

    </Content>

</template>

<script setup>

import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue'
import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";
import {Link} from "@inertiajs/vue3";

import { router } from '@inertiajs/vue3'

</script>
