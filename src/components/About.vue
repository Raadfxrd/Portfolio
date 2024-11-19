<script lang="ts">
export default {
  name: 'AboutSection',
}
</script>

<template>
  <section class="about">
    <h1>About Us</h1>
    <div class="about-p">
      <p>
        Welcome to <strong>De Elektraman</strong>, where we take pride in being more than just
        electricians. We are your <strong>trusted partners</strong> for all things electrical,
        combining expertise, innovation, and dedication to ensure your complete satisfaction.
        Whether it's a small residential project, a large-scale commercial installation, or complex
        industrial electrical work, we're here to make your vision a reality.
      </p>

      <p>
        With <strong>years of hands-on experience</strong>, our team of licensed and certified
        electricians is equipped to handle a wide range of electrical tasks. From
        <strong>simple repairs</strong> to <strong>complete system installations</strong>, we
        approach every project with the same level of precision and care.
      </p>

      <p>
        At <strong>De Elektraman</strong>, we understand that choosing the right electrician is a
        matter of trust and reliability. That's why we are committed to:
      </p>

      <ul>
        <li>
          <strong>Expertise You Can Trust:</strong> Our team stays up to date with the latest
          advancements in electrical technology to deliver the most efficient and reliable
          solutions.
        </li>
        <li>
          <strong>Commitment to Safety:</strong> We adhere to strict safety standards, ensuring that
          every project is completed without compromising the well-being of your home, business, or
          workplace.
        </li>
        <li>
          <strong>Customer-Centric Approach:</strong> We believe in clear communication, timely
          service, and going the extra mile to exceed your expectations.
        </li>
        <li>
          <strong>Comprehensive Solutions:</strong> We tackle everything from troubleshooting and
          repairs to full-scale installations, offering a complete package for your electrical
          needs.
        </li>
      </ul>

      <p>
        When you choose <strong>De Elektraman</strong>, you're choosing a team passionate about
        delivering exceptional results. We use only <strong>top-tier materials</strong> and tools to
        ensure long-lasting solutions. Every project is thoroughly inspected and tested to meet the
        <strong>highest industry standards</strong>.
      </p>

      <p>
        <strong>The De Elektraman Difference:</strong> Our mission is simple: to provide safe,
        efficient, and innovative electrical solutions tailored to your needs. We understand that
        every project is unique, which is why we take the time to listen, assess, and deliver a
        customized solution that fits your requirements and budget.
      </p>

      <p>At De Elektraman:</p>
      <ul>
        <li><em>You're not just a customer; you're part of our family.</em></li>
        <li><em>We don't just fix problems; we create lasting solutions.</em></li>
      </ul>
    </div>
  </section>
</template>

<style scoped>
.about {
  min-height: calc(100vh - 100px);
  object-fit: cover;
  background-color: var(--dark-primary);
  color: var(--light-primary);
  padding: 0 var(--page-padding);
  position: relative;
  z-index: 0;
}
</style>
