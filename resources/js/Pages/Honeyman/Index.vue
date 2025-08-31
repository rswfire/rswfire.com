<template>
  <ToC
      :sections="sections"
      anchor-to="window"
      :default-open-desktop="true"
      top-offset="6rem"
      fab-right="28px"
  />
  <div id="hr-0" class="scroll-mt-[92px] md:scroll-mt-[125px]" aria-hidden="true"></div>
  <Content theme="honeyman">
    <Hero
        title="THE HONEYMAN ARCHIVE"
        subtitle="HONEYMAN STATE PARK, OREGON PARKS &amp; RECREATION DEPARTMENT (OPRD)"
        meta="THE TREATMENT OF VOLUNTEERS IS NOT PERIPHERAL &mdash; BUT CENTRAL &mdash; TO INSTITUTIONAL LEGITIMACY"
    />

    <div class="honeyman-content mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

      <div class="scroll-mt-[92px] md:scroll-mt-[125px]" aria-hidden="true"></div>
      <Header />

      <HrBar id="hr-1" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <FieldcraftRecords :fieldcraft="fieldcraft" />

      <HrBar id="hr-2" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <KeyIndividuals />

      <HrBar id="hr-3" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <AnIntroduction />

      <HrBar id="hr-4" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <ExecutiveSummary />

      <HrBar id="hr-5" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <TheStoryOfHoneyman />

      <HrBar id="hr-6" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <TheStoryOfOPRD />

      <HrBar id="hr-7" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <TheTurningPoint />

      <HrBar id="hr-8" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <Logan />

      <HrBar id="hr-9" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <DayUseMeeting />

      <HrBar id="hr-10" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <TheUnidentifiedMan />

      <HrBar id="hr-11" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <SystemInPanic />

      <HrBar id="hr-12" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <TheFinalHours />

      <HrBar id="hr-13" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <CallWithAllisonWatson />

      <HrBar id="hr-14" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <LetterToAllisonWatson />

      <HrBar id="hr-15" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <PermanentDismissal />

      <HrBar id="hr-16" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <NamingTheHarm />

      <HrBar id="hr-17" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <LessonsLearned />

      <HrBar id="hr-18" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <IHeldMyShape />

      <HrBar id="hr-19" class="scroll-mt-[92px] md:scroll-mt-[125px]" />
      <Footer />
    </div>
  </Content>

  <div class="mb-4 text-center text-md">
    <div>
      This codebase is field-sovereign —
      <a class="underline" href="https://github.com/rswfire/rswfire.com" target="_blank">shared freely</a>, but not for extraction, resale, or repackaging.
    </div>
    <div>No open-source license is explicitly granted.</div>
    <div>&copy; Robert Samuel White, 2025.</div>
  </div>
</template>

<script setup>
import Content from "@/Components/System/Content.vue"
import Hero from "@/Components/System/Hero.vue"
import ToC from "./ToC.vue"

import AnIntroduction from "@/Pages/Honeyman/Sections/An-Introduction.vue"
import CallWithAllisonWatson from "@/Pages/Honeyman/Sections/Call-With-Allison-Watson.vue"
import DayUseMeeting from "@/Pages/Honeyman/Sections/Day-Use-Meeting.vue"
import ExecutiveSummary from "@/Pages/Honeyman/Sections/Executive-Summary.vue"
import FieldcraftRecords from "@/Pages/Honeyman/Sections/Fieldcraft-Records.vue"
import Footer from "@/Pages/Honeyman/Sections/Footer.vue"
import Header from "@/Pages/Honeyman/Sections/Header.vue"
import IHeldMyShape from "@/Pages/Honeyman/Sections/I-Held-My-Shape.vue"
import KeyIndividuals from "@/Pages/Honeyman/Sections/Key-Individuals.vue"
import LessonsLearned from "@/Pages/Honeyman/Sections/Lessons-Learned.vue"
import LetterToAllisonWatson from "@/Pages/Honeyman/Sections/Letter-To-Allison-Watson.vue"
import Logan from "@/Pages/Honeyman/Sections/Logan.vue"
import NamingTheHarm from "@/Pages/Honeyman/Sections/Naming-the-Harm.vue"
import PermanentDismissal from "@/Pages/Honeyman/Sections/Permanent-Dismissal.vue"
import SystemInPanic from "@/Pages/Honeyman/Sections/System-In-Panic.vue"
import TheFinalHours from "@/Pages/Honeyman/Sections/The-Final-Hours.vue"
import TheStoryOfHoneyman from "@/Pages/Honeyman/Sections/The-Story-of-Honeyman.vue"
import TheStoryOfOPRD from "@/Pages/Honeyman/Sections/The-Story-of-OPRD.vue"
import TheTurningPoint from "@/Pages/Honeyman/Sections/The-Turning-Point.vue"
import TheUnidentifiedMan from "@/Pages/Honeyman/Sections/The-Unidentified-Man.vue"

import HrBar from "./HrBar.vue"

defineProps({ fieldcraft: Array })

const sections = [
  { id: 'hr-0',  label: 'Overview' },
  { id: 'hr-1',  label: 'Fieldcraft Records' },
  { id: 'hr-2',  label: 'Key Individuals' },
  { id: 'hr-3',  label: 'A Note About Ethics' },
  { id: 'hr-4',  label: 'Executive Summary' },
  { id: 'hr-5',  label: 'Story of Honeyman' },
  { id: 'hr-6',  label: 'Story of OPRD' },
  { id: 'hr-7',  label: 'Turning Point' },
  { id: 'hr-8',  label: 'Logan' },
  { id: 'hr-9',  label: 'Day-Use Meeting' },
  { id: 'hr-10', label: 'Unidentified Man' },
  { id: 'hr-11', label: 'System in Panic' },
  { id: 'hr-12', label: 'Final Hours' },
  { id: 'hr-13', label: 'Call: Allison Watson' },
  { id: 'hr-14', label: 'Letter: Allison Watson' },
  { id: 'hr-15', label: 'Permanent Dismissal' },
  { id: 'hr-16', label: 'Naming the Harm' },
  { id: 'hr-17', label: 'Lessons Learned' },
  { id: 'hr-18', label: 'I Held My Shape' },
  { id: 'hr-19', label: 'This Is...' },
]
</script>

<style>
html { scroll-behavior: smooth; }
</style>
