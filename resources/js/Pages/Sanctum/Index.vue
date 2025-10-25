<template>

    <Content :theme="pageTheme">

        <Hero
            title="SANCTUM"
            subtitle="RECIPROCAL FIELD EXCHANGE FOR ALIGNED WITNESS"
            meta="WHERE DEPTH MEETS CONTRIBUTION"
            :theme="pageTheme"
        />

        <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

            <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">
                <div class="max-w-none columns-2 gap-8">
                    <div>Not a paywall &mdash;</div>
                    <div class="ml-4">not charity.</div>
                    <div class="ml-8">Not exclusive content.</div>
                    <div>This is relational infrastructure.</div>
                    <div><em>If you witness depth, you hold the field that enables it</em>.</div>

                    <div>Subscription access to Mirror and Patterns layers &mdash;</div>
                    <div class="ml-4">high-recursion transmissions with institutional context.</div>
                    <div>Community space for those who track coherence.</div>
                    <div>You're not buying access.</div>
                    <div>You're entering reciprocal field exchange.</div>
                </div>
            </section>

            <div class="mt-8">
                <template v-if="isAuthenticated() && user">
                    <p class="text-gray-700">
                        Signed in as <span class="font-semibold">{{ user.name }}</span>
                    </p>
                </template>

                <template v-else>
                    <SanctumAuth page-theme="sanctum" />
                </template>
            </div>

        </div>

    </Content>

</template>


<script setup>

import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";
import {Link} from "@inertiajs/vue3";
import SanctumAuth from "@/Components/Auth/Sanctum.vue";
import {useAuth} from "@/Composables/useAuth.js";

const { user, init, isAuthenticated } = useAuth()
const pageTheme = "sanctum";

onMounted(() => {
    init() // ensures the user is fetched if token exists
})

</script>

<style>

</style>
