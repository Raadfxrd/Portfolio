<script lang="ts">
import NavSection from '../NavSection.vue'
import Portfolio from '../Portfolio.vue'
import FooterSection from '../FooterSection.vue'

export default {
  name: 'HomePage',
  components: {
    NavSection,
    Portfolio,
    FooterSection,
  },
}
</script>

<template>
  <NavSection></NavSection>
  <Portfolio></Portfolio>
  <FooterSection></FooterSection>
</template>

<style scoped></style>
