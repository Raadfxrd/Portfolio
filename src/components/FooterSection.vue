<script lang="ts">
export default {
  name: 'FooterSection',
}
</script>

<template>
  <footer class="footer">
    <p class="footer-text">&copy; 2024 De Elektraman. Alle rechten voorbehouden.</p>
  </footer>
</template>

<style scoped>
.footer {
  background-color: var(--dark-secondary);
  height: 50px;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
}

.footer-text {
  padding-bottom: 0 !important;
}
</style>
