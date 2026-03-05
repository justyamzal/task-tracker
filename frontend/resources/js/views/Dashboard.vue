<template>
  <div>
    <div class="text-xl font-semibold mb-1">Dashboard</div>
    <div class="text-slate-500 mb-6">Selamat datang 👋</div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
      <div class="bg-white rounded-xl border p-4 flex items-center gap-3">
        <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center">📦</div>
        <div>
          <div class="text-xs text-slate-500">Project Aktif</div>
          <div class="text-2xl font-semibold">8</div>
        </div>
      </div>

      <div class="bg-white rounded-xl border p-4 flex items-center gap-3">
        <div class="w-10 h-10 rounded-lg bg-yellow-50 flex items-center justify-center">⏳</div>
        <div>
          <div class="text-xs text-slate-500">Task Belum Selesai</div>
          <div class="text-2xl font-semibold">44</div>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-xl border">
      <div class="px-4 py-3 font-semibold border-b">Task Mendekati Due Date</div>
      <div class="p-4 space-y-3">
        <div v-for="t in dueSoon" :key="t.id" class="flex items-center justify-between">
          <div class="flex items-start gap-3">
            <div class="mt-1 w-2 h-2 rounded-full" :class="t.dot"></div>
            <div>
              <div class="font-medium">{{ t.title }}</div>
              <div class="text-xs text-slate-500">{{ t.project }}</div>
            </div>
          </div>
          <div class="text-xs" :class="t.rightClass">{{ t.dueText }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const dueSoon = [
  { id: 1, title: "Integrasi Payment Gateway", project: "Website E-Commerce", dueText: "2 hari lagi ⚠️", rightClass: "text-red-500", dot: "bg-red-500" },
  { id: 2, title: "Bug Fix Login Mobile", project: "Aplikasi Mobile", dueText: "Besok", rightClass: "text-orange-500", dot: "bg-orange-500" },
  { id: 3, title: "Dokumentasi API v2", project: "Backend Services", dueText: "10 Mar 2025", rightClass: "text-slate-500", dot: "bg-blue-500" },
];
</script>