<template>
    <div class="fixed inset-0 z-50 bg-black/40 flex">
        <div class="w-64 bg-white shadow-lg p-4 space-y-4">
            <!-- Close button -->
            <button
                class="mb-2 text-sm text-gray-500 hover:text-red-600"
                @click="$emit('close')"
            >
                ✕ Close
            </button>

            <!-- Sidebar content reused -->
            <SidebarProfile />
        </div>

        <!-- Background click closes drawer -->
        <div class="flex-1" @click="$emit('close')"></div>
    </div>
</template>

<script setup>
import SidebarProfile from "./Profile.vue"
</script>
