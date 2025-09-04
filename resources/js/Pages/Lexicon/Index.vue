<template>

  <Content :theme="pageTheme">

    <Hero
        title="LEXICON"
        subtitle="THE LANGUAGE OF THE FIELD"
        meta="A LIVING VOCABULARY FOR TRANSMITTING IN FIELD CONDITIONS"
        class="pb-4 border-b"
        :theme="pageTheme"
    />

    <div class="max-w-4xl mx-auto py-12">

      <div class="pb-8" v-if="showCreateLink">
        <Link
            :href="route('lexicon.create', {})"
            class="text-sm text-blue-500 hover:underline"
        >
          Create Entry
        </Link>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <Link
            v-for="term in terms"
            :key="term.lexicon_slug"
            :href="route('lexicon.show', { slug: term.lexicon_slug })"
            class="group block bg-white border border-gray-300 shadow-sm rounded-lg p-4 hover:bg-lexicon-50 transition-colors duration-200 h-full"
        >
          <div class="flex flex-col justify-between h-full">
            <div class="flex flex-col items-center text-center">
              <div class="flex justify-center mb-2">
                <svg class="w-8 h-8 text-lexicon-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/>
                </svg>
              </div>
              <div class="font-semibold text-gray-900 tracking-widest uppercase text-base">
                {{ term.lexicon_term }}
              </div>
              <div class="text-sm text-gray-700 leading-snug text-left mt-2">
                {{ term.lexicon_essence }}
              </div>
            </div>

            <div class="mt-6 flex justify-center">
        <span class="text-lexicon-600 text-sm font-medium group-hover:underline uppercase">
          View Full Entry →
        </span>
            </div>
          </div>
        </Link>
      </div>






    </div>

  </Content>
</template>

<script setup>

    import { Link } from "@inertiajs/vue3";
    import Hero from "@/Components/System/Hero.vue";
    import Content from "@/Components/System/Content.vue";
    import {computed} from "vue";

    const pageTheme = "lexicon";

    const props = defineProps({
      terms: Array,
      canCreate: Boolean,
    })

    const showCreateLink = computed(() => props.canCreate)

</script>

<style scoped>

</style>
