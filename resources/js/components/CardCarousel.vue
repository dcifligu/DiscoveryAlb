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

<!-- <script>
import Card from './Card.vue';

export default {
  name: 'CardCarousel',
  components: {
    Card,
  },
  data() {
    return {
      cards: [1, 2, 3, 4, 5],
    };
  },
  mounted() {
    this.setupInfiniteScroll();
  },
  methods: {
    setupInfiniteScroll() {
      const container = this.$refs.carouselContainer;

      container.addEventListener('scroll', () => {
        const scrollLeft = container.scrollLeft;
        const cardWidth = container.offsetWidth / 4;

        if (scrollLeft >= cardWidth) {
          const firstCard = this.cards.shift();
          this.cards.push(firstCard); 
          container.scrollLeft -= cardWidth;
        }
        if (scrollLeft <= 0) {
          const lastCard = this.cards.pop(); 
          this.cards.unshift(lastCard); 
          container.scrollLeft += cardWidth; 
        }
      });
    },
  },
};
</script>

<template>
  <div class="w-full my-16">
    <div class="h-screen mx-6">
      <h1 class="text-4xl font-semibold my-5">Latest Discoveries</h1>
      <span class="text-md font-light">Be first to discover the latest</span>
      <div 
        ref="carouselContainer" 
        class="relative overflow-hidden h-[80%] my-5 flex gap-4 overflow-x-auto no-scrollbar"
      >
        <div 
          v-for="(card, index) in cards" 
          :key="index" 
          class="flex-shrink-0 w-1/4 h-full"
        >
          <Card :card-data="card" />
        </div>
      </div>
    </div>
  </div>
</template> -->
