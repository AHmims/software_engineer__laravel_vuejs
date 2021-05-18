<template>
  <div class="container px-20 mx-auto h-full flex flex-col space-y-10 flex-1">
    <NavBar />
    <router-view></router-view>
  </div>
</template>

<script>
import NavBar from "./components/navBar.vue";
export default {
  components: { NavBar },
};
</script>