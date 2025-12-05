// resources/js/Composables/useCluster.js
import { reactive, toRefs } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { useAuth } from '@/Composables/useAuth'

export function useCluster() {
    const auth = useAuth()
    const apiBase = usePage().props.api_url.replace(/\/$/, '') + '/api'

    const state = reactive({
        cluster: null,
        reflections: {},
        signals: [],
        loading: false,
        error: null
    })

    async function load(ulid) {
        state.loading = true
        state.error = null

        try {
            const headers = { Accept: 'application/json' }
            if (auth.token.value) {
                headers.Authorization = `Bearer ${auth.token.value}`
            }

            const response = await fetch(`${apiBase}/clusters/${ulid}`, { headers })

            if (!response.ok) throw new Error(`Failed to fetch cluster: ${response.status}`)

            const data = await response.json()

            state.cluster = data.cluster
            state.reflections = data.reflections || {}
            state.signals = data.signals || []
        } catch (e) {
            console.error('Error loading cluster:', e)
            state.error = e.message || 'Failed to load cluster'
        } finally {
            state.loading = false
        }
    }

    return { state: toRefs(state), load }
}
