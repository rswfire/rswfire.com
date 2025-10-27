import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const THEME_ALIASES = {
    'transmission': 'transmissions',
    'signal': 'signals',
}

const THEMES = {
    // System pages
    'about': {
        icon: "Layers",
        color: "text-black",
        bg: "bg-white",
        border: "border-black",
        hover: "hover:bg-white",
        blurb: "The methodology behind this work, why it exists, and what it offers to those building post-institutional sovereignty.",
        section: "system"
    },
    'autonomy': {
        icon: "BringToFront",
        color: "text-black",
        bg: "bg-white",
        border: "border-black",
        hover: "hover:bg-white",
        blurb: "Learn about the infrastructure behind this project.",
        section: "system"
    },
    'contact': {
        icon: "MessageSquareDot",
        color: "text-black",
        bg: "bg-white",
        border: "border-black",
        hover: "hover:bg-white",
        blurb: "Direct contact for questions, collaboration inquiries, or technical support.",
        section: "system"
    },
    'contribute': {
        icon: "HandCoins",
        color: "text-black",
        bg: "bg-white",
        border: "border-black",
        hover: "hover:bg-white",
        blurb: "Financial support for maintaining this infrastructure and developing new tools.",
        section: "system"
    },
    'updates': {
        icon: "Squirrel",
        color: "text-black",
        bg: "bg-white",
        border: "border-black",
        hover: "hover:bg-white",
        blurb: "Set granular updates you want to receive.",
        section: "system"
    },

    // Core sections (Field)
    /*
    'home': {
        icon: "Radar",
        color: "text-indigo-400",
        bg: "bg-indigo-50",
        border: "border-indigo-200",
        hover: "hover:bg-indigo-100",
        blurb: "Central hub and field orientation.",
        section: "field"
    },
     */
    'handshake': {
        icon: "Flame",
        color: "text-red-400",
        bg: "bg-red-50",
        border: "border-red-200",
        hover: "hover:bg-red-100",
        blurb: "Orientation for new arrivals.",
        section: "field"
    },
    'build': {
        icon: "Hammer",
        color: "text-purple-400",
        bg: "bg-purple-50",
        border: "border-purple-200",
        hover: "hover:bg-purple-100",
        blurb: "Decades of systems built without permission.",
        section: "field"
    },
    'myth': {
        icon: "ShieldCheck",
        color: "text-yellow-400",
        bg: "bg-yellow-50",
        border: "border-yellow-200",
        hover: "hover:bg-yellow-100",
        blurb: "Symbolic narrative of the field.",
        section: "field"
    },
    'atlas': {
        icon: "MapPinHouse",
        color: "text-sky-400",
        bg: "bg-sky-50",
        border: "border-sky-200",
        hover: "hover:bg-sky-100",
        blurb: "Geographic and territorial documentation.",
        section: "field"
    },
    'sanctum': {
        icon: "Sprout",
        color: "text-teal-400",
        bg: "bg-teal-50",
        border: "border-teal-200",
        hover: "hover:bg-teal-100",
        blurb: "Private access layer for reciprocal field exchange.",
        section: "field"
    },

    // Signal types
    'fieldcraft': {
        icon: "Map",
        color: "text-green-500",
        bg: "bg-green-50",
        border: "border-green-200",
        hover: "hover:bg-green-100",
        blurb: "Written field reports and documentation.",
        section: "signal"
    },
    'transmissions': {
        icon: "SatelliteDish",
        color: "text-pink-400",
        bg: "bg-pink-50",
        border: "border-pink-200",
        hover: "hover:bg-pink-100",
        blurb: "Video transmissions from the archive.",
        section: "signal"
    },
    'synthesis': {
        icon: "Crosshair",
        color: "text-purple-400",
        bg: "bg-purple-50",
        border: "border-purple-200",
        hover: "hover:bg-purple-100",
        blurb: "Pattern recognition across the archive.",
        section: "signal"
    },
    'gallery': {
        icon: "GalleryHorizontal",
        color: "text-orange-400",
        bg: "bg-orange-50",
        border: "border-orange-200",
        hover: "hover:bg-orange-100",
        blurb: "Visual archive and image documentation.",
        section: "signal"
    },
    'signals': {
        icon: "Activity",
        color: "text-sky-400",
        bg: "bg-sky-50",
        border: "border-sky-200",
        hover: "hover:bg-sky-100",
        blurb: "All signal types across the platform.",
        section: "signal"
    },

    // Reference
    'codex': {
        icon: "SquareCode",
        color: "text-amber-400",
        bg: "bg-amber-50",
        border: "border-amber-200",
        hover: "hover:bg-amber-100",
        blurb: "Conceptual access points into the platform.",
        section: "reference"
    },
    'lexicon': {
        icon: "SquareLibrary",
        color: "text-orange-400",
        bg: "bg-orange-50",
        border: "border-orange-200",
        hover: "hover:bg-orange-100",
        blurb: "Terminology and language definitions.",
        section: "reference"
    },
    /*
    'bluewater': {
        icon: "WavesLadder",
        color: "text-blue-400",
        bg: "bg-blue-50",
        border: "border-blue-200",
        hover: "hover:bg-blue-100",
        blurb: "Preparation for ocean navigation.",
        section: "reference"
    },*/
    'honeyman': {
        icon: "TreeDeciduous",
        color: "text-emerald-400",
        bg: "bg-emerald-50",
        border: "border-emerald-200",
        hover: "hover:bg-emerald-100",
        blurb: "Honeyman State Park institutional documentation.",
        section: "reference"
    },
    'lineage': {
        icon: "Trees",
        color: "text-purple-400",
        bg: "bg-purple-50",
        border: "border-purple-200",
        hover: "hover:bg-purple-100",
        blurb: "Field manual for navigating collapse and rebuilding.",
        section: "reference"
    },
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

    const themesBySection = computed(() => {
        return {
            system: allThemes.value.filter(t => t.section === 'system'),
            field: allThemes.value.filter(t => t.section === 'field'),
            signal: allThemes.value.filter(t => t.section === 'signal'),
            reference: allThemes.value.filter(t => t.section === 'reference'),
        }
    })

    return {
        theme,
        allThemes,
        themesBySection,
        getTheme: (key) => THEMES[key] || THEMES['home']
    }
}
