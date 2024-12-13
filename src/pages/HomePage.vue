<template>
  <NavSection></NavSection>
  <WelcomeComponent></WelcomeComponent>
  <AboutSection></AboutSection>
  <ProjectSection></ProjectSection>
</template>

<script lang="ts">
import AboutSection from './About/AboutSection.vue'
import WelcomeComponent from './Home/Components/WelcomeComponent.vue'
import NavSection from './Navbar/NavSection.vue'
import ProjectSection from './Projects/components/ProjectSection.vue'

export default {
  name: 'HomePage',
  components: {
    NavSection,
    WelcomeComponent,
    AboutSection,
    ProjectSection,
  },
}
</script>

<style scoped></style>
