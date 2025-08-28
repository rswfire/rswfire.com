<template>

    <Content theme="honeyman">

        <Hero
            title="THE HONEYMAN ARCHIVE"
            subtitle="HONEYMAN STATE PARK, OREGON PARKS &amp; RECREATION DEPARTMENT (OPRD)"
            meta="THE TREATMENT OF VOLUNTEERS IS NOT PERIPHERAL &mdash; BUT CENTRAL &mdash; TO INSTITUTIONAL LEGITIMACY"
        />

        <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

            <Header/>

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

            <The-Story-of-OPRD/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <The-Turning-Point/>

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

            <I-Held-My-Shape/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>

            <Footer/>

    </div>
    </Content>

    <div class="mb-4 text-center text-md">
        <div>This codebase is field-sovereign — <a class="underline" href="https://github.com/rswfire/rswfire.com" target="_blank">shared freely</a>, but not for extraction, resale, or repackaging.</div>
        <div>No open-source license is explicitly granted.</div>
        <div>&copy; Robert Samuel White, 2025.</div>
    </div>

</template>

<script setup>

    import Content from "@/Components/System/Content.vue"
    import Hero from "@/Components/System/Hero.vue"

    import AnIntroduction from "@/Pages/Honeyman/Sections/An-Introduction.vue";
    import CallWithAllisonWatson from "@/Pages/Honeyman/Sections/Call-With-Allison-Watson.vue";
    import DayUseMeeting from "@/Pages/Honeyman/Sections/Day-Use-Meeting.vue";
    import ExecutiveSummary from "@/Pages/Honeyman/Sections/Executive-Summary.vue";
    import FieldcraftRecords from "@/Pages/Honeyman/Sections/Fieldcraft-Records.vue";
    import Footer from "@/Pages/Honeyman/Sections/Footer.vue";
    import Header from "@/Pages/Honeyman/Sections/Header.vue";
    import IHeldMyShape from "@/Pages/Honeyman/Sections/I-Held-My-Shape.vue";
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
    import TheStoryOfOPRD from "@/Pages/Honeyman/Sections/The-Story-of-OPRD.vue";
    import TheTurningPoint from "@/Pages/Honeyman/Sections/The-Turning-Point.vue";
    import TheUnidentifiedMan from "@/Pages/Honeyman/Sections/The-Unidentified-Man.vue";

    defineProps({
        fieldcraft: Array
    })

</script>

<style scoped>

</style>
