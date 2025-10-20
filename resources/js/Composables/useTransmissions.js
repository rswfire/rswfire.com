// resources/js/Composables/useTransmissions.js
import { ref } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { useAuth } from '@/Composables/useAuth'

export function useTransmissions() {
    const auth = useAuth()
    const apiBase = usePage().props.api_url.replace(/\/$/, '') + '/api'

    const transmissions = ref(null)
    const loading = ref(false)
    const error = ref(null)

    async function loadIndex(page = 1, perPage = 24) {
        loading.value = true
        error.value = null

        try {
            const headers = { Accept: 'application/json' }
            if (auth.token.value) {
                headers.Authorization = `Bearer ${auth.token.value}`
            }

            const domain = usePage().props.domain || 'rswfire.com'
            const response = await fetch(`${apiBase}/transmissions?page=${page}&perPage=${perPage}&domain=${domain}`, { headers })

            if (!response.ok) throw new Error(`Failed to fetch transmissions: ${response.status}`)

            transmissions.value = await response.json()
        } catch (e) {
            console.error('Error loading transmissions:', e)
            error.value = e.message || 'Failed to load transmissions'
        } finally {
            loading.value = false
        }
    }

    async function loadByTag(tag, page = 1, perPage = 24) {
        loading.value = true
        error.value = null

        try {
            const headers = { Accept: 'application/json' }
            if (auth.token.value) {
                headers.Authorization = `Bearer ${auth.token.value}`
            }

            const response = await fetch(`${apiBase}/transmission/tag/${tag}?page=${page}&perPage=${perPage}`, { headers })

            if (!response.ok) throw new Error(`Failed to fetch transmissions by tag: ${response.status}`)

            transmissions.value = await response.json()
        } catch (e) {
            console.error('Error loading transmissions by tag:', e)
            error.value = e.message || 'Failed to load transmissions'
        } finally {
            loading.value = false
        }
    }

    return { transmissions, loading, error, loadIndex, loadByTag }
}
