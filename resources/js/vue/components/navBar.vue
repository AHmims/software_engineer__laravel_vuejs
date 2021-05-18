<template>
  <div class="w-full flex flex-row items-center justify-between py-7 bg-white">
    <router-link to="/" class="flex flex-row items-center text-gray-800">
      <svg
        class="w-10 h-10 stroke-current"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
        ></path>
      </svg>
      <span class="font-Kollektif text-xl font-bold ml-2">PMA</span>
    </router-link>
    <!-- nav links -->
    <ul class="flex flex-row space-x-2">
      <li v-for="route in routes" :key="route.path" :value="route.path">
        <router-link :to="route.path">
          <NavBarLink :text="route.name" />
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
import NavBarLink from "./navBar.link.vue";
import { routes } from "../../routes.js";

export default {
  data: () => {
    return {
      routes,
    };
  },
  components: { NavBarLink },
};
</script>