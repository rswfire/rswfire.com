<template>

    <div class="md:sticky top-6 self-start w-full md:w-[300px] bg-white rounded-xl shadow-sm border border-gray-200 px-4 py-6 space-y-4 text-center md:text-left text-sm text-gray-700">
        <img
            src="/assets/rswfire.jpg"
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

        <MenuNavigation/>

    </div>

</template>

<script setup>
    import MenuNavigation from "@/Components/Menu/Navigation.vue";
</script>

<style>

</style>
