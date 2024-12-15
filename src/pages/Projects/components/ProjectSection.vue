<template>
  <section class="project-section" ref="projectSection">
    <h2>My Projects</h2>
    <transition-group name="fade" tag="div" class="projects">
      <div
        v-for="project in paginatedProjects"
        :key="project.id"
        class="project"
        @click="goToProjectDetail(project)"
      >
        <img
          class="project-img"
          :src="project.thumbnail || project.owner.avatar_url"
          :alt="project.name"
        />
        <h3>{{ project.name }}</h3>
        <p class="description">{{ project.description }}</p>
      </div>
    </transition-group>
    <div v-if="!loading" class="pagination">
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
    <div v-if="loading" class="loader"></div>
  </section>
</template>

<script lang="ts">
import axios from 'axios'
import { defineComponent, nextTick } from 'vue'

const GITHUB_TOKEN = import.meta.env.VITE_APP_GITHUB_TOKEN

export default defineComponent({
  name: 'ProjectSection',
  data() {
    return {
      projects: [],
      currentPage: 1,
      projectsPerPage: 4,
      loading: false,
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
    paginatedProjects() {
      const start = (this.currentPage - 1) * this.projectsPerPage
      const end = start + this.projectsPerPage
      return this.combinedProjects.slice(start, end)
    },
    totalPages() {
      return Math.ceil(this.combinedProjects.length / this.projectsPerPage)
    },
  },
  methods: {
    async fetchProjects() {
      this.loading = true
      try {
        const response = await axios.get('https://api.github.com/users/Raadfxrd/repos')
        const projects = response.data

        for (const project of projects) {
          try {
            const readmeResponse = await axios.get(
              `https://api.github.com/repos/Raadfxrd/${project.name}/readme`,
              {
                headers: {
                  Accept: 'application/vnd.github.v3.raw',
                  Authorization: `token ${GITHUB_TOKEN}`,
                },
              },
            )

            const readmeContent = readmeResponse.data
            // Use regex to find all markdown images
            const imageMatches = [...readmeContent.matchAll(/!\[.*?\]\((.*?)\)/g)]
            // Use the first match if available
            project.thumbnail = imageMatches.length > 0 ? imageMatches[0][1] : null
          } catch (error) {
            console.error(`Error fetching README for ${project.name}:`, error)
            project.thumbnail = null
          }
        }

        this.projects = projects
      } catch (error) {
        console.error('Error fetching projects:', error)
      } finally {
        this.loading = false
      }
    },
    goToPage(page: number) {
      this.currentPage = page
      nextTick(() => {
        const projectSection = this.$refs.projectSection as HTMLElement
        const sectionRect = projectSection.getBoundingClientRect()
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop
        const sectionTop = sectionRect.top + scrollTop
        const sectionMiddle = sectionTop + sectionRect.height / 2 - window.innerHeight / 2
        window.scrollTo({ top: sectionMiddle, behavior: 'smooth' })
      })
    },
    goToProjectDetail(project) {
      this.$router.push({ name: 'ProjectDetail', params: { projectId: project.name } })
    },
  },
  async created() {
    await this.fetchProjects()
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
  height: calc(100vh - 40px);
  width: 100vw;
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
  transition: transform 0.3s ease;
  cursor: pointer;
  height: 250px;
}

.project:hover {
  transform: scale(1.05);
}

.project-img {
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
  margin-top: 20px;
  width: 100px;
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

/* Spinner styles */
.loader {
  transform: rotateZ(45deg);
  perspective: 1000px;
  border-radius: 50%;
  width: 48px;
  height: 48px;
  color: var(--color-secondary-light);
}

.loader:before,
.loader:after {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: inherit;
  height: inherit;
  border-radius: 50%;
  transform: rotateX(70deg);
  animation: 1s spin linear infinite;
}

.loader:after {
  color: var(--color-primary-light);
  transform: rotateY(70deg);
  animation-delay: 0.4s;
}

@keyframes rotate {
  0% {
    transform: translate(-50%, -50%) rotateZ(0deg);
  }
  100% {
    transform: translate(-50%, -50%) rotateZ(360deg);
  }
}

@keyframes rotateccw {
  0% {
    transform: translate(-50%, -50%) rotate(0deg);
  }
  100% {
    transform: translate(-50%, -50%) rotate(-360deg);
  }
}

@keyframes spin {
  0%,
  100% {
    box-shadow: 0.2em 0px 0 0px currentcolor;
  }
  12% {
    box-shadow: 0.2em 0.2em 0 0 currentcolor;
  }
  25% {
    box-shadow: 0 0.2em 0 0px currentcolor;
  }
  37% {
    box-shadow: -0.2em 0.2em 0 0 currentcolor;
  }
  50% {
    box-shadow: -0.2em 0 0 0 currentcolor;
  }
  62% {
    box-shadow: -0.2em -0.2em 0 0 currentcolor;
  }
  75% {
    box-shadow: 0px -0.2em 0 0 currentcolor;
  }
  87% {
    box-shadow: 0.2em -0.2em 0 0 currentcolor;
  }
}

/* Transition classes for fade effect */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 1s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
