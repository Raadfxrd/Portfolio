<script lang="ts">
export default {
  name: 'ServicesSection',
  data() {
    return {
      services: [
        {
          title: 'Wiring & Rewiring',
          description:
            'Safe and efficient wiring solutions for homes and offices. Whether you’re building a new property or upgrading an old one, our experts ensure your wiring meets all safety and performance standards. Rewiring services are tailored to modernize your electrical system while minimizing disruption.',
        },
        {
          title: 'Lighting Installation',
          description:
            'Indoor and outdoor lighting installation for all settings. From elegant home fixtures to robust industrial lighting, we offer customized solutions that enhance functionality and ambiance. Our team specializes in energy-efficient lighting to save you money and reduce environmental impact.',
        },
        {
          title: 'Electrical Panel Installation',
          description:
            'Upgrade your electrical panel for better performance and safety. We provide comprehensive services to replace outdated panels, install new systems, and ensure compatibility with high-demand appliances. Enjoy peace of mind knowing your electrical infrastructure is reliable and secure.',
        },
        {
          title: 'Emergency Repairs',
          description:
            '24/7 emergency electrical repairs for homes and businesses. Our rapid-response team is ready to handle any electrical issue, big or small, ensuring minimal downtime and maximum safety. Trust us to get your systems up and running quickly and effectively.',
        },
        {
          title: 'Maintenance Services',
          description:
            'Regular maintenance to keep your electrical systems running smoothly. Prevent unexpected breakdowns and costly repairs with our routine check-ups and servicing. Our expert team identifies potential issues early to keep your systems in peak condition.',
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
  text-align: center;
}

.services h1 {
  width: 100%;
}

.service-item {
  margin-bottom: 50px;
  max-width: 800px;
  margin: 0 auto;
}

.service-item:last-child {
  padding-bottom: 50px;
  margin-bottom: 0;
}

@media (max-width: 768px) {
  .services {
    padding: 0 20px;
  }

  .service-item {
    margin-bottom: 30px;
  }

  h1 {
    font-size: 2rem;
  }

  h3 {
    font-size: 1.5rem;
  }

  p {
    font-size: 1rem;
  }
}

@media (max-width: 480px) {
  .services {
    padding: 0 10px;
  }

  .service-item {
    margin-bottom: 20px;
  }

  .service-item:last-child {
    padding-bottom: 30px;
    margin-bottom: 0;
  }

  h1 {
    font-size: 1.5rem;
  }

  h3 {
    font-size: 1.25rem;
  }

  p {
    font-size: 0.875rem;
  }
}
</style>
