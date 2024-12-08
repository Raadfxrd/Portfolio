<template>
  <section class="welcome">
    <div class="welcome-container">
      <div class="welcome-content">
        <div class="welcome-text">
          <h3 class="welcome-gm-ga-ge">{{ greeting }}</h3>
          <h1 class="welcome-personal">I'm Raadfxrd.</h1>
          <h3 class="welcome-rotating" :class="{ fadeOut: isFadingOut, fadeIn: !isFadingOut }">
            {{ currentTitle }}
          </h3>
          <h3 class="welcome-slogan">Innovating for our success.</h3>
        </div>
        <div class="welcome-img">
          <img class="raadfxrd" src="../../../assets/img/raadfxrd.jpeg" alt="Raadfxrd" />
        </div>
      </div>
      <TechStack />
    </div>
  </section>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import { useGreeting } from '@/composables/useGreeting'
import { useRotatingTitles } from '@/composables/useRotatingTitles'
import TechStack from './TechStack.vue'

const { greeting } = useGreeting()
const { currentTitle, isFadingOut, startTitleRotation } = useRotatingTitles()

onMounted(() => {
  startTitleRotation()
})
</script>

<style scoped>
.welcome {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  height: calc(100vh - 80px);
  opacity: 0;
  animation: fadeIn 1s forwards;
}

.welcome-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  max-width: 100vw;
}

.welcome-content {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  gap: 10rem;
  width: 100%;
}

.welcome-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  gap: 1rem;
}

.welcome-gm-ga-ge,
.welcome-personal,
.welcome-slogan {
  color: var(--color-primary-light);
}

.welcome-gm-ga-ge,
.welcome-personal,
.welcome-rotating,
.welcome-slogan {
  opacity: 0;
  animation: fadeIn 1s forwards;
}

.welcome-gm-ga-ge,
.welcome-personal,
.welcome-rotating {
  animation-delay: 0.5s;
}

.welcome-rotating.fadeOut {
  animation: fadeOut 0.5s forwards;
}

.welcome-rotating.fadeIn {
  animation: fadeIn 0.5s forwards;
}

.welcome-slogan {
  animation-delay: 1s;
}

.welcome-img {
  height: 30rem;
  width: 30rem;
  border-radius: 50%;
  border: 5px solid var(--color-secondary-light);
  overflow: hidden;
  opacity: 0;
  animation: fadeIn 1s forwards 1.5s;
}

.raadfxrd {
  height: 100%;
  width: 100%;
  object-fit: cover;
  object-position: top;
  filter: grayscale(100%);
}

@keyframes fadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
</style>
