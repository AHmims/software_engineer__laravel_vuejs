<template>
  <div>
    <div
      class="w-full flex flex-col xl:flex-row xl:items-center justify-between"
    >
      <h1 class="text-3xl font-Kollektif">Products management</h1>
      <div class="flex items-center space-x-6 mt-4 xl:mt-0 font-SourceSansPro">
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
  </div>
</template>

<script>
import SortButton from "../components/sortButton.vue";
import Select from "../components/select.vue";
import CategoryService from "../services/categoryService.js";
import MapData from "../helpers/mapData.js";

export default {
  components: {
    SortButton,
    Select,
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
      products: [1, 2],
      sortingKey: "created_at",
      sortingValue: "desc",
      selectedCategory: -1,
    };
  },
  methods: {
    setSortingOrder(data) {
      // console.log(data);
      this.updateProductsList();
    },
    setSortingKey(data) {
      // console.log(data.target.options[data.target.selectedIndex].value);
      this.updateProductsList();
    },
    setFilterValue(data) {
      // console.log(data.target.options[data.target.selectedIndex].value);
      this.updateProductsList();
    },
    async updateProductsList() {},
  },
  async mounted() {
    // Get categories
    try {
      let response = await CategoryService.getAllCategories();
      this.categories.list = MapData.parseCategories(response);
    } catch (e) {
      toastjs.logServerError();
    }
  },
};
</script>