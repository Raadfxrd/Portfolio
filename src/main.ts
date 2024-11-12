import { createApp } from 'vue'
import App from './App.vue'
import type { Router } from 'vue-router'
import { createRouter, createWebHashHistory } from 'vue-router'
import HomePage from './components/pages/HomePage.vue'
import PortfolioPage from './components/pages/PortfolioPage.vue'
import ContactPage from './components/pages/ContactPage.vue'
import ServicesPage from './components/pages/ServicesPage.vue'
import AboutPage from './components/pages/AboutPage.vue'

const router: Router = createRouter({
  history: createWebHashHistory(),
  routes: [
    { path: '/', component: HomePage, name: 'Home' },
    { path: '/portfolio', component: PortfolioPage, name: 'Portfolio' },
    { path: '/contact', component: ContactPage, name: 'Contact' },
    { path: '/services', component: ServicesPage, name: 'Services' },
    { path: '/about', component: AboutPage, name: 'About' },
  ],
})

createApp(App).use(router).mount('#app')
