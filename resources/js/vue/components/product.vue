<template>
  <div
    class="flex-shrink-0 relative overflow-hidden bg-gray-500 rounded-lg max-w-xs shadow-lg"
  >
    <svg
      class="absolute bottom-0 left-0 mb-8"
      viewBox="0 0 375 283"
      fill="none"
      style="transform: scale(1.5); opacity: 0.1"
    >
      <rect
        x="159.52"
        y="175"
        width="152"
        height="152"
        rx="8"
        transform="rotate(-45 159.52 175)"
        fill="white"
      />
      <rect
        y="107.48"
        width="152"
        height="152"
        rx="8"
        transform="rotate(-45 0 107.48)"
        fill="white"
      />
    </svg>
    <div class="relative pt-10 px-10 flex items-center justify-center">
      <div
        class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
        style="
          background: radial-gradient(black, transparent 60%);
          transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1);
          opacity: 0.2;
        "
      ></div>
      <img
        class="relative w-40 h-[135px] object-contain"
        :src="product.image"
        alt=""
      />
    </div>
    <div class="relative text-white px-6 pb-6 mt-6">
      <span class="block opacity-75 -mb-1 truncate">{{
        product.joinedCategories
      }}</span>
      <div class="flex justify-between">
        <span class="block font-semibold text-xl truncate">
          {{ product.name }}
        </span>
        <span
          class="bg-white rounded-full text-gray-500 text-xs font-bold px-3 py-2 leading-none flex items-center flex-none"
        >
          {{ product.price }} DH
        </span>
      </div>
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