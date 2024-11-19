<script lang="ts">
export default {
  name: 'ContactFormSection',
  data() {
    return {
      form: {
        name: '',
        email: '',
        message: '',
      },
    }
  },
  methods: {
    handleSubmit() {
      console.log('Form submitted', this.form)
    },
  },
}
</script>

<template>
  <section class="contact-form">
    <h2>Contact Us</h2>
    <form @submit.prevent="handleSubmit">
      <label for="name">Name</label>
      <input type="text" id="name" placeholder="Voornaam Achternaam" v-model="form.name" required />

      <label for="email">Email</label>
      <input
        type="email"
        id="email"
        placeholder="voornaam@email.nl"
        v-model="form.email"
        required
      />

      <label for="message">Message</label>
      <textarea
        id="message"
        placeholder="Je bericht aan mij..."
        v-model="form.message"
        required
      ></textarea>

      <button type="submit">Send</button>
    </form>
  </section>
</template>

<style scoped>
.contact-form {
  min-height: calc(100vh - 100px);
  object-fit: cover;
  background-color: var(--dark-primary);
  color: var(--light-primary);
  padding: 0 var(--page-padding);
  position: relative;
  z-index: 0;
  text-align: center;
}

form {
  display: grid;
  grid-template-columns: 1fr;
  gap: 10px;
  max-width: 500px;
  margin: 0 auto;
}
</style>
