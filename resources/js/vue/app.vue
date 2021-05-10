<template>
  <!-- container -->
  <div class="w-full h-full flex flex-col items-center p-10 justify-between">
    <!-- title -->
    <h1 class="text-3xl">Products management app</h1>
    <!-- menu -->
    <form class="w-full mt-6 flex justify-center items-center space-x-4">
      <SortButton text="Price" icon="asc" @click="getAllProducts" />
      <SortButton text="Price" icon="desc" @click="getAllProducts" />
      <div class="w-[3px] h-2/3 bg-gray-200 rounded-full"></div>
      <div class="flex space-x-4 items-center">
        <span>Filter by categorie:</span>
        <Select :values="categories" />
      </div>
    </form>
    <!-- main -->
    <div class="flex-1 w-full my-10 overflow-y-auto grid grid-cols-3 gap-6">
      <div v-for="product in products" :key="product.id" :value="product.id">
        <Product :product="product" />
      </div>
    </div>
    <!-- footer -->
    <div class="w-full flex flex-col items-center bg-gray-100 p-4 rounded-lg">
      <h4>Software Engineer @ Laravel VueJs - Coding challenge</h4>
    </div>
  </div>
</template>
<script>
import SortButton from "./components/sortButton.vue";
import Select from "./components/select.vue";
import Product from "./components/product.vue";

export default {
  name: "App",
  components: {
    SortButton,
    Select,
    Product,
  },
  data: () => {
    return {
      categories: [{ id: "1", name: "s" }],
      products: [],
    };
  },
  methods: {
    async getAllProducts(order) {
      console.log(order);
      try {
        let response = await axios.get("api/product/all", {
          order,
        });
        this.products = response.data;
      } catch (err) {
        console.error(err);
        alert("Error");
        this.products = [];
      }
    },
  },
  async mounted() {
    axios.get("api/category/all").then((response) => {
      this.categories = response.data;
    });
    //
    await this.getAllProducts("asc");
  },
};
</script>