<template>
  <NavSection></NavSection>
  <WelcomeComponent></WelcomeComponent>
</template>

<script lang="ts">
import NavSection from '../Navbar/NavSection.vue'
import WelcomeComponent from '../Home/Components/WelcomeComponent.vue'

export default {
  name: 'HomePage',
  components: {
    NavSection,
    WelcomeComponent,
  },
}
</script>

<style scoped></style>
