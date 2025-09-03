<template>

  <Content :theme="pageTheme">

    <Hero
        :title="entry.lexicon_term"
        :subtitle="entry.lexicon_category"
        meta="LEXICON"
        class="pb-4 border-b"
        :theme="pageTheme"
    />

    <div class="max-w-3xl mx-auto py-12">
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-4xl font-bold">{{ entry.lexicon_term }}</h1>

        <div v-if="showEditLink">
          <Link
              :href="route('lexicon.edit', { slug: entry.lexicon_slug })"
              class="text-sm text-blue-500 hover:underline"
          >
            Edit Entry
          </Link>
        </div>
      </div>

      <p class="text-xl text-gray-700 mb-6">{{ entry.lexicon_essence }}</p>

      <div class="lexicon-content" v-html="renderMarkdown(entry.lexicon_expanded)" />

      <div v-if="anyTonalities" class="space-y-6">
        <div v-if="entry.tonality_mythic">
          <h2 class="text-xl font-semibold text-gray-800">Mythic</h2>
          <p>{{ entry.tonality_mythic }}</p>
        </div>
        <div v-if="entry.tonality_clinical">
          <h2 class="text-xl font-semibold text-gray-800">Clinical</h2>
          <p>{{ entry.tonality_clinical }}</p>
        </div>
        <div v-if="entry.tonality_poetic">
          <h2 class="text-xl font-semibold text-gray-800">Poetic</h2>
          <p>{{ entry.tonality_poetic }}</p>
        </div>
        <div v-if="entry.tonality_tactical">
          <h2 class="text-xl font-semibold text-gray-800">Tactical</h2>
          <p>{{ entry.tonality_tactical }}</p>
        </div>
      </div>
    </div>

  </Content>
</template>

<script setup>

  import { computed } from 'vue'
  import { Link } from "@inertiajs/vue3";
  import Hero from '@/Components/System/Hero.vue'
  import Content from '@/Components/System/Content.vue'
  import MarkdownIt from 'markdown-it'

  const props = defineProps({
    entry: Object,
    canEdit: Boolean,
})

  const pageTheme = 'lexicon'

  const md = new MarkdownIt({
  html: true,
  linkify: true,
  typographer: true,
  breaks: true,
})

  md.use(function lexiconPlugin(md) {
    const regex = /\[lexicon\](.*?)\[\/lexicon\]/g

    md.core.ruler.push('lexicon_inline', function (state) {
      state.tokens.forEach((token) => {
        if (token.type === 'inline' && regex.test(token.content)) {
          token.content = token.content.replace(regex, (_, term) => {
            return `<LexiconInline term="${term}">${term}</LexiconInline>`
          })
        }
      })
    })
  })
  function renderMarkdown(content) {
  return md.render(content || '')
}

  const anyTonalities = computed(() =>
  ['tonality_mythic', 'tonality_clinical', 'tonality_poetic', 'tonality_tactical'].some(
  key => !!props.entry[key]
  )
  )

  const showEditLink = computed(() => props.canEdit)

</script>

<style scoped>
.lexicon-content {
  @apply text-gray-900;
}

/* Enhanced paragraph spacing and typography */
.lexicon-content :deep(p) {
  @apply mb-6 leading-relaxed text-lg;
  font-feature-settings: "kern" 1, "liga" 1;
}

/* Better quote styling if you use blockquotes */
.lexicon-content :deep(blockquote) {
  @apply border-l-4 border-gray-300 pl-6 italic text-gray-700 my-8;
}

.lexicon-content :deep(ul) {
  @apply mb-6 space-y-2;
  list-style: disc !important;
  list-style-position: outside !important;
  padding-left: 1.5rem !important;
}

.lexicon-content :deep(ol) {
  @apply mb-6 space-y-2;
  list-style: decimal !important;
  list-style-position: outside !important;
  padding-left: 1.5rem !important;
}

.lexicon-content :deep(li) {
  @apply leading-relaxed text-lg; /* Add text-lg to match paragraphs */
  display: list-item !important;
  margin-left: 1rem !important;
}

/* Better emphasis styling */
.lexicon-content :deep(strong) {
  @apply font-semibold text-gray-900;
}

.lexicon-content :deep(em) {
  @apply italic text-gray-800;
}

/* Subheading styles if you use them */
.lexicon-content :deep(h2) {
  @apply text-2xl font-medium text-gray-900 mt-12 mb-6 tracking-tight;
}

.lexicon-content :deep(h3) {
  @apply text-xl font-medium text-gray-900 mt-10 mb-4 tracking-tight;
}

/* Enhanced link styling within content */
.lexicon-content :deep(a) {
  @apply text-blue-700 hover:text-blue-800 underline decoration-blue-200 hover:decoration-blue-300 transition-colors;
}

/* Better spacing for the first paragraph */
.lexicon-content :deep(p:first-child) {
  @apply text-xl leading-relaxed text-gray-800;
}
.lexicon-content :deep(hr) {
  @apply my-8 border-gray-300; /* Adjust my-8 to my-6, my-4, etc. for less space */
}

</style>
