<script lang="ts">
export default {
  name: 'HeroSection',
}
</script>

<template>
  <section class="hero">
    <h1>De Elektraman</h1>
    <p>Jouw oplossing voor alles in elektra.</p>
    <img class="logo" src="../assets/logo.png" alt="Hero image" />
  </section>
</template>

<style scoped>
.hero {
  min-height: calc(100vh - 100px);
  object-fit: cover;
  background-color: var(--dark-primary);
  color: var(--light-primary);
  padding: 0 var(--page-padding);
  position: relative;
  z-index: 0;
  text-align: center;
}

.logo {
  width: 500px;
  object-fit: cover;
}
</style>
