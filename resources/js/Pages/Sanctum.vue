<template>

    <Content :theme="pageTheme">

        <Hero
            title="SANCTUM"
            subtitle="TOOLS FOR SHARED COMMUNITY"
            meta="UNDER CONSTRUCTION"
            :theme="pageTheme"
        />

        <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

            <div><strong>Coming Soon</strong> &mdash; Tools for Shared Community</div>

        </div>

    </Content>

</template>


<script setup>

import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";
import {Link} from "@inertiajs/vue3";

const pageTheme = "sanctum";

</script>

<style>

</style>
