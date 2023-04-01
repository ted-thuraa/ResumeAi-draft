import axios from "axios";
import store from "./store";

const axiosClient = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
});

// on every request the auth token will be passed
axiosClient.interceptors.request.use((config) => {
  config.headers.authorization = `Bearer ${store.state.user.token}`;
  return config;
});

export default axiosClient;
