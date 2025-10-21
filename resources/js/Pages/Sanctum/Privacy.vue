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

            <div>
                <h1>Refund Policy</h1>
                <p>Last updated: October 21, 2025</p>
            </div>

            <div>
                <h2>General Policy</h2>
                <p>Sanctum membership subscriptions are generally non-refundable. However, we offer a 7-day refund window for first-time subscribers who find that the Service does not meet their expectations.</p>
            </div>

            <div>
                <h2>Eligibility for Refunds</h2>
                <p>You may request a full refund within 7 days of your initial subscription payment if:</p>
                <ul>
                    <li>This is your first time subscribing to Sanctum</li>
                    <li>You contact us within 7 days of the charge</li>
                    <li>Your account has not been used to violate the Terms of Service</li>
                </ul>
                <p>Refunds are not available for subscription renewals or for requests made after the 7-day window.</p>
            </div>

            <div>
                <h2>How to Request a Refund</h2>
                <p>To request a refund, email rsw@rswfire.com with:</p>
                <ul>
                    <li>Your account email address</li>
                    <li>The date of your subscription payment</li>
                    <li>Brief explanation (optional, but helps us improve)</li>
                </ul>
                <p>Refund requests are typically processed within 5-7 business days. Refunds are issued to the original payment method via Paddle.</p>
            </div>

            <div>
                <h2>Access After Refund</h2>
                <p>Upon refund approval, your Sanctum membership access will be revoked immediately. Your account will revert to free-tier access, and you will retain access to non-restricted content.</p>
            </div>

            <div>
                <h2>Technical Issues</h2>
                <p>If you experience technical problems preventing access to the Service, contact us before requesting a refund. We will work to resolve issues when possible. Refunds for technical issues are evaluated on a case-by-case basis.</p>
            </div>

            <div>
                <h2>Cancellation vs. Refund</h2>
                <p>Cancelling your subscription is not the same as requesting a refund. When you cancel:</p>
                <ul>
                    <li>Future charges stop immediately</li>
                    <li>You retain access until the end of your current billing period</li>
                    <li>No refund is issued for the current period</li>
                </ul>
                <p>If you want a refund for the current period, you must submit a refund request separately within the 7-day window.</p>
            </div>

            <div>
                <h2>Contact</h2>
                <p>For refund inquiries, contact: rsw@rswfire.com</p>
            </div>

        </div>

    </Content>

</template>


<script setup>

import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";
import {Link} from "@inertiajs/vue3";
import SanctumAuth from "@/Components/Auth/Sanctum.vue";

const pageTheme = "sanctum";

</script>

<style>

</style>
