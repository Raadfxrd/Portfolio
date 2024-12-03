import { createApp } from 'vue'
import App from './App.vue'
import type { Router } from 'vue-router'
import { createRouter, createWebHashHistory } from 'vue-router'
import HomePage from './pages/Home/HomePage.vue'

const router: Router = createRouter({
  history: createWebHashHistory(),
  routes: [{ path: '/', component: HomePage, name: 'Home' }],
})

createApp(App).use(router).mount('#app')
