<template>
  <div class="app-main">
    <div class="main-header-line">
      <ul class="app-main-nav">
        <li>
          <router-link :to="{ name: 'Dashboard' }" class="nav-list-link">
            Resume</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'CoverLetter' }" class="nav-list-link">
            Cover Letter</router-link
          >
        </li>
      </ul>
      <div class="action-buttons">
        <button class="profile-btn">
          <img src="../assets/images/profilesample.jpg" />
          <span>Kaloki C.</span>
        </button>
        <a @click="logout">Logout</a>
        <button class="menu-button">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="feather feather-menu"
          >
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="18" x2="21" y2="18" />
          </svg>
        </button>
      </div>
    </div>
    <div class="main-content">
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "vuex";
import { computed } from "vue";
import { useRouter } from "vue-router";

const store = useStore();
const router = useRouter();

function logout() {
  //commit a mutation in store
  store.dispatch("logout").then(() => {
    router.push({
      name: "Login",
    });
  });
}
</script>

<style></style>
