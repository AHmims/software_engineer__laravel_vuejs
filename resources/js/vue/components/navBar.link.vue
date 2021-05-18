<template>
  <span
    class="text-coolGray-600 font-SourceSansPro font-medium text-lg px-5 py-3 bg-white rounded-lg transition ease-in-out duration-300 hover:bg-gray-100"
  >
    {{ this.text }}
  </span>
</template>

<script>
export default {
  props: {
    text: {
      type: String,
      required: true,
    },
  },
};
</script>