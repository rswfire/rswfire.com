import { createRouter, createWebHistory } from 'vue-router'

import Home from '../pages/App.vue'
import FieldRecords from '../pages/FieldRecords.vue'
import ViewContent from '../pages/ViewContent.vue'

const routes = [
    { path: '/', name: 'Home', component: Home },
    { path: '/field-records', name: 'FieldRecords', component: FieldRecords },
    { path: '/content/:id', name: 'ViewContent', component: ViewContent, props: true }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
