import { ref } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { useAuth } from '@/Composables/useAuth'

export function useTransmission() {
    const auth = useAuth()
    const apiBase = usePage().props.api_url.replace(/\/$/, '') + '/api'

    const transmission = ref(null)
    const reflection = ref(null)
    const loading = ref(false)
    const error = ref(null)

    async function load(ulid) {
        loading.value = true
        error.value = null

        try {
            // Define shared headers
            const headers = { Accept: 'application/json' }
            if (auth.token.value) {
                headers.Authorization = `Bearer ${auth.token.value}`
            }

            // Fetch transmission
            const txRes = await fetch(`${apiBase}/transmission/${ulid}`, { headers })
            if (!txRes.ok) throw new Error(`Transmission request failed: ${txRes.status}`)
            transmission.value = await txRes.json()

            // Fetch reflection
            const rfRes = await fetch(`${apiBase}/reflection/${ulid}`, { headers })
            reflection.value = rfRes.ok ? await rfRes.json() : {}

        } catch (e) {
            console.error('Error loading transmission:', e)
            error.value = e.message || 'Failed to load transmission'
        } finally {
            loading.value = false
        }
    }

    return { transmission, reflection, loading, error, load }
}
