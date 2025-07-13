<template>
    <div class="fixed inset-0 z-50 bg-white text-gray-900 flex flex-col justify-between px-6 py-8 overflow-y-auto">

        <!-- Top Section -->
        <div class="space-y-6">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <img
                        src="/assets/rswfire.jpg"
                        alt="RSWFIRE"
                        class="w-20 h-20 rounded-full border border-gray-300 shadow-sm"
                    />
                    <div>
                        <div class="text-lg font-semibold">rswfire</div>
                        <div class="text-xs text-gray-500">Robert Samuel White</div>
                    </div>
                </div>
                <button @click="$emit('close')" class="text-2xl text-gray-400 hover:text-red-500">×</button>
            </div>

            <div class="w-full flex justify-center">
                <div class="flex items-center space-x-2">
                    <Link href="/about" class="text-sm font-medium text-gray-700 hover:underline">
                        <Icon name="MessageCircle" color="text-black" class="w-4 h-4 flex-shrink-0" />
                    </Link>
                    <Link href="/about" class="text-sm font-medium text-gray-700 hover:underline">
                        About
                    </Link>

                    <div class="space-x-4">&nbsp;</div>
                    <Link href="/login" class="text-sm font-medium text-gray-700 hover:underline">
                        <Icon name="LogIn" color="text-black" class="w-4 h-4 flex-shrink-0" />
                    </Link>
                    <Link href="/login" class="text-sm font-medium text-gray-700 hover:underline">
                        Sign In
                    </Link>

                    <div class="space-x-4">&nbsp;</div>
                    <Link href="/register" class="text-sm font-medium text-gray-700 hover:underline">
                        <Icon name="UserPlus" color="text-black" class="w-4 h-4 flex-shrink-0" />
                    </Link>
                    <Link href="/register" class="text-sm font-medium text-gray-700 hover:underline">
                        Register
                    </Link>
                </div>
            </div>


            <!-- Navigation Grid -->
            <div class="grid grid-cols-3 gap-4 pt-4 text-sm font-medium text-center">
                <Link
                    v-for="item in items"
                    :key="item.label"
                    :href="item.url"
                    @click="$emit('close')"
                    class="border rounded-lg p-3 flex flex-col items-center space-y-1 transition text-sm font-medium text-center"
                    :class="[item.bg, item.border, item.hover]"
                >
                    <Icon :name="item.icon" :class="['w-6 h-6', item.color]" />
                    <span>{{ item.label }}</span>
                </Link>
            </div>


            <!-- Quote -->
            <div class="text-xs italic text-gray-600 border-t border-gray-200 pt-4 text-center">
                <Icon name="Flame" class="inline-block text-red-400 w-4 h-4 mb-1" />
                <br />
                "In a forest pitch dark,<br />
                Glowed the tiniest spark.<br />
                It burst into a flame."
            </div>

        </div>

        <!-- Footer -->
        <div class="pt-8 text-center text-xs text-gray-400 tracking-wider uppercase">
            System Online
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import Icon from "@/Components/System/Icon.vue";

const items = [
    {
        label: "Home",
        icon: "Radar",
        color: "text-indigo-400",
        bg: "bg-indigo-50",
        border: "border-indigo-200",
        hover: "hover:bg-indigo-100",
        url: "/",
    },
    {
        label: "Who I Am",
        icon: "Flame",
        color: "text-red-400",
        bg: "bg-red-50",
        border: "border-red-200",
        hover: "hover:bg-red-100",
        url: "/hello",
    },
    {
        label: "What I Do",
        icon: "Hammer",
        color: "text-purple-400",
        bg: "bg-purple-50",
        border: "border-purple-200",
        hover: "hover:bg-purple-100",
        url: "/tech",
    },
    {
        label: "Signal",
        icon: "Activity",
        color: "text-sky-400",
        bg: "bg-sky-50",
        border: "border-sky-200",
        hover: "hover:bg-sky-100",
        url: "/signal",
    },
    {
        label: "Transmission",
        icon: "SatelliteDish",
        color: "text-pink-400",
        bg: "bg-pink-50",
        border: "border-pink-200",
        hover: "hover:bg-pink-100",
        url: "/transmission",
    },
    {
        label: "Fieldwork",
        icon: "Map",
        color: "text-green-500",
        bg: "bg-green-50",
        border: "border-green-200",
        hover: "hover:bg-green-100",
        url: "/fieldwork",
    },
    {
        label: "Codex",
        icon: "SquareCode",
        color: "text-amber-400",
        bg: "bg-amber-50",
        border: "border-amber-200",
        hover: "hover:bg-amber-100",
        url: "/codex",
    },
    {
        label: "Lexicon",
        icon: "SquareLibrary",
        color: "text-orange-400",
        bg: "bg-orange-50",
        border: "border-orange-200",
        hover: "hover:bg-orange-100",
        url: "/lexicon",
    },
    {
        label: "Myth",
        icon: "ShieldCheck",
        color: "text-yellow-400",
        bg: "bg-yellow-50",
        border: "border-yellow-200",
        hover: "hover:bg-yellow-100",
        url: "/myth",
    },
    {
        label: "Honeyman",
        icon: "TreeDeciduous",
        color: "text-emerald-400",
        bg: "bg-emerald-50",
        border: "border-emerald-200",
        hover: "hover:bg-emerald-100",
        url: "/honeyman",
    },
];

</script>
