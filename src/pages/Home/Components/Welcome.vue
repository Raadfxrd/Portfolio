<template>
  <section class="welcome">
    <div class="welcome-text">
      <h3 class="welcome-gm-ga-ge" :class="{ slideOut: isSlidingOut, slideIn: isSlidingIn }">
        {{ displayedGreeting }}
      </h3>
      <h1 class="welcome-personal">I'm Raadfxrd.</h1>
      <h3
        class="welcome-rotating"
        :class="{ slideUpOut: isTitleSlidingOut, slideUpIn: isTitleSlidingIn }"
      >
        {{ currentTitle }}
      </h3>
      <h3 class="welcome-slogan">Innovating for our success.</h3>
    </div>
    <div class="welcome-img">
      <img class="raadfxrd" src="../../../assets/img/raadfxrd.jpeg" alt="Raadfxrd" />
    </div>
  </section>
</template>

<script lang="ts">
export default {
  name: 'WelcomeComponent',
  data() {
    return {
      displayedGreeting: '',
      fullGreeting: '',
      isSlidingOut: false,
      isSlidingIn: false,
      titles: [
        'Frontend Developer,',
        'Full-Stack Developer,',
        'Web Developer,',
        'Software Engineer,',
        'Creative Technologist,',
      ],
      currentTitleIndex: 0,
      currentTitle: '',
      isTitleSlidingOut: false,
      isTitleSlidingIn: false,
    }
  },
  computed: {
    greeting() {
      const hour = new Date().getHours()
      if (hour < 12) {
        return 'Good morning,'
      } else if (hour < 18) {
        return 'Good afternoon,'
      } else {
        return 'Good evening,'
      }
    },
  },
  watch: {
    greeting(newVal, oldVal) {
      if (newVal !== oldVal) {
        this.slideOutGreeting()
      }
    },
  },
  mounted() {
    this.fullGreeting = this.greeting
    this.displayedGreeting = this.greeting
    this.startGreetingUpdater()
    this.currentTitle = this.titles[this.currentTitleIndex]
    this.startTitleRotation()
  },
  methods: {
    startGreetingUpdater() {
      setInterval(() => {
        this.fullGreeting = this.greeting
      }, 60000) // Check every minute
    },
    slideOutGreeting() {
      this.isSlidingOut = true
      setTimeout(() => {
        this.isSlidingOut = false
        this.displayedGreeting = this.fullGreeting
        this.slideInGreeting()
      }, 500)
    },
    slideInGreeting() {
      this.isSlidingIn = true
      setTimeout(() => {
        this.isSlidingIn = false
      }, 500)
    },
    startTitleRotation() {
      setInterval(() => {
        this.slideUpTitle()
      }, 3000)
    },
    slideUpTitle() {
      this.isTitleSlidingOut = true
      setTimeout(() => {
        this.isTitleSlidingOut = false
        this.updateTitle()
        this.slideDownTitle()
      }, 500)
    },
    slideDownTitle() {
      this.isTitleSlidingIn = true
      setTimeout(() => {
        this.isTitleSlidingIn = false
      }, 500)
    },
    updateTitle() {
      this.currentTitleIndex = (this.currentTitleIndex + 1) % this.titles.length
      this.currentTitle = this.titles[this.currentTitleIndex]
    },
  },
}
</script>

<style scoped>
.welcome {
  display: flex;
  justify-content: center;
  align-items: center;
  height: calc(100vh - 200px);
  opacity: 0;
  animation:
    fadeIn 1s forwards,
    slideUp 1s forwards;
}

.welcome-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  gap: 1rem;
  opacity: 0;
  animation:
    fadeIn 1s forwards 0.5s,
    slideUp 1s forwards 0.5s;
}

.welcome-gm-ga-ge {
  color: var(--color-primary-light);
  white-space: nowrap;
  opacity: 1;
}

.welcome-gm-ga-ge.slideOut {
  animation: slideOut 0.5s forwards;
}

.welcome-gm-ga-ge.slideIn {
  animation: slideIn 0.5s forwards;
}

.welcome-personal {
  font-size: 3rem;
  font-weight: 900;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
  opacity: 0;
  animation:
    fadeIn 1s forwards 1s,
    slideUp 1s forwards 1s;
}

.welcome-rotating {
  color: var(--color-secondary-light);
  opacity: 0;
  animation:
    fadeIn 1s forwards 1s,
    slideUp 1s forwards 1s;
}

.welcome-rotating.slideUpOut {
  animation: slideTitleUpOut 0.5s forwards;
}

.welcome-rotating.slideUpIn {
  animation: slideTitleUpIn 0.5s forwards;
}

.welcome-slogan {
  color: var(--color-primary-light);
  opacity: 0;
  animation:
    fadeIn 1s forwards 2s,
    slideUp 1s forwards 2s;
}

.welcome-img {
  height: 30rem;
  width: 30rem;
  border-radius: 50%;
  border: 5px solid var(--color-secondary-light);
  overflow: hidden;
  opacity: 0;
  animation:
    fadeIn 1s forwards 1s,
    slideUp 1s forwards 1s;
}

.raadfxrd {
  height: 100%;
  width: 100%;
  object-fit: cover;
  object-position: top;
  filter: grayscale(100%);
}

@keyframes fadeIn {
  to {
    opacity: 1;
  }
}

@keyframes slideUp {
  from {
    transform: translateY(20px);
  }
  to {
    transform: translateY(0);
  }
}

@keyframes slideOut {
  from {
    opacity: 1;
    transform: translateY(0);
  }
  to {
    opacity: 0;
    transform: translateY(-100%);
  }
}

@keyframes slideIn {
  from {
    opacity: 0;
    transform: translateY(100%);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideTitleUpOut {
  from {
    opacity: 1;
    transform: translateY(0);
  }
  to {
    opacity: 0;
    transform: translateY(-100%);
  }
}

@keyframes slideTitleUpIn {
  from {
    opacity: 0;
    transform: translateY(100%);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
