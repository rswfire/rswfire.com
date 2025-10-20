<template>
    <div>
        <!-- Unauthenticated / Unauthorized -->
        <div v-if="!canAccessMirror" class="max-w mx-auto text-center">
            <h3 class="text-lg font-semibold mb-3">This mirror reflection is held within Sanctum.</h3>
            <SanctumAuth />
        </div>

        <!-- Authenticated / Authorized -->
        <div v-else>
            <!-- Reflection Tabs -->
            <div class="flex border-b border-gray-300 space-x-6 text-sm">
                <button
                    v-for="tab in reflectionTabs"
                    :key="tab.key"
                    @click="activeTab = tab.key"
                    :class="[
            'pb-2 flex items-center gap-2',
            activeTab === tab.key
              ? 'border-black border-b-2 font-semibold text-black'
              : 'text-gray-400'
          ]"
                >
                    <span v-if="tab.locked" class="text-xs">🔒</span>
                    {{ tab.label }}
                </button>
            </div>

            <!-- Tab Content -->
            <div class="mt-6">
                <div
                    v-if="activeTab === 'direct' && reflection?.mirror"
                    class="max-w-4xl"
                >
                    <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">
                        Direct
                    </h4>
                    <div
                        class="prose prose-sm max-w-none text-gray-800 [&>p]:my-4"
                        v-html="renderMarkdown(reflection.mirror.reflection_content.mirror_direct)"
                    />
                </div>

                <div
                    v-else-if="activeTab === 'recognition' && reflection?.mirror"
                    class="max-w-4xl"
                >
                    <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">
                        Recognition
                    </h4>
                    <div
                        class="prose prose-sm max-w-none text-gray-800 [&>p]:my-4"
                        v-html="renderMarkdown(reflection.mirror.reflection_content.mirror_recognition)"
                    />
                </div>

                <div
                    v-else-if="activeTab === 'becoming' && reflection?.mirror"
                    class="max-w-4xl"
                >
                    <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">
                        Becoming
                    </h4>
                    <div
                        class="prose prose-sm max-w-none text-gray-800 [&>p]:my-4"
                        v-html="renderMarkdown(reflection.mirror.reflection_content.mirror_becoming)"
                    />
                </div>

                <!-- Fallback -->
                <div v-else class="text-gray-400 italic text-sm">
                    No mirror data available for this tab.
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import MarkdownIt from 'markdown-it'
import LogInForm from '@/Components/Auth/LogInForm.vue'
import { useAuth } from '@/Composables/useAuth'
import SanctumAuth from "@/Components/Auth/Sanctum.vue";

const props = defineProps({
    transmission: Object,
    reflection: Object,
})

/**
 * Auth & access control
 */
const auth = useAuth()

// Determine whether user has access to mirror reflections
const canAccessMirror = computed(() => {
    // Must be authenticated and have Sanctum role of 'free' or 'paid'
    const sanctum = auth.user.value?.user_sanctum ?? 'none'
    return sanctum === 'free' || sanctum === 'paid'
})

function handleLoginSuccess() {
    // Re-fetch user or reload page content as needed
    auth.fetchUser()
}

/**
 * Mirror Tabs
 */
const reflectionTabs = [
    { key: 'direct', label: 'Direct Mirror', locked: true },
    { key: 'recognition', label: 'Recognition', locked: true },
    { key: 'becoming', label: 'Becoming', locked: true },
]

const activeTab = ref('direct')

/**
 * Markdown rendering
 */
const md = new MarkdownIt({ html: true, breaks: true, linkify: true })

function stripUnsafe(html = '') {
    const container = document.createElement('div')
    container.innerHTML = html
    container.querySelectorAll('script, iframe, object, embed').forEach(el => el.remove())
    container.querySelectorAll('*').forEach(el => {
        Array.from(el.attributes).forEach(attr => {
            if (/^on/i.test(attr.name)) el.removeAttribute(attr.name)
        })
    })
    return container.innerHTML
}

function renderMarkdown(input) {
    return stripUnsafe(md.render(input || ''))
}
</script>
