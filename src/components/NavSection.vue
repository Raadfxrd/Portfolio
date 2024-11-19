<script lang="ts">
export default {
  name: 'NavSection',
  data() {
    return {
      isMenuOpen: false,
    }
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen
      this.toggleBodyClass()
    },
    toggleBodyClass() {
      if (this.isMenuOpen) {
        document.body.style.overflow = 'hidden'
      } else {
        document.body.style.overflow = 'auto'
      }
    },
    closeMenu() {
      this.isMenuOpen = false
      document.body.style.overflow = 'auto'
    },
  },
}
</script>

<template>
  <nav class="navbar">
    <button class="hamburger" @click="toggleMenu">
      <svg
        :class="['hamburger-svg', { 'is-active': isMenuOpen }]"
        viewBox="0 0 100 100"
        width="30"
        height="30"
      >
        <path class="line line1" d="M 20,29 H 80" />
        <path class="line line2" d="M 20,50 H 80" />
        <path class="line line3" d="M 20,71 H 80" />
      </svg>
    </button>
    <ul :class="['navbar-list', { 'navbar-list--open': isMenuOpen }]">
      <li class="navbar-item"><router-link to="/" @click.native="closeMenu">Home</router-link></li>
      <li class="navbar-item">
        <router-link to="/about" @click.native="closeMenu">About</router-link>
      </li>
      <li class="navbar-item">
        <router-link to="/services" @click.native="closeMenu">Services</router-link>
      </li>
      <li class="navbar-item">
        <router-link to="/contact" @click.native="closeMenu">Contact</router-link>
      </li>
      <li class="navbar-item">
        <router-link to="/portfolio" @click.native="closeMenu">Portfolio</router-link>
      </li>
    </ul>
  </nav>
</template>

<style scoped>
.navbar {
  background-color: var(--dark-secondary);
  overflow: hidden;
  height: 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px;
}

.hamburger {
  display: none;
  background: transparent;
  border: none;
  cursor: pointer;
}

.hamburger-svg {
  fill: none;
  stroke: white;
  stroke-width: 6;
  stroke-linecap: round;
  transition: all 0.3s ease;
}

.line1 {
  transition: transform 0.3s ease;
}

.line2 {
  transition: opacity 0.3s ease;
}

.line3 {
  transition: transform 0.3s ease;
}

.is-active .line1 {
  transform: translateY(0px) translateX(35px) rotate(45deg) scale(1.05, 1);
}

.is-active .line2 {
  opacity: 0;
}

.is-active .line3 {
  transform: translateY(45px) translateX(-35px) rotate(-45deg) scale(1.05, 1);
}

.navbar-list {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  height: 100%;
  width: 100%;
}

.navbar-list--open {
  display: flex;
  flex-direction: column;
  position: absolute;
  top: 50px;
  left: 0;
  width: 100%;
  background-color: var(--dark-secondary);
  z-index: 1;
  height: calc(100vh - 50px);
}

.navbar-item a {
  color: white;
  text-align: center;
  text-decoration: none;
  display: block;
  position: relative;
}

.navbar-item a::after {
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  bottom: -2px;
  height: 2px;
  background-color: white;
  transform: scaleX(0);
  transition: transform 0.3s ease-in-out;
}

.navbar-item a:hover::after {
  transform: scaleX(1);
}

@media (max-width: 768px) {
  .navbar-list {
    display: none;
    flex-direction: column;
    width: 100%;
    background-color: var(--dark-secondary);
    position: absolute;
    top: 50px;
    left: 0;
  }

  .navbar-list.navbar-list--open {
    display: flex;
  }

  .hamburger {
    display: flex;
  }

  .body-change {
    overflow: hidden;
    height: calc(100vh - 50px);
  }
}
</style>
