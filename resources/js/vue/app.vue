<template>
  <!-- container -->
  <div class="w-full h-full flex flex-col items-center p-10 justify-between">
    <!-- title -->
    <h1 class="text-3xl">Products management app</h1>
    <!-- menu -->
    <div class="w-full mt-6 flex justify-center items-center space-x-4">
      <SortButton text="Price" icon="asc" />
      <SortButton text="Price" icon="desc" />
      <div class="w-[3px] h-2/3 bg-gray-200 rounded-full"></div>
      <div class="flex space-x-4 items-center">
        <span>Filter by categorie:</span>
        <Select :values="categories" />
      </div>
    </div>
    <!-- main -->
    <div class="flex-1 w-full bg-red-300 my-10 overflow-y-auto"></div>
    <!-- footer -->
    <div class="w-full flex flex-col items-center bg-gray-100 p-4 rounded-lg">
      <h4>Software Engineer @ Laravel VueJs - Coding challenge</h4>
    </div>
  </div>
</template>
<script>
import SortButton from "./components/sortButton.vue";
import Select from "./components/select.vue";

let data = [
  {
    id: 1,
    text: "test",
  },
  {
    id: 2,
    text: "hmmmm",
  },
];

export default {
  name: "App",
  components: {
    SortButton,
    Select,
  },
  data() {
    return {
      categories: data,
    };
  },
};
</script>