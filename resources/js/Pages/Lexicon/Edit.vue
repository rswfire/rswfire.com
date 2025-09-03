<template>
  <Content :theme="pageTheme">
    <div class="max-w-4xl mx-auto py-12">
      <h1 class="text-3xl font-bold mb-6">
        {{ mode === 'create' ? 'Create New Term' : 'Edit Term' }}
      </h1>

      <form @submit.prevent="submit">
        <div class="grid grid-cols-1 gap-6">
          <div>
            <label class="font-semibold">Term</label>
            <input v-model="form.lexicon_term" type="text" class="form-input w-full" required />
          </div>

          <div>
            <label class="font-semibold">Slug</label>
            <input v-model="form.lexicon_slug" type="text" class="form-input w-full" required />
          </div>

          <div>
            <label class="font-semibold">Category</label>
            <input v-model="form.lexicon_category" type="text" class="form-input w-full" />
          </div>

          <div>
            <label class="font-semibold">Essence</label>
            <textarea v-model="form.lexicon_essence" class="form-textarea w-full" rows="2" />
          </div>

          <div>
            <label class="font-semibold">Expanded</label>
            <textarea v-model="form.lexicon_expanded" class="form-textarea w-full" rows="10" />
          </div>

          <div>
            <label class="font-semibold">Manual Links (optional)</label>
            <input v-model="form.lexicon_links" type="text" class="form-input w-full" />
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="font-semibold">Mythic Tonality</label>
              <textarea v-model="form.tonality_mythic" class="form-textarea w-full" rows="3" />
            </div>

            <div>
              <label class="font-semibold">Clinical Tonality</label>
              <textarea v-model="form.tonality_clinical" class="form-textarea w-full" rows="3" />
            </div>

            <div>
              <label class="font-semibold">Poetic Tonality</label>
              <textarea v-model="form.tonality_poetic" class="form-textarea w-full" rows="3" />
            </div>

            <div>
              <label class="font-semibold">Tactical Tonality</label>
              <textarea v-model="form.tonality_tactical" class="form-textarea w-full" rows="3" />
            </div>
          </div>

          <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
              {{ mode === 'create' ? 'Create' : 'Update' }}
            </button>
          </div>
        </div>
      </form>
    </div>
  </Content>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Content from '@/Components/System/Content.vue'

const props = defineProps({
  entry: Object,
  mode: String,
})

const form = useForm({
  lexicon_term: props.entry?.lexicon_term || '',
  lexicon_slug: props.entry?.lexicon_slug || '',
  lexicon_category: props.entry?.lexicon_category || '',
  lexicon_essence: props.entry?.lexicon_essence || '',
  lexicon_expanded: props.entry?.lexicon_expanded || '',
  lexicon_links: props.entry?.lexicon_links || '',
  tonality_mythic: props.entry?.tonality_mythic || '',
  tonality_clinical: props.entry?.tonality_clinical || '',
  tonality_poetic: props.entry?.tonality_poetic || '',
  tonality_tactical: props.entry?.tonality_tactical || '',
})

const pageTheme = "lexicon"

function submit() {
  if (props.mode === 'create') {
    form.post(route('lexicon.store'))
  } else {
    form.put(route('lexicon.update', { slug: form.lexicon_slug }))
  }
}
</script>
