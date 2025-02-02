<template>
  <nav>
    <div class="logo" @click="navigateAndScroll('welcome', '/')">
      <span class="logo-r">R</span>
      <span class="logo-rest">aadfxrd</span>
    </div>
    <div class="nav-buttons">
      <a @click="navigateAndScroll('about-section', '/')"> About </a>
      <a @click="navigateAndScroll('project-section', '/')"> Projects </a>
      <a @click="navigateAndScroll('service-section', '/services')"> Services </a>
      <a @click="navigateAndScroll('contact-section', '/')"> Contact </a>
    </div>
  </nav>
</template>

<script lang="ts">
import { defineComponent, nextTick } from 'vue'

export default defineComponent({
  name: 'NavSection',
  methods: {
    scrollToSection(sectionClass: string) {
      // Scroll to the specified section smoothly
      const element = document.querySelector(`.${sectionClass}`)
      if (element) {
        element.scrollIntoView({ behavior: 'smooth' })
      }
    },
    navigateAndScroll(sectionClass: string, route: string) {
      if (this.$route.path !== route) {
        this.$router.push(route).then(() => {
          nextTick(() => {
            this.scrollToSection(sectionClass)
          })
        })
      } else {
        nextTick(() => {
          this.scrollToSection(sectionClass)
        })
      }
    },
  },
})
</script>

<style scoped>
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 2rem 2rem 0 2rem;
  background-color: var(--color-primary-dark);
  position: fixed;
  width: -moz-available;
  z-index: 1;
}

.logo {
  font-size: 2rem;
  overflow: hidden;
  cursor: pointer;
}

.logo:hover .logo-rest {
  transform: translateX(0);
  opacity: 1;
}

.logo-r {
  font-size: 3rem;
  font-weight: 900;
}

.logo-rest {
  display: inline-block;
  transition:
    transform var(--duration) ease-in-out,
    opacity var(--duration) ease-in-out;
  transform: translateX(-100%);
  opacity: 0;
  font-size: 2rem;
}

.nav-buttons {
  display: flex;
  gap: 2rem;
}

.nav-buttons a {
  position: relative;
  text-decoration: none;
  color: inherit;
  cursor: pointer;
}

.nav-buttons a::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: -2px;
  width: 0;
  height: 1px;
  background-color: currentColor;
  transition: width var(--duration) ease;
}

.nav-buttons a:hover::after {
  width: 100%;
}
</style>
