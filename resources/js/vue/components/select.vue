<template>
  <select
    class="px-6 py-3 rounded-[16px] space-x-1.5 border-[2px] border-gray-200 text-md capitalize"
    @change="$emit('change', $event)"
  >
    <option value="-1" selected v-if="data.selected == null">All</option>
    <option
      v-for="value in data.list"
      :key="value.id"
      :value="value.id"
      :selected="value.id == data.selected"
    >
      {{ value.name }}
    </option>
  </select>
</template>

<script>
export default {
  props: {
    data: {
      type: Object,
      required: false,
    },
  },
};
</script>