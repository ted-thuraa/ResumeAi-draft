<template>
  <div class="app-container">
    <div
      :class="[route.name === 'ResumeBuilder' ? 'collapse' : 'sidebar_wide']"
      class="sidebar"
    >
      <button class="close-menu">
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
          class="feather feather-x"
        >
          <line x1="18" y1="6" x2="6" y2="18" />
          <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </button>
      <div class="logo-expand">
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
          class="feather feather-bar-chart-2"
        >
          <line x1="18" y1="20" x2="18" y2="10" />
          <line x1="12" y1="20" x2="12" y2="4" />
          <line x1="6" y1="20" x2="6" y2="14" />
        </svg>
        <span>Resume.ai</span>
      </div>
      <div class="side-wrapper">
        <div class="side-title">MENU</div>
        <div class="side-menu">
          <router-link
            :to="{ name: 'Dashboard' }"
            class="sidebar-link discover is-active"
          >
            <svg
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
                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
              />
            </svg>

            Dashboard
          </router-link>
          <router-link
            :to="{ name: 'ResumeBuilder' }"
            class="sidebar-link trending"
          >
            <svg
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
                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
              />
            </svg>

            createnew
          </router-link>
          <router-link to="" class="sidebar-link">
            <svg
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
                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
              />
            </svg>

            Samples
          </router-link>
        </div>
      </div>
      <div class="side-wrapper">
        <div class="side-title">CATEGORY</div>
        <div class="side-menu">
          <a class="sidebar-link" href="#">
            <svg
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
                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"
              />
            </svg>
            Logout
          </a>
        </div>
      </div>
    </div>
    <router-view></router-view>
  </div>
</template>

<script setup>
import { useRoute, useRouter } from "vue-router";

const route = useRoute();

const isBuilder = route.name === "ResumeBuilder";
const isview = route.name === "ResumeView";
const isPreview = route.name === "ResumePreview";
const isDashboard = route.name === "Dashboard";
</script>

<style lang="scss">
.app-container {
  max-width: 1400px;
  width: 100%;
  height: 100vh;
  margin: 0 auto;
  display: flex;
  position: relative;
  overflow: hidden;
  background-color: #fbfbfb;

  //flex-direction: column;
  //max-width: 1680px;
}

.app-main {
  flex-grow: 1;
  //padding: 0.5em;
  //height: 100vh;
  //border-bottom-right-radius: 20px;
  //border-bottom-left-radius: 20px;
  //margin-top: 10px;
  //margin-bottom: 10px;
  //border-top-right-radius: 20px;
  //border-top-left-radius: 20px;
  //margin-right: 10px;
  overflow-y: auto;
  overflow-x: hidden;
  background: #fbfbfb;
  //padding: 24px;
  //background: radial-gradient(circle, rgba(5,19,64,1) 1%, rgba(4,15,50,1) 100%);
  &::-webkit-scrollbar {
    display: none;
  }
}

.app-logo {
  display: flex;
  align-items: center;
  color: var(--app-logo);
  margin-right: 16px;
  padding: 0 24px;

  span {
    color: #fff;
    display: inline-block;
    line-height: 24px;
    font-size: 16px;
    margin-left: 16px;
  }
}

ul {
  list-style-type: none;
  padding: 0;
}

a {
  text-decoration: none;
  cursor: pointer;
}

button {
  cursor: pointer;
}

.sidebar {
  //width: 220px;
  height: 100%;
  padding: 30px;
  display: flex;
  flex-direction: column;
  flex-shrink: 0;
  transition-duration: 0.2s;
  overflow-y: auto;
  overflow-x: hidden;
  background: rgb(47, 32, 123);
  background: linear-gradient(
    180deg,
    rgba(47, 32, 123, 1) 0%,
    rgba(88, 67, 160, 1) 100%
  );
  &::-webkit-scrollbar {
    display: none;
  }
  @media screen and (max-width: 1024px) {
    width: 90px;
  }
  .logo {
    display: none;
    width: 30px;
    height: 30px;
    background-color: #22b07d;
    flex-shrink: 0;
    color: #fff;
    align-items: center;
    border-radius: 50%;
    justify-content: center;

    &-expand {
      text-decoration: none;
      color: #fff;
      font-size: 19px;
      font-weight: 600;
      line-height: 34px;
      position: sticky;
      top: 0;
      &:before {
        content: "";
        position: absolute;
        top: -30px;
        left: 0;
        background: var(--theme-bg);
        width: 200px;
        height: 70px;
        z-index: -1;
      }
    }
  }

  &-link {
    &:hover,
    &.is-active {
      color: #fff;
      font-weight: 500;
      //background: #929292;
    }
  }
  &.collapse {
    width: 90px;
    border-right: 1px solid var(--border-color);
    .logo-expand,
    .side-title {
      display: none;
    }
    .logo {
      display: flex;
    }
    .side-wrapper {
      width: 30px;
    }
    .side-menu svg {
      margin-right: 30px;
      width: 30px;
    }
  }
}

.sidebar_wide {
  width: 220px;
}
.sidebar_narrow {
  width: 90px;
}

@keyframes bottom {
  0% {
    transform: translateY(100px);
    opacity: 0;
  }

  100% {
    opacity: 1;
    transform: none;
  }
}

.side-menu {
  display: flex;
  flex-direction: column;
  a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #c7c7c7;
    & + a {
      margin-top: 26px;
    }
  }
  svg {
    width: 30px;
    // padding: 8px;
    border-radius: 10px;
    // background-color: var(--button-bg);
    flex-shrink: 0;
    margin-right: 16px;
    // &:hover {
    //   //
    // }
  }
}

.side-title {
  font-size: 12px;
  letter-spacing: 0.07em;
  margin-bottom: 24px;
  color: #fff;
}

.side-wrapper {
  border-bottom: 1px solid var(--border-color);
  padding: 36px 0;
  width: 145px;
  & + & {
    border-bottom: none;
  }
}

.open-right-area {
  display: none;
  justify-content: center;
  align-items: center;
  border: none;
  background-color: var(--app-bg-dark);
  border-radius: 4px;
  height: 40px;
  width: 40px;
  padding: 0;
}

.main-header-line {
  display: flex;
  align-items: center;
  transition: box-shadow 0.3s;
  flex-shrink: 0;
  padding: 0 40px;
  white-space: nowrap;
  box-shadow: 0 4px 20px rgb(88 99 148 / 10%);
  height: 60px;
  width: 100%;
  font-size: 14px;
  justify-content: space-between;
  position: sticky;
  top: 0;
  left: 0;
  background: rgb(255, 255, 255);
  background: linear-gradient(
    to bottom,
    rgba(255, 255, 255, 1) 0%,
    rgba(238, 238, 238, 1) 500%
  );
  //z-index: 11;
  z-index: 1;
  .app-main-nav {
    color: var(--main-color);
    margin: 0;
    list-style: none;
    display: flex;
    justify-content: space-between;
    //font-size: 24px;
    //line-height: 32px;
    li {
      padding-left: 40px;
    }
  }
}

.action-buttons {
  display: flex;
  align-items: center;
}

.profile-btn {
  padding: 0;
  border: 0;
  background-color: transparent;
  display: flex;
  align-items: center;
  padding-left: 12px;
  border-left: 2px solid #ddd;

  img {
    width: 32px;
    height: 32px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 4px;
  }

  span {
    color: var(--main-color);
    font-size: 16px;
    line-height: 24px;
    font-weight: 500;
  }
}

.menu-button {
  width: 40px;
  height: 40px;
  margin-left: 8px;
  display: none;
  justify-content: center;
  align-items: center;
  padding: 0;
  background-color: var(--app-bg-dark);
  border: none;
  color: var(--main-color);
  border-radius: 4px;
}

.close-menu {
  position: absolute;
  top: 16px;
  right: 16px;
  display: none;
  align-items: center;
  justify-content: center;
  border: none;
  background-color: transparent;
  padding: 0;
  color: var(--main-color);
  cursor: pointer;
}

.logout-btn {
  min-height: 56px;
  padding: 8px 20px 8px 70px;
  display: flex;
  align-items: center;
  background: transparent;
  border: none;
  color: #fff;
  svg {
    padding-right: 5px;
    stroke: white;
    background: transparent;
    width: 36px;
    font-size: 19px;
    margin-left: -50px;
  }
}

/* main content resumes */
.main-content {
  display: flex;
  align-content: flex-start;

  .my_resumes-container {
    position: relative;
    display: block;
    padding: 1rem 1.5rem;
    flex: 80%;
    margin-top: 52px;
    .resumes {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 1rem;
      @media screen and (max-width: 1212px) {
        grid-template-columns: repeat(2, 1fr);
      }
      .cta-createnew-item {
        padding: 1rem;
        position: relative;
        width: 17.5rem;
        .cta-createnew__inner {
          height: 100%;

          min-height: 297px;
          display: -ms-flexbox;
          display: flex;
          -ms-flex-align: center;
          align-items: center;
          -ms-flex-pack: center;
          justify-content: center;
          border: 2px dashed #565656;
          border-radius: 0.25em;
          cursor: pointer;
          padding: 1rem;
          span {
            font-size: 0.7rem;
            color: #565656;
            text-transform: uppercase;
          }
        }
      }
    }
  }

  .rez-item {
    position: relative;
    width: 17.5rem;
    display: block;
  }

  .card-ops {
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
    padding: 0.75rem 1rem;

    background-color: #fff;
    //bottom: 20px;
    .cta-edit {
      display: flex;
      padding-top: 0.5rem /* 8px */;
      padding-bottom: 0.5rem /* 8px */;
      padding-left: 1rem /* 16px */;
      padding-right: 1rem /* 16px */;
      border-width: 1px;
      border-color: transparent;
      font-size: 0.875rem /* 14px */;
      line-height: 1.25rem;
      color: white;
      svg {
        stroke: black;
        margin-right: -27px;
        background: transparent;
        cursor: pointer;
        font-weight: 900;
      }
    }
  }

  /* Resume cards */
  .flex-card {
    position: relative;
    display: block;
    overflow: hidden;
    flex-direction: column;
    padding: 1rem;
    background-color: #f1f6f7;
    border-radius: 10px;
    height: 248px;
    //:hover {
    //    --tw-bg-opacity: 1;
    //    background-color: rgb(249 250 251 / var(--tw-bg-opacity));
    //}
    .resume-card_link {
      text-decoration: none;
      display: block;
      overflow: hidden;
      outline: none;
    }
  }
  .mainres {
    border-radius: 0.25rem;
    box-shadow: 0 0 0.125rem 0 rgb(0 0 0 / 10%);
    min-height: 59.375rem;
    padding: 3rem 3.2rem;
    width: 46.5rem;
    transform: scale(0.34);
    transform-origin: top left;
  }

  .bg_white {
    background: white;
  }

  /* main right content */
  .main-right {
    flex: 20%;
    margin-top: 52px;
    .main-right_container {
      padding: 5px;
      display: block;
      //position: fixed;
      width: 100%;
      height: 100vh;
      .upgrade-cta {
        background: #7f63e6;
        height: 50%;
        width: 220px;
        border-radius: 20px;
        position: fixed;
        span {
          color: white;
          font-size: 1em;
        }
      }
    }
  }
}

@media screen and (max-width: 1350px) {
  .app-right {
    flex-basis: 240px;
    width: 240px;
  }

  .app-left {
    flex-shrink: 0;
  }
}

@media screen and (max-width: 1200px) {
  .app-right {
    position: absolute;
    opacity: 0;
    top: 0;
    z-index: 2;
    height: 100%;
    width: 320px;
    right: -100%;
    box-shadow: 0 0 10px 5px rgba(1, 8, 31, 0.4);

    .close-right {
      position: absolute;
      top: 16px;
      right: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
      background-color: transparent;
      padding: 0;
      color: var(--main-color);
      cursor: pointer;
    }
  }
}

@media screen and (max-width: 920px) {
  .menu-button {
    display: flex;
  }

  .app-left {
    position: absolute;
    opacity: 0;
    top: 0;
    z-index: 2;
    height: 100%;
    width: 320px;
    right: -100%;
    box-shadow: 0 0 10px 5px rgba(1, 8, 31, 0.4);
  }

  .close-menu {
    display: flex;
  }
}

@media screen and (max-width: 520px) {
  .chart-row.two .small {
    flex-direction: column;
  }

  .chart-row.two .small .chart-container {
    width: 100%;

    &.applicants {
      margin-top: 16px;
    }
  }

  .main-header-line h1 {
    font-size: 14px;
  }
}
</style>
