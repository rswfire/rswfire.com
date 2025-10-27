<template>
  <Content :theme="pageTheme">
    <Hero title="UPDATES" subtitle="UPDATES FROM THE FIELD" meta="THE SQUIRREL KNOWS." :theme="pageTheme" />

    <div class="max-w-3xl mx-auto bg-gray-50 border rounded-2xl p-6 md:p-8">
      <form @submit.prevent="submit">
        <div class="grid md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium">Name (optional)</label>
            <input v-model="form.name" type="text" class="mt-1 input" />
          </div>
          <div>
            <label class="block text-sm font-medium">Email</label>
            <input v-model="form.email" type="email" autocomplete="email" class="mt-1 input" />
          </div>
          <div>
            <label class="block text-sm font-medium">Phone (for SMS)</label>
            <input v-model="form.phone" type="tel" inputmode="tel" autocomplete="tel" class="mt-1 input" />
          </div>
          <div>
            <label class="block text-sm font-medium">Frequency</label>
            <select v-model="form.frequency" class="mt-1 input">
              <option value="realtime">Real-time</option>
              <option value="daily">Daily digest</option>
              <option value="weekly">Weekly digest</option>
            </select>
          </div>
        </div>

        <fieldset class="mt-6">
          <legend class="mb-2 text-xs font-semibold uppercase text-gray-600">Channels</legend>
          <label class="mr-4">
            <input type="checkbox" value="email" v-model="form.channels" class="mr-2"> Email
          </label>
          <label>
            <input type="checkbox" value="sms" v-model="form.channels" class="mr-2"> Text message
          </label>
        </fieldset>

        <div class="mt-8 grid md:grid-cols-2 gap-6">
          <fieldset>
            <legend class="mb-2 text-xs font-semibold uppercase text-gray-600">Site Updates</legend>
            <LabelCheck text="Honeyman Archive" v-model="form.preferences.site.honeyman" />
            <LabelCheck text="Fieldcraft Records" v-model="form.preferences.site.fieldcraft" />
            <LabelCheck text="Essays" v-model="form.preferences.site.essays" />
            <LabelCheck text="About / System pages" v-model="form.preferences.site.about" />
          </fieldset>

          <fieldset>
            <legend class="mb-2 text-xs font-semibold uppercase text-gray-600">From the Field</legend>
            <LabelCheck text="New Entry" v-model="form.preferences.field.new_entry" />
            <LabelCheck text="Major Update" v-model="form.preferences.field.major_update" />
            <LabelCheck text="Public Records Request" v-model="form.preferences.field.public_records" />
            <LabelCheck text="Calls to Action" v-model="form.preferences.field.call_to_action" />
          </fieldset>
        </div>

        <fieldset class="mt-6">
          <legend class="mb-2 text-xs font-semibold uppercase text-gray-600">System Notices</legend>
          <LabelCheck text="Downtime / Outages" v-model="form.preferences.system.downtime" />
          <LabelCheck text="Policy / Terms" v-model="form.preferences.system.policy" />
        </fieldset>

        <!-- honeypot -->
        <input type="text" v-model="form.website" class="hidden" tabindex="-1" autocomplete="off" />

        <div class="mt-8 flex items-center gap-3">
          <button :disabled="processing" class="btn-primary">Save</button>
          <span class="text-sm text-gray-500">No spam. Unsubscribe any time.</span>
        </div>

        <p v-if="$page.props.flash?.status" class="mt-3 text-green-700">{{ $page.props.flash.status }}</p>
        <p v-if="errors.contact" class="mt-3 text-red-600">{{ errors.contact }}</p>
      </form>
    </div>
  </Content>
</template>

<script setup>
import { reactive } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import Content from '@/Components/System/Content.vue'
import Hero from '@/Components/System/Hero.vue'
import LabelCheck from '@/Components/System/LabelCheck.vue'

const form = reactive({
  name: '',
  email: '',
  phone: '',
  channels: [],
  frequency: 'realtime',
  preferences: {
    site:   { honeyman:true, fieldcraft:true, essays:false, about:false },
    field:  { new_entry:true, major_update:true, public_records:true, call_to_action:false },
    system: { downtime:true, policy:true }
  },
  website: '' // honeypot
})

const processing = false
const errors = usePage().props.errors || {}

function submit() {
  router.post(route('updates.subscribe'), form, { preserveScroll: true })
}

const pageTheme = "updates";

</script>

<style scoped>
.input {
  @apply w-full rounded-md border-gray-300 focus:border-gray-400 focus:ring-0;
}
.btn-primary {
  @apply px-4 py-2 rounded-md bg-gray-900 text-white hover:bg-black disabled:opacity-50;
}
</style>
