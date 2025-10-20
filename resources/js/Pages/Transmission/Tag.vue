<template>
    <Content theme="transmissions">
        <Hero
            :title="tag"
            subtitle="Tagged Transmissions"
            meta="TRANSMISSION VAULT"
        />

        <div class="py-16 text-center text-gray-400">
            Tag filtering coming soon
        </div>
    </Content>
</template>

<script setup>
import Hero from '@/Components/System/Hero.vue'
import Content from '@/Components/System/Content.vue'

defineProps({
    tag: String
})
</script>
