import { ref } from 'vue'
import { router, usePage } from '@inertiajs/vue3'

const user = ref(null)
const token = ref(localStorage.getItem('auth_token'))
const loading = ref(false)

export function useAuth() {

    function getApiBase() {
        const page = usePage()
        return page.props.api_url + '/api'
    }

    async function login(email, password) {
        loading.value = true
        try {
            const response = await fetch(`${getApiBase()}/login`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ email, password }),
            })

            const data = await response.json()

            if (data.token) {
                token.value = data.token
                user.value = data.user
                localStorage.setItem('auth_token', data.token)
                return true
            }

            throw new Error(data.message || 'Login failed')
        } finally {
            loading.value = false
        }
    }

    async function register(name, email, password, password_confirmation) {
        loading.value = true
        try {
            const response = await fetch(`${getApiBase()}/register`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ name, email, password, password_confirmation }),
            })

            const data = await response.json()

            if (data.token) {
                token.value = data.token
                user.value = data.user
                localStorage.setItem('auth_token', data.token)
                return { success: true }
            }

            return { success: false, message: data.message, errors: data.errors }
        } catch (error) {
            return { success: false, message: 'Network error. Please try again.' }
        } finally {
            loading.value = false
        }
    }

    async function registerFree(name, email, password, password_confirmation) {
        loading.value = true
        try {
            const response = await fetch(`${getApiBase()}/auth/sanctum/free-access`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ name, email, password, password_confirmation }),
            })

            const data = await response.json()

            if (data.token) {
                token.value = data.token
                user.value = data.user
                localStorage.setItem('auth_token', data.token)
                return { success: true }
            }

            return { success: false, message: data.message, errors: data.errors }
        } catch (error) {
            return { success: false, message: 'Network error. Please try again.' }
        } finally {
            loading.value = false
        }
    }

    async function logout() {
        if (token.value) {
            await fetch(`${getApiBase()}/logout`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token.value}`,
                    'Accept': 'application/json',
                },
            })
        }

        token.value = null
        user.value = null
        localStorage.removeItem('auth_token')

        router.visit('/')
    }

    async function fetchUser() {
        if (!token.value) return null

        loading.value = true
        try {
            const response = await fetch(`${getApiBase()}/user`, {
                headers: {
                    'Authorization': `Bearer ${token.value}`,
                    'Accept': 'application/json',
                },
            })

            if (response.ok) {
                user.value = await response.json()
                return user.value
            }

            // Token invalid
            token.value = null
            localStorage.removeItem('auth_token')
            return null
        } finally {
            loading.value = false
        }
    }

    async function init() {
        if (token.value && !user.value) {
            await fetchUser()
        }
    }

    async function authFetch(url, options = {}) {
        if (!token.value) {
            console.warn('No auth token found; request may be unauthorized.')
        }

        const headers = {
            ...(options.headers || {}),
            'Accept': 'application/json',
        }

        if (token.value) {
            headers['Authorization'] = `Bearer ${token.value}`
        }

        return fetch(url, {
            ...options,
            headers,
        })
    }

    return {
        user,
        token,
        loading,
        login,
        register,
        registerFree,
        logout,
        fetchUser,
        init,
        authFetch,
        isAuthenticated: () => !!token.value,
    }
}
