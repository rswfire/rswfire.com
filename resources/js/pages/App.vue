<template>

    <div class="min-h-screen bg-white px-4 py-8 sm:px-6 sm:py-12">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-[250px_1fr] gap-10">

            <div class="md:sticky top-6 self-start w-full md:w-[250px] bg-white rounded-xl shadow-sm border border-gray-200 px-4 py-6 space-y-4 text-center md:text-left text-sm text-gray-700">
                <img
                    src="/public/assets/rswfire.jpg"
                    alt="Robert Samuel White"
                    class="w-auto h-auto mx-auto rounded-full border border-gray-300 shadow"
                />

                <div>
                    <h2 class="text-lg font-semibold text-gray-900">rswfire</h2>
                    <p class="text-md text-gray-500">Robert Samuel White</p>
                </div>

                <div class="text-sm italic text-gray-500 border-t border-gray-200 pt-4 text-center">
                    &quot;In a forest pitch dark,<br>
                    Glowed the tiniest spark.<br>
                    It burst into a flame.&quot;
                </div>

                <div class="text-sm text-gray-500 border-t border-gray-200 pt-4 text-left">
                    <div><strong>Navigation</strong></div>
                    <div>&bull; <router-link to="/">Home</router-link></div>
                </div>
            </div>

            <div class="flex flex-col">
                <router-view />
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

<style>

</style>
