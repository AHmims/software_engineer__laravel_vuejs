<template>
  <div>
    <div
      class="w-full flex flex-col xl:flex-row xl:items-center justify-between"
    >
      <h1 class="text-3xl font-Kollektif">Products management</h1>
      <div class="flex items-center space-x-4 mt-4 xl:mt-0 font-SourceSansPro">
        <SortButton text="Price" icon="asc" @click="getAllProducts" />
        <SortButton text="Price" icon="desc" @click="getAllProducts" />
        <div class="w-[3px] h-2/3 bg-gray-200 rounded-full"></div>
        <div class="flex space-x-4 items-center">
          <span>Filter by categorie:</span>
          <Select :values="categories" @change="filter" />
        </div>
      </div>
    </div>
    <!--  -->
    
  </div>
</template>

<script>
import SortButton from "../components/sortButton.vue";
import Select from "../components/select.vue";

export default {
  components: {
    SortButton,
    Select,
  },
  data: () => {
    return {
      categories: [],
      products: [],
    };
  },
  methods: {
    getAllProducts(data = null) {
      console.log(data);
    },
    filter(data = null) {
      console.log(data);
    },
  },
};
</script>