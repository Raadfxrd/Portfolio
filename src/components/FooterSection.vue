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
  padding: 0 20px;
}

.footer-text {
  padding-bottom: 0 !important;
  font-size: 14px;
}

@media (max-width: 768px) {
  .footer {
    height: auto;
    padding: 10px 20px;
  }

  .footer-text {
    font-size: 12px;
  }
}

@media (max-width: 480px) {
  .footer {
    height: 20px;
    padding: 15px 10px;
  }

  .footer-text {
    font-size: 10px;
  }
}
</style>
