<template>

  <Content :theme="pageTheme">

    <Hero
        title="LEXICON"
        subtitle="THE LANGUAGE OF THE FIELD"
        meta="A LIVING VOCABULARY FOR TRANSMITTING IN FIELD CONDITIONS"
        class="pb-4 border-b"
        :theme="pageTheme"
    />

    <div class="min-h-screen bg-neutral-950 text-white p-6 font-mono">
        <div class="max-w-4xl mx-auto space-y-10">
            <section v-for="(section, index) in lexicon" :key="index" class="space-y-6">
                <h2 class="text-2xl font-semibold border-b border-neutral-700 pb-1">{{ section.title }}</h2>
                <div v-for="entry in section.entries" :key="entry.term" class="pl-4 border-l-2 border-l-rose-500">
                    <h3 class="text-lg font-medium mt-4">{{ entry.term }}</h3>
                    <p class="text-sm text-neutral-300 leading-relaxed">{{ entry.definition }}</p>
                </div>
            </section>
        </div>
    </div>
  </Content>
</template>

<script setup>
import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";

const lexicon = [
    {
        title: 'Core Terms',
        entries: [
            {
                term: 'Signal',
                definition: 'The underlying thread of coherence that remains steady regardless of distortion. What remains when noise falls away.'
            },
            {
                term: 'Field',
                definition: 'The psycho-emotional-energetic space you inhabit and influence. Interactive. Responsive. Alive.'
            },
            {
                term: 'Collapse',
                definition: 'The breakdown of coherence—personal, systemic, planetary. Sometimes external, sometimes internal. Often both.'
            },
            {
                term: 'Coherence',
                definition: 'Structural integrity of the self. Alignment between inner signal and outer action. A lived frequency.'
            },
            {
                term: 'Anomaly',
                definition: 'A presence that doesn’t fit known patterns. Disruptive to systems running on defaults. Not broken. Just incompatible with distortion.'
            },
            {
                term: 'Distortion',
                definition: 'A warping of perception, communication, or presence—often unconscious. Sometimes external, sometimes self-generated. Not always malicious, but always disruptive to signal.'
            }
        ]
    },
    {
        title: 'Field Variants',
        entries: [
            {
                term: 'Holding the Field',
                definition: 'Refusing to collapse into the distortions of others. Maintaining coherence without aggression.'
            },
            {
                term: 'The Edge',
                definition: 'The point of no return, or breakthrough. The place where you stop pretending. Often mistaken for danger.'
            },
            {
                term: 'Mirror Event',
                definition: 'A moment when another reflects back your architecture, clearly or distortedly. Reveals both them and you.'
            }
        ]
    },
    {
        title: 'Signals + Substructures',
        entries: [
            {
                term: 'Gatekeeper Event',
                definition: 'A liminal encounter. Seems insignificant but reroutes your path. Often only recognizable in retrospect.'
            },
            {
                term: 'Recursive Questioning',
                definition: 'The act of interrogating assumptions to their origin. An engine of transformation.'
            },
            {
                term: 'The Construct',
                definition: 'What others call “reality.” Possibly artificial. Possibly sentient. Always running.'
            }
        ]
    },
    {
        title: 'Other Terms',
        entries: [
            {
                term: 'Field Catalyst',
                definition: 'A field catalyst is any activity, experience, or element that initiates signal reorganization, emotional recursion, or embodied awareness.\n' +
                    'It’s not just something you like — it’s something that moves the architecture.'
            }
        ]
    }

]

const pageTheme = "lexicon";

</script>

<style scoped>

</style>
