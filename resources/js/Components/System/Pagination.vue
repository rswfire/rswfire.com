<template>
    <nav
        v-if="links.length > 1"
        class="mt-10 flex justify-center items-center gap-2 flex-wrap"
        role="navigation"
        aria-label="Pagination Navigation"
    >
        <template v-for="(link, i) in links" :key="i">
      <span
          v-if="!link.url"
          class="px-4 py-2 text-sm text-gray-400"
          v-html="link.label"
      />

            <button
                v-else
                @click="router.visit(link.url, { preserveScroll: true })"
                class="px-4 py-2 text-sm font-medium border rounded transition"
                :class="[
          link.active
            ? 'bg-black text-white border-black'
            : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50',
        ]"
                v-html="link.label"
            />
        </template>
    </nav>
</template>

<script setup>
import { router } from '@inertiajs/vue3'

defineProps({
    links: {
        type: Array,
        required: true,
    },
})
</script>
