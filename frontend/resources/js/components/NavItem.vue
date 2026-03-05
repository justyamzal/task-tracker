<template>
  <router-link
    :to="to"
    class="block px-3 py-2 rounded-md text-sm hover:bg-slate-800"
    :class="isActive ? 'bg-slate-800 text-white' : ''"
  >
    {{ label }}
  </router-link>
</template>

<script setup>
import { computed } from "vue";
import { useRoute } from "vue-router";
const props = defineProps({ to: String, label: String });
const route = useRoute();

const isActive = computed(() =>
  props.to === "/dashboard"
    ? route.path === "/dashboard"
    : route.path.startsWith(props.to)
);
</script>