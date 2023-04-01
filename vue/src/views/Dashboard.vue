<template>
  <pageComponent>
    <div class="my_resumes-container">
      <div class="resumes">
        <div class="cta-createnew-item">
          <div class="cta-createnew__inner">
            <span>Create new resume</span>
          </div>
        </div>

        <div v-for="model in resumes" :key="model.id" class="rez-item">
          <!-- <pre>{{ model.title }}</pre> -->
          <div class="flex-card">
            <a href="#" class="resume-card_link">
              <div v-if="model.template == 'apollo'" class="mainres bg_white">
                <Cv1 :model="model" />
              </div>
              <div
                v-else-if="model.template == 'terra'"
                class="mainres bg_white"
              >
                <Cv2 :model="model" />
              </div>
            </a>
          </div>
          <div class="card-ops">
            <div>{{ model.title }}</div>
            <router-link
              :to="{ name: 'ResumeView', params: { id: model.id } }"
              class="cta-edit"
              ><svg
                width="24"
                height="24"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"
                />
              </svg>
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="main-right">
      <div class="main-right_container">
        <div class="upgrade-cta">
          <span>upgrade</span>
        </div>
      </div>
    </div>
    <div>
      <!-- <pre>{{ resumes.title }}</pre> -->
    </div>
  </pageComponent>
</template>

<script setup>
import pageComponent from "../components/PageComponent.vue";
import Cv1 from "../components/CvTemplates/Cv1.vue";
import Cv2 from "../components/CvTemplates/Cv2.vue";
import { computed } from "vue";
import store from "../store";

const resumes = computed(() => store.state.resumes.data);

store.dispatch("getResumes");
</script>

<style lang="scss"></style>
