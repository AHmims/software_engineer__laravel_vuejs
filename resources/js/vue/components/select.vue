<template>
  <select
    class="px-6 py-3 rounded-[16px] space-x-1.5 border-[3px] border-gray-200"
    @change="$emit('change', $event)"
  >
    <option value="null" disabled selected>Choose a value</option>
    <option v-for="value in values" :key="value.id" :value="value.id">
      {{ value.name }}
    </option>
  </select>
</template>

<script>
export default {
  props: {
    values: {
      type: Array,
      required: false,
    },
  },
};
</script>