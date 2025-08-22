<template>
    <section id="fieldcraft-records" class="border-t border-gray-300">
        <div class="my-8 prose prose-neutral max-w-full mx-auto">
            <h2 class="text-2xl font-semibold">FIELDCRAFT RECORDS</h2>
            <div class="italic text-gray-600">BLOG ENTRIES WITH "HONEYMAN" TAG</div>

            <ul v-if="fieldcraft && fieldcraft.length" class="mt-4 pl-2 space-y-2 text-xs text-honeyman-900 uppercase">
                <li v-for="entry in fieldcraft" :key="entry.content_id">
                    <div>
                        → <Link :href="`/fieldcraft/${entry.content_id}`" class="hover:underline">
                        {{ entry.content_title }}
                    </Link>
                    </div>
                    <div class="text-honeyman-600 text-xs ml-3">{{ entry.stamp_created }}</div>
                </li>
            </ul>
                <div v-else class="pl-2 text-xs text-fieldcraft-700 italic">
                    No Honeyman fieldcraft entries found.
                </div>

        </div>
    </section>
</template>

<script setup>

import { Link } from '@inertiajs/vue3'

defineProps({
    fieldcraft: Array
})

</script>
