<template>
  <section class="about">
    <div class="about-container">
      <div class="about-content">
        <div class="about-text">
          <h2 class="about-title">About Me</h2>
          <p class="about-description">
            Hi there! I'm a <strong>21-year</strong> old <strong>Polish</strong> student at the
            <strong>Amsterdam University of Applied Sciences (AUAS)</strong>, pursuing a career in
            <strong>Software Engineering</strong>. I'm mostly <strong>self-taught</strong>, with the
            majority of my projects being school-related, but I often challenge myself to create
            personal projects for fun or as gifts for friends and family.
          </p>
          <p class="about-description">
            I also work in the <strong>audiophile industry</strong>, where I sell speakers, explore
            great music, and share fun moments with my colleagues. It's a job that combines my love
            for technology and my passion for high-quality sound.
          </p>
          <p class="about-description">
            When I'm not studying or working, I unwind by <strong>gaming</strong>. You'll often find
            me immersed in <strong>Valorant</strong>, <strong>Minecraft</strong>, or<strong>
              Black Desert Online</strong
            >, though I enjoy exploring a wide variety of games.
          </p>
          <p class="about-description">
            In my downtime, I'm passionate about tinkering with <strong>home tech</strong> and
            experimenting with different <strong>hardware</strong>. I particularly enjoy fine-tuning
            my PC setup and diving into the world of <strong>mechanical keyboards</strong>. The
            design freedom, tactile feel, and satisfying sound of custom keyboards are a
            never-ending fascination for me.
          </p>
          <p class="about-description">
            If you have any questions or just want to reach out, feel free to use the contact
            form—I'd love to hear from you!
          </p>
        </div>
      </div>
      <div class="about-summary">
        <h2 class="about-title">TL;DR</h2>
        <ul class="about-summary-list">
          <li>Birthday: <strong>27th March 2003</strong></li>
          <li>Hometown: <strong>Poland</strong></li>
          <li>
            Education:
            <strong
              >Software Engineering student at Amsterdam University of Applied Sciences
              (AUAS)</strong
            >
          </li>
          <li>
            Professional Experience:
            <strong
              >Currently honing my skills as a self-taught software developer (always
              learning!)</strong
            >
          </li>
          <li>
            Work:
            <strong
              >Sales Associate at Hifi Klubben Rijnstraat, specializing in high-quality audio
              equipment</strong
            >
          </li>
          <li>
            Interests:
            <ul>
              <li>
                Gaming:
                <strong
                  >Avid player of <em>Valorant</em>, <em>Minecraft</em>, <em>Black Desert</em>, and
                  more</strong
                >
              </li>
              <li>
                Tech Enthousiast:
                <strong>Passionate about home technology, PC hardware, and custom setups</strong>
              </li>
              <li>
                Keyboards:
                <strong>A true keyboard aficionado—I love building and customizing them!</strong>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts"></script>

<style scoped>
.about {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  min-height: calc(100vh - 80px);
  opacity: 0;
  animation: fadeIn 1s forwards;
  padding: 2rem;
  box-sizing: border-box;
}

.about-container {
  display: flex;
  flex-direction: row;
  justify-content: center;
  width: 100%;
  max-width: 1200px;
  padding: 2rem;
  gap: 10rem;
}

.about-content {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  flex-direction: column;
  gap: 2rem;
  width: 100%;
}

.about-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  gap: 1rem;
}

.about-title {
  margin: 0;
  font-size: 2rem;
  color: var(--color-primary-light);
}

.about-description {
  margin: 0;
  line-height: 1.5;
}

.about-summary {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  height: 100%;
  width: 100%;
  gap: 1rem;
}

.about-summary-list {
  list-style-type: disc;
  padding-left: 0;
  margin: 0;
}

.about-summary-list li {
  margin-bottom: 1rem;
  line-height: 1.5;
}

.about-summary-list ul {
  list-style-type: disc;
  padding-left: 1.5rem;
  margin-top: 0.5rem;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
</style>
