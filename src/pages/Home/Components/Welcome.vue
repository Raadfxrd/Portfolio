<template>
  <section class="welcome">
    <div class="welcome-text">
      <h3 class="welcome-gm-ga-ge">{{ greeting }}</h3>
      <h1 class="welcome-personal">I'm Raadfxrd.</h1>
      <h3 class="welcome-rotating">Full-Stack developer,</h3>
      <h3 class="welcome-slogan">innovating for mine and your success.</h3>
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
        this.fullGreeting = newVal
        this.displayedGreeting = newVal
      }
    },
  },
  mounted() {
    this.fullGreeting = this.greeting
    this.displayedGreeting = this.greeting
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
  opacity: 0;
  animation:
    fadeIn 1s forwards 0.5s,
    slideUp 1s forwards 0.5s;
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
  opacity: 0;
  animation:
    fadeIn 1s forwards 1.5s,
    slideUp 1s forwards 1.5s;
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
</style>
