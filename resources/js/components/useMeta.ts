import { useHead } from '@vueuse/head'

export function useMeta({
                            title,
                            description,
                            image = 'https://rswfire.com/default-share.jpg',
                            url = window.location.href,
                            keywords = '',
                            type = 'article',
                        }) {
    useHead({
        title,
        meta: [
            { name: 'description', content: description },
            { name: 'keywords', content: keywords },
            { name: 'author', content: 'Sam White' },

            // Open Graph
            { property: 'og:title', content: title },
            { property: 'og:description', content: description },
            { property: 'og:type', content: type },
            { property: 'og:url', content: url },
            { property: 'og:image', content: image },

            // Twitter Cards (optional)
            { name: 'twitter:card', content: 'summary_large_image' },
            { name: 'twitter:title', content: title },
            { name: 'twitter:description', content: description },
            { name: 'twitter:image', content: image },
        ],
    })
}
