<template>
  <!--
  <ToC
      :sections="sections"
      anchor-to="window"
      :default-open-desktop="true"
      top-offset="6rem"
      fab-right="28px"
  />
  -->
  <div id="hr-0" class="scroll-mt-[92px] md:scroll-mt-[125px]" aria-hidden="true"></div>
  <Content :theme="pageTheme">
    <Hero
        title="THE HONEYMAN ARCHIVE"
        subtitle="HONEYMAN STATE PARK, OREGON PARKS &amp; RECREATION DEPARTMENT (OPRD)"
        meta="THE TREATMENT OF VOLUNTEERS IS NOT PERIPHERAL &mdash; BUT CENTRAL &mdash; TO INSTITUTIONAL LEGITIMACY"
        :theme="pageTheme"
    />

    <div class="honeyman-content mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

      <!-- <div class="scroll-mt-[92px] md:scroll-mt-[125px]" aria-hidden="true"></div> -->

        <div class="mt-8 max-w-3xl mx-auto px-4 py-4 bg-emerald-50 border-l-4 border-emerald-700 rounded-r-lg text-sm sm:text-base leading-relaxed">
            <p>
                <strong>This page preserves the original narrative account of what happened at Honeyman State Park.</strong>
                It is the story as I first wrote it — before the full archive, before the evidentiary structure,
                before the institutional analysis that followed.
            </p>

            <p class="mt-3">
                The comprehensive record — documents, recordings, correspondence, and the complete chronology of
                institutional decisions — now lives at
                <a href="https://oprdvolunteerabuse.org" target="_blank" class="underline text-emerald-800 hover:text-emerald-600">
                    oprdvolunteerabuse.org
                </a>.
            </p>

            <p class="mt-3">
                This narrative remains here to show where the documentation began, and how the story unfolded
                before Oregon State Parks attempted to contain it.
            </p>
        </div>

        <HrBar id="hr-5" class="scroll-mt-[92px] md:scroll-mt-[125px]" />

       <TheStoryOfHoneyman />

    </div>
  </Content>

</template>

<script setup>
import { provide } from 'vue'
import { useCopySectionLink } from '@/Composables/useCopySectionLink'

import Content from "@/Components/System/Content.vue"
import Hero from "@/Components/System/Hero.vue"
//import ToC from "./ToC.vue"

//import AnIntroduction from "@/Pages/Honeyman/Sections/An-Introduction.vue"
//import CallWithAllisonWatson from "@/Pages/Honeyman/Sections/Call-With-Allison-Watson.vue"
//import DayUseMeeting from "@/Pages/Honeyman/Sections/Day-Use-Meeting.vue"
//import ExecutiveSummary from "@/Pages/Honeyman/Sections/Executive-Summary.vue"
//import FieldcraftRecords from "@/Pages/Honeyman/Sections/Fieldcraft-Records.vue"
//import Footer from "@/Pages/Honeyman/Sections/Footer.vue"
//import Header from "@/Pages/Honeyman/Sections/Header.vue"
//import IHeldMyShape from "@/Pages/Honeyman/Sections/I-Held-My-Shape.vue"
//import KeyIndividuals from "@/Pages/Honeyman/Sections/Key-Individuals.vue"
//import LessonsLearned from "@/Pages/Honeyman/Sections/Lessons-Learned.vue"
//import LetterToAllisonWatson from "@/Pages/Honeyman/Sections/Letter-To-Allison-Watson.vue"
//import Logan from "@/Pages/Honeyman/Sections/Logan.vue"
//import NamingTheHarm from "@/Pages/Honeyman/Sections/Naming-the-Harm.vue"
//import PermanentDismissal from "@/Pages/Honeyman/Sections/Permanent-Dismissal.vue"
//import SystemInPanic from "@/Pages/Honeyman/Sections/System-In-Panic.vue"
//import TheFinalHours from "@/Pages/Honeyman/Sections/The-Final-Hours.vue"
import TheStoryOfHoneyman from "@/Pages/Honeyman/Sections/The-Story-of-Honeyman.vue"
//import TheStoryOfOPRD from "@/Pages/Honeyman/Sections/The-Story-of-OPRD.vue"
//import TheTurningPoint from "@/Pages/Honeyman/Sections/The-Turning-Point.vue"
//import TheUnidentifiedMan from "@/Pages/Honeyman/Sections/The-Unidentified-Man.vue"

import HrBar from "./HrBar.vue"


defineProps({ fieldcraft: Array })

const sections = [
  //{ id: 'hr-0',  label: 'Overview' },
  //{ id: 'hr-1',  label: 'Fieldcraft Records' },
  //{ id: 'hr-2',  label: 'Key Individuals' },
  //{ id: 'hr-3',  label: 'A Note About Ethics' },
  //{ id: 'hr-4',  label: 'Executive Summary' },
  { id: 'hr-5',  label: 'The Story of Honeyman' },
  //{ id: 'hr-7',  label: 'How It Started' },
  //{ id: 'hr-8',  label: 'Logan' },
  //{ id: 'hr-9',  label: 'Day-Use Meeting' },
  //{ id: 'hr-10', label: 'Unidentified Man' },
  //{ id: 'hr-12', label: 'Final Hours' },
  //{ id: 'hr-13', label: 'Call: Allison Watson' },
  //{ id: 'hr-14', label: 'Letter: Allison Watson' },
  //{ id: 'hr-15', label: 'Permanent Dismissal' },
  //{ id: 'hr-11', label: 'The Timeline' },
  //{ id: 'hr-16', label: 'Naming the Harm' },
  //{ id: 'hr-6',  label: 'The Story of OPRD' },
  //{ id: 'hr-17', label: 'Lessons Learned' },
  //{ id: 'hr-18', label: 'I Held My Shape' },
  //{ id: 'hr-19', label: 'This Is...' },
]

const { copySectionLink } = useCopySectionLink()
provide('copySectionLink', copySectionLink)

const pageTheme = "honeyman";

</script>

<style>
html { scroll-behavior: smooth; }
</style>
