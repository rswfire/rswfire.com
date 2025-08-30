<template>
    <section id="fieldcraft-records" class="border-t border-gray-300">

            <FieldcraftWidget
                :fieldcraft="fieldcraft"
                :search-keywords="[]"
                title=""
                :per-page="3"
            />

    </section>
</template>

<script setup>

    import FieldcraftWidget from "@/Components/System/FieldcraftWidget.vue";
defineProps({
    fieldcraft: Array
})

</script>
