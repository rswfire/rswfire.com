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
        path: '/myth',
        name: 'Myth',
        component: () => import('../pages/Myth.vue')
    },
    {
        path: '/honeyman',
        name: 'Honeyman',
        component: () => import('../pages/Honeyman.vue')
    },
    {
        path: '/contact',
        name: 'Contact',
        component: () => import('../pages/Contact.vue'),
    },
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
    {
        path: '/the-journey/the-first-year/chapter02',
        name: 'Chapter02',
        component: () => import('../pages/the-journey/the-first-year/Chapter02.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter03',
        name: 'Chapter03',
        component: () => import('../pages/the-journey/the-first-year/Chapter03.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter04',
        name: 'Chapter04',
        component: () => import('../pages/the-journey/the-first-year/Chapter04.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter05',
        name: 'Chapter05',
        component: () => import('../pages/the-journey/the-first-year/Chapter05.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter06',
        name: 'Chapter06',
        component: () => import('../pages/the-journey/the-first-year/Chapter06.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter07',
        name: 'Chapter07',
        component: () => import('../pages/the-journey/the-first-year/Chapter07.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter08',
        name: 'Chapter08',
        component: () => import('../pages/the-journey/the-first-year/Chapter08.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter09',
        name: 'Chapter09',
        component: () => import('../pages/the-journey/the-first-year/Chapter09.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter10',
        name: 'Chapter10',
        component: () => import('../pages/the-journey/the-first-year/Chapter10.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter11',
        name: 'Chapter11',
        component: () => import('../pages/the-journey/the-first-year/Chapter11.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter12',
        name: 'Chapter12',
        component: () => import('../pages/the-journey/the-first-year/Chapter12.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter13',
        name: 'Chapter13',
        component: () => import('../pages/the-journey/the-first-year/Chapter13.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter14',
        name: 'Chapter14',
        component: () => import('../pages/the-journey/the-first-year/Chapter14.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter15',
        name: 'Chapter15',
        component: () => import('../pages/the-journey/the-first-year/Chapter15.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter16',
        name: 'Chapter16',
        component: () => import('../pages/the-journey/the-first-year/Chapter16.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter17',
        name: 'Chapter17',
        component: () => import('../pages/the-journey/the-first-year/Chapter17.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter18',
        name: 'Chapter18',
        component: () => import('../pages/the-journey/the-first-year/Chapter18.vue'),
    },
    {
        path: '/the-journey/the-first-year/chapter19',
        name: 'Chapter19',
        component: () => import('../pages/the-journey/the-first-year/Chapter19.vue'),
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        return { top: 0 }
    }
})

export default router
