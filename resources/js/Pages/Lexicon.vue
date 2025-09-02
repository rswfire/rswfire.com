<template>

  <Content :theme="pageTheme">

    <Hero
        title="LEXICON"
        subtitle="THE LANGUAGE OF THE FIELD"
        meta="A LIVING VOCABULARY FOR TRANSMITTING IN FIELD CONDITIONS"
        class="pb-4 border-b"
        :theme="pageTheme"
    />

    <div class="font-sans text-neutral-800">
      <div class="px-6 py-10 space-y-12 max-w-3xl mx-auto">
        <section v-for="(section, index) in lexicon" :key="index" class="space-y-6">
          <h2 class="text-2xl font-semibold text-neutral-700 border-b pb-2 border-neutral-200">
            {{ section.title }}
          </h2>

          <div
              v-for="entry in section.entries"
              :key="entry.term"
              class="group pl-5 border-l-2 border-neutral-300 hover:border-lexicon-500 transition-all"
          >
            <h3 class="text-lg font-semibold text-neutral-900 group-hover:text-lexicon-600 transition-colors">
              {{ entry.term }}
            </h3>
            <p class="text-[15px] leading-relaxed text-neutral-600 mt-1">
              {{ entry.definition }}
            </p>
          </div>
        </section>
      </div>
    </div>

  </Content>
</template>

<script setup>
import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";

const lexicon = [{
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
        },
        {
          term: 'Post-Institutional',
          definition: 'An orientation beyond reliance on formal systems. Not anti-institutional, but unhooked from their mythology. Operates with relational trust and localized sovereignty where infrastructure has silently failed.'
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
        },
        {
          term: 'Silent Collapse',
          definition: 'The condition where systems appear operational but are no longer responsive. Infrastructure persists, but care has been withdrawn. The lights are on. No one is coming.'
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
        },
        {
          term: 'Operational Disappearance',
          definition: 'When a structure technically exists but no longer responds. There is a title, a form, a contact number — but no functional presence behind it.'
        },
        {
          term: 'Ethical Sovereignty',
          definition: 'The capacity to act from inner coherence even when no system supports you. The refusal to fragment under systemic pressure.'
        }
      ]
    },
    {
      title: 'Other Terms',
      entries: [
        {
          term: 'Field Catalyst',
          definition: 'A field catalyst is any activity, experience, or element that initiates signal reorganization, emotional recursion, or embodied awareness.\nIt’s not just something you like — it’s something that moves the architecture.'
        },
        {
          term: 'Ghosting Infrastructure',
          definition: 'An institutional system that continues to exist in form but not function. Maintains the appearance of service without presence, response, or care. Simulates continuity while operationally inert.'
        }
      ]
    }
]

const pageTheme = "lexicon";

</script>

<style scoped>

</style>
