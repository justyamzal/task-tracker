<template>
  <span class="px-2 py-0.5 text-xs rounded-full border"
        :class="classes">
    {{ text }}
  </span>
</template>

<script setup>
import { computed } from "vue";
const props = defineProps({ text: String, tone: { type: String, default: "neutral" } });

const classes = computed(() => {
  const t = props.tone;
  if (t === "green") return "bg-green-50 border-green-200 text-green-700";
  if (t === "yellow") return "bg-yellow-50 border-yellow-200 text-yellow-700";
  if (t === "blue") return "bg-blue-50 border-blue-200 text-blue-700";
  if (t === "purple") return "bg-purple-50 border-purple-200 text-purple-700";
  if (t === "red") return "bg-red-50 border-red-200 text-red-700";
  return "bg-slate-50 border-slate-200 text-slate-700";
});
</script>