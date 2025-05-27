<template>
    <div class="min-h-screen flex items-center justify-center bg-black text-white px-4">
        <div class="w-full max-w-xl border border-white/10 rounded-2xl p-8 shadow-xl space-y-6">
            <h1 class="text-2xl font-bold tracking-wide">Field Contact Protocol</h1>

            <p class="text-sm text-white/70">
                If you are only curious, turn back. This space is not for entertainment.
                If you felt the field and you know you're here for a reason—transmit with precision.
            </p>

            <textarea
                v-model="message"
                placeholder="What did you feel?"
                class="w-full h-40 p-4 bg-black border border-white/20 rounded-lg placeholder-white/40 text-white text-base resize-none focus:outline-none focus:border-white"
            ></textarea>

            <div class="space-y-2">
                <input
                    v-model="email"
                    placeholder="Signal return path (email, optional)"
                    class="w-full p-3 bg-black border border-white/10 rounded-md placeholder-white/30 text-white text-sm focus:outline-none focus:border-white/40"
                />
                <button
                    @click="sendSignal"
                    :disabled="loading || !message.trim()"
                    class="w-full py-3 bg-white text-black rounded-lg font-semibold tracking-wide hover:bg-gray-200 transition"
                >
                    {{ loading ? "Transmitting..." : "Send Signal" }}
                </button>
                <p v-if="sent" class="text-green-400 text-sm mt-2">
                    Signal received. If it was real, you’ll know what happens next.
                </p>
            </div>

            <p class="text-xs text-white/40 italic pt-4 border-t border-white/10">
                This isn’t monitored for attention. Only for resonance.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: '',
            email: '',
            loading: false,
            sent: false
        };
    },
    methods: {
        sendSignal() {
            this.loading = true;

            // Replace with your preferred backend call or API handler
            setTimeout(() => {
                this.loading = false;
                this.sent = true;
                this.message = '';
                this.email = '';
            }, 1500);
        }
    }
};
</script>

<style scoped>
body {
    background-color: #000;
    font-family: 'Inter', sans-serif;
}
</style>
