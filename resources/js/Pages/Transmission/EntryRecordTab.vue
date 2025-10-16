<template>
    <div>
        <!-- Reflection Tabs -->
        <div class="p-4">
            <div class="flex border-b border-gray-300 space-x-6 text-sm">
                <button
                    v-for="tab in reflectionTabs"
                    :key="tab.key"
                    @click="activeTab = tab.key"
                    :class="[
              'pb-2 flex items-center gap-2',
              activeTab === tab.key ? 'border-black border-b-2 font-semibold text-black' : 'text-gray-400'
            ]"
                >
                    <span v-if="tab.locked" class="text-xs">🔒</span>
                    {{ tab.label }}
                </button>
            </div>

            <!-- Tab Content -->
            <div class="mt-6">
                <!-- Surface Tab -->
                <div v-if="activeTab === 'surface' && reflection?.surface" class="md:flex md:gap-6">
                    <!-- Left Column: Surface Data -->
                    <div class="md:w-7/12 space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ reflection.surface.reflection_content.title }}</h3>
                        </div>
                        <div>
                            <h3 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Summary</h3>
                            <div class="prose prose-sm max-w-none text-gray-800" v-html="renderMarkdown(reflection.surface.reflection_content.summary)" />
                        </div>

                        <div v-if="reflection.surface.reflection_content.topic_timestamps?.length">
                            <h3 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Topic Timestamps</h3>
                            <div class="space-y-2">
                                <div
                                    v-for="(item, index) in reflection.surface.reflection_content.topic_timestamps"
                                    :key="index"
                                    class="flex items-start gap-3 text-sm"
                                >
                                    <span class="font-mono text-gray-500 text-xs">[{{ item.timestamp }}]</span>
                                    <span class="text-gray-800">{{ item.topic }}</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Timestamp Context</h3>
                            <div class="text-sm text-gray-700">{{ reflection.surface.reflection_content.timestamp_context }}</div>
                        </div>

                        <div>
                            <h3 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Visible Actions</h3>
                            <div class="flex flex-wrap gap-2">
                <span
                    v-for="action in reflection.surface.reflection_content.visible_actions"
                    :key="action"
                    class="bg-gray-200 px-3 py-1 rounded-full text-xs text-gray-700"
                >
                  {{ action }}
                </span>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Mentioned Entities</h3>
                            <div class="flex flex-wrap gap-2">
                <span
                    v-for="entity in reflection.surface.reflection_content.mentioned_entities"
                    :key="entity"
                    class="bg-gray-200 px-3 py-1 rounded-full text-xs text-gray-700"
                >
                  {{ entity }}
                </span>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Tags</h3>
                            <div class="flex flex-wrap gap-2">
                <span
                    v-for="tag in reflection.surface.reflection_content.tags"
                    :key="tag"
                    class="bg-blue-100 px-3 py-1 rounded-full text-xs text-blue-700"
                >
                  {{ tag }}
                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Transcript -->
                    <div class="md:w-5/12 mt-6 md:mt-0">
                        <template v-if="parsedTranscript.length">
                            <h3 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Transcript</h3>
                            <div class="max-h-[60vh] overflow-y-auto rounded-md border bg-gray-50 p-3">
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

                <!-- Structure Tab -->
                <div v-else-if="activeTab === 'structure' && reflection?.structure" class="space-y-6 max-w-4xl">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ reflection.structure.reflection_content.title }}</h3>
                    </div>

                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Structural Substrate</h4>
                        <div class="text-sm text-gray-800 leading-relaxed">{{ reflection.structure.reflection_content.structural_substrate }}</div>
                    </div>

                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Symbolic Elements</h4>
                        <div class="flex flex-wrap gap-2">
              <span
                  v-for="element in reflection.structure.reflection_content.symbolic_elements"
                  :key="element"
                  class="bg-purple-100 px-3 py-1 rounded-full text-xs text-purple-700"
              >
                {{ element }}
              </span>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Ontological States</h4>
                        <div class="flex flex-wrap gap-2">
              <span
                  v-for="state in reflection.structure.reflection_content.ontological_states"
                  :key="state"
                  class="bg-indigo-100 px-3 py-1 rounded-full text-xs text-indigo-700"
              >
                {{ state }}
              </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-1">Energetic Quality</h4>
                            <div class="text-sm text-gray-800">{{ reflection.structure.reflection_content.energetic_quality }}</div>
                        </div>

                        <div>
                            <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-1">Journey Phase</h4>
                            <div class="text-sm text-gray-800">{{ reflection.structure.reflection_content.journey_phase }}</div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-1">Directional Vector</h4>
                        <div class="text-sm text-gray-800">{{ reflection.structure.reflection_content.directional_vector }}</div>
                    </div>

                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Engaged Subsystems</h4>
                        <div class="flex flex-wrap gap-2">
              <span
                  v-for="subsystem in reflection.structure.reflection_content.engaged_subsystems"
                  :key="subsystem"
                  class="bg-green-100 px-3 py-1 rounded-full text-xs text-green-700"
              >
                {{ subsystem }}
              </span>
                        </div>
                    </div>
                </div>

                <!-- Mirror Tab -->
                <div v-else-if="activeTab === 'mirror' && reflection?.mirror" class="max-w-4xl">
                    <div class="grid grid-cols-1 gap-4">
                        <h4 class="text-xs uppercase tracking-widest text-gray-500">Direct</h4>
                        <div class="prose prose-sm max-w-none text-gray-800 [&>p]:my-4" v-html="renderMarkdown(reflection.mirror.reflection_content.mirror_direct)" />

                        <h4 class="text-xs uppercase tracking-widest text-gray-500">Recognition</h4>
                        <div class="prose prose-sm max-w-none text-gray-800 [&>p]:my-4" v-html="renderMarkdown(reflection.mirror.reflection_content.mirror_recognition)" />

                        <h4 class="text-xs uppercase tracking-widest text-gray-500">Becoming</h4>
                        <div class="prose prose-sm max-w-none text-gray-800 [&>p]:my-4" v-html="renderMarkdown(reflection.mirror.reflection_content.mirror_becoming)" />
                    </div>
                </div>

                <!-- Patterns Tab -->
                <div v-else-if="activeTab === 'patterns' && reflection?.patterns" class="space-y-6 max-w-4xl">
                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-3">Emerging Patterns</h4>
                        <ul class="space-y-2">
                            <li
                                v-for="(pattern, index) in reflection.patterns.reflection_content.emerging_patterns"
                                :key="index"
                                class="text-sm text-gray-800 leading-relaxed pl-4 border-l-2 border-gray-300"
                            >
                                {{ pattern }}
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Somatic Signature</h4>
                        <div class="text-sm text-gray-800 leading-relaxed">{{ reflection.patterns.reflection_content.somatic_signature }}</div>
                    </div>

                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Field Resonance</h4>
                        <div class="text-sm text-gray-800 leading-relaxed">{{ reflection.patterns.reflection_content.field_resonance }}</div>
                    </div>

                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Transmission Function</h4>
                        <div class="text-sm text-gray-800 leading-relaxed">{{ reflection.patterns.reflection_content.transmission_function }}</div>
                    </div>

                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Catalytic Pathway</h4>
                        <div class="text-sm text-gray-800 leading-relaxed">{{ reflection.patterns.reflection_content.catalytic_pathway }}</div>
                    </div>

                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 mb-2">Dominant Language</h4>
                        <div class="flex flex-wrap gap-2">
              <span
                  v-for="motif in reflection.patterns.reflection_content.dominant_language"
                  :key="motif"
                  class="bg-amber-100 px-3 py-1 rounded-full text-xs text-amber-700"
              >
                {{ motif }}
              </span>
                        </div>
                    </div>
                </div>

                <!-- No Data -->
                <div v-else class="text-gray-400 italic text-sm">
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

const reflectionTabs = [
    { key: 'surface', label: 'Surface', locked: false },
    { key: 'structure', label: 'Structure', locked: false },
    { key: 'patterns', label: 'Patterns', locked: true }
]

const activeTab = ref('surface')

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
