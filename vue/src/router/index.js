import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import DefaultDashLayout from "../components/DefaultDashLayout.vue";
import AuthLayout from "../components/AuthLayout.vue";
import ResumeBuilder from "../views/ResumeBuilder.vue";
import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import ResumePreview from "../views/ResumePreview.vue";
import coverletter from "../views/coverletter.vue";
import store from "../store";

const routes = [
  {
    path: "/",
    redirect: "/dashboard",
    name: "Dashboard",
    component: DefaultDashLayout,
    meta: { requiresAuth: true },
    children: [
      { path: "/dashboard", name: "Dashboard", component: Dashboard },

      {
        path: "/resume/builder",
        name: "ResumeBuilder",
        component: ResumeBuilder,
      },
      {
        path: "/resume/:id",
        name: "ResumeView",
        component: ResumeBuilder,
      },
      {
        path: "/resume/preview/:id",
        name: "ResumePreview",
        component: ResumePreview,
      },

      // cover letter
      { path: "/coverletter", name: "CoverLetter", component: coverletter },
    ],
  },
  {
    path: "/auth",
    redirect: "/login",
    name: "Auth",
    component: AuthLayout,
    //meta: { isGuest: true },
    children: [
      {
        path: "/login",
        name: "Login",
        component: Login,
      },
      {
        path: "/register",
        name: "Register",
        component: Register,
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.state.user.token) {
    next({ name: "Login" });
  } else if (store.state.user.token && to.meta.isGuest) {
    next({ name: "Dashboard" });
  } else {
    next();
  }
});

export default router;
