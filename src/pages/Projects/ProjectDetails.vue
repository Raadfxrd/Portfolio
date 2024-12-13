<template>
  <NavSection></NavSection>
  <section class="project-detail" v-if="project">
    <div class="content-container">
      <div class="image-and-description">
        <div class="image-container">
          <img :src="project.thumbnail || project.owner.avatar_url" :alt="project.name" />
          <div class="avatar-bubble">
            <img :src="project.owner.avatar_url" alt="Owner Avatar" />
          </div>
        </div>
        <h2>{{ project.name }}</h2>
        <p>{{ project.description }}</p>
        <a :href="project.html_url" target="_blank">View on GitHub</a>
      </div>
      <div class="sidebar">
        <ul class="project-stats">
          <li><strong>Stars:</strong> {{ project.stargazers_count }}</li>
          <li><strong>Forks:</strong> {{ project.forks_count }}</li>
          <li><strong>Open Issues:</strong> {{ project.open_issues_count }}</li>
          <li><strong>Primary Language:</strong> {{ project.language }}</li>
          <li><strong>Commits:</strong> {{ commitsCount }}</li>
          <li><strong>Last Updated:</strong> {{ formatDate(project.updated_at) }}</li>
        </ul>
      </div>
    </div>
  </section>
  <section class="error" v-else>
    <h2>Project Not Found</h2>
    <p>The project you are looking for does not exist.</p>
  </section>
</template>

<script lang="ts">
import axios from 'axios'
import { defineComponent } from 'vue'
import NavSection from '../Navbar/NavSection.vue'

const GITHUB_TOKEN = import.meta.env.VITE_APP_GITHUB_TOKEN

export default defineComponent({
  name: 'ProjectDetail',
  components: {
    NavSection,
  },
  data() {
    return {
      project: null,
      commitsCount: 0,
    }
  },
  methods: {
    formatDate(dateString: string) {
      const date = new Date(dateString)
      return `${date.toLocaleDateString()} at ${date.toLocaleTimeString()}`
    },
  },
  async created() {
    const projectId = this.$route.params.projectId
    try {
      console.log('Fetching project:', projectId)
      const response = await axios.get(`https://api.github.com/repos/Raadfxrd/${projectId}`, {
        headers: {
          Authorization: `token ${GITHUB_TOKEN}`,
        },
      })
      console.log('Project response:', response)
      this.project = response.data

      try {
        console.log('Fetching README for project:', this.project.name)
        const readmeResponse = await axios.get(
          `https://api.github.com/repos/Raadfxrd/${this.project.name}/readme`,
          {
            headers: {
              Accept: 'application/vnd.github.v3.raw',
              Authorization: `token ${GITHUB_TOKEN}`,
            },
          },
        )
        const readmeContent = readmeResponse.data
        const thumbnailMatch = readmeContent.match(/!\[.*\]\((.*)\)/)
        this.project.thumbnail = thumbnailMatch ? thumbnailMatch[1] : null
      } catch (error) {
        console.error('Error fetching README:', error)
      }

      try {
        console.log('Fetching commits for project:', this.project.name)
        const commitsResponse = await axios.get(
          `https://api.github.com/repos/Raadfxrd/${this.project.name}/commits`,
          {
            headers: {
              Authorization: `token ${GITHUB_TOKEN}`,
            },
          },
        )
        this.commitsCount = commitsResponse.data.length
      } catch (error) {
        console.error('Error fetching commits:', error)
      }
    } catch (error) {
      console.error('Error fetching project:', error)
    }
  },
})
</script>

<style scoped>
.project-detail {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
}

.content-container {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  width: 100%;
  max-width: 1200px;
  position: relative;
}

.image-and-description {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 70%;
}

.image-container {
  position: relative;
  width: 100%;
  max-width: 600px;
  margin-bottom: 20px;
}

.project-detail img {
  width: 100%;
  border-radius: 20px;
}

.avatar-bubble {
  position: absolute;
  bottom: 10px;
  right: 10px;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  overflow: hidden;
  border: 2px solid var(--color-primary-light);
  background-color: var(--color-primary-dark);
}

.avatar-bubble img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.sidebar {
  position: fixed;
  top: 0;
  right: 0;
  width: 150px;
  height: 100vh;
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  z-index: -1;
}

.project-detail h2 {
  margin-bottom: 20px;
  color: var(--primary-color);
}

.project-detail p {
  margin-bottom: 20px;
  width: 600px;
}

.project-stats {
  list-style: none;
  padding: 0;
  margin-bottom: 20px;
}

.project-stats li {
  margin-bottom: 10px;
}

.project-detail a {
  color: var(--color-secondary-light);
  text-decoration: none;
}

.project-detail a:hover {
  text-decoration: underline;
}

.error {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
}

.error h2 {
  margin-bottom: 20px;
  color: var(--primary-color);
}

.error p {
  margin-bottom: 20px;
}
</style>
