<template>
  <div class="fixed inset-0 z-50 flex items-center justify-center">
    <div class="absolute inset-0 bg-black/40" @click="$emit('close')" />
    <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-xl p-6">
      <div class="flex items-start justify-between mb-4">
        <div>
          <div class="text-lg font-semibold">{{ title }}</div>
          <div v-if="subtitle" class="text-sm text-slate-500">{{ subtitle }}</div>
        </div>
        <button class="text-slate-400 hover:text-slate-600" @click="$emit('close')">✕</button>
      </div>

      <slot />

    </div>
  </div>
</template>

<script setup>
defineProps({ title: String, subtitle: String });
defineEmits(["close"]);
</script>