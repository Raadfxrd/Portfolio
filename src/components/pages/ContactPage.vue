<script lang="ts">
import NavSection from '../NavSection.vue'
import ContactForm from '../ContactForm.vue'
import FooterSection from '../FooterSection.vue'

export default {
  name: 'HomePage',
  components: {
    NavSection,
    ContactForm,
    FooterSection,
  },
}
</script>

<template>
  <NavSection></NavSection>
  <ContactForm></ContactForm>
  <FooterSection></FooterSection>
</template>

<style scoped></style>
