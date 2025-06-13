<template>
    <section class="pt-9 bg-transparent">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold tracking-tight text-black uppercase">
                {{ title }}
            </h1>
            <p v-if="subtitle" class="mt-2 text-lg text-black uppercase">
                {{ subtitle }}
            </p>
            <p v-if="meta" class="mt-2 text-xs text-gray-500">
                {{ meta }}
            </p>
        </div>
    </section>
</template>

<script setup>
defineProps({
    title: { type: String, required: true },
    subtitle: { type: String, default: '' },
    meta: { type: String, default: '' }
})
</script>
