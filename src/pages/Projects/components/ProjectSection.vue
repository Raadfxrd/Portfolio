<template>
  <section class="project-section">
    <h2>My Projects</h2>
    <div class="projects">
      <div
        v-for="project in paginatedProjects"
        :key="project.id"
        class="project"
        @click="goToProjectDetail(project)"
      >
        <img :src="project.thumbnail || project.owner.avatar_url" :alt="project.name" />
        <h3>{{ project.name }}</h3>
        <p class="description">{{ project.description }}</p>
      </div>
    </div>
    <div class="pagination">
      <div class="dots">
        <span
          v-for="page in totalPages"
          :key="page"
          :class="{ active: currentPage === page }"
          class="dot"
          @click="goToPage(page)"
        ></span>
      </div>
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
    ownProjects() {
      return this.projects.filter((project) => !project.name.includes('-school'))
    },
    schoolProjects() {
      return this.projects.filter((project) => project.name.includes('-school'))
    },
    combinedProjects() {
      return [...this.ownProjects, ...this.schoolProjects]
    },
    totalPages() {
      return Math.ceil(this.combinedProjects.length / this.projectsPerPage)
    },
    paginatedProjects() {
      const start = (this.currentPage - 1) * this.projectsPerPage
      const end = start + this.projectsPerPage
      return this.combinedProjects.slice(start, end)
    },
  },
  mounted() {
    this.fetchProjects()
  },
  methods: {
    async fetchProjects() {
      try {
        const response = await axios.get('https://api.github.com/users/Raadfxrd/repos')
        const projects = response.data

        for (const project of projects) {
          try {
            const readmeResponse = await axios.get(
              `https://api.github.com/repos/Raadfxrd/${project.name}/readme`,
              {
                headers: { Accept: 'application/vnd.github.v3.raw' },
              },
            )
            const readmeContent = readmeResponse.data
            const thumbnailMatch = readmeContent.match(/!\[.*\]\((.*)\)/)
            project.thumbnail = thumbnailMatch ? thumbnailMatch[1] : null
          } catch (error) {
            console.error(`Error fetching README for ${project.name}:`, error)
            project.thumbnail = null
          }
        }

        this.projects = projects
      } catch (error) {
        console.error('Error fetching projects:', error)
      }
    },
    goToPage(page: number) {
      this.currentPage = page
    },
    goToProjectDetail(project) {
      this.$router.push({ name: 'ProjectDetail', params: { projectId: project.name } })
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
  margin-bottom: 50px;
}

.project-section h2 {
  margin-bottom: 30px;
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
  transition:
    transform 0.3s ease,
    box-shadow 0.3s ease;
  cursor: pointer;
  height: 300px;
}

.project:hover {
  transform: translateY(-10px);
  box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3);
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

.project .description {
  margin: 10px 0;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
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
  align-items: center;
  width: 100px;
  margin-top: 20px;
  padding: 10px;
  border-radius: 10px;
  box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.3);
}

.pagination .dots {
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  width: 100%;
}

.pagination .dot {
  width: 10px;
  height: 10px;
  margin: 0 5px;
  border-radius: 50%;
  background-color: var(--color-secondary-dark);
  transition: background-color 0.3s ease;
  cursor: pointer;
}

.pagination .dot.active {
  background-color: var(--color-secondary-light);
}
</style>
