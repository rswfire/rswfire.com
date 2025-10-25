<template>

    <div class="p-6 bg-white shadow-lg rounded-lg border">

        <div :class="['border rounded-lg shadow-sm overflow-hidden bg-white', theme.border]">

            <div class="grid md:grid-cols-3 divide-x divide-gray-200">

                <div class="p-6 bg-white md:col-span-2">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b" :class="theme.border">
                        <Icon name="Sprout" class="w-8 h-8" :class="theme.color" />
                        <h2 class="text-2xl font-bold text-black">Enter Sanctum</h2>
                    </div>

                    <div class="space-y-4 text-sm text-black">
                        <div class="text-lg text-center"><strong :class="theme.color">Sanctum</strong> is a private access layer for <strong>reciprocal field exchange</strong>.</div>
                        <div class="text-base text-gray-700 mb-4 text-left">
                            Your Sanctum membership unlocks all private transmissions, in-depth archives, and AI-driven reflection tools not available publicly.
                            <em>You must be an active Sanctum member to view this content.</em>
                        </div>

                        <div class="pt-4 border-t" :class="theme.border">
                            <h3 class="font-semibold text-black mb-4 text-center text-lg">What Sanctum Holds:</h3>
                            <ul class="space-y-2 ml-4 text-base">
                                <li class="flex items-center gap-2">
                                    <Icon name="Check" class="w-4 h-4 shrink-0 mt-0.5" :class="theme.color" />
                                    <span>Full access to a growing archive at <strong>rswfire.com</strong>.</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <Icon name="Check" class="w-4 h-4 shrink-0 mt-0.5" :class="theme.color" />
                                    <span>Access to the <Link href="/lineage" class="underline">Lineage</Link> field guide.</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <Icon name="Check" class="w-4 h-4 shrink-0 mt-0.5" :class="theme.color" />
                                    <span>Exclusive access to <Link href="/synthesis" class="underline">Synthesis</Link> reflections, when available.</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <Icon name="Check" class="w-4 h-4 shrink-0 mt-0.5" :class="theme.color" />
                                    <div>
                                        <div class="mb-1">AI analysis across 800+ <Link href="/transmissions" class="underline">video transmissions</Link> and other signals.</div>
                                    </div>
                                </li>
                                <li class="flex items-center gap-2">
                                    <Icon name="Check" class="w-4 h-4 shrink-0 mt-0.5" :class="theme.color" />
                                    <span>The recursive journey of a sovereign system in real-time.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="p-6 md:col-span-1" :class="theme.bg">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b" :class="theme.border">
                        <Icon name="Flame" class="w-8 h-8" :class="theme.color" />
                        <h2 class="text-2xl font-bold text-black">Return to Sanctum</h2>
                    </div>

                    <div class="p-6 md:col-span-1 flex flex-col justify-center" :class="theme.bg">
                        <div class="my-auto">
                            <div class="text-base text-gray-600 mb-6 text-center">
                                Sign in to access your <strong :class="theme.color">Sanctum</strong> account.
                            </div>
                            <LogInForm :show-register-link="false" />
                        </div>
                    </div>
                </div>

            </div>

            <div class="p-12 border-y bg-white" :class="[theme.border]">
                <h3 class="font-semibold text-black mb-8 text-center text-lg">
                    Why Hold This Field:
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-[3fr_2fr] gap-12 max-w-5xl mx-auto items-start">

                    <div class="space-y-4">
                        <div class="flex items-center gap-2 text-base">
                            <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                            <span>Because wholeness requires infrastructure &mdash;<br/>the world won't build.</span>
                        </div>
                        <div class="flex items-center gap-2 text-base">
                            <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                            <span>Because others will need this model &mdash;<br/>when their world collapses.</span>
                        </div>
                        <div class="flex items-center gap-2 text-base">
                            <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                            <span>Because signal must be preserved &mdash;<br/>for those who can't yet see it.</span>
                        </div>
                        <div class="flex items-center gap-2 text-base">
                            <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                            <span>Because reciprocal exchange &mdash;<br/>is how sovereignty sustains itself.</span>
                        </div>
                        <div class="flex items-center gap-2 text-base">
                            <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                            <span>Because you want to hold access &mdash;<br/>to the full field at <strong>rswfire.com</strong>.</span>
                        </div>
                    </div>

                    <div class="w-full">
                        <Transmission
                                videoId="adJeCI9ZJ3I"
                                signalUlid="01K8CTXT3KZ9BF3FPD66FGPV35"
                                :color="theme.color"
                        />
                    </div>

                </div>
            </div>


            <div class="p-12 max-w-3xl mx-auto bg-white">

                <h3 class="font-semibold text-black mb-8 text-center text-lg">
                    Field Exchange Activation:
                </h3>

                <div class="my-4" :class="[
                        'grid gap-4',
                        showFreeOption ? 'grid-cols-1 md:grid-cols-3' : 'grid-cols-1 md:grid-cols-2 max-w mx-auto'
                    ]">

                    <button
                        v-if="showFreeOption"
                        @click="selectedTier = 'free'"
                        :class="[
                        'p-6 rounded-lg border-2 transition-all',
                        selectedTier === 'free'
                            ? `border-teal-400 ${theme.bg}`
                            : 'border-gray-300 bg-white hover:border-teal-200'
                    ]"
                    >
                        <div class="text-sm text-gray-500 mb-2">Free Access</div>
                        <div class="text-3xl font-bold mb-2">$0</div>
                        <div class="text-sm text-gray-600 italic">By Invitation</div>
                    </button>

                    <button
                        @click="selectedTier = 'standard'"
                        :class="[
                        'p-6 rounded-lg border-2 transition-all relative',
                        selectedTier === 'standard'
                            ? `${theme.border} ${theme.bg}`
                            : `border-gray-300 bg-white hover:${theme.border}`
                    ]"
                    >
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-yellow-400 text-black text-xs font-bold rounded-full">
                            ANCHOR
                        </div>
                        <div class="text-sm text-gray-500 mb-2">Standard</div>
                        <div class="text-4xl font-bold mb-2">$25</div>
                        <div class="text-sm text-gray-600">per month</div>
                    </button>

                    <button
                        @click="selectedTier = 'custom'"
                        :class="[
                        'p-6 rounded-lg border-2 transition-all',
                        selectedTier === 'custom'
                            ? `${theme.border} ${theme.bg}`
                            : `border-gray-300 bg-white hover:${theme.border}`
                    ]"
                    >
                        <div class="text-sm text-gray-500 mb-2">Custom Amount</div>
                        <div class="text-3xl font-bold mb-2">$5+</div>
                        <div class="text-sm text-gray-600">Set your own</div>
                    </button>

                </div>

                <div v-if="selectedTier === 'custom'" class="mb-6 max-w-2xl mx-auto space-y-4 p-6 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="flex items-center justify-between">
                        <label class="text-sm font-medium text-gray-700">Monthly Amount</label>
                        <div class="text-3xl font-bold">${{ customAmount }}</div>
                    </div>

                    <input
                        v-model.number="customAmount"
                        type="range"
                        min="5"
                        max="100"
                        step="5"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                    />

                    <div class="flex justify-between text-xs text-gray-500">
                        <span>$5</span>
                        <span>$100+</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-600">Exact Amount:</span>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 font-medium">$</span>
                            <input
                                v-model.number="customAmount"
                                type="number"
                                min="5"
                                step="5"
                                class="w-28 pl-7 pr-3 py-2 border border-gray-300 rounded-lg text-center font-bold"
                                @input="enforceMinimum"
                            />
                        </div>
                    </div>

                    <p class="text-xs text-gray-600 italic text-center">
                        Set the amount that reflects your resonance with this work.
                    </p>
                </div>

                <div v-if="selectedTier" class="max-w-xl mx-auto">
                    <div class="mb-4 p-4 border rounded-lg text-center" :class="[theme.bg, theme.border]">
                        <div class="text-sm text-gray-600 mb-1">Selected Amount:</div>
                        <div class="text-xl font-bold">
                            {{ selectedTier === 'free' ? 'Free Access' : selectedTier === 'standard' ? '$25/month' : `$${customAmount}/month` }}
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-[120px_1fr] gap-4 items-center">
                            <label class="text-sm font-medium text-gray-700">Name</label>
                            <input
                                v-model="form.name"
                                type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                placeholder="Your name"
                            />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-[120px_1fr] gap-4 items-center">
                            <label class="text-sm font-medium text-gray-700">Email</label>
                            <input
                                v-model="form.email"
                                type="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                placeholder="your@email.com"
                            />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-[120px_1fr] gap-4 items-center">
                            <label class="text-sm font-medium text-gray-700">Password</label>
                            <input
                                v-model="form.password"
                                type="password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                placeholder="Minimum 8 characters"
                            />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-[120px_1fr] gap-4 items-center">
                            <label class="text-sm font-medium text-gray-700">Confirm Password</label>
                            <input
                                v-model="form.password_confirmation"
                                type="password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                placeholder="Re-enter password"
                            />
                        </div>

                        <button
                            @click="handleContinue"
                            :disabled="!isFormValid"
                            class="w-full px-6 py-3 bg-gradient-to-r from-gray-300 to-gray-400 text-white font-semibold rounded-lg hover:from-gray-400 hover:to-gray-500 disabled:opacity-50 disabled:cursor-not-allowed transition-all shadow-sm hover:shadow-md"
                        >
                            {{ selectedTier === 'free' ? 'Create Account' : 'Continue to Payment' }}
                        </button>

                    </div>
                </div>

            </div>

            <div class="p-8 border-t bg-white" :class="[theme.border]">
                <h3 class="font-semibold text-black mb-4 text-center text-lg">
                    Open Field Access:
                </h3>
                <div class="text-base text-center">
                    <div>Sanctum is an energetic boundary &mdash; not of worth, but of capacity.</div>
                    <div>If contribution isn't possible, <Link href="/contact" class="hover:underline" :class="theme.color">simply contact me</Link> &mdash; the field remains open.</div>

                </div>

                <div class="mt-12 text-center text-sm"><strong>Compliance</strong>: <a href="/sanctum/terms" class="underline" target="_blank">Terms of Service</a> |  <a href="/sanctum/privacy" target="_blank" class="underline">Privacy Policy</a> |  <a href="/sanctum/refund" target="_blank" class="underline">Refund Policy</a></div>
            </div>

        </div>

    </div>
</template>

<script setup>

    import { useAuth } from '@/Composables/useAuth'
    import { usePage } from '@inertiajs/vue3'
    import { useTheme } from "@/Composables/useTheme.js";
    import { computed, onMounted, ref } from "vue";
    import { Link } from "@inertiajs/vue3"
    import Icon from '@/Components/System/Icon.vue'
    import LogInForm from '@/Components/Auth/LogInForm.vue'
    import Transmission from "@/Components/System/Transmission.vue";

    const props = defineProps({
        pageTheme: {
            type: String,
            required: true
        }
    })

    const auth = useAuth()
    const page = usePage()
    const { theme } = useTheme(props.pageTheme)

    const customAmount = ref(25)

    const form = ref({
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
    })

    const isFormValid = computed(() => {
        return form.value.name.length > 0
            && form.value.email.length > 0
            && form.value.password.length >= 8
            && form.value.password === form.value.password_confirmation
    })

    const selectedTier = ref(null)

    const showFreeOption = computed(() => {
        const params = new URLSearchParams(window.location.search)
        return params.get('access') === 'free'
    })

    function enforceMinimum() {
        if (customAmount.value < 5) {
            customAmount.value = 5
        }
        customAmount.value = Math.round(customAmount.value / 5) * 5
    }

    async function createPendingAccount() {
        try {
            const response = await fetch(`${getApiBase()}/auth/register-pending`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    name: form.value.name,
                    email: form.value.email,
                    password: form.value.password,
                    password_confirmation: form.value.password_confirmation
                })
            })

            const data = await response.json()

            if (response.ok) {
                localStorage.setItem('pending_token', data.token)
                return { success: true, user: data.user }
            }

            return { success: false, message: data.message, errors: data.errors }
        } catch (error) {
            return { success: false, message: 'Network error' }
        }
    }

    function getApiBase() {
        return page.props.api_url + "/api"
    }

    async function handleContinue() {
        if (!isFormValid.value) return

        if (selectedTier.value === 'free') {
            await createFreeAccount()
        } else {
            const result = await createPendingAccount()

            if (result.success) {
                const amount = selectedTier.value === 'standard' ? 25 : customAmount.value
                await initiateStripeCheckout(amount, result.user.email)
            }
        }
    }

    async function createFreeAccount() {
        try {
            const response = await fetch(`${getApiBase()}/auth/sanctum/free-access`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(form.value)
            })

            const data = await response.json()

            if (response.ok) {
                localStorage.setItem('auth_token', data.token)
                window.location.href = '/transmission';
            } else {
                // Handle validation errors
                console.error('Registration failed:', data)
                // TODO: Display error to user
            }
        } catch (error) {
            console.error('Network error:', error)
            // TODO: Display error to user
        }
    }

    async function initiateStripeCheckout(amount, email) {
        try {
            sessionStorage.setItem('subscription_return_url', window.location.pathname)

            const response = await fetch(`${getApiBase()}/create-checkout-session`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    amount: amount,
                    email: email
                })
            })

            const { sessionId } = await response.json()

            // Redirect to Stripe Checkout
            const stripe = window.Stripe(page.props.stripe.publishable_key)
            const { error } = await stripe.redirectToCheckout({ sessionId })

            if (error) {
                console.error('Stripe checkout error:', error)
            }
        } catch (error) {
            console.error('Checkout creation error:', error)
        }
    }

    onMounted(() => {
        if (!showFreeOption.value) {
            selectedTier.value = 'standard'
        }
    })

</script>
