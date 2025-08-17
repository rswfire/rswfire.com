<template>

    <Content theme="honeyman">

        <Hero
            title="THE HONEYMAN ARCHIVE"
            subtitle="HONEYMAN STATE PARK, OREGON PARKS &amp; RECREATION DEPARTMENT (OPRD)"
            meta="LAST UPDATED: 08/16/25"
        />

        <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

            <HeaderContext/>

            <HeaderBreaches/>

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

            <!--
            <Im-Going-Public/>

            <div class="relative">
                <div class="-mx-6 md:-mx-8">
                    <hr class="h-1 bg-honeyman-300 border-0 rounded" />
                </div>
            </div>
            -->

            <The-Story-of-Honeyman/>

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

            <Day-Use-Meeting/>

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

            <Naming-the-Harm/>

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

    import Content from "@/Components/System/Content.vue"
    import Hero from "@/Components/System/Hero.vue"

    import CallWithAllisonWatson from "@/Pages/Honeyman/Sections/Call-With-Allison-Watson.vue";
    import DayUseMeeting from "@/Pages/Honeyman/Sections/Day-Use-Meeting.vue";
    import Footer from "@/Pages/Honeyman/Sections/Footer.vue";
    import HeaderBreaches from "@/Pages/Honeyman/Sections/Header-Breaches.vue";
    import HeaderContext from "@/Pages/Honeyman/Sections/Header-Context.vue";
    import ImGoingPublic from "@/Pages/Honeyman/Sections/Im-Going-Public.vue";
    import KeyIndividuals from "@/Pages/Honeyman/Sections/Key-Individuals.vue";
    import LetterToAllisonWatson from "@/Pages/Honeyman/Sections/Letter-To-Allison-Watson.vue";
    import NamingTheHarm from "@/Pages/Honeyman/Sections/Naming-the-Harm.vue";
    import SystemInPanic from "@/Pages/Honeyman/Sections/System-In-Panic.vue";
    import TheFinalHours from "@/Pages/Honeyman/Sections/The-Final-Hours.vue";
    import TheStoryOfHoneyman from "@/Pages/Honeyman/Sections/The-Story-of-Honeyman.vue";

</script>

<style scoped>

</style>
