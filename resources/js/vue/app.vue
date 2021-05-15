<template>
  <!-- container -->
  <div class="w-full h-full flex flex-col items-center p-10 justify-between">
    <!-- title -->
    <h1 class="text-3xl">Products management app</h1>
    <!-- menu -->
    <div class="w-full mt-6 flex justify-center items-center space-x-4">
      <SortButton text="Price" icon="asc" @click="getAllProducts" />
      <SortButton text="Price" icon="desc" @click="getAllProducts" />
      <div class="w-[3px] h-2/3 bg-gray-200 rounded-full"></div>
      <div class="flex space-x-4 items-center">
        <span>Filter by categorie:</span>
        <Select :values="categories" @change="filter" />
      </div>
    </div>
    <!-- main -->
    <div class="flex-1 w-full my-10 overflow-y-auto grid grid-cols-3 gap-6">
      <div v-for="product in products" :key="product.id" :value="product.id">
        <Product :product="product" />
      </div>
    </div>
    <!-- footer -->
    <Footer />
  </div>
</template>

<script>
import SortButton from "./components/sortButton.vue";
import Select from "./components/select.vue";
import Product from "./components/product.vue";
import Footer from "./components/footer.vue";
import { getAll, getAllByCategory } from "./services/productService.js";

export default {
  name: "App",
  components: {
    SortButton,
    Select,
    Product,
    Footer,
  },
  data: () => {
    return {
      categories: [],
      products: [],
      sortValue: "asc",
      activeCategory: -1,
    };
  },
  methods: {
    async handler(order) {
      this.sortValue = order;
      try {
        this.products = await getAll(order);
      } catch (e) {
        th.logErrorActive("Error while getting products list");
      }
    },
    async getAllProducts(order) {
      await this.handler(order);
    },

    async filter(category = null) {
      if (category != null)
        this.activeCategory =
          category.target.options[category.target.selectedIndex].value;
      //
      try {
        this.products = await getAllByCategory(category, this.sortValue);
      } catch (e) {
        th.logErrorActive("Error while getting categories list");
      }
    },
  },
  async mounted() {
    /*axios.get("api/category/all").then((response) => {
      this.categories = response.data;
    });*/
    //
    //await this.getAllProducts("asc");
    // th.logServerError();
  },
};
</script>