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

      <div class="lexicon-content" v-html="renderMarkdown(entry.lexicon_expanded)" v-lexicon-content />

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

  function renderMarkdown(content) {
    // First process markdown with MarkdownIt
    let html = md.render(content)

    // Handle both [lexicon]term[/lexicon] and [lexicon term="lookup"]display[/lexicon]
    html = html.replace(/\[lexicon(?:\s+term="([^"]+)")?\](.*?)\[\/lexicon\]/g, (match, termAttr, content) => {
      const term = termAttr || content  // Use term attribute if provided, otherwise use content
      const displayText = content       // Always display the content between tags

      return `<span class="lexicon-placeholder inline-flex items-center gap-1 whitespace-nowrap" data-lexicon-term="${term}">${displayText}<svg class="w-[20px] h-[20px] flex-shrink-0 text-lexicon-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M7 7v10"></path><path d="M11 7v10"></path><path d="m15 7 2 10"></path></svg></span>`
    })

    return html
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
