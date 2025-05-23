<template>
    <div class="border border-gray-300 rounded-2xl p-6 shadow-md bg-white w-full mx-auto">
        <div class="mb-4 flex items-center gap-2">
            <div class="relative flex items-center justify-center w-8 h-8">
                <span class="absolute w-full h-full rounded-full bg-orange-200 opacity-50 animate-ping"></span>
                <span class="relative text-lg">🔥</span>
            </div>
            <h3 class="text-2xl font-semibold text-gray-900">Start Here</h3>
        </div>

        <div class="text-gray-600 text-md leading-relaxed mb-4">
            <div>This isn’t a blog. It’s not a pitch.</div>
            <div>It’s a field anchor — a living architecture of coherence.</div>
            <div>A record of one man’s motion through fragmentation, holding wholeness as the world frays.</div>

            <div>You don’t have to understand it.</div>
            <div>But if you feel it — then yes, this part is for you.</div>
        </div>

        <div><router-link
            to="/hello"
            class="inline-block text-red-600 hover:text-red-800 transition font-medium border border-red-200 hover:border-red-400 px-4 py-2 rounded-lg"
        >
            About Me →
        </router-link></div>
    </div>

    <FieldRecordsPreview />
</template>

<script>

import {defineComponent} from "vue";
import FieldRecordsPreview from "../components/FieldRecordsPreview.vue";

export default defineComponent({
    components: {FieldRecordsPreview}
})
</script>

<style>

</style>
