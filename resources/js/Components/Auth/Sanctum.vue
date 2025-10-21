<template>

    <div :class="['border rounded-lg shadow-sm overflow-hidden', theme.border, theme.bg]">

        <div class="grid md:grid-cols-3 divide-x divide-gray-200">

            <div class="p-6 bg-white md:col-span-2">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b" :class="theme.border">
                    <Icon name="Sprout" class="w-8 h-8" :class="theme.color" />
                    <h2 class="text-2xl font-bold text-black">Begin Field Exchange</h2>
                </div>

                <div class="space-y-4 text-sm text-black">
                    <div><strong :class="theme.color">Sanctum</strong> is a private access layer for <strong>reciprocal field exchange</strong>.</div>

                    <div class="pt-4 border-t" :class="theme.border">
                        <h3 class="font-semibold text-black mb-4 text-center text-lg">What Sanctum Holds:</h3>
                        <ul class="space-y-2 ml-4">
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
                                <span>Exclusive access to <Link href="/synthesis" class="underline">Synthesis</Link> infrastructure.</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <Icon name="Check" class="w-4 h-4 shrink-0 mt-0.5" :class="theme.color" />
                                <div>
                                    <div class="mb-1">Mirror and pattern recognition across 800+ video transmissions and other signals.</div>
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

                <p class="text-sm text-gray-600 mb-6">
                    Sign in to access your <strong :class="theme.color">Sanctum</strong> account.
                </p>

                <LogInForm :show-register-link="false" />
            </div>

        </div>

        <div class="p-4 border-t bg-gray-50" :class="[theme.border]">
            <h3 class="font-semibold text-black mb-4 text-center text-lg">
                Why Hold This Field:
            </h3>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 max-w-4xl mx-auto text-sm text-black mb-4">
                <div class="flex items-center gap-2">
                    <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                    <span>Because wholeness requires infrastructure the world won't build.</span>
                </div>
                <div class="flex items-center gap-2">
                    <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                    <span>Because others will need this model when their world collapses.</span>
                </div>
                <div class="flex items-center gap-2">
                    <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                    <span>Because signal must be preserved for those who can't yet see it.</span>
                </div>
                <div class="flex items-center gap-2">
                    <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                    <span>Because reciprocal exchange is how sovereignty sustains itself.</span>
                </div>
            </div>

            <div class="flex items-center justify-center gap-2 max-w-2xl mx-auto text-sm text-black">
                <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="theme.color" />
                <span class="text-center italic">
            Because collapse is not failure — it's the clearing that reveals what was always whole.
        </span>
            </div>

            <div class="pt-6 mt-4 max-w-4xl mx-auto">

                <!-- Pricing Cards Grid -->
                <div :class="[
            'grid gap-4 mb-6',
            showFreeOption ? 'grid-cols-1 md:grid-cols-3' : 'grid-cols-1 md:grid-cols-2 max-w-2xl mx-auto'
        ]">

                    <!-- Free Tier (conditional) -->
                    <button
                        v-if="showFreeOption"
                        @click="selectedTier = 'free'"
                        :class="[
                    'p-6 rounded-lg border-2 transition-all',
                    selectedTier === 'free'
                        ? 'border-teal-400 bg-teal-50'
                        : 'border-gray-300 bg-white hover:border-teal-200'
                ]"
                    >
                        <div class="text-sm text-gray-500 mb-2">Free Access</div>
                        <div class="text-3xl font-bold mb-2">$0</div>
                        <div class="text-sm text-gray-600">By invitation</div>
                    </button>

                    <!-- Standard Tier -->
                    <button
                        @click="selectedTier = 'standard'"
                        :class="[
                    'p-6 rounded-lg border-2 transition-all relative',
                    selectedTier === 'standard'
                        ? 'border-teal-400 bg-teal-50'
                        : 'border-gray-300 bg-white hover:border-teal-200'
                ]"
                    >
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-yellow-400 text-black text-xs font-bold rounded-full">
                            ANCHOR
                        </div>
                        <div class="text-sm text-gray-500 mb-2">Standard</div>
                        <div class="text-4xl font-bold mb-2">$25</div>
                        <div class="text-sm text-gray-600">per month</div>
                    </button>

                    <!-- Custom Tier -->
                    <button
                        @click="selectedTier = 'custom'"
                        :class="[
                    'p-6 rounded-lg border-2 transition-all',
                    selectedTier === 'custom'
                        ? 'border-teal-400 bg-teal-50'
                        : 'border-gray-300 bg-white hover:border-teal-200'
                ]"
                    >
                        <div class="text-sm text-gray-500 mb-2">Custom Amount</div>
                        <div class="text-3xl font-bold mb-2">$5+</div>
                        <div class="text-sm text-gray-600">Set your own</div>
                    </button>

                </div>

                <!-- Custom Amount Input (shows when custom selected) -->
                <div v-if="selectedTier === 'custom'" class="mb-6 max-w-2xl mx-auto space-y-4 p-6 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="flex items-center justify-between">
                        <label class="text-sm font-medium text-gray-700">Monthly amount</label>
                        <div class="text-3xl font-bold">${{ customAmount }}</div>
                    </div>

                    <input
                        v-model.number="customAmount"
                        type="range"
                        min="5"
                        max="100"
                        step="5"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-teal-500"
                    />

                    <div class="flex justify-between text-xs text-gray-500">
                        <span>$5</span>
                        <span>$100+</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-600">Exact amount:</span>
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

                <!-- Registration Form (shows immediately after selection) -->
                <div v-if="selectedTier" class="max-w-md mx-auto">
                    <div class="mb-4 p-4 bg-teal-50 border border-teal-200 rounded-lg text-center">
                        <div class="text-sm text-gray-600 mb-1">Selected tier:</div>
                        <div class="text-xl font-bold">
                            {{ selectedTier === 'free' ? 'Free Access' : selectedTier === 'standard' ? '$25/month' : `$${customAmount}/month` }}
                        </div>
                    </div>

                    <!-- Registration fields here -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input
                                v-model="form.name"
                                type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                placeholder="Your name"
                            />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input
                                v-model="form.email"
                                type="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                placeholder="your@email.com"
                            />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input
                                v-model="form.password"
                                type="password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                placeholder="Minimum 8 characters"
                            />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                            <input
                                v-model="form.password_confirmation"
                                type="password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                placeholder="Re-enter password"
                            />
                        </div>

                        <div class="text-center">(Sorry, this button is disabled while we await Paddle approval.)</div>
                        <button
                            @click="handleContinue"
                            :disabled="!isFormValid"
                            class="w-full px-6 py-3 bg-gradient-to-r from-gray-300 to-gray-400 text-white font-semibold rounded-lg hover:from-gray-400 hover:to-gray-500 disabled:opacity-50 disabled:cursor-not-allowed transition-all shadow-sm hover:shadow-md"
                        >
                            {{ selectedTier === 'free' ? 'Create Account' : 'Continue to Payment' }}
                        </button>

                        <button
                            @click="selectedTier = null"
                            class="w-full px-6 py-2 text-gray-600 hover:text-gray-800 text-sm"
                        >
                            ← Change tier
                        </button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>

<script setup>
import Icon from '@/Components/System/Icon.vue'
import LogInForm from '@/Components/Auth/LogInForm.vue'
import { useAuth } from '@/Composables/useAuth'
import { Link } from "@inertiajs/vue3"
import {useTheme} from "@/Composables/useTheme.js";
import {computed, onMounted, ref} from "vue";
import { usePage } from '@inertiajs/vue3'

const auth = useAuth()
const page = usePage()

const props = defineProps({
    pageTheme: {
        type: String,
        required: true
    }
})

const { theme } = useTheme(props.pageTheme)

const selectedTier = ref(null)
const customAmount = ref(25)
const form = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
})

// Add these computed
const showFreeOption = computed(() => {
    const params = new URLSearchParams(window.location.search)
    return params.get('access') === 'free'
})

const isFormValid = computed(() => {
    return form.value.name.length > 0
        && form.value.email.length > 0
        && form.value.password.length >= 8
        && form.value.password === form.value.password_confirmation
})

// Add these functions
function enforceMinimum() {
    if (customAmount.value < 5) {
        customAmount.value = 5
    }
    customAmount.value = Math.round(customAmount.value / 5) * 5
}

function handleContinue() {
    if (!isFormValid.value) return

    if (selectedTier.value === 'free') {
        createFreeAccount()
    } else {
        const amount = selectedTier.value === 'standard' ? 25 : customAmount.value
        initiatePaddleCheckout(amount)
    }
}

async function createFreeAccount() {
    try {
        const response = await fetch('https://rswfire.online/api/auth/sanctum/free-access', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(form.value)
        })

        const data = await response.json()

        if (response.ok) {
            // Store token
            localStorage.setItem('auth_token', data.token)

            // Update auth state (if using your useAuth composable)
            // auth.user.value = data.user

            // Reload to refresh Sanctum state
            window.location.href = '/'
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

async function initiatePaddleCheckout(amount) {
    if (!window.Paddle) {
        console.error('Paddle not loaded')
        errorMessage.value = 'Payment system not loaded. Please refresh.'
        return
    }

    const paddleConfig = page.props.paddle

    try {
        const checkoutConfig = {
            items: [{
                priceId: paddleConfig.price_id_standard,
                quantity: 1
            }],
            customer: {
                email: form.value.email,
            },
            customData: {
                user_name: form.value.name,
                user_email: form.value.email,
                user_password: form.value.password, // We'll need this for account creation
                tier: selectedTier.value,
                amount: amount
            }
        }

        // Try price override for custom amounts
        if (selectedTier.value === 'custom' && amount !== 25) {
            checkoutConfig.items[0].price = {
                amount: (amount * 100).toString(),
                currencyCode: 'USD'
            }
        }

        window.Paddle.Checkout.open(checkoutConfig)

    } catch (error) {
        console.error('Paddle checkout error:', error)
        errorMessage.value = 'Failed to open checkout. Please try again.'
    }
}

// Add to onMounted (or create it if you don't have one)
onMounted(() => {
    if (!showFreeOption.value) {
        selectedTier.value = 'standard'
    }
})
</script>
