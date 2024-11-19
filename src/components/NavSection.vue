<script lang="ts">
export default {
  name: 'NavSection',
}
</script>

<template>
  <nav class="navbar">
    <ul class="navbar-list">
      <li class="navbar-item"><router-link to="/">Home</router-link></li>
      <li class="navbar-item"><router-link to="/about">About</router-link></li>
      <li class="navbar-item"><router-link to="/services">Services</router-link></li>
      <li class="navbar-item"><router-link to="/contact">Contact</router-link></li>
      <li class="navbar-item"><router-link to="/portfolio">Portfolio</router-link></li>
    </ul>
  </nav>
</template>

<style scoped>
.navbar {
  background-color: var(--dark-secondary);
  overflow: hidden;
  height: 50px;
}

.navbar-list {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.navbar-item {
  padding: 14px 20px;
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
</style>
