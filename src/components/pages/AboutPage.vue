<script lang="ts">
import NavSection from '../NavSection.vue'
import About from '../About.vue'
import FooterSection from '../FooterSection.vue'

export default {
  name: 'HomePage',
  components: {
    NavSection,
    About,
    FooterSection,
  },
}
</script>

<template>
  <NavSection></NavSection>
  <About></About>
  <FooterSection></FooterSection>
</template>

<style scoped></style>
