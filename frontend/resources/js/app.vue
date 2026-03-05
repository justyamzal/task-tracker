<template>
  <router-view v-if="$route.path === '/login'" />
  <div v-else class="min-h-screen flex bg-slate-100">
    <Sidebar />
    <main class="flex-1 p-6">
      <router-view />
    </main>
  </div>
</template>

<script setup>
import Sidebar from "./components/Sidebar.vue";
</script>