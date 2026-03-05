import { mount } from "@vue/test-utils";
import { createMemoryHistory, createRouter } from "vue-router";
import { describe, expect, it } from "vitest";
import Login from "../Login.vue";

describe("Login view", () => {
  it("renders login form", async () => {
    const router = createRouter({
      history: createMemoryHistory(),
      routes: [
        { path: "/login", component: Login },
        { path: "/dashboard", component: { template: "<div>dashboard</div>" } },
      ],
    });

    router.push("/login");
    await router.isReady();

    const wrapper = mount(Login, {
      global: {
        plugins: [router],
      },
    });

    expect(wrapper.text()).toContain("Masuk ke akun kamu");
    expect(wrapper.find("input[type='password']").exists()).toBe(true);
  });
});
