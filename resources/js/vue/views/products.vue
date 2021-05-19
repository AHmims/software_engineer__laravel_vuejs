<template>
  <div class="flex flex-col">
    <div
      class="w-full flex flex-col xl:flex-row xl:items-center justify-between"
    >
      <h1 class="text-3xl font-Kollektif">Products management</h1>
      <div
        class="flex flex-col md:flex-row md:items-center space-y-2 md:space-x-6 mt-4 xl:mt-0 font-SourceSansPro"
      >
        <div class="flex items-center space-x-2">
          <div class="flex space-x-4 items-center">
            <span>Sort by:</span>
            <Select :data="sorts" @change="setSortingKey" />
          </div>
          <SortButton text="" icon="asc" @click="setSortingOrder" />
          <SortButton text="" icon="desc" @click="setSortingOrder" />
        </div>
        <div class="flex space-x-4 items-center">
          <span>Category:</span>
          <Select :data="categories" @change="setFilterValue" />
        </div>
      </div>
    </div>
    <!--  -->
    <ProductsList :products="products" />
  </div>
</template>

<script>
import SortButton from "../components/sortButton.vue";
import Select from "../components/select.vue";
import CategoryService from "../services/categoryService.js";
import ProductService from "../services/productService.js";
import MapData from "../helpers/mapData.js";
import ProductsList from "../components/productsList.vue";

export default {
  components: {
    SortButton,
    Select,
    ProductsList,
  },
  data: () => {
    return {
      sorts: {
        selected: "created_at",
        list: [
          {
            id: "name",
            name: "name",
          },
          {
            id: "price",
            name: "price",
          },
          {
            id: "created_at",
            name: "date",
          },
        ],
      },
      categories: {
        selected: null,
        list: [],
      },
      products: [],
      sortingKey: "created_at",
      sortingValue: "desc",
      selectedCategory: -1,
    };
  },
  methods: {
    setSortingOrder(data) {
      this.sortingValue = data;
      this.updateProductsList();
    },
    setSortingKey(event) {
      this.sortingKey = event.target.options[event.target.selectedIndex].value;
      this.updateProductsList();
    },
    setFilterValue(event) {
      this.selectedCategory =
        event.target.options[event.target.selectedIndex].value;
      this.updateProductsList();
    },
    async updateProductsList() {
      //sorting only works when no category is selected
      try {
        let response = null;

        if (this.selectedCategory == -1) {
          response = await ProductService.getAll(
            this.sortingKey,
            this.sortingValue
          );
        } else {
          response = await CategoryService.getAllProducts(
            this.selectedCategory,
            this.sortingKey,
            this.sortingValue
          );
        }

        this.products = MapData.parseProducts(response);
      } catch (e) {
        if (e.response != undefined) {
          toastjs.logErrorActive(e.response.data.message);
        } else {
          toastjs.logErrorActive("Unknown error, refresh the page and retry");
        }
      }
    },
  },
  async mounted() {
    // Get categories
    try {
      let response = await CategoryService.getAllCategories();
      this.categories.list = MapData.parseCategories(response);
    } catch (e) {
      toastjs.logServerError();
    }

    // Get products
    this.updateProductsList();
  },
};
</script>