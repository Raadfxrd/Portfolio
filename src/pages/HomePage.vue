<template>
  <NavSection></NavSection>
  <WelcomeComponent></WelcomeComponent>
  <AboutSection></AboutSection>
</template>

<script lang="ts">
import AboutSection from './About/AboutSection.vue'
import WelcomeComponent from './Home/Components/WelcomeComponent.vue'
import NavSection from './Navbar/NavSection.vue'

export default {
  name: 'HomePage',
  components: {
    NavSection,
    WelcomeComponent,
    AboutSection,
  },
}
</script>

<style scoped></style>
