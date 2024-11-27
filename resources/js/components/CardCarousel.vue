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
    <div class=" w-full my-16">
        <div class="h-screen w-full mx-6">
          <h1 class="text-4xl font-semibold my-5">
            Latest Discoveries
          </h1>
          <span class="text-md font-light"> 
            Be first to discover the latest
          </span>
          <div class="relative w-screen h-screen my-5">
            <div class="absolute w-full -right-9 h-full">
              <div class="w-full h-full flex flex-row gap-4">
                <Card />
                <Card />
              </div>
            </div>
          </div>
        </div>
     </div>
</template>