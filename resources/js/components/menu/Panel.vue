<template>
    <div class="fixed inset-0 z-50 bg-white text-gray-800 flex flex-col justify-between px-6 py-8">
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <img
                        src="/public/assets/rswfire.jpg"
                        alt="RSWFIRE"
                        class="w-32 h-32 rounded-full border border-gray-300 shadow-sm"
                    />
                    <div>
                        <div class="text-lg font-semibold">rswfire</div>
                        <div class="text-xs text-gray-500">Robert Samuel White</div>
                    </div>
                </div>

                <button @click="$emit('close')" class="text-2xl text-gray-400 hover:text-red-500">×</button>
            </div>

            <div class="text-sm italic text-gray-600 border-t border-gray-200 pt-4 text-center">
                <span class="not-italic">🔥</span><br>
                "In a forest pitch dark,<br />
                Glowed the tiniest spark.<br />
                It burst into a flame."
            </div>

            <nav class="pt-6 space-y-4 text-lg">
                <router-link to="/" @click="$emit('close')" class="block font-semibold text-red-600">🏠 Home</router-link>
                <router-link to="/hello" @click="$emit('close')" class="block font-semibold text-red-600">👤 About Me</router-link>
                <router-link to="/the-journey" @click="$emit('close')" class="block font-semibold text-red-600">🜂 The Journey</router-link>
                <router-link to="/tech" @click="$emit('close')" class="block font-semibold text-red-600">🛠 Tech History</router-link>
                <router-link to="/lexicon" @click="$emit('close')" class="block font-semibold text-red-600">🪶 Lexicon</router-link>
                <router-link to="/field-records" @click="$emit('close')" class="block font-semibold text-red-600">📁 Field Records</router-link>
            </nav>
        </div>

        <div class="text-center text-xs text-gray-400">
            SYSTEM ONLINE
        </div>
    </div>
</template>
<script setup>
</script>
