<template>
  <section class="project-section">
    <h2>My Projects</h2>
    <div class="projects">
      <div v-for="project in paginatedProjects" :key="project.id" class="project">
        <img :src="project.owner.avatar_url" :alt="project.name" />
        <h3>{{ project.name }}</h3>
        <p>{{ project.description }}</p>
        <a :href="project.html_url" target="_blank">View on GitHub</a>
      </div>
    </div>
    <div class="pagination">
      <button @click="prevPage" :disabled="currentPage === 1">Previous</button>
      <button @click="nextPage" :disabled="currentPage === totalPages">Next</button>
    </div>
  </section>
</template>

<script lang="ts">
import axios from 'axios'
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'ProjectSection',
  data() {
    return {
      projects: [],
      currentPage: 1,
      projectsPerPage: 4,
    }
  },
  computed: {
    filteredProjects() {
      return this.projects.filter((project) => project.name.includes('-school'))
    },
    totalPages() {
      return Math.ceil(this.filteredProjects.length / this.projectsPerPage)
    },
    paginatedProjects() {
      const start = (this.currentPage - 1) * this.projectsPerPage
      const end = start + this.projectsPerPage
      return this.filteredProjects.slice(start, end)
    },
  },
  mounted() {
    this.fetchProjects()
  },
  methods: {
    async fetchProjects() {
      try {
        const response = await axios.get('https://api.github.com/users/Raadfxrd/repos')
        this.projects = response.data
      } catch (error) {
        console.error('Error fetching projects:', error)
      }
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++
      }
    },
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage--
      }
    },
  },
})
</script>

<style scoped>
.project-section {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  animation: fadeIn 1s forwards;
  height: 100vh;
  width: 100vw;
}

.project-section h2 {
  margin-bottom: 50px;
  color: var(--primary-color);
}

.projects {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px 20px;
  width: 60%;
}

.project {
  padding: 20px;
  margin: 10px;
  border-radius: 20px;
  box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.3);
  display: flex;
  flex-direction: column;
}

.project img {
  width: 100%;
  border-radius: 20px;
  object-fit: cover;
  max-height: 150px;
  margin-bottom: 20px;
}

.project h3 {
  margin-bottom: 10px;
  color: var(--primary-color);
}

.project p {
  margin: 10px 0;
}

.project a {
  color: #007bff;
  text-decoration: none;
}

.project a:hover {
  text-decoration: underline;
}

.pagination {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.pagination button {
  margin: 0 10px;
  padding: 10px 20px;
  border: none;
  background-color: var(--primary-color);
  color: white;
  cursor: pointer;
}

.pagination button:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}
</style>
