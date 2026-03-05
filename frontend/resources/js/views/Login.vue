<template>
  <div class="min-h-screen flex items-center justify-center bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-30 blur-3xl">
      <div class="w-[700px] h-[700px] bg-blue-600 rounded-full -translate-x-1/3 -translate-y-1/3"></div>
      <div class="w-[700px] h-[700px] bg-slate-700 rounded-full translate-x-2/3 -translate-y-1/3"></div>
    </div>

    <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-xl p-8">
      <div class="text-2xl font-semibold mb-1">
        <span>Task</span><span class="text-blue-600">Tracker</span>
      </div>
      <div class="text-slate-500 mb-6">Masuk ke akun kamu</div>

      <form class="space-y-4" @submit.prevent="login">
        <div>
          <label class="text-sm font-medium text-slate-700">Email</label>
          <input v-model="email" class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring" />
        </div>
        <div>
          <label class="text-sm font-medium text-slate-700">Password</label>
          <input v-model="password" type="password" class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring" />
        </div>

        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white rounded-lg py-2.5 font-medium">
          Masuk
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
const email = ref("admin@energeek.id");
const password = ref("password");
function login() { router.push("/dashboard"); }
</script>