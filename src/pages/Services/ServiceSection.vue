<template>
  <div>
    <NavSection />
    <section class="service-section">
      <h2>Services</h2>
      <div class="service-container">
        <div class="service">
          <h3>Web Development</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt, nunc nec
            ultricies bibendum, nunc nunc ultricies bibendum, nunc nunc ultricies
          </p>
        </div>
        <div class="service">
          <h3>Mobile Development</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt, nunc nec
            ultricies bibendum, nunc nunc ultricies bibendum, nunc nunc ultricies
          </p>
        </div>
      </div>
    </section>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import NavSection from '@/pages/Navbar/NavSection.vue'

export default defineComponent({
  name: 'ServiceSection',
  components: {
    NavSection,
  },
})
</script>
