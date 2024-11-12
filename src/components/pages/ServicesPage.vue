<script lang="ts">
import NavSection from '../NavSection.vue'
import Services from '../Services.vue'
import FooterSection from '../FooterSection.vue'

export default {
  name: 'HomePage',
  components: {
    NavSection,
    Services,
    FooterSection,
  },
}
</script>

<template>
  <NavSection></NavSection>
  <Services></Services>
  <FooterSection></FooterSection>
</template>

<style scoped></style>
