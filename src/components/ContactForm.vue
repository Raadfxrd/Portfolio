<script lang="ts">
import { defineComponent } from 'vue'
import axios from 'axios'

export default defineComponent({
  data() {
    return {
      form: { name: '', email: '', countryCode: '', phone: '', message: '', includePhone: false },
      isSubmitting: false,
      countryCodes: [
        { code: '+1', name: 'United States' },
        { code: '+31', name: 'Netherlands' },
        { code: '+44', name: 'United Kingdom' },
      ],
    }
  },
  methods: {
    async handleSubmit() {
      if (
        !this.form.name ||
        !this.form.email ||
        !this.form.message ||
        (this.form.includePhone && (!this.form.countryCode || !this.form.phone))
      ) {
        alert('All fields are required.')
        return
      }

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
      if (!emailRegex.test(this.form.email)) {
        alert('Please enter a valid email address.')
        return
      }

      // Combine country code and phone number if phone number is included
      const fullPhoneNumber = this.form.includePhone
        ? `${this.form.countryCode}${this.form.phone}`
        : ''

      // Proceed with submission
      try {
        const response = await axios.post('https://deelektraman.com/sendEmail.php', {
          ...this.form,
          phone: fullPhoneNumber,
        })
        console.log(response.data)
        alert(response.data.message)
      } catch (error) {
        console.error(error)
        alert('Failed to send email. Please try again.')
      }
    },
  },
})
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

      <label for="countryCode">Country Code</label>
      <select id="countryCode" v-model="form.countryCode" :required="form.includePhone">
        <option value="" disabled>Select your country code</option>
        <option v-for="code in countryCodes" :key="code.code" :value="code.code">
          {{ code.name }} ({{ code.code }})
        </option>
      </select>

      <label for="phone">Phone</label>
      <input
        type="tel"
        id="phone"
        placeholder="XXXXXXXXX"
        v-model="form.phone"
        :required="form.includePhone"
        pattern="\d{9}"
        title="Please enter exactly 9 digits"
      />

      <label for="includePhone">
        <input type="checkbox" id="includePhone" v-model="form.includePhone" />
        Include phone number
      </label>

      <label for="message">Message</label>
      <textarea
        id="message"
        placeholder="Je bericht aan mij..."
        v-model="form.message"
        required
      ></textarea>

      <button type="submit" :disabled="isSubmitting">
        {{ isSubmitting ? 'Sending...' : 'Send' }}
      </button>
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
