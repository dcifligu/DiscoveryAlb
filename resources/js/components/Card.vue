<script>
    export default {
        name: 'Card',
    }
</script>

<template>
    <div class="w-1/4 h-[80%] flex flex-col relative">
        <img src="../../images/HeroBg.png" alt="" srcset="" class="object-cover h-full rounded-lg">
        <div class="flex-col flex w-3/4 m-auto">
            <h1 class="text-2xl font-semibold my-5">
                Discover
            </h1>
            <span class="text-md font-light"> 
                Be first to discover the latest
            </span>
        </div>
    </div>
</template>

<!-- <script>
export default {
  name: 'Card',
  props: {
    cardData: {
      type: Number,
      required: true,
    },
  },
};
</script>

<template>
  <div class="w-full h-full flex flex-col">
    <img 
      src="../../images/HeroBg.png" 
      :alt="'Card ' + cardData" 
      class="object-cover h-full w-full rounded-lg"
    />
    <div class="flex-col flex w-3/4 mx-auto mt-4">
      <h1 class="text-2xl font-semibold mb-2">Card {{ cardData }}</h1>
      <span class="text-md font-light">Be first to discover the latest</span>
    </div>
  </div>
</template> -->
