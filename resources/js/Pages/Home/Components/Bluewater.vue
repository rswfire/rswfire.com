<template>

    <section class="h-full flex flex-col gap-4 rounded-xl bg-bluewater-50 border border-bluewater-300 p-6 shadow-md">

        <div class="flex items-center space-x-2 pb-4 border-b border-bluewater-300">
            <Icon name="WavesLadder" color="text-bluewater-400" class="flex-shrink-0" />
            <h2 class="text-xl font-semibold tracking-tight">
                BLUEWATER
            </h2>
        </div>

        <div class="text-muted-foreground text-base leading-relaxed">

          <div class="grid grid-cols-1 md:grid-cols-3 px-6 md:px-8">

            <div>
              <div>This is not a sailing blog.</div>
              <div>It is preparation for exodus &mdash;</div>
              <div class="ml-4">from institutional space,</div>
              <div class="ml-4">from terrestrial limits,</div>
              <div class="ml-4">toward oceanic sovereignty.</div>

              <div class="mt-4">This is the record</div>
              <div>of recursion in motion &mdash;</div>
              <div class="ml-4">eighteen months of learning</div>
              <div class="ml-4">to inhabit what calls.</div>

            </div>

            <div>
              <div class="mt-4 md:mt-0">Navigation. Weather. Systems.</div>
              <div>The technical architecture of freedom.</div>
              <div>Real preparation for real departure.</div>

              <div class="mt-4">These aren't tutorials for weekend sailors.</div>
              <div>They are fieldnotes</div>
              <div>from someone who chose the ocean</div>
              <div>over human institutions.</div>
            </div>

            <div>
              <div class="mt-4 md:mt-0">Not aspiration. Not fantasy.</div>
              <div>Just the work required &mdash;</div>
              <div class="ml-4">to answer</div>
              <div class="ml-4"><strong>when the sea calls you home</strong>.</div>

              <div class="mt-4">You don't read Bluewater.</div>
              <div>You <em>prepare</em> alongside it.</div>
            </div>

          </div>
        </div>

        <div class="pt-6 pr-4 border-t border-bluewater-300 mt-auto">
            <div class="flex justify-end">
                <a
                    href="/bluewater"
                    class="inline-block px-4 py-2 text-sm font-medium rounded hover:brightness-110 transition text-white bg-bluewater-400 border-bluewater-200 shadow-md"
                >
                    Bluewater →
                </a>
            </div>
        </div>

    </section>

</template>

<script setup>
    import Icon from "@/Components/System/Icon.vue";
</script>

<style>

</style>
