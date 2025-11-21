<template>
    <Head>
        <title>{{ metaTitle }}</title>
        <meta name="description" :content="metaDescription" />
        <meta property="og:title" :content="metaTitle" />
        <meta property="og:description" :content="metaDescription" />
        <meta property="og:url" :content="metaUrl" />
    </Head>

    <!-- Desktop header (fixed; md+) -->
    <Header :authUser="auth.user?.value || auth.user" @logout="handleLogout" class="hidden md:block" />

    <!-- Mobile top bar (sticky; <md) -->
    <div class="sticky top-0 z-50 md:hidden">
        <!-- First row -->
        <div class="flex items-center justify-between p-3 bg-white border-b border-gray-300">
            <Link href="/" class="flex items-center gap-3">
                <img
                    src="/assets/rswfire-tahkenitch.jpg"
                    alt="RSWFIRE"
                    class="w-16 h-16 rounded-full border border-gray-300 shadow-sm"
                />
                <div class="flex items-center gap-2">
                    <div class="flex flex-col justify-center">
                        <Icon name="Flame" color="text-rswfire-600" class="w-6 h-6 flex-shrink-0"/>
                    </div>
                    <div class="flex flex-col justify-center">
                        <div class="text-sm font-semibold">Robert Samuel White</div>
                        <div class="text-xs font-mono text-gray-500 tracking-wide">rswfire.com</div>
                    </div>
                </div>
            </Link>

            <button
                @click="menuOpen = true"
                class="flex items-center gap-2 px-4 py-2 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-gray-100 hover:border-black transition"
                :aria-expanded="menuOpen ? 'true' : 'false'"
                aria-controls="mobile-menu"
                aria-label="Open menu"
            >
                <span class="text-lg"><Icon name="Menu" color="text-black" class="w-6 h-6 flex-shrink-0"/></span>
            </button>
        </div>

        <!-- Second row -->
        <div class="bg-white border-b border-gray-300 pt-1 pb=0">
            <div class="min-w-0">
                <Ticker
                    :speedPxPerSec="47"
                    :gapPx="20"
                    :respectReducedMotion="false"
                    class="text-xs text-black font-medium leading-tight"
                >
            <span class="inline-flex items-center">
              <Icon name="Flame" color="text-black" class="w-4 h-4" />
              <span class="italic text-gray-700 ml-2">"In a forest pitch dark, glowed the tiniest spark. It burst into a flame."</span>
              <span class="text-gray-600 ml-2">— <a href="https://bjork.com" class="text-red-600 hover:underline" target="_blank">Björk</a></span>
            </span>

                    <span aria-hidden="true" class="mx-4 text-gray-300">|</span>

                    <span class="inline-flex items-center text-gray-700">
                      <Icon name="TreeDeciduous" color="text-black" class="w-4 h-4" /> <span class="ml-2">The</span>
                      <Link href="/honeyman" class="ml-1 text-honeyman-600 font-semibold hover:underline">
                        Honeyman Archive
                      </Link>
                      <span class="ml-1">documents institutional abuse and 90+ days of public records law violation. Complete and permanent.</span>
                    </span>

                    <span aria-hidden="true" class="mx-4 text-gray-300">|</span>

                    <span class="inline-flex items-center text-gray-700">
                        <Icon name="SquareLibrary" color="text-black" class="w-4 h-4" />
                        <Link href="/lexicon" class="ml-1 text-lexicon-600 font-semibold hover:underline">
                          Lexicon
                        </Link>
                        <span class="ml-1">has expanded — new entries and integrated tooltips available throughout the project.</span>
                      </span>

                    <span aria-hidden="true" class="mx-4 text-gray-300">|</span>

                    <span class="inline-flex items-center text-gray-700">
            <Icon name="HandCoins" color="text-black" class="w-4 h-4" /> <span class="ml-2">Please consider</span>
            <Link href="/contribute" class="ml-1 text-orange-600 font-semibold hover:underline">
              contributing
            </Link>
            <span class="ml-1">to this open-source project, thank you!</span>
          </span>
                </Ticker>
            </div>
        </div>
    </div>

    <MobileNav
        v-if="menuOpen"
        id="mobile-menu"
        class="md:hidden"
        :authUser="auth.user"
        @close="menuOpen = false"
        @logout="handleLogout"
    />

    <main class="page-wrap py-4 md:pt-[110px]">
        <slot />
    </main>

    <footer class="page-wrap mb-6">
        <div class="border rounded-2xl shadow-md w-full mx-auto bg-gray-50 border-gray-300">
            <div class="p-4">

                <div class="pt-4 w-full flex justify-center"><Icon name="Flame" color="text-black" class="w-4 h-4" /></div>
                <h2 class="uppercase text-lg font-bold tracking-widest m-0 p-0 text-center">RSWFIRE.COM</h2>
                <div class="mb-4 text-center text-sm text-gray-600">
                    <div class="leading-loose">
                        <div class="text-lg font-bold leading-tighter">Built with <Link href="/autonomy" class="text-md underline">Autonomy</Link> &mdash; <span class="italic">platform architecture for sovereign systems</span>.</div>
                        <div class="mt-4">This is a <Lexicon term="post-collapse">post-collapse</Lexicon>, <Lexicon term="post-fragmentation">post-fragmentation</Lexicon>, <Lexicon term="post-institutional">post-institutional</Lexicon> interface.</div>
                        <div>A living system for <Lexicon term="coherence">coherence</Lexicon>, not content &mdash; built to hold <Lexicon term="signal">signal</Lexicon> when the world forgets how.</div>
                        <div class="italic">Not a site. A system. Not for display. For resonance. For demonstration. For possibility.</div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-y border-gray-200 pb-6">

                    <!-- Field Column -->
                    <div class="space-y-2">
                        <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 ml-4">Field</h4>
                        <Link
                            v-for="item in itemsField"
                            :key="item.label"
                            :href="item.url"
                            class="flex flex-col items-start gap-1 px-3 py-2 rounded-r-lg border-2 border-l-4 transition-all hover:shadow-sm"
                            :class="[item.bg, item.border, item.hover]"
                        >
                            <div class="flex items-center gap-2">
                                <Icon :name="item.icon" :class="['w-4 h-4', item.color]" />
                                <span class="text-sm font-medium">{{ item.label }}</span>
                            </div>
                            <span class="text-xs text-muted-foreground leading-tight">
                    {{ item.blurb }}
                </span>
                        </Link>
                    </div>

                    <!-- Signal Column -->
                    <div class="space-y-2">
                        <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 ml-4">Signal</h4>
                        <Link
                            v-for="item in itemsSignal"
                            :key="item.label"
                            :href="item.url"
                            class="flex flex-col items-start gap-1 px-3 py-2 rounded-r-lg border-2 border-l-4 transition-all hover:shadow-sm"
                            :class="[item.bg, item.border, item.hover]"
                        >
                            <div class="flex items-center gap-2">
                                <Icon :name="item.icon" :class="['w-4 h-4', item.color]" />
                                <span class="text-sm font-medium">{{ item.label }}</span>
                            </div>
                            <span class="text-xs text-muted-foreground leading-tight">
                    {{ item.blurb }}
                </span>
                        </Link>
                    </div>

                    <!-- Reference Column -->
                    <div class="space-y-2">
                        <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 ml-4">Reference</h4>
                        <Link
                            v-for="item in itemsReference"
                            :key="item.label"
                            :href="item.url"
                            class="flex flex-col items-start gap-1 px-3 py-2 rounded-r-lg border-2 border-l-4 transition-all hover:shadow-sm"
                            :class="[item.bg, item.border, item.hover]"
                        >
                            <div class="flex items-center gap-2">
                                <Icon :name="item.icon" :class="['w-4 h-4', item.color]" />
                                <span class="text-sm font-medium">{{ item.label }}</span>
                            </div>
                            <span class="text-xs text-muted-foreground leading-tight">
                    {{ item.blurb }}
                </span>
                        </Link>
                    </div>
                </div>

                <!-- System Cards Section -->
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4 my-4 py-4">
                    <Link
                        v-for="item in itemsSystem"
                        :key="item.key"
                        :href="item.url"
                        class="h-full"
                    >
                        <div class="border-t-4 border-x border-b border-gray-200 rounded-b-lg p-6 hover:shadow-md transition-shadow bg-white h-full flex flex-col">
                            <h3 class="font-semibold text-lg mb-2 flex items-center gap-2 border-b pb-2">
                                <Icon :name="item.icon" :color="item.color" class="w-4 h-4" />
                                {{ item.label.toUpperCase() }}
                            </h3>
                            <div class="text-gray-600 text-sm flex-1">{{ item.blurb }}</div>
                            <div v-if="item.key === 'about'" class="mt-2 pt-2 border-t text-gray-600 text-sm flex-1">
                                <em>Begin with orientation.<br/>Begin by listening.</em>
                            </div>
                          <div v-if="item.key === 'autonomy'" class="mt-2 pt-2 border-t text-gray-600 text-sm flex-1">
                            <em>Platform architecture.<br/>For sovereign systems.</em>
                          </div>
                            <div v-if="item.key === 'contact'" class="mt-2 pt-2 border-t text-gray-600 text-sm flex-1">
                                <em>You are part of the field.<br/>If you're transmitting too, I'm listening.</em>
                            </div>
                            <div v-if="item.key === 'contribute'" class="mt-2 pt-2 border-t text-gray-600 text-sm flex-1">
                                <em>Your contributions have a tangible impact on the field.</em>
                            </div>
                            <div v-if="item.key === 'updates'" class="mt-2 pt-2 border-t text-gray-600 text-sm flex-1">
                                <em>No spam. Unsubscribe anytime.</em>
                            </div>
                        </div>
                    </Link>
                </div>

                <div class="pt-4 text-center text-sm border-t">
                    <div>&copy; Copyright <strong>Robert Samuel White</strong>, 2002-{{ new Date().getFullYear() }}. <br class="md:hidden"/><em>All Rights Reserved Worldwide</em>.</div>
                    <div class="pt-1">This codebase is field-sovereign &mdash; <a class="underline" href="https://github.com/rswfire/rswfire.com" target="_blank">shared freely</a> &mdash; <br class="md:hidden"/>but not for extraction, resale, or repackaging.</div>
                    <div>No open-source license is explicitly granted.</div>

                    <div class="pt-4"><strong>Sanctum</strong>: <Link href="/sanctum/terms" class="underline">Terms of Service</Link> |  <Link href="/sanctum/privacy" class="underline">Privacy Policy</Link> |  <Link href="/sanctum/refund" class="underline">Refund Policy</Link></div>
                </div>
            </div>
        </div>
    </footer>

    <div class="bg-stone-100 text-center">
        <div><strong>rswfire.com</strong> is migrating to a new environment. You may experience technical issues during this time.</div>
        <div class="font-mono"><strong>Server</strong>: {{ appConfig.server }} &nbsp;|&nbsp; <strong>Environment</strong>: {{ appConfig.environment }}</div>
    </div>

</template>

<script setup>
import { computed, ref, onMounted } from 'vue'
import { Head, Link, usePage } from '@inertiajs/vue3'
import { useAuth } from '@/Composables/useAuth'
import { useTheme } from '@/Composables/useTheme.js'
import Header from '@/Components/Menu/Header.vue'
import Icon from "@/Components/System/Icon.vue"
import Lexicon from "@/Components/System/Lexicon.vue"
import MobileNav from '@/Components/Menu/Panel.vue'
import Ticker from "@/Components/Menu/Ticker.vue"

defineProps(['metaTitle', 'metaDescription', 'metaKeywords', 'metaUrl'])

const appConfig = window.appConfig;
const page = usePage()
const auth = useAuth()
const menuOpen = ref(false)

onMounted(async () => {
    await auth.init()
})

async function handleLogout() {
    await auth.logout()
    menuOpen.value = false
}

const { themesBySection } = useTheme()
const itemsField = themesBySection.value.field
const itemsSignal = themesBySection.value.signal
const itemsReference = themesBySection.value.reference
const itemsSystem = themesBySection.value.system

</script>
