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
                <h1>Privacy Policy</h1>
                <p>Last updated: October 21, 2025</p>
            </div>

            <div>
                <h2>1. Information We Collect</h2>
                <p>We collect the following information when you use rswfire.com:</p>
                <ul>
                    <li><strong>Account Information:</strong> Name, email address, and password when you create an account.</li>
                    <li><strong>Payment Information:</strong> Processed by Paddle (our payment processor). We do not store credit card details.</li>
                    <li><strong>Usage Data:</strong> Information about how you interact with the Service, including pages viewed, timestamps, and access patterns.</li>
                    <li><strong>Device Information:</strong> IP address, browser type, and device identifiers for security and functionality purposes.</li>
                </ul>
            </div>

            <div>
                <h2>2. How We Use Your Information</h2>
                <p>We use collected information to:</p>
                <ul>
                    <li>Provide access to the Service and Sanctum membership content</li>
                    <li>Process subscription payments and manage your account</li>
                    <li>Communicate about service updates, changes, or issues</li>
                    <li>Analyze usage patterns to improve the Service</li>
                    <li>Ensure security and prevent unauthorized access</li>
                </ul>
            </div>

            <div>
                <h2>3. Information Sharing</h2>
                <p>We share information with the following third parties only as necessary to operate the Service:</p>
                <ul>
                    <li><strong>Paddle:</strong> Payment processing and subscription management. See Paddle's privacy policy for their data practices.</li>
                    <li><strong>Anthropic (Claude API):</strong> Transmission transcripts are processed by Claude AI to generate reflections. Anthropic's data usage policies apply to this processing.</li>
                    <li><strong>Hosting providers:</strong> Service infrastructure is hosted by third-party providers who may have access to data in the course of providing hosting services.</li>
                </ul>
                <p>We do not sell your personal information to third parties. We do not share data for advertising purposes.</p>
            </div>

            <div>
                <h2>4. Data Retention</h2>
                <p>We retain your account information for as long as your account is active. If you cancel your subscription, we retain basic account data (email, username) to preserve free-tier access unless you request full deletion.</p>
            </div>

            <div>
                <h2>5. Your Rights</h2>
                <p>You have the right to:</p>
                <ul>
                    <li>Access the personal information we hold about you</li>
                    <li>Request correction of inaccurate information</li>
                    <li>Request deletion of your account and associated data</li>
                    <li>Export your data in a portable format</li>
                    <li>Withdraw consent for data processing (which may limit Service functionality)</li>
                </ul>
                <p>To exercise these rights, contact: rsw@rswfire.com</p>
            </div>

            <div>
                <h2>6. Cookies and Tracking</h2>
                <p>We use essential cookies to maintain your session and authentication state. We do not use third-party advertising or tracking cookies. You can disable cookies in your browser, but this may affect Service functionality.</p>
            </div>

            <div>
                <h2>7. Security</h2>
                <p>We implement reasonable security measures to protect your information, including encrypted connections (HTTPS) and secure password storage. However, no system is completely secure, and we cannot guarantee absolute security.</p>
            </div>

            <div>
                <h2>8. International Users</h2>
                <p>The Service is operated from the United States. If you access the Service from outside the U.S., your information will be transferred to and processed in the United States.</p>
            </div>

            <div>
                <h2>9. Changes to This Policy</h2>
                <p>We may update this Privacy Policy periodically. Material changes will be communicated via email or site notice. Continued use after changes constitutes acceptance.</p>
            </div>

            <div>
                <h2>10. Contact</h2>
                <p>For privacy-related questions, contact: rsw@rswfire.com</p>
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
