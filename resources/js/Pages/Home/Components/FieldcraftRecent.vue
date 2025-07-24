<template>
    <div class="rounded-xl bg-fieldcraft-50 border border-fieldcraft-300 p-4 shadow-sm">
        <h3 class="text-sm font-semibold text-fieldcraft-800 uppercase tracking-wide mb-2">
            Recent Fieldcraft
        </h3>
        <ul class="pl-2 space-y-1 text-xs text-fieldcraft-900 uppercase">
            <li v-for="entry in entries" :key="entry.content_id">
                → <Link :href="`/fieldcraft/${entry.content_id}`" class="hover:underline">
                    {{ entry.content_title }}
                </Link>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    entries: Array
})
</script>
