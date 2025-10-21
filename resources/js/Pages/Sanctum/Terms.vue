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
                <h1 class="uppercase text-lg font-bold tracking-widest m-0 p-0">Terms of Service</h1>
                <p>Last updated: October 21, 2025</p>
            </div>

            <div>
                <h2 class="mt-8 text-xl font-semibold">1. Service Description</h2>
                <p>rswfire.com ("the Service") provides access to a digital archive of transmissions, AI-processed reflections, field guides, and synthesis tools. Access to certain content requires a Sanctum membership subscription.</p>
            </div>

            <div>
                <h2 class="mt-8 text-xl font-semibold">2. Subscription Terms</h2>
                <p>Sanctum membership is offered as a recurring monthly subscription. By subscribing, you authorize automatic monthly charges to your payment method until you cancel. Subscription fees are non-refundable except as described in the Refund Policy.</p>
            </div>

            <div>
                <h2 class="mt-8 text-xl font-semibold">3. Account Creation</h2>
                <p>You are responsible for maintaining the confidentiality of your account credentials. You agree to provide accurate information during registration and to update it as needed. One account per person.</p>
            </div>

            <div>
                <h2 class="mt-8 text-xl font-semibold">4. Cancellation</h2>
                <p>You may cancel your subscription at any time. Upon cancellation, access to Sanctum-restricted content will continue until the end of your current billing period, after which your account will revert to free-tier access. No partial refunds are provided for unused time in a billing period.</p>
            </div>

            <div>
                <h2 class="mt-8 text-xl font-semibold">5. Acceptable Use</h2>
                <p>You agree not to: (a) share your account credentials with others, (b) attempt to circumvent access restrictions, (c) scrape, copy, or redistribute content without permission, (d) use the Service for any unlawful purpose, or (e) interfere with the infrastructure or other users' access.</p>
            </div>

            <div>
                <h2 class="mt-8 text-xl font-semibold">6. Content Ownership</h2>
                <p>All content on rswfire.com, including transmissions, reflections, and documentation, remains the property of Sam (rswfire). Sanctum membership grants you personal, non-transferable access to view content, not ownership or redistribution rights.</p>
            </div>

            <div>
                <h2 class="mt-8 text-xl font-semibold">7. Service Availability</h2>
                <p>The Service is provided "as is" without warranties of any kind. We do not guarantee uninterrupted access and reserve the right to modify or discontinue features at any time. We are not liable for data loss, service interruptions, or technical failures.</p>
            </div>

            <div>
                <h2 class="mt-8 text-xl font-semibold">8. Limitation of Liability</h2>
                <p>To the maximum extent permitted by law, rswfire.com and its operator are not liable for any indirect, incidental, or consequential damages arising from your use of the Service. Total liability for any claim shall not exceed the amount you paid in subscription fees in the preceding 12 months.</p>
            </div>

            <div>
                <h2 class="mt-8 text-xl font-semibold">9. Modifications to Terms</h2>
                <p>These Terms may be updated periodically. Continued use of the Service after changes constitutes acceptance of the updated Terms. Material changes will be communicated via email or site notice.</p>
            </div>

            <div>
                <h2 class="mt-8 text-xl font-semibold">10. Governing Law</h2>
                <p>These Terms are governed by the laws of the State of Oregon, United States. Any disputes shall be resolved in the courts of Oregon.</p>
            </div>

            <div>
                <h2 class="mt-8 text-xl font-semibold">11. Contact</h2>
                <p>For questions about these Terms, contact: rsw@rswfire.com</p>
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
