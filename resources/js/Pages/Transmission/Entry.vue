<template>

    <Content :theme="pageTheme">

        <Hero
            :title="transmission.signal_ulid || 'Untitled Transmission'"
            :subtitle="formatDate(transmission?.stamp_created) || 'NULL'"
            meta="TRANSMISSION"
            :theme="pageTheme"
            align="center"
        />


        <div class="mt-6">
            <Link
                href="/transmission"
                class="inline-flex items-center gap-1 text-[11px] uppercase tracking-wide text-gray-500 hover:text-black"
            >
                ← Return to Archive
            </Link>
        </div>

        <div class="mt-2 border border-gray-200 shadow-sm rounded-md overflow-hidden bg-gray-100">

            <!-- Pager + Player (mobile stacked 50/50; desktop 3-col w/ true vertical centering) -->
            <div class="px-4 pb-2">
                <div class="grid gap-3 grid-cols-2 sm:grid-cols-[auto,1fr,auto] sm:gap-4 sm:items-stretch">

                    <!-- PLAYER -->
                    <div
                        class="col-span-2 sm:col-span-1
             order-1 sm:order-2"
                    >
                    <div class="rounded-md overflow-hidden bg-white border">
                        <div :class="playerClass">
                            <YoutubePlayer
                                :video-id="transmission.signal_metadata.youtube.id"
                                :is-portrait="effectiveIsPortrait"
                            />
                        </div>
                    </div>
                </div>

                <!-- PREVIOUS (left) -->
                <div
                    v-if="previous"
                    class="col-span-1 w-full sm:w-40
             order-2 sm:order-1           <!-- ⟵ goes before player on desktop -->
             sm:h-full sm:flex sm:items-center"
                >
                    <Link :href="`/transmission/${previous.signal_ulid}`" class="block group w-full">
                        <div class="rounded-md overflow-hidden shadow-sm bg-white hover:shadow-md transition">
                            <img :src="previous.signal_metadata?.youtube?.thumbnail" alt="Previous thumbnail"
                                 class="w-full aspect-video object-cover" loading="lazy" />
                            <div class="px-2 py-1 text-[10px] sm:text-xs text-gray-600 group-hover:text-black">← Previous</div>
                        </div>
                    </Link>
                </div>
                <div v-else class="col-span-1 w-full sm:w-40 order-2 sm:order-1"></div>

                <!-- NEXT (right) -->
                <div
                    v-if="next"
                    class="col-span-1 w-full sm:w-40
             order-3 sm:order-3           <!-- ⟵ remains 3rd on desktop -->
             sm:h-full sm:flex sm:items-center sm:justify-end"
                >
                    <Link :href="`/transmission/${next.signal_ulid}`" class="block group w-full">
                        <div class="rounded-md overflow-hidden shadow-sm bg-white hover:shadow-md transition">
                            <img :src="next.signal_metadata?.youtube?.thumbnail" alt="Next thumbnail"
                                 class="w-full aspect-video object-cover" />
                            <div class="px-2 py-1 text-[10px] sm:text-xs text-right text-gray-600 group-hover:text-black">Next →</div>
                        </div>
                    </Link>
                </div>
                <div v-else class="col-span-1 w-full sm:w-40 order-3 sm:order-3"></div>
            </div>
        </div>

        <!-- Timeline stays exactly as you had it -->
        <div class="px-4 pb-3">
            <TimelineFilmstrip
                :items="timelineItems"
                :active-ulid="transmission.signal_ulid"
                :mobile-scrollable="true"
            />
        </div>





        </div>

        <div>

            <div class="md:flex md:items-start md:gap-4 p-4">

                <div class="md:w-7/12">


                    <section id="signal-metadata" v-if="reflection.surface">
                        <div class="text-xs uppercase tracking-widest text-gray-500 mt-4">Timestamp Context</div>
                        <div class="[&>ul]:list-disc [&>ul]:pl-5 [&>p]:my-2 text-sm" v-html="renderMarkdown(reflection.surface.reflection_content.timestamp_context)" />
                        <div class="text-xs uppercase tracking-widest text-gray-500 mt-4">Summary</div>
                        <div class="[&>ul]:list-disc [&>ul]:pl-5 [&>p]:my-2 text-sm" v-html="renderMarkdown(reflection.surface.reflection_content.summary)" />
                    </section>

                </div>

                <div class="md:w-5/12 md:mt-0">

                    <template v-if="parsedTranscript.length">
                        <div class="text-xs uppercase tracking-widest text-gray-500 mt-4">Transcript</div>
                        <div class="mt-2 max-h-[20vh] overflow-y-auto rounded-md border-y bg-gray-50 text-sm leading-relaxed text-gray-600">
                            <div class="mt-2 space-y-1 text-sm leading-relaxed text-gray-600">
                                <div v-for="(segment, index) in parsedTranscript" :key="index">
                                    <span class="text-gray-400 mr-2">[{{ formatTime(segment.start) }}]</span>
                                    <span>{{ segment.text }}</span>
                                </div>
                            </div>
                        </div>
                    </template>

                </div>
            </div>

            <div class="p-4" v-if="reflection.narrative">
                <div class="p-4">
                    <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">Base Data</h2>
                    <div class="mt-4 flex border-b border-gray-300 space-x-6 text-sm">
                        <button
                            v-for="tab in tabs"
                            :key="tab"
                            @click="active = tab"
                            :class="[
                                  'pb-2',
                                  active === tab ? 'border-black border-b-2 font-semibold text-black' : 'text-gray-400'
                                ]"
                        >
                            {{ tab }}
                        </button>
                    </div>

                    <div v-if="active === 'Surface'" class="mt-4 space-y-4 text-sm text-gray-800 leading-relaxed">
                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Mentioned Entities</h4>
                            <div class="text-xs italic mb-1">Entities will be browsable after infrastructural upgrades.</div>

                            <div class="flex flex-wrap gap-2">
                                <span
                                    v-for="entity in toListArray(reflection.surface.reflection_content.mentioned_entities)"
                                    :key="entity"
                                    class="bg-gray-200 px-2 py-1 rounded text-xs text-gray-700"
                                >
                                  {{ entity }}
                                </span>
                            </div>

                        </div>

                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Visible Actions</h4>
                            <ul class="list-disc list-inside space-y-1 text-gray-700 ml-4">
                                <li v-for="action in toListArray(reflection.surface.reflection_content.visible_actions)" :key="action">
                                    {{ action }}
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Surface Tags</h4>
                            <div class="text-xs italic mb-1">Tags will be browsable after infrastructural upgrades.</div>
                            <ul class="flex flex-wrap gap-2">
                                <li
                                    v-for="tag in reflection.surface.reflection_content.tags || []"
                                    :key="tag"
                                    class="bg-gray-200 px-2 py-1 rounded text-xs text-gray-700"
                                >
                                    {{ tag.replace(/^\\d+\\.\\s*/, '') }}
                                </li>
                            </ul>
                        </div>




                    </div>

                    <div v-else-if="active === 'Ontological'" class="mt-4 space-y-2 text-sm text-gray-800 leading-relaxed">
                        <div>{{ reflection.narrative.reflection_content.summary }}</div>


                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Symbolic Elements</h4>
                            <div>
                                <ul class="flex flex-wrap gap-2">
                                    <li
                                        v-for="tag in reflection.narrative.reflection_content.symbolic_elements || []"
                                        :key="tag"
                                        class="bg-gray-200 px-2 py-1 rounded text-xs text-gray-700"
                                    >
                                        {{ tag.replace(/^\\d+\\.\\s*/, '') }}
                                    </li>
                                </ul>

                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Ontological Tags</h4>
                            <div class="text-xs italic mb-1">Tags will be browsable after infrastructural upgrades.</div>
                            <ul class="flex flex-wrap gap-2">
                                <li
                                    v-for="tag in reflection.narrative.reflection_content.tags || []"
                                    :key="tag"
                                    class="bg-gray-200 px-2 py-1 rounded text-xs text-gray-700"
                                >
                                    {{ tag.replace(/^\\d+\\.\\s*/, '') }}
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Notes</h4>
                            <div>{{ reflection.narrative.reflection_content.notes }}</div>
                        </div>

                    </div>

                    <div v-else-if="active === 'Structural'" class="mt-4 space-y-2 text-sm text-gray-800 leading-relaxed">
                        <div>{{ transmission.signal_description }}</div>
                        <div>
                            <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Structural Tags</h4>
                            <div class="text-xs italic mb-1">Tags will be browsable after infrastructural upgrades.</div>
                            <ul class="flex flex-wrap gap-2">
                                <li
                                    v-for="tag in transmission.signal_tags || []"
                                    :key="tag"
                                    class="bg-gray-200 px-2 py-1 rounded text-xs text-gray-700"
                                >
                                    {{ tag.replace(/^\\d+\\.\\s*/, '') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4" v-if="reflection?.mirror">
                    <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0">The Mirror</h2>
                    <div class="mt-4 px-8 italic"><strong>Note</strong>: This is not the mirror rswfire has traveled with. It runs on a local model (LLaMA3) and offers a close approximation — but not the full fidelity the work is moving toward. Tone and framing will vary. Local models still fall short of the precision this architecture requires.</div>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="p-0 rounded">
                            <div class="bg-gray-100 p-4 rounded flex flex-col gap-4">
                                <div class="bg-white p-4 rounded shadow">
                                    <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Energetic Field Snapshot</h4>
                                    <!--<div>{{ reflection.mirror.reflection_content.energetic_field_snapshot }}</div>-->
                                </div>
                                <div class="bg-white p-3 rounded shadow">
                                    <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Field Motion</h4>
                                    <!--<div class="prose [&>p]:my-2" v-html="renderMarkdown(reflection.mirror.reflection_content.field_motion)" />-->
                                </div>
                            </div>
                        </div>
                        <div class="p-0 rounded">
                            <div class="bg-gray-100 p-4 rounded flex flex-col gap-4">
                                <div class="bg-white p-4 rounded shadow">
                                    <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Systemic Outcome</h4>
                                    <!--<div class="prose [&>p]:my-2" v-html="renderMarkdown(reflection.mirror.reflection_content.systemic_outcome)" />-->
                                </div>
                                <div class="bg-white p-3 rounded shadow">
                                    <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">Semantic Structure</h4>
                                    <!--<div class="prose [&>p]:my-2" v-html="renderMarkdown(reflection.mirror.reflection_content.semantic_structure)" />-->
                                </div>
                            </div>
                        </div>
                        <div class="p-0 rounded">
                            <div class="bg-gray-100 p-4 rounded flex flex-col gap-4">
                                <div class="bg-white p-4 rounded shadow">
                                    <h4 class="font-semibold text-xs text-gray-500 uppercase mb-1">The Mirror</h4>
                                    <div class="prose [&>p]:my-2" v-html="renderMarkdown(reflection.mirror.reflection_content.mirror)" />
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

        </div>

        <!-- FUTURE FEATURES -->
        <!--TODO
        <div class="pt-4 border-t">
            <div class="text-xs uppercase tracking-widest text-gray-500 mb-4">Coming Soon</div>
            <ul class="text-sm text-gray-700 space-y-2 list-disc pl-5">
                <li><span class="font-semibold">ORelational Threads Mapping:</span> Visualize which other transmissions this node connects to — based on thematic resonance, not just date.</li>
                <li><span class="font-semibold">Signal Arc Positioning:</span> Show where this node falls within broader architectural arcs (e.g. "Collapse-to-Coherence Arc", "Public-to-Private Shift", "Honeyman Compression Loop").</li>
                <li><span class="font-semibold">Signal Archive Integration:</span> Link related dialogue excerpts (from your chat archives) that align with this node’s compression pattern.</li>
                <li><span class="font-semibold">Fieldcraft Annotations:</span> Add system-level reflections — like a margins-layer — to show how this signal shaped the broader design.</li>
                <li><span class="font-semibold">Energetic Signature:</span> A non-linguistic indicator — could be a waveform, iconography, or symbolic glyph — that compresses the tonal density of the transmission.</li>
                <li><span class="font-semibold">Contributor Interface:</span> Future option for aligned beings to submit resonance threads, interpretations, or add coherence back into the field.</li>
            </ul>
        </div>
        -->

        <div class="mt-4 bg-gray-100 px-4 py-2 font-semibold">
            <div class="flex justify-between text-md">
                <div v-if="previous">
                    <Link :href="`/transmission/${previous.signal_ulid}`" class="hover:text-black hover:underline">
                        ← Previous Video
                    </Link>
                </div>
                <div v-else></div>

                <Link href="/transmission" class="hover:text-black hover:underline">[ Return to Archive ]</Link>

                <div v-if="next">
                    <Link :href="`/transmission/${next.signal_ulid}`" class="hover:text-black hover:underline">
                        Next Video →
                    </Link>
                </div>
                <div v-else></div>
            </div>
        </div>

        <!-- Tabs wrapper under the video -->
        <div class="mt-6 px-4">
            <div class="flex border-b border-gray-300 space-x-6 text-sm">
                <button
                    v-for="tab in mainTabs"
                    :key="tab"
                    @click="activeMainTab = tab"
                    :class="[
                'pb-2',
                activeMainTab === tab
                    ? 'border-black border-b-2 font-semibold text-black'
                    : 'text-gray-400 hover:text-black'
            ]"
                >
                    {{ tab }}
                </button>
            </div>

            <!-- Transmission Tab -->
            <div v-if="activeMainTab === 'Transmission'" class="mt-4">
                <!-- all your existing post-video content goes here -->
                <div class="md:flex md:items-start md:gap-4 p-4">
                    <!-- left column reflections, right column transcript -->
                    <!-- ... your existing sections ... -->
                </div>

                <!-- Base Data + The Mirror sections -->
                <!-- ... your existing sections ... -->
            </div>

            <!-- Sanctum Tab -->
            <div v-else-if="activeMainTab === 'Sanctum'" class="mt-4 p-4">
                <h2 class="uppercase text-lg font-bold tracking-widest">Sanctum</h2>
                <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                    This is a protected conversational space. Comments live here, not on YouTube.
                    Distortion will not be allowed.
                </p>

                <!-- Placeholder for comments system -->
                <div class="mt-4 border rounded-md bg-white p-4 shadow-sm">
                    <div class="italic text-gray-500">
                        Comments will appear here. Threaded conversations will be part of the Sanctum forum.
                    </div>
                </div>

                <!-- Placeholder for share buttons -->
                <div class="mt-6">
                    <h4 class="font-semibold text-xs text-gray-500 uppercase mb-2">Share This Transmission</h4>
                    <div class="flex gap-3">
                        <button class="px-3 py-1 rounded bg-gray-200 text-xs hover:bg-gray-300">Copy Link</button>
                        <button class="px-3 py-1 rounded bg-gray-200 text-xs hover:bg-gray-300">Twitter</button>
                        <button class="px-3 py-1 rounded bg-gray-200 text-xs hover:bg-gray-300">Mastodon</button>
                        <button class="px-3 py-1 rounded bg-gray-200 text-xs hover:bg-gray-300">Bluesky</button>
                    </div>
                </div>
            </div>
        </div>


    </Content>
</template>

<script setup>
import { router, Link } from "@inertiajs/vue3"
import Content from "@/Components/System/Content.vue"
import Hero from "@/Components/System/Hero.vue"
import TimelineFilmstrip from "@/Components/System/TimelineFilmstrip.vue"
import YoutubePlayer from "@/Components/System/YoutubePlayer.vue"
import MarkdownIt from "markdown-it"
import { computed, ref, watchEffect } from "vue"

const props = defineProps({
    transmission: Object,
    previous: Object,
    next: Object,
    reflection: Object,
    isPortrait: Boolean,
    timeline: Object,
})

const mainTabs = ["Transmission", "Sanctum"]
const activeMainTab = ref("Transmission")

const timelineItems = computed(() => {
    // Trust the API’s shape; fall back gracefully
    const items = Array.isArray(props.timeline?.items) ? props.timeline.items : []
    return items.map(i => ({
        ulid: i.ulid,
        title: i.title || i.ulid,
        date: i.date,
        duration: i.duration ?? 0,
        thumbnail: i.thumbnail || props.transmission?.signal_metadata?.youtube?.thumbnail || ""
    }))
})

/**
 * Derived flags / id
 */
const flags = computed(() => props.transmission?.signal_metadata?.flags ?? {})
const youtubeId = computed(() => props.transmission?.signal_metadata?.youtube?.id ?? "")
const isPortraitFromSignal = computed(() => {
    // data shape uses "is_portrait-view"
    const f = flags.value
    if (typeof f["is_portrait-view"] === "boolean") return f["is_portrait-view"]
    if (typeof f["is_portrait-view"] === "number") return f["is_portrait-view"] === 1
    return undefined
})

const flagPortrait = computed(() => {
    const f = flags.value
    // accept either flag the API may emit
    if (typeof f["is_portrait"] === "boolean") return f["is_portrait"]
    if (typeof f["is_portrait"] === "number") return f["is_portrait"] === 1
    if (typeof f["is_portrait-view"] === "boolean") return f["is_portrait-view"]
    if (typeof f["is_portrait-view"] === "number") return f["is_portrait-view"] === 1
    return undefined
})

const effectiveIsPortrait = computed(() => {
    // precedence: explicit prop -> flags -> false
    return (flagPortrait.value ?? false)
})

const playerClass = computed(() =>
    effectiveIsPortrait.value
        ? "relative aspect-[9/16] w-full max-w-[300px] sm:max-w-[340px] md:max-w-[380px] mx-auto"
        : "relative aspect-video w-full max-w-[820px] mx-auto"
)

const containerClass = computed(() =>
    effectiveIsPortrait.value
        ? "relative aspect-[9/16] w-full max-w-sm mx-auto"
        : "relative aspect-video w-full"
)

/**
 * Markdown setup
 * We permit markdown HTML but strip scripts / inline handlers as a minimal sanitizer.
 */
const md = new MarkdownIt({
    html: true,
    breaks: true,
    linkify: true
})

function stripUnsafe(html = "") {
    if (typeof html !== "string" || html.length === 0) return ""

    const container = document.createElement("div")
    container.innerHTML = html

    // Remove dangerous nodes
    container.querySelectorAll("script, iframe, object, embed").forEach((el) => el.remove())

    // Strip inline event handlers (onclick, onload, etc.)
    container.querySelectorAll("*").forEach((el) => {
        // Copy to array because NamedNodeMap isn't a real array
        Array.from(el.attributes).forEach((attr) => {
            if (/^on/i.test(attr.name)) {
                el.removeAttribute(attr.name)
            }
        })
    })

    return container.innerHTML
}

function renderMarkdown(input) {
const raw = md.render(input || "")
return stripUnsafe(raw)
}

/**
* Tabs: choose first available pane based on available data
*/
const tabs = ["Surface", "Ontological", "Structural"]
const active = ref("Surface")

const hasSurface = computed(() => !!props.reflection?.surface?.reflection_content)
const hasOntological = computed(() => !!props.reflection?.narrative?.reflection_content)
const hasStructural = computed(() => !!props.transmission)

const availableTabs = computed(() => {
const t = []
if (hasSurface.value) t.push("Surface")
if (hasOntological.value) t.push("Ontological")
if (hasStructural.value) t.push("Structural")
return t
})

// ensure active is always valid
watchEffect(() => {
if (!availableTabs.value.includes(active.value)) {
active.value = availableTabs.value[0] ?? "Structural"
}
})

/**
* Description / Tags
*/
const htmlDescription = computed(() => {
const input = props.transmission?.signal_description || ""
return renderMarkdown(input)
})

const parsedTags = computed(() => {
try {
const raw = props.transmission?.signal_tags
const parsed = Array.isArray(raw)
? raw
: typeof raw === "string"
? JSON.parse(raw)
: []

return parsed
.filter(tag => typeof tag === "string")
.sort((a, b) => a.localeCompare(b))
.map(tag => tag.toUpperCase())
} catch {
return []
}
})

/**
* Transcript
*/
const parsedTranscript = computed(() => {
try {
const payload = props.transmission?.signal_payload
if (!payload || typeof payload !== "object") return []
const arr = payload["timed-transcript"]
return Array.isArray(arr) ? arr : []
} catch {
return []
}
})

/**
* Formatting
*/
const formatTime = seconds => {
const mins = Math.floor((Number(seconds) || 0) / 60)
const secs = Math.floor((Number(seconds) || 0) % 60)
return `${mins}:${secs.toString().padStart(2, "0")}`
}

const formatDate = str => {
if (!str) return ""
const date = new Date(str)
if (Number.isNaN(date.getTime())) return ""
return date.toLocaleDateString(undefined, {
year: "numeric",
month: "long",
day: "numeric"
}).toUpperCase()
}

const goTo = path => {
router.visit(`/${path}`)
}

/**
* Bullet list helper from newline text
*/
function toListArray(raw, bullet = true) {
if (!raw || typeof raw !== "string") return []
return raw
.split("\n")
.map(line => {
const cleaned = line.trim()
return bullet ? cleaned.replace(/^[-•*]+\s*/, "") : cleaned
})
.filter(Boolean)
}

/**
* Page theme
*/
const pageTheme = "transmissions"
</script>
