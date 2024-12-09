<template>
  <div class="tech-stack-container">
    <div class="tech-stack">
      <div class="tech-group" v-for="tech in techStack" :key="tech.title">
        <i :class="tech.class" :title="tech.title"></i>
      </div>
      <div class="tech-group" v-for="tech in techStack" :key="tech.title + '-duplicate'">
        <i :class="tech.class" :title="tech.title"></i>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useTechStack } from '@/composables/useTechStack'

// Get the tech stack data
const { techStack } = useTechStack()
</script>

<style scoped>
.tech-stack-container {
  width: 60%;
  overflow: hidden;
  border-radius: 8px;
  margin: 2rem auto;
  padding: 1.5rem 0;
  position: relative;
  box-shadow: 0 0 20px rgba(1, 1, 1, 0.5);
}

.tech-stack {
  display: flex;
  width: max-content;
  animation: scroll 60s linear infinite;
}

@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}

.tech-group {
  display: flex;
  gap: 3rem;
  padding: 0 1.5rem;
  align-items: center;
}

.tech-stack i {
  font-size: 2.5rem;
  transition: all 0.3s ease;
}

.tech-stack i:hover {
  transform: scale(1.2);
  filter: brightness(1.2);
}
</style>
