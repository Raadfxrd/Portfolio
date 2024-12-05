<template>
  <section class="welcome">
    <div class="welcome-text">
      <h3 class="welcome-gm-ga-ge">Good morning,</h3>
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
}
</script>

<style>
.welcome {
  display: flex;
  justify-content: center;
  align-items: center;
  height: calc(100vh - 200px);
}

.welcome-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  gap: 1rem;
}

.welcome-gm-ga-ge {
  color: var(--color-primary-light);
}

.welcome-personal {
  font-size: 3rem;
  font-weight: 900;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
}

.welcome-slogan {
  color: var(--color-primary-light);
}

.welcome-img {
  height: 30rem;
  width: 30rem;
  border-radius: 50%;
  border: 5px solid var(--color-secondary-light);
  overflow: hidden;
}

.raadfxrd {
  height: 30rem;
  width: 30rem;
  border-radius: 50%;
  object-fit: cover;
  object-position: top;
  filter: grayscale(100%);
  transform: scale(1.8);
  transform-origin: top;
}
</style>
