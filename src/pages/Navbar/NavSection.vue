<template>
  <nav>
    <div class="logo">
      <span class="logo-r" @click="goHome">R</span>
      <span class="logo-rest" @click="goHome">aadfxrd</span>
    </div>
    <div class="nav-buttons">
      <a @click="scrollToSection('about')"> About </a>
      <a @click="scrollToSection('project-section')"> Projects </a>
      <a> Contact </a>
    </div>
  </nav>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

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
    goHome() {
      this.$router.push('/')
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
}

.logo {
  font-size: 2rem;
  overflow: hidden;
  cursor: pointer;
  transition: all 0.3s ease;
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
    transform 0.3s ease,
    opacity 0.3s ease;
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
  transition: width 0.3s ease;
}

.nav-buttons a:hover::after {
  width: 100%;
}
</style>
