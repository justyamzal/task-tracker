<template>
  <div>
    <div class="flex items-center justify-between mb-4">
      <div>
        <div class="text-xl font-semibold">Project</div>
        <div class="text-slate-500 text-sm">Kelola semua project</div>
      </div>
      <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm"
              @click="openCreate">
        + Tambah Project
      </button>
    </div>

    <div class="bg-white rounded-xl border">
      <div class="p-4 flex flex-col md:flex-row gap-3 md:items-center md:justify-between">
        <input v-model="q" placeholder="Cari project..."
               class="w-full md:w-80 border rounded-lg px-3 py-2 text-sm" />
        <select v-model="status" class="border rounded-lg px-3 py-2 text-sm w-full md:w-48">
          <option value="">Semua Status</option>
          <option value="Active">Active</option>
          <option value="Archived">Archived</option>
        </select>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead class="text-left text-slate-500 border-t border-b">
            <tr>
              <th class="p-4">NAMA</th>
              <th class="p-4">DESKRIPSI</th>
              <th class="p-4">STATUS</th>
              <th class="p-4">TASK</th>
              <th class="p-4">DIBUAT</th>
              <th class="p-4">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="p in filtered" :key="p.id" class="border-b last:border-b-0">
              <td class="p-4 font-medium">{{ p.name }}</td>
              <td class="p-4 text-slate-600">{{ p.desc }}</td>
              <td class="p-4">
                <Badge :text="p.status" :tone="p.status==='Active' ? 'green':'neutral'" />
              </td>
              <td class="p-4">{{ p.taskCount }}</td>
              <td class="p-4 text-slate-600">{{ p.createdAt }}</td>
              <td class="p-4 space-x-2">
                <router-link class="px-3 py-1.5 rounded-lg border text-xs hover:bg-slate-50"
                             :to="`/projects/${p.id}`">Detail</router-link>
                <button class="px-3 py-1.5 rounded-lg bg-slate-100 text-xs hover:bg-slate-200"
                        @click="openEdit(p)">Edit</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <ModalShell v-if="modalOpen" :title="isEdit ? 'Edit Project' : 'Tambah Project Baru'" @close="close">
      <div class="space-y-4">
        <div>
          <label class="text-sm font-medium">Nama Project</label>
          <input v-model="form.name" class="mt-1 w-full border rounded-lg px-3 py-2 text-sm" />
        </div>
        <div>
          <label class="text-sm font-medium">Deskripsi</label>
          <textarea v-model="form.desc" rows="3" class="mt-1 w-full border rounded-lg px-3 py-2 text-sm"></textarea>
        </div>
        <div>
          <label class="text-sm font-medium">Status</label>
          <select v-model="form.status" class="mt-1 w-full border rounded-lg px-3 py-2 text-sm">
            <option>Active</option>
            <option>Archived</option>
          </select>
        </div>

        <div class="flex justify-end gap-2 pt-2">
          <button class="px-4 py-2 rounded-lg border text-sm" @click="close">Batal</button>
          <button class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm" @click="save">Simpan</button>
        </div>
      </div>
    </ModalShell>
  </div>
</template>

<script setup>
import { computed, reactive, ref } from "vue";
import Badge from "../components/Badge.vue";
import ModalShell from "../components/ModalShell.vue";

const q = ref("");
const status = ref("");
const modalOpen = ref(false);
const isEdit = ref(false);
const editingId = ref(null);

const projects = ref([
  { id: 1, name: "Website E-Commerce", desc: "Redesign platform belanja online", status: "Active", taskCount: 24, createdAt: "12 Jan 2025" },
  { id: 2, name: "Aplikasi Mobile", desc: "App cross-platform pelanggan", status: "Active", taskCount: 18, createdAt: "3 Feb 2025" },
  { id: 3, name: "Backend Services v2", desc: "Migrasi ke microservice", status: "Archived", taskCount: 36, createdAt: "1 Nov 2024" },
]);

const form = reactive({ name: "", desc: "", status: "Active" });

const filtered = computed(() =>
  projects.value.filter(p => {
    const matchQ = (p.name + " " + p.desc).toLowerCase().includes(q.value.toLowerCase());
    const matchS = !status.value || p.status === status.value;
    return matchQ && matchS;
  })
);

function openCreate() {
  isEdit.value = false;
  editingId.value = null;
  form.name = ""; form.desc = ""; form.status = "Active";
  modalOpen.value = true;
}
function openEdit(p) {
  isEdit.value = true;
  editingId.value = p.id;
  form.name = p.name; form.desc = p.desc; form.status = p.status;
  modalOpen.value = true;
}
function close() { modalOpen.value = false; }
function save() {
  if (!form.name.trim()) return;
  if (isEdit.value) {
    const idx = projects.value.findIndex(x => x.id === editingId.value);
    projects.value[idx] = { ...projects.value[idx], name: form.name, desc: form.desc, status: form.status };
  } else {
    projects.value.unshift({
      id: Date.now(),
      name: form.name,
      desc: form.desc,
      status: form.status,
      taskCount: 0,
      createdAt: new Date().toLocaleDateString("id-ID", { day: "2-digit", month: "short", year: "numeric" }),
    });
  }
  close();
}
</script>