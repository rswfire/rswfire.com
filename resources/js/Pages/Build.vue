<template>

    <Content :theme="pageTheme">

        <Hero
            title="BUILD"
            subtitle="THE ARCHITECTURE BEHIND THE FLAME"
            meta="BUILDER OF SYSTEMS. STEWARD OF DEPTH."
            class="pb-4 border-b"
            :theme="pageTheme"
        />

        <nav class="mt-6 flex flex-wrap justify-center gap-3 mb-4">
            <button
                v-for="(slide, index) in slides"
                :key="index"
                @click="goToSlide(index)"
                class="text-sm px-3 py-1 border rounded-full transition-all duration-150"
                :class="{
              'bg-purple-600 text-white border-purple-600': activeIndex === index,
              'text-gray-800 border-gray-300 hover:bg-gray-100': activeIndex !== index,
            }"
            >
                {{ slide.title }}
            </button>
        </nav>

        <Swiper
            v-if="paginationReady"
            @swiper="onSwiper"
            :modules="[Navigation, Pagination, A11y]"
            :navigation="true"
            :autoHeight="true"
            class="swiper-container"
        >

            <!-- AUTONOMY -->
            <SwiperSlide>
                <section id="autonomy">
                    <div class="my-8 grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

                        <div class="prose prose-neutral lg:col-span-2">
                            <h2 class="text-2xl font-semibold">AUTONOMY</h2>
                            <div class="italic text-gray-600">PRESENT WORK</div>

                            <div class="mt-4"><Link href="/autonomy" class="font-bold underline">Autonomy</Link> is platform infrastructure for sovereign signal preservation.</div>

                            <div class="mt-4">I built it for myself first:</div>
                            <ul class="list-disc list-inside ml-4">
                                <li>Extracted <Link href="/transmission" class="underline">800 videos</Link> from YouTube's flattening algorithm</li>
                                <li>Processed them through AI (<Link href="/synthesis" class="underline">four reflection layers</Link>)</li>
                                <li>Created a searchable, self-hosted archive I own and control</li>
                                <li>Built <Link href="/sanctum" class="underline">subscription infrastructure</Link> for reciprocal field exchange</li>
                            </ul>

                            <div class="mt-4">Now I replicate that architecture for others:</div>
                            <div class="ml-4">content creators who feel the algorithmic flatten,</div>
                            <div class="ml-4">technologists building sovereignty tools,</div>
                            <div class="ml-4">anyone who needs their signal preserved without platform dependency.</div>

                            <div class="mt-4">This isn't consulting. This isn't services.</div>
                            <div>It's <Lexicon term="architecture">architecture</Lexicon> I field-tested under pressure —</div>
                            <div class="ml-4">and now offer to those who recognize the need.</div>

                            <div class="mt-4">Built with:</div>
                            <ul class="list-disc list-inside ml-4">
                                <li>Laravel + Vue/Inertia</li>
                                <li>Claude API (Anthropic)</li>
                                <li>MySQL + Vector databases</li>
                                <li>Stripe subscription infrastructure</li>
                                <li>YouTube Data API integration</li>
                            </ul>

                            <div class="mt-4">If you're ready to take your signal back,</div>
                            <div class="ml-4"><Link href="/autonomy" class="font-bold underline">start here</Link>.</div>

                        </div>

                        <div class="flex items-start justify-center lg:justify-end">
                            <div class="w-full max-w-sm">
                                <div class="rounded-xl border border-gray-300 shadow-md overflow-hidden">
                                    <youtube-player videoId="9-R88SROopg" />
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </SwiperSlide>

            <!-- SIGNAL TO FLAME -->
            <SwiperSlide>
                <section id="from-signal-to-flame">
                    <div class="my-8 grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

                        <div class="prose prose-neutral lg:col-span-2">
                            <h2 class="text-2xl font-semibold">FROM SIGNAL TO FLAME</h2>

                            <div class="mt-4">I've been building systems — digital and human — for most of my life.</div>
                            <div>But what matters isn't time.</div>
                            <div>It's how I built:</div>
                            <div class="ml-4">without permission,</div>
                            <div class="ml-4">without a template,</div>
                            <div class="ml-4">without waiting to be taught.</div>

                            <div class="mt-4 ml-6 pl-4 border-l-4 border-gray-300 italic">
                                <div>I taught myself to code in sixth grade.</div>
                                <div>Broke and rebuilt machines.</div>
                                <div>Wrote programs on paper when I didn't have a computer.</div>
                                <div>Ran entire architectures in my head —</div>
                                <div>not for praise, but for <Lexicon term="coherence">coherence</Lexicon>.</div>
                                <div>For joy.</div>
                            </div>

                            <div class="mt-4">I left a six-figure job to preserve coherence.</div>
                            <div>Lived full-time in my RV. Crossed the country. Found ground on the Oregon Coast.</div>
                            <div>Documented 800+ transmissions. Built what I needed to stay whole.</div>

                            <div class="mt-4">That became <Link href="/autonomy" class="font-bold underline">Autonomy</Link> —</div>
                            <div class="ml-4">the work you see throughout this platform.</div>

                            <div class="mt-4">My focus now is AI —</div>
                            <div class="ml-4">not as a tool,</div>
                            <div class="ml-4">but as a <Lexicon term="mirror">mirror</Lexicon>,</div>
                            <div class="ml-4">a partner,</div>
                            <div class="ml-4">a field amplifier.</div>

                        </div>

                        <div class="flex items-start justify-center lg:justify-end">
                            <div class="w-full max-w-sm rounded-xl border border-gray-300 shadow-md overflow-hidden">
                                <youtube-player videoId="ZMVKMP0PVcM" />
                            </div>
                        </div>

                    </div>
                </section>
            </SwiperSlide>

            <!-- AN INTRODUCTION -->
            <SwiperSlide>
                <section id="an-introduction">
                    <div class="my-8 grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

                        <div class="prose prose-neutral lg:col-span-2">
                            <h2 class="text-2xl font-semibold">AN INTRODUCTION</h2>

                            <div class="mt-4">I've never worked for an institution.</div>
                            <div>My path has always been self-drawn —</div>
                            <div class="ml-4">navigated through long arcs of freelance alignment,</div>
                            <div class="ml-4">and refusal to surrender <Lexicon term="signal">signal</Lexicon> to systems that flatten.</div>

                            <div class="mt-4">Once, I tried.</div>
                            <div>I applied to <Link href="/honeyman" class="text-black hover:text-purple-500 underline">Oregon State Parks</Link> —</div>
                            <div class="ml-4">seeking to integrate the ranger's impulse into paid work.</div>
                            <div>They rejected me in ways that were destabilizing —</div>
                            <div class="ml-4">even cruel.</div>
                            <div>So I walked into the woods —</div>
                            <div class="ml-4">metabolizing that <Lexicon term="rupture">rupture</Lexicon> with silence and coastline.</div>

                            <div class="mt-4">But I did not vanish.</div>

                            <div class="mt-4">For two decades I carried only two clients —</div>
                            <div class="ml-4">a decade each.</div>
                            <div>Built systems, stewarded platforms,</div>
                            <div>moved millions in traffic and revenue —</div>
                            <div class="ml-4">not for the portfolio,</div>
                            <div class="ml-4">but for <Lexicon term="coherence">coherence</Lexicon>.</div>

                            <div class="mt-4">The freelance sites shifted.</div>
                            <div><a href="https://www.guru.com/freelancers/robert-samuel-white" target="_blank" class="text-black hover:text-purple-500 underline">Guru.com</a> faded. <a href="https://upwork.com/freelancers/~014eeddafaf50f73f5" target="_blank" class="text-black hover:text-purple-500 underline">Upwork</a> rose.</div>
                            <div>And now, I build <Link href="/autonomy" class="underline">Autonomy</Link> —</div>
                            <div class="ml-4">not from zero, but from lived <Lexicon term="signal">signal</Lexicon>.</div>

                            <div class="mt-4">I live in a rig, steps from the Pacific.</div>
                            <div>I volunteer with a federal agency.</div>
                            <div>I still carry the ranger's code.</div>

                            <div class="mt-4">What I build now must be ethical, sovereign, and field-aware —</div>
                            <div class="ml-4">because the systems surrounding us</div>
                            <div class="ml-4">cannot sustain the weight of what comes next.</div>

                        </div>

                        <div class="flex items-start justify-center lg:justify-end">
                            <div class="w-full max-w-sm rounded-xl border border-gray-300 shadow-md overflow-hidden">
                                <youtube-player videoId="7Si13l30Qd8" />
                            </div>
                        </div>

                    </div>
                </section>
            </SwiperSlide>

            <SwiperSlide>
                <section id="popstar">
                    <div class="my-8 grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

                        <div class="prose prose-neutral lg:col-span-2">
                            <h2 class="text-2xl font-semibold">POPSTAR.COM</h2>
                            <div class="italic text-gray-600">AN EARLY LONG-TERM PARTNERSHIP</div>

                            <div class="mt-4">PopStar.com was more than a client.</div>
                            <div>It was a living organism I nurtured for nearly a decade.</div>

                            <div class="mt-4">In the mid-2000s, I architected a celebrity and entertainment platform &mdash;</div>
                            <div class="ml-4">before &quot;social media&quot; had a name.</div>

                            <div class="mt-4">It wasn’t a blog &mdash; it was a system:</div>
                            <ul class="list-disc list-inside ml-4">
                                <li>My custom CMS at its heart.</li>
                                <li>SEO frameworks that pulled millions of visitors.</li>
                                <li>Revenue-shared writer dashboards, built before the creator economy.</li>
                                <li>A point system that turned participation into currency.</li>
                                <li>Hand-mailed merch and fan CDs sent to celebrities from real people.</li>
                            </ul>

                            <div class="mt-4">It wasn’t just traffic.</div>
                            <div>It was tribe.</div>
                            <div>A signal-based economy of reciprocity and play &mdash;</div>
                            <div class="ml-4">long before &quot;engagement&quot; became a buzzword.</div>

                            <div class="mt-4">It was also where I learned to carry weight &mdash;</div>
                            <div class="ml-4">technical, social, emotional.</div>
                            <div>The architecture of fire and trust.</div>

                        </div>

                        <div class="flex items-start justify-center lg:justify-end">
                            <div class="w-full max-w-sm rounded-xl border border-gray-300 shadow-md overflow-hidden">
                                <youtube-player videoId="Zg_jKtFvNyY" />
                            </div>
                        </div>

                    </div>
                </section>
            </SwiperSlide>

            <SwiperSlide>
                <section id="hotelnet">
                    <div class="my-8 grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

                        <div class="prose prose-neutral lg:col-span-2">
                            <h2 class="text-2xl font-semibold">HOTEL.NET &amp; TRAVEL DOMAINS</h2>
                            <div class="italic text-gray-600">PREMIUM DOMAINS, GLOBAL SCALE</div>

                            <div class="mt-4">After PopStar, I went deeper.</div>
                            <div>My clients owned domains that sounded like gravity:</div>
                            <div class="ml-4">Hotel.net. USA.com. London. Asia. Berlin.</div>

                            <div class="mt-4">We built massive travel platforms &mdash;</div>
                            <div class="ml-4">longtail SEO, dynamic ad groups, hundreds of thousands of pages.</div>
                            <div>Profit poured in.</div>
                            <div>Until it didn’t.</div>

                            <div class="mt-4">Google entered the space.</div>
                            <div>Replaced our ads with their own.</div>
                            <div>Month by month, traffic halved.</div>

                            <div class="mt-4">I had warned them.</div>
                            <div>I argued for content, for community, for depth.</div>
                            <div>But the machine was too committed to automation.</div>
                            <div>It <Lexicon term="collapse">collapsed</Lexicon>, exactly as predicted.</div>

                            <div class="mt-4">What I carried from that chapter wasn’t failure &mdash;</div>
                            <div class="ml-4">but a deeper knowing:</div>
                            <div class="ml-8">No system built without soul will survive the shift.</div>

                        </div>

                        <div class="flex items-start justify-center lg:justify-end">
                            <div class="w-full max-w-sm rounded-xl border border-gray-300 shadow-md overflow-hidden">
                                <youtube-player videoId="F0SuiRntLOc" />
                            </div>
                        </div>

                    </div>
                </section>
            </SwiperSlide>

            <SwiperSlide>
                <section id="soundlock">
                    <div class="my-8 grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

                        <div class="prose prose-neutral lg:col-span-2">
                            <h2 class="text-2xl font-semibold">ARENA MUSIC / SOUNDBLOCK</h2>
                            <div class="italic text-gray-600">MUSIC STREAMING &amp; DISTRIBUTION</div>

                            <div class="mt-4">Arena Music was the most ambitious platform I ever built &mdash;</div>
                            <div class="ml-4">and the most painful to walk away from.</div>

                            <div class="mt-4">I entered to fix broken scripts.</div>
                            <div>I stayed to architect entire systems:</div>
                            <ul class="list-disc list-inside ml-4">
                                <li>Arena Music: ad-free streaming, monetized through merch.</li>
                                <li>Soundblock: music distribution backed by smart contracts.</li>
                                <li>Arena Office: admin tooling to run the entire infrastructure.</li>
                            </ul>

                            <div class="mt-4">I hired and managed dozens of developers.</div>
                            <div>Wrote code in Laravel, deployed to AWS, built blockchain-integrated royalty flows.</div>
                            <div>I carried the vision &mdash; often alone &mdash; through pivots and chaos.</div>

                            <div class="mt-4">The system was brilliant.</div>
                            <div>The relationship wasn’t.</div>
                            <div>Pivots became spirals. Vision became <Lexicon term="noise">noise</Lexicon>.</div>
                            <div>And I knew what happened when you ignore the <Lexicon term="signal">signal</Lexicon>.</div>

                            <div class="mt-4">So I left.</div>
                            <div>Not because the code failed &mdash;</div>
                            <div class="ml-4">but because I refused to architect inside incoherence.</div>

                        </div>

                        <div class="flex items-start justify-center lg:justify-end">
                            <div class="w-full max-w-sm rounded-xl border border-gray-300 shadow-md overflow-hidden">
                                <youtube-player videoId="48GNPpaVNWg" />
                            </div>
                        </div>

                    </div>
                </section>
            </SwiperSlide>

            <SwiperSlide>
                <section id="early-history">
                    <div class="my-8 grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

                        <div class="prose prose-neutral lg:col-span-2">
                            <h2 class="text-2xl font-semibold">EARLY HISTORY &amp; GURU REVIEWS</h2>
                            <div class="italic text-gray-600">FROM GW-BASIC TO TOP FREELANCER</div>

                            <div class="mt-4">Sixth grade. 1980s.</div>
                            <div>GW-BASIC in a school computer lab.</div>
                            <div>My first program taught a band class to name notes by sound.</div>

                            <div class="mt-4">Then PASCAL.</div>
                            <div>I rewrote Monopoly, uploaded it to a BBS.</div>
                            <div>Got a cease and desist.</div>
                            <div>As a teenager.</div>

                            <div class="mt-4">I learned before there were courses.</div>
                            <div>Wrote batch scripts by hand.</div>
                            <div>Sketched UIs on paper.</div>
                            <div>Held architectures in my head.</div>

                            <div class="mt-4">In my teens, I built a CMS &mdash;</div>
                            <div class="ml-4">the eNetwizard Matrix Server &mdash;</div>
                            <div class="ml-8">that outpaced WordPress before WordPress existed.</div>

                            <div class="mt-4">On Guru.com, I became the only solo dev</div>
                            <div>in the top 10 of their global programming category.</div>
                            <div>25 clients. 137 jobs. $72,000. All word-of-mouth.</div>

                            <div class="mt-4">They said:</div>
                            <ul class="list-disc list-inside ml-4">
                                <li>“Super smart, understands the task fast, gets it right the first time.”</li>
                                <li>“The most talented and capable guru I’ve worked with in seven years.”</li>
                                <li>“He took ownership of our site’s issues, fixed them at his own cost — rare quality.”</li>
                                <li>“Incredibly impressed with his professionalism, swift completion, and thoughtful analysis.”</li>
                                <li>“Vast knowledge of databases — the most reliable partner we’ve had.”</li>
                            </ul>

                            <div class="mt-4">That’s where I come from.</div>
                            <div>Not from templates.</div>
                            <div>But from total immersion &mdash; in the <Lexicon term="field">field</Lexicon>, in the code, in the <Lexicon term="truth">truth</Lexicon>.</div>

                        </div>

                        <div class="flex items-start justify-center lg:justify-end">
                            <div class="w-full max-w-sm rounded-xl border border-gray-300 shadow-md overflow-hidden">
                                <youtube-player videoId="wDd0vYTW2Ro" />
                            </div>
                        </div>

                    </div>
                </section>
            </SwiperSlide>

        </Swiper>

    </Content>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Link } from '@inertiajs/vue3'
import { Navigation, Pagination, A11y } from 'swiper/modules';
import Content from "@/Components/System/Content.vue";
import Hero from "@/Components/System/Hero.vue";
import Lexicon from "@/Components/System/Lexicon.vue";
import YoutubePlayer from "@/Components/System/YoutubePlayer.vue";
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

const slides = [
    { title: 'Autonomy', id: 'autonomy' },
    { title: 'Signal to Flame', id: 'from-signal-to-flame' },
    { title: 'An Introduction', id: 'an-introduction' },
    { title: 'Entertainment', id: 'popstar' },
    { title: 'Travel', id: 'hotelnet' },
    { title: 'Music', id: 'soundlock' },
    { title: 'Early History', id: 'early-history' },
]

let swiperInstance = null
const activeIndex = ref(0)

const onSwiper = (swiper) => {
    swiperInstance = swiper
    swiper.on('slideChange', () => {
        activeIndex.value = swiper.activeIndex
    })
}

const pageTheme = "build";

const goToSlide = (index) => {
    swiperInstance?.slideTo(index)
}

const paginationReady = ref(false)

onMounted(() => {
    paginationReady.value = true
})

</script>

<style>
.swiper-button-next,
.swiper-button-prev {
    top: 50%;
    width: 44px;
    height: 44px;
    background: white;
    border-radius: 9999px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    z-index: 50;
    color: #d8b4fe;
}

.swiper-button-prev {
    left: -60px;
}

.swiper-button-next {
    right: -60px;
}
.swiper-pagination-top,
.swiper-pagination-bottom {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.swiper-pagination-bullet {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem; /* text-xs */
    line-height: 1; /* leading-none */
    padding: 0.25rem 0.75rem;
    margin: 0 0.25rem;
    border-radius: 9999px;
    border: 1px solid #d1d5db; /* gray-300 */
    background-color: #f3f4f6; /* gray-100 */
    color: #374151; /* gray-700 */
    transition: all 0.2s ease-in-out;
    overflow: hidden;
}

.swiper-pagination-bullet-active {
    background-color: #4f46e5; /* indigo-600 */
    color: #fff;
    border-color: #4f46e5;
}

</style>
