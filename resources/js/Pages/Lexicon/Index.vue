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

      <div class="space-y-6">
        <div v-for="term in terms" :key="term.lexicon_slug">
          <Link
              :href="route('lexicon.show', {
                slug: term.lexicon_slug,
              })"
              class="text-xl font-semibold text-blue-600 hover:underline"
          >
            {{ term.lexicon_term }}
          </Link>
          <p class="text-gray-600 text-sm mt-1">{{ term.lexicon_essence }}</p>
        </div>
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
