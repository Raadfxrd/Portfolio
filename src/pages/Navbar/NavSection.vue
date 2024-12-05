<template>
  <nav>
    <div class="logo" @click="toggleLogo">
      <span class="logo-r">R</span>
      <span class="logo-rest" :class="{ hidden: !isHidden }">aadfxrd</span>
    </div>
    <div class="nav-buttons">
      <a> About </a>
      <a> Projects </a>
      <a> Contact </a>
    </div>
  </nav>
</template>

<script lang="ts">
export default {
  name: 'NavSection',
  data() {
    return {
      isHidden: true,
    }
  },
  methods: {
    toggleLogo() {
      this.isHidden = !this.isHidden
    },
  },
}
</script>

<style scoped>
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 2rem 2rem 0 2rem;
}

.logo {
  font-size: 2rem;
  overflow: hidden;
}

.logo-r {
  font-size: 3rem;
  font-weight: 900;
  cursor: pointer;
}

.logo-rest {
  display: inline-block;
  transition:
    transform 0.3s ease,
    opacity 0.3s ease;
  transform: translateX(-100%);
  opacity: 0;
  font-size: 2rem;
}

.logo-rest.hidden {
  transform: translateX(0);
  opacity: 1;
}

.nav-buttons {
  display: flex;
  gap: 2rem;
}

.nav-buttons a {
  position: relative;
  text-decoration: none;
  color: inherit;
  cursor: pointer;
}

.nav-buttons a::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: -2px;
  width: 0;
  height: 1px;
  background-color: currentColor;
  transition: width 0.3s ease;
}

.nav-buttons a:hover::after {
  width: 100%;
}
</style>
