import { createRouter, createWebHistory } from 'vue-router'

import Hello from '../pages/Hello.vue'
import Home from '../pages/Home.vue'
import FieldRecords from '../pages/FieldRecords.vue'
import ViewContent from '../pages/ViewContent.vue'

const routes = [
    { path: '/', name: 'Home', component: Home },
    { path: '/hello', name: 'Hello', component: Hello },
    { path: '/field-records', name: 'FieldRecords', component: FieldRecords },
    { path: '/content/:id', name: 'ViewContent', component: ViewContent, props: true }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
