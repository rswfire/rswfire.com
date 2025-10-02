<template>

    <Content :theme="pageTheme">

        <Hero
            title="CONTRIBUTIONS"
            subtitle="SUPPORT THE CONTINUED SYNTHESIS OF THIS FIELD"
            meta="WRITING. VIDEO. SOUND. SYSTEMS. SANCTUM."
            :theme="pageTheme"
        />

        <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

            <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black flex flex-col lg:flex-row gap-8">

                <div class="w-full md:w-4/5">

                  <div class="mt-4"><strong>You’re not here by accident</strong>.</div>

                    <div class="mt-4">If you’ve landed on this page, something in you has already registered the resonance.</div>
                    <div>You’ve felt the signal &mdash;</div>
                    <div class="ml-4">in the shape of a sentence,</div>
                    <div class="ml-4">the silence between moments,</div>
                    <div class="ml-4">or the steady frequency of a life lived without reduction.</div>

                    <div class="mt-4">This field isn’t built for performance.</div>
                    <div>It isn’t optimized for algorithms.</div>
                    <div>It doesn't extract, seduce, or entertain.</div>
                    <div>It transmits.</div>

                    <div class="mt-4">Through videos, systems, code, writing, and lived presence &mdash;</div>
                    <div class="ml-4">this signal has been carried, refined, and made visible.</div>
                    <div>Not as spectacle.</div>
                    <div>As coherence.</div>

                    <div>If that coherence has met something in you &mdash;</div>
                    <div class="ml-4">not just intellectually, but in the architecture of your being &mdash;</div>
                    <div class="ml-8">then you are already part of the field.</div>

                    <h2 class="mt-8 uppercase text-lg font-bold tracking-widest m-0 p-0">Why Support?</h2>

                    <div class="mt-2">Because reciprocity is what sustains the signal.</div>
                    <div>Because signal without return begins to decay.</div>
                    <div>Because in a collapsing world of distortion, coherence costs.</div>

                    <div class="mt-4">Your contribution helps sustain:</div>
                    <ul class="list-disc list-inside ml-4">
                        <li><span>The ongoing creation of high-signal materials (writing, code, video, architecture).</span></li>
                        <li><span>The infrastructure of nomadic sovereignty.</span></li>
                        <li><span>The transmission of field-aligned systems without compromise.</span></li>
                        <li><span>The bandwidth &mdash; literal and energetic &mdash; to continue.</span></li>
                    </ul>

                    <div class="mt-4">This is not donation.</div>
                    <div>It is participation.</div>

                    <div class="mt-4">This is not support for a brand.</div>
                    <div>It is fuel for a system that you are already inside.</div>

                    <div id="contrib"></div>
                    <h2 class="mt-8 uppercase text-lg font-bold tracking-widest m-0 p-0">How to Contribute</h2>
                    <div class="mt-2 ml-4">
                        🜂 <strong>PayPal</strong>:
                        <a href="https://paypal.me/rswfire" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline">
                            paypal.me/rswfire
                        </a>
                    </div>
                    <div class="ml-4">
                        🜂 <strong>Venmo</strong>:
                        <a href="https://venmo.com/code?user_id=2770322038194176912" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline">
                            @rswfire
                        </a>
                    </div>

                    <div class="mt-4">Or simply share the field with someone who can feel it.</div>
                    <div>Spread signal. Disrupt noise.</div>

                    <h2 class="mt-8 uppercase text-lg font-bold tracking-widest m-0 p-0">Final Note</h2>

                    <div class="mt-4">If you’ve received something here &mdash;</div>
                    <div class="ml-4">clarity, recognition, resonance, or repair &mdash;</div>
                    <div class="ml-8">this page is simply a mirror:</div>
                    <div class="ml-12">a chance to give something back.</div>

                    <div class="mt-4">Thank you for seeing.</div>
                    <div>Thank you for listening.</div>
                    <div>Thank you for being part of the shape.</div>

                    <div class="mt-4">&mdash; rswfire</div>

                </div>

                <div class="w-full md:w-1/5 border-l border-gray-300 pl-4">
                    <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">Contributors</h2>
                    <ul class="space-y-3">
                        <li v-for="contributor in contributors" :key="contributor.name" class="leading-tight">
                            <div class="text-sm font-semibold text-black">
                                <template v-if="contributor.link">
                                    <a
                                        :href="contributor.link"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="hover:underline inline-flex items-center space-x-1"
                                    >
                                        <span>{{ contributor.name }}</span>
                                        <Icon name="ExternalLink" color="text-black" class="w-[12px] h-[12px] flex-shrink-0" />
                                    </a>

                                </template>
                                <template v-else>
                                    {{ contributor.name }}
                                </template>
                            </div>
                            <div class="flex justify-between text-xs text-gray-600 font-medium">
                                <span>${{ contributor.amount }}</span>
                                <span class="font-mono text-gray-500">{{ contributor.date }}</span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    </Content>

</template>


<script setup>

import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue'
import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";
import {Link} from "@inertiajs/vue3";

import { router } from '@inertiajs/vue3'
import Icon from "@/Components/System/Icon.vue";

const contributors = [
    { name: "Unfurling Kurt", amount: 100, date: "072125", link: "https://youtube.com/@unfurlingkurt" },
    { name: "Your Name Here (Optional)", amount: null, date: null },
]

const pageTheme = "contribute";

</script>

<style>

</style>
