<script lang="ts">
export default {
  name: 'PortfolioSection',
  data() {
    return {
      photos: [
        { url: 'path/to/photo1.jpg', alt: 'Electrical panel installation' },
        { url: 'path/to/photo2.jpg', alt: 'Lighting installation' },
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
  display: flex;
  flex-direction: column;
  align-items: center;
}
.gallery {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}
.gallery-item img {
  width: 100%;
  height: auto;
}
</style>
