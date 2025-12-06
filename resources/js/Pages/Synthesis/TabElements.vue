<template>
    <div class="space-y-6 max-w-6xl mx-auto">
        <!-- Key Entities -->
        <section v-if="elements?.key_entities?.length" class="space-y-6">
            <h3 class="text-2xl font-bold text-gray-900">Key Entities</h3>
            <p class="text-sm text-gray-600">Structurally significant people, places, systems, and things</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div
                    v-for="(entity, index) in elements.key_entities"
                    :key="index"
                    class="p-5 rounded-xl border border-gray-200 bg-white hover:border-emerald-300 transition-colors"
                >
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <h4 class="text-lg font-semibold text-gray-900">{{ entity.entity }}</h4>
                        <span
                            class="text-xs px-2 py-1 rounded-full font-medium whitespace-nowrap"
                            :class="getEntityTypeColor(entity.type)"
                        >
                            {{ entity.type }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        {{ entity.significance }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Symbolic Evolution -->
        <section v-if="elements?.symbolic_evolution?.length" class="space-y-6">
            <h3 class="text-2xl font-bold text-gray-900">Symbolic Evolution</h3>
            <p class="text-sm text-gray-600">How symbols transformed across the arc</p>

            <div class="space-y-4">
                <div
                    v-for="(symbol, index) in elements.symbolic_evolution"
                    :key="index"
                    class="p-5 rounded-xl border border-purple-200 bg-purple-50"
                >
                    <h4 class="text-base font-semibold text-purple-900 mb-2">{{ symbol.symbol }}</h4>
                    <p class="text-sm text-purple-800 font-mono">
                        {{ symbol.evolution }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Dominant States -->
        <section v-if="elements?.dominant_states?.length" class="space-y-6">
            <h3 class="text-2xl font-bold text-gray-900">Dominant States</h3>
            <p class="text-sm text-gray-600">Defining ontological states and subsystems (not just frequent)</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div
                    v-for="(state, index) in elements.dominant_states"
                    :key="index"
                    class="p-5 rounded-xl border border-indigo-200 bg-indigo-50"
                >
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <h4 class="text-base font-semibold text-indigo-900">{{ state.state }}</h4>
                        <span
                            class="text-xs px-2 py-1 bg-indigo-200 text-indigo-800 rounded-full font-medium whitespace-nowrap"
                        >
                            {{ state.type }}
                        </span>
                    </div>
                    <p class="text-sm text-indigo-800 leading-relaxed">
                        {{ state.why_defining }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Recurring Themes -->
        <section v-if="elements?.recurring_themes?.length" class="space-y-6">
            <h3 class="text-2xl font-bold text-gray-900">Recurring Themes</h3>
            <p class="text-sm text-gray-600">Thematic threads that ran consistently through the arc</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div
                    v-for="(theme, index) in elements.recurring_themes"
                    :key="index"
                    class="p-4 rounded-lg border border-amber-200 bg-amber-50 text-sm text-amber-900"
                >
                    {{ theme }}
                </div>
            </div>
        </section>

        <!-- Capacity Shifts -->
        <section v-if="elements?.capacity_shifts?.length" class="space-y-6">
            <h3 class="text-2xl font-bold text-gray-900">Capacity Shifts</h3>
            <p class="text-sm text-gray-600">Concrete capabilities that emerged or solidified during this arc</p>

            <div class="space-y-4">
                <div
                    v-for="(shift, index) in elements.capacity_shifts"
                    :key="index"
                    class="p-5 rounded-xl border border-green-200 bg-green-50"
                >
                    <h4 class="text-base font-semibold text-green-900 mb-2">
                        {{ typeof shift === 'string' ? shift : shift.capacity }}
                    </h4>
                    <p
                        v-if="typeof shift === 'object' && shift.description"
                        class="text-sm text-green-800 leading-relaxed"
                    >
                        {{ shift.description }}
                    </p>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
const props = defineProps({
    cluster: Object,
    elements: Object,
    signals: Array,
    pageTheme: String
})

const getEntityTypeColor = (type) => {
    const colors = {
        'person': 'bg-blue-100 text-blue-700',
        'place': 'bg-green-100 text-green-700',
        'thing': 'bg-gray-100 text-gray-700',
        'system': 'bg-purple-100 text-purple-700',
        'animal': 'bg-pink-100 text-pink-700'
    }
    return colors[type] || 'bg-gray-100 text-gray-700'
}
</script>

<style scoped>
.prose :deep(p) {
    margin-bottom: 1rem;
}

.prose :deep(p + p) {
    margin-top: 1rem;
}
</style>
