<template>
    <div>
        <!-- Transcript Section (always visible at top) -->
        <div class="p-4 border-b border-gray-200">
            <div class="md:flex md:items-start md:gap-4">
                <div class="md:w-7/12">
                    <div class="text-xs uppercase tracking-widest text-gray-500">Video Information</div>
                    <div class="mt-2 text-sm text-gray-600">
                        {{ transmission.signal_title }}
                    </div>
                </div>

                <div class="md:w-5/12 md:mt-0">
                    <template v-if="parsedTranscript.length">
                        <div class="text-xs uppercase tracking-widest text-gray-500 mt-4 md:mt-0">Transcript</div>
                        <div class="mt-2 max-h-[20vh] overflow-y-auto rounded-md border bg-gray-50 p-2">
                            <div class="space-y-1 text-sm leading-relaxed text-gray-600">
                                <div v-for="(segment, index) in parsedTranscript" :key="index">
                                    <span class="text-gray-400 mr-2">[{{ formatTime(segment.start) }}]</span>
                                    <span>{{ segment.text }}</span>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Reflection Tabs -->
        <div class="p-4">
            <div class="flex border-b border-gray-300 space-x-6 text-sm">
                <button
                    v-for="tab in reflectionTabs"
                    :key="tab"
                    @click="activeTab = tab"
                    :class="[
              'pb-2',
              activeTab === tab ? 'border-black border-b-2 font-semibold text-black' : 'text-gray-400'
            ]"
                >
                    {{ tab }}
                </button>
            </div>

            <!-- Content -->
            <div class="mt-4 text-sm text-gray-800 leading-relaxed">
                <div v-if="activeTab === 'Patterns' && reflection?.patterns">
                    <div class="prose max-w-none" v-html="renderMarkdown(getReflectionText(reflection.patterns))" />
                </div>

                <div v-else-if="activeTab === 'Mirror' && reflection?.mirror">
                    <div class="prose max-w-none" v-html="renderMarkdown(getReflectionText(reflection.mirror))" />
                </div>

                <div v-else-if="activeTab === 'Structure' && reflection?.structure">
                    <div class="prose max-w-none" v-html="renderMarkdown(getReflectionText(reflection.structure))" />
                </div>

                <div v-else-if="activeTab === 'Surface' && reflection?.surface">
                    <div class="prose max-w-none" v-html="renderMarkdown(getReflectionText(reflection.surface))" />
                </div>

                <div v-else class="text-gray-400 italic">
                    No reflection data available for this tab.
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import MarkdownIt from 'markdown-it'

const props = defineProps({
    transmission: Object,
    reflection: Object,
    parsedTranscript: Array,
    formatTime: Function,
    toListArray: Function
})

const reflectionTabs = ['Surface', 'Structure', 'Mirror', 'Patterns']
const activeTab = ref('Surface')

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

function getReflectionText(reflectionObj) {
    if (!reflectionObj) return ''

    if (typeof reflectionObj.reflection_content === 'string') {
        return reflectionObj.reflection_content
    }

    if (typeof reflectionObj.reflection_content === 'object') {
        const content = reflectionObj.reflection_content
        return content.text || content.content || content.mirror || JSON.stringify(content, null, 2)
    }

    return ''
}
</script>
