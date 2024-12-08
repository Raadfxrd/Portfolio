import { createApp } from 'vue'
import App from './App.vue'
import type { Router } from 'vue-router'
import { createRouter, createWebHashHistory } from 'vue-router'
import AboutSection from './pages/About/AboutSection.vue'
import HomePage from './pages/HomePage.vue'

const router: Router = createRouter({
  history: createWebHashHistory(),
  routes: [
    { path: '/', component: HomePage, name: 'Home' },
    { path: '/about', component: AboutSection, name: 'About' },
  ],
})

createApp(App).use(router).mount('#app')
