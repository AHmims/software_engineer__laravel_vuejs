<template>
  <div
    class="flex p-4 border-[2px] border-gray-200 rounded-xl w-[400px] h-[180px] overflow-hidden"
  >
    <!-- image -->
    <img :src="product.image" class="h-full w-32 mr-3" />
    <!-- content -->
    <div class="flex-1 flex flex-col">
      <p
        class="flex-none overflow-hidden text-lg font-medium overflow-clip truncate"
      >
        {{ product.name }}
      </p>
      <div class="w-full flex items-baseline justify-between">
        <div
          v-for="category in product.category"
          :key="category.id"
          :value="category.id"
          class="flex items-center space-x-1"
        >
          <span class="text-sm">{{ category.name }}</span>
        </div>
        <span class="text-base font-medium">{{ product.price }}-DH</span>
      </div>
      <p class="flex-auto overflow-ellipsis overflow-hidden">
        {{ product.description }}
      </p>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    product: {
      type: Object,
      required: true,
    },
  },
};
</script>