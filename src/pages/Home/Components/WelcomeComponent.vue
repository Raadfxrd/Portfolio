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
      <div class="tech-stack">
        <i class="devicon-html5-plain" title="HTML5"></i>
        <i class="devicon-css3-plain" title="CSS3"></i>
        <i class="devicon-javascript-plain" title="JavaScript"></i>
        <i class="devicon-typescript-plain" title="TypeScript"></i>
        <i class="devicon-nodejs-plain" title="Node.js"></i>
        <i class="devicon-mysql-plain" title="MySQL"></i>
        <i class="devicon-github-original" title="GitHub"></i>
        <i class="devicon-gitlab-plain" title="GitLab"></i>
        <i class="devicon-figma-plain" title="Figma"></i>
        <i class="devicon-photoshop-plain" title="Adobe Photoshop"></i>
        <i class="devicon-aftereffects-plain" title="Adobe After Effects"></i>
        <i class="devicon-premierepro-plain" title="Adobe Premiere Pro"></i>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import { useGreeting } from '@/composables/useGreeting'
import { useRotatingTitles } from '@/composables/useRotatingTitles'

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
  height: calc(100vh - 160px);
  opacity: 0;
  animation: fadeIn 1s forwards;
}

.welcome-content {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  gap: 2rem;
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

.tech-stack {
  display: flex;
  gap: 1rem;
  justify-content: center;
  align-items: center;
  margin-top: 2rem;
  padding: 1rem 2rem;
  width: 100%;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 8px;
}

.tech-stack i {
  font-size: 2.5rem;
  transition: transform 0.2s ease-in-out;
}

.tech-stack i:hover {
  transform: scale(1.2);
}

.welcome-rotating.fadeOut {
  animation: fadeOut 0.5s forwards;
}

.welcome-rotating.fadeIn {
  animation: fadeIn 0.5s forwards;
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
