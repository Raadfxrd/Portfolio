<script lang="ts">
export default {
  name: 'PortfolioSection',
  data() {
    return {
      photos: [
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

.portfolio h2 {
  width: 100%;
  margin-bottom: 50px;
}

.gallery {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 1rem;
}

.gallery-item {
  flex: 1 1 calc(33.333% - 1rem);
  max-width: calc(33.333% - 1rem);
}

.gallery-item:last-child {
  padding-bottom: 50px;
}

.gallery-item img {
  width: 100%;
  height: auto;
}

@media (max-width: 768px) {
  .portfolio {
    padding: 0 20px;
  }

  .gallery-item {
    flex: 1 1 calc(50% - 1rem);
    max-width: calc(50% - 1rem);
  }
}

@media (max-width: 480px) {
  .portfolio {
    padding: 0 10px;
  }

  .gallery-item {
    flex: 1 1 100%;
    max-width: 100%;
  }
}
</style>
