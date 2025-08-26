<template>

    <Content theme="honeyman">

        <Hero
            title="THE HONEYMAN ARCHIVE"
            subtitle="HONEYMAN STATE PARK, OREGON PARKS &amp; RECREATION DEPARTMENT (OPRD)"
            meta="LAST UPDATED: 08/24/25"
        />

        <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

            <HeaderContext/>

            <!--
            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Announce-IVS/>
            -->

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Key-Individuals/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Executive-Summary/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Public-Records/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <An-Introduction/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <The-Story-of-Honeyman/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Logan/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Day-Use-Meeting/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <The-Unidentified-Man/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <System-In-Panic/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <The-Final-Hours/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Call-With-Allison-Watson/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Letter-To-Allison-Watson/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Permanent-Dismissal/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Naming-the-Harm/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Lessons-Learned/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Fieldcraft-Records :fieldcraft="fieldcraft" />

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Footer/>

    </div>
    </Content>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
    import Content from "@/Components/System/Content.vue"
    import Hero from "@/Components/System/Hero.vue"

    import AnIntroduction from "@/Pages/Honeyman/Sections/An-Introduction.vue";
    import AnnounceIVS from "@/Pages/Honeyman/Sections/Announce-IVS.vue";
    import CallWithAllisonWatson from "@/Pages/Honeyman/Sections/Call-With-Allison-Watson.vue";
    import DayUseMeeting from "@/Pages/Honeyman/Sections/Day-Use-Meeting.vue";
    import ExecutiveSummary from "@/Pages/Honeyman/Sections/Executive-Summary.vue";
    import FieldcraftRecords from "@/Pages/Honeyman/Sections/Fieldcraft-Records.vue";
    import Footer from "@/Pages/Honeyman/Sections/Footer.vue";
    import HeaderContext from "@/Pages/Honeyman/Sections/Header-Context.vue";
    import KeyIndividuals from "@/Pages/Honeyman/Sections/Key-Individuals.vue";
    import LessonsLearned from "@/Pages/Honeyman/Sections/Lessons-Learned.vue";
    import LetterToAllisonWatson from "@/Pages/Honeyman/Sections/Letter-To-Allison-Watson.vue";
    import Logan from "@/Pages/Honeyman/Sections/Logan.vue";
    import NamingTheHarm from "@/Pages/Honeyman/Sections/Naming-the-Harm.vue";
    import PermanentDismissal from "@/Pages/Honeyman/Sections/Permanent-Dismissal.vue";
    import PublicRecords from "@/Pages/Honeyman/Sections/Public-Records.vue";
    import SystemInPanic from "@/Pages/Honeyman/Sections/System-In-Panic.vue";
    import TheFinalHours from "@/Pages/Honeyman/Sections/The-Final-Hours.vue";
    import TheStoryOfHoneyman from "@/Pages/Honeyman/Sections/The-Story-of-Honeyman.vue";
    import TheUnidentifiedMan from "@/Pages/Honeyman/Sections/The-Unidentified-Man.vue";

    defineProps({
        fieldcraft: Array
    })

</script>

<style scoped>

</style>
