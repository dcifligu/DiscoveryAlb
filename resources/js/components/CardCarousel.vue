<script>
import Card from './Card.vue';

export default {
  name: 'CardCarousel',
  components: {
    Card
  }
}
</script>

<template>
    <div class="w-full my-16">
        <div class="h-screen w-full mx-6">
          <h1 class="text-4xl font-semibold my-5">
            Latest Discoveries
          </h1>
          <span class="text-md font-light"> 
            Be first to discover the latest
          </span>
          <div class="flex justify-end gap-1 w-full h-fit">
            <div class="flex justify-center w-9 h-9 bg-[#3b999991] hover:bg-[#3b9999] rounded-md group transition-all duration-300 cursor-pointer">
              <span class="text-[#2a8a8a] group-hover:text-white flex justify-center items-center transition-all duration-300">&lt;</span>
            </div>
            <div class="flex justify-center mr-12 w-9 h-9 bg-[#3b999991] hover:bg-[#3b9999] rounded-md group transition-all duration-300 cursor-pointer">
              <span class="text-[#2a8a8a] group-hover:text-white flex justify-center items-center transition-all duration-300"> > </span>
            </div>
          </div>
          <div class="relative w-screen h-screen my-5">
            <div class="absolute w-full -right-9 h-full">
              <div class="w-full h-full flex flex-row gap-4">
                <Card />
                <Card />
                <Card />
                <Card />
              </div>
            </div>
          </div>
        </div>
     </div>
</template>
