<script lang="ts">
export default {
  name: 'ServicesSection',
  data() {
    return {
      services: [
        {
          title: 'Wiring & Rewiring',
          description: 'Safe and efficient wiring solutions for homes and offices. ',
        },
        {
          title: 'Lighting Installation',
          description: 'Indoor and outdoor lighting installation for all settings.',
        },
        {
          title: 'Electrical Panel Installation',
          description: 'Upgrade your electrical panel for better performance and safety.',
        },
        {
          title: 'Emergency Repairs',
          description: '24/7 emergency electrical repairs for homes and businesses.',
        },
        {
          title: 'Maintenance Services',
          description: 'Regular maintenance to keep your electrical systems running smoothly.',
        },
      ],
    }
  },
}
</script>

<template>
  <section class="services">
    <h1>Services</h1>
    <div v-for="service in services" :key="service.title" class="service-item">
      <h3>{{ service.title }}</h3>
      <p>{{ service.description }}</p>
    </div>
  </section>
</template>

<style scoped>
.services {
  min-height: calc(100vh - 100px);
  object-fit: cover;
  background-color: var(--dark-primary);
  color: var(--light-primary);
  padding: 0 var(--page-padding);
  position: relative;
  z-index: 0;
}

.service-item {
  margin-bottom: 50px;
}

.service-item:last-child {
  margin-bottom: 0;
}
</style>
