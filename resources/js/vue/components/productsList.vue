<template>
  <div
    class="flex-1 w-full my-10 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6"
  >
    <div v-for="product in products" :key="product.id">
      <Product :product="product" />
    </div>
  </div>
</template>

<script>
import Product from "./product.vue";

export default {
  name: "ProductsList",
  props: {
    products: {
      type: Array,
      required: true,
    },
  },
  components: {
    Product,
  },
};
</script>