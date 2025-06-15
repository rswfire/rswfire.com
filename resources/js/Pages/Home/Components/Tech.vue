<template>

    <section class="h-full flex flex-col gap-6 rounded-xl bg-white border p-6 shadow-md">

        <div class="flex items-center space-x-2">
            <Icon name="Hammer" color="text-purple-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">BUILDER OF SYSTEMS. STEWARD OF DEPTH.</h2>
        </div>

        <div class="text-center">I’ve been programming since <strong>MS-DOS</strong>.</div>

        <div class="grid grid-cols-1 md:grid-cols-2 text-sm max-w-6xl mx-auto border-y">

            <div class="p-4 text-muted-foreground text-base leading-relaxed">

                <div>By <strong>11</strong>, batch scripts to BBS boards.</div>
                <div>By <strong>13</strong>, grading software for teachers.</div>
                <div>By <strong>15</strong>, hand-coded CMS platforms —<br/>no IDE, just mental compilers and paper.</div>

            </div>

            <div class="p-4 text-muted-foreground text-base leading-relaxed">
                <div>By <strong>25</strong>, I became a top-ten freelancer.</div>
                <div>I didn’t undercut. I overdelivered.</div>
                <div>I was the only solo dev in the top ten.</div>
                <div>I built what clients asked for,<br/>and what their systems didn’t know they’d need yet.</div>

            </div>

        </div>

        <div class="text-center italic">
            <div>Now I live in an <strong>off-grid RV by the sea</strong> —</div>
            <div>because clarity doesn’t need a tower,</div>
            <div>and depth doesn’t come from noise.</div>
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
