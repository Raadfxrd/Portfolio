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
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.logo {
  width: 500px;
  object-fit: cover;
}

@media (max-width: 768px) {
  .hero {
    padding: 0 20px;
  }

  .logo {
    width: 300px;
  }

  h1 {
    font-size: 2rem;
  }

  p {
    font-size: 1rem;
  }
}

@media (max-width: 480px) {
  .hero {
    padding: 0 10px;
  }

  .logo {
    width: 200px;
  }

  h1 {
    font-size: 1.5rem;
  }

  p {
    font-size: 0.875rem;
  }
}
</style>
