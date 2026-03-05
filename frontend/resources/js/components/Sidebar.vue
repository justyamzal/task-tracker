<template>
  <aside class="w-64 bg-slate-900 text-slate-200 flex flex-col">
    <div class="px-5 py-5 text-lg font-semibold">
      <span class="text-slate-100">Task</span><span class="text-blue-400">Tracker</span>
    </div>

    <nav class="px-3 space-y-1">
      <NavItem to="/dashboard" label="Dashboard" />
      <NavItem to="/projects" label="Project" />
      <NavItem to="/tasks" label="Task" />
    </nav>

    <div class="mt-auto px-4 pb-4">
      <button class="w-full text-left text-red-300 hover:text-red-200 text-sm mb-4">
        Keluar
      </button>

      <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-full bg-purple-600 flex items-center justify-center font-semibold">A</div>
        <div class="leading-tight">
          <div class="text-sm font-medium text-slate-100">Admin Energeek</div>
          <div class="text-xs text-slate-400">Administrator</div>
        </div>
      </div>
    </div>
  </aside>
</template>

<script setup>
import NavItem from "./NavItem.vue";
</script>