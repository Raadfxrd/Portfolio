<script lang="ts">
export default {
  name: 'HeroSection',
  props: {
    title: {
      type: String,
      default: 'De Elektraman',
    },
    subtitle: {
      type: String,
      default: 'Experienced, reliable, and ready to help.',
    },
  },
  methods: {
    scrollToContact() {
      this.$emit('scroll-to-contact')
    },
  },
}
</script>

<template>
  <section class="hero">
    <h1>{{ title }}</h1>
    <p>{{ subtitle }}</p>
    <button @click="scrollToContact">Contact Us</button>
  </section>
</template>

<style scoped>
.hero {
  text-align: center;
  padding: 2rem;
}
</style>
