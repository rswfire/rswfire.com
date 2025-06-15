<template>

    <section class="h-full flex flex-col gap-6 rounded-xl bg-white border p-6 shadow-md">

        <div class="flex items-center space-x-2 pb-4 border-b">
            <Icon name="Hammer" color="text-purple-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">BUILDER OF SYSTEMS. STEWARD OF DEPTH.</h2>
        </div>

        <div class="pt-4 text-sm text-purple-800 text-center">
            <div class="mt-2 space-y-1 text-gray-700">
                <div><strong>By 11</strong>, batch scripts. <strong>By 15</strong>, CMS platforms.</div>
                <div><strong>By 25</strong>, top-ten freelancer — solo, overdelivering.</div>
                <div class="text-purple-500 text-md font-bold">
                    No fluff. No noise. Just signal, and structure.
                </div>
            </div>
        </div>


        <div class="border-t pt-6 mt-auto">
            <div class="w-full flex justify-end">
                <a
                    href="/tech"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-purple-400 border-purple-200 shadow-md"
                >
                    What I Do →
                </a>
            </div>
        </div>

    </section>

</template>

<script setup>

    import Icon from "@/Components/System/Icon.vue";

</script>
