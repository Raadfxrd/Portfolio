<script lang="ts">
export default {
  name: 'ServicesSection',
  data() {
    return {
      services: [
        {
          title: 'Wiring & Rewiring',
          description: 'Safe and efficient wiring solutions for homes and offices.',
        },
        {
          title: 'Lighting Installation',
          description: 'Indoor and outdoor lighting installation for all settings.',
        },
      ],
    }
  },
}
</script>

<template>
  <section class="services">
    <h2>Services</h2>
    <div v-for="service in services" :key="service.title" class="service-item">
      <h3>{{ service.title }}</h3>
      <p>{{ service.description }}</p>
    </div>
  </section>
</template>

<style scoped>
.services {
  padding: 2rem;
}
.service-item {
  margin-bottom: 1rem;
}
</style>
