import { createRouter, createWebHistory } from 'vue-router'

import Hello from '../pages/Hello.vue'
import Home from '../pages/Home.vue'
import FieldRecords from '../pages/FieldRecords.vue'
import FieldRecordsCreate from '../pages/FieldRecordsCreate.vue'
import Lexicon from '../pages/Lexicon.vue'
import Tech from '../pages/Tech.vue'
import ViewContent from '../pages/ViewContent.vue'

import Chapter01 from '../pages/the-journey/the-first-year/Chapter01.vue'

const routes = [
    { path: '/', name: 'Home', component: Home },
    { path: '/hello', name: 'Hello', component: Hello },
    { path: '/field-records', name: 'FieldRecords', component: FieldRecords },
    { path: '/field-records/create', name: 'CreateFieldRecord', component: FieldRecordsCreate },
    { path: '/content/:id', name: 'ViewContent', component: ViewContent, props: true },
    { path: '/lexicon', name: 'Lexicon', component: Lexicon },
    { path: '/tech', name: 'Tech', component: Tech },
    {
        path: '/the-journey',
        name: 'TheJourney',
        component: () => import('../pages/the-journey/Index.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter01',
        name: 'Chapter01',
        component: Chapter01,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
