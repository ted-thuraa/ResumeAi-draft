import { createStore } from "vuex";
import axiosClient from "../axios";

const tempResumes = [
  {
    id: 100,
    title: "Software Engineering CV",
    slug: "se-resume",
    template: "Apollo",
    country: "Estonia",
    first_name: "Unclaimed",
    last_name: "CV",
    address: "",
    city: "Port Austin",
    state: "MI",
    Zipcode: "+254",
    email: "Unclaimed.cv@domainName.com",
    phone: "(555) 555-5555",

    skills: "Javascript, Python, Linux, C, Software Development, Java, Agile",

    language: "English, french",

    professional_summary: "Proficient software ",

    experiences_data: [
      {
        id: 1,
        job_title: "Software Engineer",
        employer: "Lupus Studios ",
        job_city: " Las Vegas",
        job_state: "Nevada",
        job_country: "US",
        startjob_date: "2023-02-09",
        endjob_date: "2023-02-27",
        description:
          "Automated the testing and deployment processes for a new web application to allow for faster release cycles",
      },
      {
        id: 2,
        job_title: "Driver",
        employer: "Lupus truvks ",
        job_city: " canada",
        job_state: "canada",
        job_country: "US",
        startjob_date: "2023-02-09",
        endjob_date: "2023-02-27",
        description: "Driving the shit outta trucks",
      },
    ],

    education_data: [
      {
        id: 1,
        school_name: "Krebs Mountain College ",
        school_city: " Las Vegas",
        school_state: "Nevada",
        country: "US",
        certification: "Bachelor's Degree in Computer Science",
        startschool_date: "2020-02-09",
        endschool_date: "2022-02-09",
        school_description: "Studied really hard my dawg",
      },
      {
        id: 2,
        school_name: "OXford College ",
        school_city: " Los angels",
        school_state: "california",
        country: "US",
        certification: "Bachelor's Degree in Shiesty",
        startschool_date: "2020-02-09",
        endschool_date: "2022-02-09",
        school_description: "aint learn't shit",
      },
    ],
    links: [
      {
        id: 1,
        label: "",
        url: "",
      },
    ],
    add_section: [
      {
        id: 1,
        title: "",
        description: "",
      },
    ],
  },
  {
    id: 100,
    title: "Software Engineering CV",
    slug: "se-resume",
    template: "Apollo",
    country: "Estonia",
    first_name: "Unclaimed",
    last_name: "CV",
    address: "",
    city: "Port Austin",
    state: "MI",
    Zipcode: "+254",
    email: "Unclaimed.cv@domainName.com",
    phone: "(555) 555-5555",

    skills: "Javascript, Python, Linux, C, Software Development, Java, Agile",

    language: "English, french",

    professional_summary: "Proficient software ",

    experiences_data: [
      {
        id: 1,
        job_title: "Software Engineer",
        employer: "Lupus Studios ",
        job_city: " Las Vegas",
        job_state: "Nevada",
        job_country: "US",
        startjob_date: "2023-02-09",
        endjob_date: "2023-02-27",
        description:
          "Automated the testing and deployment processes for a new web application to allow for faster release cycles",
      },
      {
        id: 2,
        job_title: "Driver",
        employer: "Lupus truvks ",
        job_city: " canada",
        job_state: "canada",
        job_country: "US",
        startjob_date: "2023-02-09",
        endjob_date: "2023-02-27",
        description: "Driving the shit outta trucks",
      },
    ],

    education_data: [
      {
        id: 1,
        school_name: "Krebs Mountain College ",
        school_city: " Las Vegas",
        school_state: "Nevada",
        country: "US",
        certification: "Bachelor's Degree in Computer Science",
        startschool_date: "2020-02-09",
        endschool_date: "2022-02-09",
        school_description: "Studied really hard my dawg",
      },
      {
        id: 2,
        school_name: "OXford College ",
        school_city: " Los angels",
        school_state: "california",
        country: "US",
        certification: "Bachelor's Degree in Shiesty",
        startschool_date: "2020-02-09",
        endschool_date: "2022-02-09",
        school_description: "aint learn't shit",
      },
    ],
    links: [
      {
        id: 1,
        label: "",
        url: "",
      },
    ],
    add_section: [
      {
        id: 1,
        title: "",
        description: "",
      },
    ],
  },
];

const store = createStore({
  state: {
    user: {
      data: {},
      token: "123",
      //token: sessionStorage.getItem("TOKEN"),
    },
    //resumes: [...tempResumes],
    resumes: {
      loading: false,
      //links:[],
      data: [],
    },
    currentResume: {
      loading: false,
      data: {},
    },
  },
  getters: {},
  actions: {
    //get resume
    getResume({ commit }, id) {
      commit("setCurrentResumeLoading", true);
      return axiosClient
        .get(`/resume/${id}`)
        .then((res) => {
          commit("setCurrentResume", res.data);
          commit("setCurrentResumeLoading", false);
          return res;
        })
        .catch((err) => {
          commit("setCurrentResumeLoading", false);
          throw err;
        });
    },

    //get all surveys for current user
    getResumes({ commit }) {
      commit("setResumesLoading", true);
      return axiosClient.get("/resume").then((res) => {
        commit("setResumesLoading", false);
        commit("setResumes", res.data);
        return res;
      });
    },

    //save Resume
    saveResume({ commit }, resume) {
      let response;
      //if id is present were updating else its saving
      if (resume.id) {
        response = axiosClient
          .put(`/resume/${resume.id}`, resume)
          .then((res) => {
            commit("updateResume", res.data);
            return res;
          });
      } else {
        response = axiosClient.post("/resume", resume).then((res) => {
          commit("saveResume", res.data);
          return res;
        });
      }

      return response;
    },

    // commit triggers a mutation
    register({ commit }, user) {
      return axiosClient.post("/register", user).then(({ data }) => {
        commit("setUser", data.user);
        commit("setToken", data.token);
        return data;
      });
    },
    login({ commit }, user) {
      return axiosClient.post("/login", user).then(({ data }) => {
        commit("setUser", data.user);
        commit("setToken", data.token);
        return data;
      });
    },
    logout({ commit }) {
      return axiosClient.post("/logout").then((response) => {
        commit("logout");
        return response;
      });
    },
  },
  mutations: {
    setCurrentResume: (state, resume) => {
      state.currentResume.data = resume.data;
    },
    setCurrentResumeLoading: (state, loading) => {
      state.currentResume.loading = loading;
    },

    saveResume: (state, resume) => {
      state.resumes.data = [...state.resumes.data, resume.data];
    },
    updateResume: (state, resume) => {
      state.resumes.data = state.resumes.map((s) => {
        if (r.id == resume.data.id) {
          return resume.data;
        }
        return r;
      });
    },
    logout: (state) => {
      state.user.data = {};
      state.user.token = null;
      sessionStorage.setItem("TOKEN", null);
    },
    setResumes: (state, resumes) => {
      state.resumes.data = resumes.data;
      //state.resumes.links = resumes.meta.links;
    },
    setResumesLoading: (state, loading) => {
      state.resumes.loading = loading;
    },
    setUser: (state, user) => {
      state.user.data = user;
    },
    setToken: (state, token) => {
      state.user.token = token;
      sessionStorage.setItem("TOKEN", token);
    },
  },
  modules: {},
});

export default store;
