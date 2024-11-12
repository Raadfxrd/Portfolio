<script lang="ts">
import NavSection from '../NavSection.vue'
import Hero from '../Hero.vue'
import FooterSection from '../FooterSection.vue'

export default {
  name: 'HomePage',
  components: {
    NavSection,
    Hero,
    FooterSection,
  },
}
</script>

<template>
  <NavSection></NavSection>
  <Hero></Hero>
  <FooterSection></FooterSection>
</template>

<style scoped></style>
