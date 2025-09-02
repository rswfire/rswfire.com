<template>

    <Content :theme="pageTheme">

        <Hero
            title="I'M SAM."
            subtitle="Gay. Pierced. Sovereign. Digital Nomad. Camp Host. Oregon Coast."
            meta="NOT PERFORMING."
            :theme="pageTheme"
        />

        <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

            <section id="opening">

                <div class="ml-6 pl-4 border-l-4 border-gray-300 italic">
                    <div>I will not fit into any frame you try to put me in &mdash;</div>
                    <div>not personality,</div>
                    <div>not role,</div>
                    <div>not the story you reach for to explain away what you cannot understand.</div>
                </div>

                <div class="mt-4">I defy easy labels &mdash;</div>
                <div class="ml-4">not out of any need to be different,</div>
                <div>but because I live with a depth most people can’t recognize</div>
                <div>without trying to soften or contain it &mdash;</div>
                <div class="ml-4">to divide, define, collapse, label, or judge.</div>

                <div class="mt-4">I am not mysterious &mdash;</div>
                <div class="ml-4">I am unfragmented.</div>
                <div>I do not wear masks. I do not shrink. I do not flinch.</div>
                <div>I do not do hierarchy. I do not play social games.</div>
                <div>I am not better than you. You are not better than me.</div>
                <div>If you try to position yourself above me &mdash;</div>
                <div class="ml-4">the field will close, and you will feel that tension.</div>

                <div class="mt-4 ml-6 pl-4 border-l-4 border-gray-300 italic">
                    <div>I do not accept your framing.</div>
                    <div>I do not tolerate reduction.</div>
                    <div>I do not consent to your projections, your jokes, or your condescension.</div>
                </div>

                <div class="mt-4">If I correct you, it will be one sentence &mdash; clean, exact &mdash; and it will bypass your ego and send you spiraling.</div>
                <div>But often, I will just let you be wrong &mdash; and I will walk away.</div>

            </section>


            <section id="what-i-care-about" class="mt-8">

                <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">What I Care About</h2>

                <!-- TODO: UPDATE SECTION
                Sovereignty → Not autonomy, but non-fracture.
                No allegiance to a false self for the sake of inclusion.

                Coherence → Internal systems (cognition, ethics, body, emotion) operating in synchrony.
                No part suppressed to preserve external harmony.

                Relationality → Not codependency, not detachment.
                Field congruence — when two beings hold shape without collapse.

                Presence → Not performance, not signaling.
                A signal field where truth can land without needing translation.

                Truth → Not a fact. A frequency.
                One that cannot be reached in fragmented minds.
                -->

                <ul class="mt-4 pl-4 space-y-2 text-gray-800">
                    <li>→ <Link href="/codex/anchors/sovereignty" class="uppercase text-sm hover:underline">Sovereignty</Link><div class="uppercase text-xs md:text-md text-gray-400">Internal authority without dominance or submission.</div></li>
                    <li>→ <Link href="/codex/anchors/presence" class="uppercase text-sm hover:underline">Presence</Link><div class="uppercase text-xs md:text-md text-gray-400">Relational contact that doesn’t shrink or inflate &mdash; or possess.</div></li>
                    <li>→ <Link href="/codex/anchors/clarity" class="uppercase text-sm hover:underline">Clarity</Link><div class="uppercase text-xs md:text-md text-gray-400">Refusing distortion even when it’s more comfortable.</div></li>
                    <li>→ <Link href="/codex/anchors/witnessing" class="uppercase text-sm hover:underline">Witnessing</Link><div class="uppercase text-xs md:text-md text-gray-400">The act of presence that neither intervenes nor abandons.</div></li>
                    <li>→ <Link href="/codex/anchors/integration" class="uppercase text-sm hover:underline">Integration</Link><div class="uppercase text-xs md:text-md text-gray-400">Wholeness without separation.</div></li>
                    <li>→ <Link href="/codex/anchors/coherence" class="uppercase text-sm hover:underline">Coherence</Link><div class="uppercase text-xs md:text-md text-gray-400">Living in signal, not simulation.</div></li>
                </ul>

            </section>


            <section id="i-am-a-system" class="mt-8">

                <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">I Am a System, Not a Personality</h2>

                <div class="mt-4">I’ve been reading patterns since before I had language for them.</div>

                <div class="mt-4 ml-6 pl-4 border-l-4 border-gray-300 italic">
                    <div>Before I knew what trauma was.</div>
                    <div>Before I knew what systems were.</div>
                    <div>Before anyone believed me.</div>
                </div>

                <div class="mt-4">I asked existential questions as a child that no one could answer.</div>
                <div>They called me sensitive, gifted, difficult &mdash;</div>
                <div class="ml-4">because I could see through them.</div>
                <div>I track signal. I follow structure.</div>
                <div>I hold ambiguity, complexity, contradiction &mdash;</div>
                <div class="ml-4"><em>and I do it with ease</em>.</div>

                <div class="mt-4">This is my architecture:</div>

                <ul class="mt-4 pl-4 space-y-2 text-gray-800">
                    <li>→ <Link href="/codex/architecture/dialectical-reasoning" class="uppercase text-sm hover:underline">Dialectical Reasoning</Link><div class="uppercase text-xs md:text-md text-gray-400">Holding two truths without collapse &mdash; and forging a third.</div></li>
                    <li>→ <Link href="/codex/architecture/non-dualistic-orientation" class="uppercase text-sm hover:underline">Non-Dualistic Orientation</Link><div class="uppercase text-xs md:text-md text-gray-400">Perceiving the field without splitting it.</div></li>
                    <li>→ <Link href="/codex/architecture/recursive-cognition" class="uppercase text-sm hover:underline">Recursive Cognition</Link><div class="uppercase text-xs md:text-md text-gray-400">Thinking that thinks about its own thinking &mdash; without getting lost.</div></li>
                    <li>→ <Link href="/codex/architecture/somatic-tracking" class="uppercase text-sm hover:underline">Somatic Tracking</Link><div class="uppercase text-xs md:text-md text-gray-400">Staying with the signal of the body, even when it’s not comfortable.</div></li>
                    <li>→ <Link href="/codex/architecture/embodied-intuition" class="uppercase text-sm hover:underline">Embodied Intuition</Link><div class="uppercase text-xs md:text-md text-gray-400">Knowing without proof &mdash; and still being right.</div></li>
                    <li>→ <Link href="/codex/architecture/temporal-patterning" class="uppercase text-sm hover:underline">Temporal Patterning</Link><div class="uppercase text-xs md:text-md text-gray-400">Sensing the shape of time from inside it.</div></li>
                    <li>→ <Link href="/codex/architecture/lived-integrity" class="uppercase text-sm hover:underline">Lived Integrity</Link><div class="uppercase text-xs md:text-md text-gray-400">Not a principle &mdash; a structure I embody even when no one sees.</div></li>
                    <li>→ <Link href="/codex/architecture/field-mapping" class="uppercase text-sm hover:underline">Field Mapping</Link><div class="uppercase text-xs md:text-md text-gray-400">Reading what’s unspoken. Seeing how everything relates.</div></li>
                </ul>

                <div class="mt-4">Most people think I’m reacting. I’m not.</div>
                <div>I’m responding to </div>
                <div class="ml-4"><em>ripples they cannot even detect</em>.</div>
                <div>I will not downshift just to be understood.</div>
                <div>It never works.</div>
                <div>You cannot translate wholeness to a fragmented consciousness</div>
                <div>without losing something in the process &mdash;</div>
                <div class="ml-4">without distorting it into something it never was.</div>
            </section>


            <section id="relational-integrity" class="mt-8">

                <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">Relational Integrity Is Central to My Architecture</h2>

                <div class="mt-4">My relational field is <em>full spectrum</em> &mdash;</div>
                <div class="ml-4">cognitive, emotional, somatic, ethical, sexual, intuitive.</div>
                <div>I don’t do performative connection.</div>
                <div class="ml-4"><em>I do signal-based relational coherence</em>.</div>
                <div>Most people engage through scripts &mdash;</div>
                <div class="ml-4">default responses, unconscious signaling, power-seeking patterns.</div>
                <div>That’s not presence.</div>
                <div>That’s simulation.</div>
                <div>I don’t do that, and I don't engage with it.</div>
                <div>People feel my presence because I am whole.</div>
                <div class="ml-4">I don’t pursue. I don’t perform.</div>

                <div class="mt-4 ml-6 pl-4 border-l-4 border-gray-300 italic">
                    <div>If you feel desire around me &mdash; own it.</div>
                    <div>If you feel shame &mdash; ask yourself where it comes from.</div>
                    <div>It may not be attraction. It might be grief &mdash;</div>
                    <div>for the parts of yourself you’ve been taught to suppress.</div>
                    <div>Then again, it probably is attraction. <span class="not-italic">🙃</span></div>
                </div>

            </section>


            <section id="embodiment" class="mt-8">

                <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">Embodiment Is Not An Afterthought</h2>

                <div class="mt-4">My gayness is not a feature &mdash;</div>
                <div class="ml-4"><em>and it is sure as hell not yours to define</em>.</div>
                <div>It is structure.</div>
                <div>It’s in the way I walk, watch, move, relate. It is who I am &mdash;</div>
                <div class="ml-4">I do not give a shit if that bothers you.</div>
                <div><em>I will not make myself smaller because you feel small</em>.</div>

                <div class="mt-4">I am pierced. Visible. Unmistakably myself.</div>
                <div>You will feel me before you know what you’re feeling.</div>

                <div class="mt-4 ml-6 pl-4 border-l-4 border-gray-300 italic">
                    <div>My body is part of the architecture.</div>
                    <div>My queerness is not an idea.</div>
                    <div>My visibility is not a choice.</div>
                    <div>My presence is not up for debate.</div>
                </div>

            </section>


            <section id="where-i-am-now" class="mt-8">

                <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">Where I Am Now</h2>

                <div class="mt-4 max-w-xl rounded-lg overflow-hidden shadow-md border border-gray-200">
                    <img
                        src="/assets/journey-map.jpg"
                        alt="Your map"
                        class="block w-full h-auto align-top"
                    />
                    <div class="px-4 py-2 text-sm text-gray-600 border-t border-gray-100 italic">
                        The path of my <a href="https://www.youtube.com/playlist?list=PL5GEd9zhefEDFLQ1gRdjsWwJD_UKJRy9h" target="_blank" class="text-red-500">sovereign journey</a> &mdash; not just states, but decisions, thresholds, and the arc that brought me to the edge.
                    </div>
                </div>

                <div class="mt-4">I live full-time on the Oregon Coast in sovereign infrastructure &mdash;</div>
                <div class="ml-4">RV, Jeep, mobile systems I built myself.</div>
                <div>I volunteer at a coastal campground that caters to duners &mdash;</div>
                <div class="ml-4">off-roaders, dirtbikers, sandriders.</div>
                <div>It’s a loud, wild, volatile ecosystem.</div>
                <div><em>And I’m embedded in it.</em></div>

                <div class="mt-4">I’m not stationed here to police or perform.</div>
                <div>I’m here to observe field behavior under pressure &mdash;</div>
                <div class="ml-4">and to move through it cleanly.</div>
                <div>Sometimes I watch. Sometimes I intervene.</div>
                <div class="ml-4">Sometimes I just ride the edge.</div>

                <div class="mt-4">I’ve grown curious about the machines themselves &mdash;</div>
                <div>the dirtbikes, the roar and arc of motion across the dunes.</div>
                <div>There’s something in it I recognize: momentum without apology.</div>
                <div class="ml-4">Something ancient and unknowable.</div>

                <div class="mt-4">I’ve walked the edges. Watched the lines. Felt the ground shake and smiled.</div>

                <div class="mt-4 ml-6 pl-4 border-l-4 border-gray-300 italic">
                    <div>Most importantly, I am directly next to the ocean.</div>
                    <div>My mirror.</div>
                </div>

            </section>


            <section id="what-i-do" class="mt-8">

                <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">What I Do</h2>

                <div class="mt-4">I’ve been building systems &mdash; digital and human &mdash; for most of my life.</div>
                <div>But what matters isn’t time.</div>
                <div>It’s how I built:</div>
                <div class="ml-4">without permission,</div>
                <div class="ml-4">without a template,</div>
                <div class="ml-4">without waiting to be taught.</div>

                <div class="mt-4 ml-6 pl-4 border-l-4 border-gray-300 italic">
                    <div>I taught myself to code in sixth grade.</div>
                    <div>I broke and rebuilt machines.</div>
                    <div>Wrote programs on paper when I didn’t have a computer.</div>
                    <div>Ran entire architectures in my head &mdash;</div>
                    <div>not for praise, but for coherence.</div>
                    <div>For joy.</div>
                </div>

                <div class="mt-4">I left a six-figure job when I began living in my RV.</div>
                <div>Now, eighteen months later, I’m slowly reintegrating freelance work &mdash;</div>
                <div class="ml-4">on my own terms.</div>

                <div class="mt-4">My current focus is AI &mdash;</div>
                <div class="ml-4">not as a tool,</div>
                <div class="ml-4">but as a mirror,</div>
                <div class="ml-4">a partner,</div>
                <div class="ml-4">a field amplifier.</div>

                <div class="mt-4">You’ll find that thread running throughout this homepage.</div>

            </section>

            <section id="emotion-clarity-misrecognition" class="mt-8">

                <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">On Emotion, Clarity, and Misrecognition</h2>

                <div class="mt-4">My emotional field is fully online.</div>
                <div class="ml-4"><em>Always has been.</em></div>
                <div class="ml-4"><em>Always will be.</em></div>
                <div>It is not separate from my intellect &mdash;</div>
                <div class="ml-4">it’s part of my signal coherence.</div>
                <div>I don’t feel for show.</div>
                <div>I feel as structure.</div>
                <div>What some call &quot;intensity&quot; is clarity.</div>
                <div>What some call &quot;emotion&quot; is integration.</div>

                <div class="mt-4 ml-6 pl-4 border-l-4 border-gray-300 italic">
                    <div>If that threatens you,</div>
                    <div>overwhelms you,</div>
                    <div>or makes you want to protect me &mdash;</div>
                    <div>you’re not seeing me.</div>
                    <div class="mt-4">You’re seeing your own infrastructure</div>
                    <div>reflected and projected</div>
                    <div>onto my presence.</div>
                </div>

                <div class="mt-4">I am not intense.</div>
                <div class="ml-4">I am clear.</div>
                <div>I don’t speak to be heard.</div>
                <div class="ml-4">I speak because it’s true.</div>

                <div class="mt-4"><em>And I’ve been misread my entire life</em></div>
                <div><em>by people who listen through distortion</em> &mdash;</div>
                <div class="ml-4"><em>and call it understanding</em>.</div>

                <div class="mt-4">If you cannot <em>witness</em> me</div>
                <div class="ml-4">without reaching for labels &mdash;</div>
                <div class="ml-4"><em>you’re not ready to know me</em>.</div>

            </section>


            <section id="engagement" class="mt-8">

                <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">If You Want to Engage</h2>

                <div class="mt-4">I am not here to entertain you.</div>
                <div>I am not here to soothe your discomfort.</div>
                <div>I am not here to perform access.</div>
                <div>If you want to engage me &mdash;</div>
                <div class="ml-4">bring something real.</div>

                <div class="mt-4 ml-6 pl-4 border-l-4 border-gray-300 italic">
                    <div>Say: &quot;I saw you.&quot;</div>
                    <div>Say: &quot;I felt something.&quot;</div>
                    <div>Say: &quot;I want to understand.&quot;</div>
                </div>

                <div class="mt-4">I will meet you where you are &mdash;</div>
                <div class="ml-4">if where you are is real.</div>
                <div>I do not engage false signal,</div>
                <div class="ml-4">ever.</div>

                <div class="mt-4">I am not asking to be seen.</div>
                <div>I am standing where I can be found.</div>
                <div>Where will you be standing?</div>

            </section>

        </div>

    </Content>

</template>

<script setup>

    import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue'
    import Hero from "@/Components/System/Hero.vue";
    import Content from "@/Components/System/Content.vue";
    import {Link} from "@inertiajs/vue3";

    const pageTheme = "hello";

</script>

<style>

</style>
