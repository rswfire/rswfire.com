<template>
    <div class="rounded-xl bg-stone-50 border border-stone-300 p-4 shadow-sm">
        <h3 class="text-sm font-semibold text-stone-800 uppercase tracking-wide mb-2">
            Recent <Link href="/fieldcraft" class="hover:underline">Fieldcraft</Link>
        </h3>
        <ul class="pl-2 space-y-1 text-xs text-stone-900 uppercase">
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
