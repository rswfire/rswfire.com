<template>
    <div class="mt-10 p-6 rounded-xl border border-gray-300 shadow-sm bg-white space-y-4">
        <h2 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
            <span class="text-lg folder-pulse">📁</span>
            Field Records
        </h2>

        <div v-if="records.length === 0" class="text-gray-500 text-sm">
            No records yet.
        </div>

        <ul v-else class="space-y-3">
            <li
                v-for="record in records"
                :key="record.content_id"
                class="border-b border-gray-300 pb-2 last:border-none last:pb-0"
            >
                <router-link
                    :to="`/content/${record.content_id}`"
                    class="font-medium text-indigo-600 hover:underline"
                >
                    {{ record.content_title || 'Untitled Entry' }}
                </router-link>
                <p class="text-sm text-gray-600 truncate mt-1" v-html="preview(record.content_body)"></p>
            </li>
        </ul>

        <router-link
            to="/field-records"
            class="inline-block text-sm font-medium text-indigo-500 hover:underline pt-2"
        >
            View all →
        </router-link>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue"
import axios from "axios"
import MarkdownIt from "markdown-it"

const records = ref([])
const md = new MarkdownIt()

onMounted(async () => {
    const { data } = await axios.get("/api/content?type=field-record")
    records.value = data.slice(0, 3) // show most recent 3
})

function preview(markdown) {
    return md.renderInline(markdown.split("\n")[0].slice(0, 120))
}
</script>

<style scoped>
@keyframes folderPulse {
    0%, 100% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.15);
        opacity: 0.85;
    }
}

.folder-pulse {
    animation: folderPulse 1.8s ease-in-out infinite;
    display: inline-block;
    transform-origin: center;
}
</style>
