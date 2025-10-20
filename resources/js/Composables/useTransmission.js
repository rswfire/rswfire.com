import { reactive } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { useAuth } from '@/Composables/useAuth'

export function useTransmission() {
    const auth = useAuth()
    const apiBase = usePage().props.api_url.replace(/\/$/, '') + '/api'

    const state = reactive({
        transmission: null,
        reflection: null,
        neighbors: { previous: null, next: null },
        timeline: null,
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

            const domain = usePage().props.domain || 'rswfire.com'

            // Fetch all endpoints in parallel
            const [txRes, rfRes, nbRes, tlRes] = await Promise.all([
                fetch(`${apiBase}/transmission/${ulid}`, { headers }),
                fetch(`${apiBase}/reflection/${ulid}`, { headers }),
                fetch(`${apiBase}/transmission/${ulid}/neighbors?domain=${domain}`, { headers }),
                fetch(`${apiBase}/transmission/${ulid}/timeline?domain=${domain}`, { headers })
            ])

            // Process responses
            if (!txRes.ok) throw new Error(`Transmission request failed: ${txRes.status}`)
            state.transmission = await txRes.json()

            state.reflection = rfRes.ok ? await rfRes.json() : {}
            state.neighbors = nbRes.ok ? await nbRes.json() : { previous: null, next: null }
            state.timeline = tlRes.ok ? await tlRes.json() : null

        } catch (e) {
            console.error('Error loading transmission:', e)
            state.error = e.message || 'Failed to load transmission'
        } finally {
            state.loading = false
        }
    }
    // Return the reactive state object AND the load function
    return { state, load }
}
