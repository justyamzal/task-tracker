import { defineStore } from "pinia";
import { api } from "../lib/api";

type User = { id: number; name: string; email: string; is_admin: boolean };

export const useAuthStore = defineStore("auth", {
  state: () => ({
    user: null as User | null,
    token: localStorage.getItem("token") || "",
  }),
  getters: {
    isAuthed: (s) => !!s.token,
  },
  actions: {
    async login(email: string, password: string) {
      const res = await api.post("/auth/login", { email, password });
      this.token = res.data.token;
      this.user = res.data.user;
      localStorage.setItem("token", this.token);
    },
    async logout() {
      try { await api.post("/auth/logout"); } catch {}
      this.token = "";
      this.user = null;
      localStorage.removeItem("token");
    },
  },
});