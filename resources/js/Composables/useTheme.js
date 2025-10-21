import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const THEME_ALIASES = {
    'transmission': 'transmissions',
    'signal': 'signals',
    // Add others as needed
}

const THEMES = {
    // System pages
    'about':      { icon: "Layers",           color: "text-black",      bg: "bg-white",      border: "border-black",      hover: "hover:bg-white" },
    'contact':    { icon: "MessageSquareDot", color: "text-black",      bg: "bg-white",      border: "border-black",      hover: "hover:bg-white" },
    'contribute': { icon: "HandCoins",        color: "text-black",      bg: "bg-white",      border: "border-black",      hover: "hover:bg-white" },
    'updates':    { icon: "Squirrel",         color: "text-black",      bg: "bg-white",      border: "border-black",      hover: "hover:bg-white" },

    // Core sections
    'home':     { icon: "Radar",       color: "text-indigo-400", bg: "bg-indigo-50", border: "border-indigo-200", hover: "hover:bg-indigo-100" },
    'hello':    { icon: "Flame",       color: "text-red-400",    bg: "bg-red-50",    border: "border-red-200",    hover: "hover:bg-red-100" },
    'tech':     { icon: "Hammer",      color: "text-purple-400", bg: "bg-purple-50", border: "border-purple-200", hover: "hover:bg-purple-100" },
    'myth':     { icon: "ShieldCheck", color: "text-yellow-400", bg: "bg-yellow-50", border: "border-yellow-200", hover: "hover:bg-yellow-100" },
    'atlas':    { icon: "MapPinHouse", color: "text-sky-400",    bg: "bg-sky-50",    border: "border-sky-200",    hover: "hover:bg-sky-100" },
    'autonomy': { icon: "Layers",      color: "text-red-400",    bg: "bg-red-50",    border: "border-red-200",    hover: "hover:bg-red-100" },
    'sanctum':  { icon: "Sprout",      color: "text-teal-400",   bg: "bg-teal-50",   border: "border-teal-200",   hover: "hover:bg-teal-100" },

    // Signal types
    'fieldcraft':    { icon: "Map",               color: "text-green-500",  bg: "bg-green-50",  border: "border-green-200",  hover: "hover:bg-green-100" },
    'transmissions': { icon: "SatelliteDish",     color: "text-pink-400",   bg: "bg-pink-50",   border: "border-pink-200",   hover: "hover:bg-pink-100" },
    'signals':       { icon: "Activity",          color: "text-sky-400",    bg: "bg-sky-50",    border: "border-sky-200",    hover: "hover:bg-sky-100" },
    'gallery':       { icon: "GalleryHorizontal", color: "text-orange-400", bg: "bg-orange-50", border: "border-orange-200", hover: "hover:bg-orange-100" },
    'synthesis':     { icon: "Crosshair",         color: "text-purple-400", bg: "bg-purple-50", border: "border-purple-200", hover: "hover:bg-purple-100" },

    // Reference
    'lineage':   { icon: "Trees",          color: "text-purple-400",  bg: "bg-purple-50",  border: "border-purple-200",  hover: "hover:bg-purple-100" },
    'codex':     { icon: "SquareCode",     color: "text-amber-400",   bg: "bg-amber-50",   border: "border-amber-200",   hover: "hover:bg-amber-100" },
    'lexicon':   { icon: "SquareLibrary",  color: "text-orange-400",  bg: "bg-orange-50",  border: "border-orange-200",  hover: "hover:bg-orange-100" },
    'bluewater': { icon: "WavesLadder",    color: "text-blue-400",    bg: "bg-blue-50",    border: "border-blue-200",    hover: "hover:bg-blue-100" },
    'honeyman':  { icon: "TreeDeciduous",  color: "text-emerald-400", bg: "bg-emerald-50", border: "border-emerald-200", hover: "hover:bg-emerald-100" },
}

export function useTheme(themeKey) {
    const theme = computed(() => {
        return THEMES[themeKey] || THEMES['home']
    })

    const allThemes = computed(() => {
        return Object.entries(THEMES).map(([key, config]) => ({
            key,
            label: key.charAt(0).toUpperCase() + key.slice(1),
            url: key === 'home' ? '/' : `/${key}`,
            ...config
        }))
    })

    return {
        theme,
        allThemes,
        getTheme: (key) => THEMES[key] || THEMES['home']
    }
}
