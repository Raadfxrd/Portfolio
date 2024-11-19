<script lang="ts">
export default {
  name: 'PortfolioSection',
  data() {
    return {
      photos: [
        { url: 'https://placehold.co/300', alt: 'Electrical panel installation' },
        { url: 'https://placehold.co/300', alt: 'Lighting installation' },
        { url: 'https://placehold.co/300', alt: 'Wiring installation' },
        { url: 'https://placehold.co/300', alt: 'Electrical panel installation' },
        { url: 'https://placehold.co/300', alt: 'Lighting installation' },
        { url: 'https://placehold.co/300', alt: 'Wiring installation' },
        { url: 'https://placehold.co/300', alt: 'Electrical panel installation' },
        { url: 'https://placehold.co/300', alt: 'Lighting installation' },
        { url: 'https://placehold.co/300', alt: 'Wiring installation' },
        { url: 'https://placehold.co/300', alt: 'Electrical panel installation' },
      ],
    }
  },
}
</script>

<template>
  <section class="portfolio">
    <h2>Our Work</h2>
    <div class="gallery">
      <div v-for="(photo, index) in photos" :key="index" class="gallery-item">
        <img :src="photo.url" :alt="photo.alt" />
      </div>
    </div>
  </section>
</template>

<style scoped>
.portfolio {
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
  align-items: center;
}

.gallery {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 1rem;
}

.gallery-item img {
  width: 100%;
  height: auto;
}
</style>
