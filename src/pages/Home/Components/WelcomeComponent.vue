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
      <div class="tech-stack-container">
        <div class="tech-stack">
          <div class="tech-group">
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
          <div class="tech-group">
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

.welcome-img {
  height: 30rem;
  width: 30rem;
  border-radius: 50%;
  border: 5px solid var(--color-secondary-light);
  overflow: hidden;
  opacity: 0;
  animation: fadeIn 1s forwards 1.5s;
}

.welcome-slogan {
  animation-delay: 1s;
}

.raadfxrd {
  height: 100%;
  width: 100%;
  object-fit: cover;
  object-position: top;
  filter: grayscale(100%);
}

.tech-stack-container {
  width: 40%;
  overflow: hidden;
  border-radius: 8px;
  margin: 2rem auto;
  padding: 1.5rem 0;
  position: relative;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Left fade mask */
.tech-stack-container::before,
.tech-stack-container::after {
  content: '';
  position: absolute;
  top: 0;
  width: 150px;
  height: 100%;
  z-index: 2;
}

.tech-stack {
  display: flex;
  width: max-content;
  animation: scroll 40s linear infinite;
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

.welcome-rotating.fadeOut {
  animation: fadeOut 0.5s forwards;
}

.welcome-rotating.fadeIn {
  animation: fadeIn 0.5s forwards;
}

/* Tech Stack Icons color overrides */
.devicon-html5-plain {
  color: #e34f26;
}
.devicon-css3-plain {
  color: #1572b6;
}
.devicon-javascript-plain {
  color: #f7df1e;
}
.devicon-typescript-plain {
  color: #3178c6;
}
.devicon-nodejs-plain {
  color: #339933;
}
.devicon-mysql-plain {
  color: #4479a1;
}
.devicon-github-original {
  color: #181717;
}
.devicon-gitlab-plain {
  color: #fc6d26;
}
.devicon-figma-plain {
  color: #f24e1e;
}
.devicon-photoshop-plain {
  color: #31a8ff;
}
.devicon-aftereffects-plain {
  color: #9999ff;
}
.devicon-premierepro-plain {
  color: #9999ff;
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
