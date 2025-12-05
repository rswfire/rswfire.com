// resources/js/Composables/useClusters.js
import { ref } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { useAuth } from '@/Composables/useAuth'

export function useClusters() {
    const auth = useAuth()
    const apiBase = usePage().props.api_url.replace(/\/$/, '') + '/api'

    const clusters = ref(null)
    const loading = ref(false)
    const error = ref(null)

    async function loadIndex() {
        loading.value = true
        error.value = null

        try {
            const headers = { Accept: 'application/json' }
            if (auth.token.value) {
                headers.Authorization = `Bearer ${auth.token.value}`
            }

            const response = await fetch(`${apiBase}/clusters`, { headers })

            if (!response.ok) throw new Error(`Failed to fetch clusters: ${response.status}`)

            clusters.value = await response.json()
        } catch (e) {
            console.error('Error loading clusters:', e)
            error.value = e.message || 'Failed to load clusters'
        } finally {
            loading.value = false
        }
    }

    return { clusters, loading, error, loadIndex }
}
