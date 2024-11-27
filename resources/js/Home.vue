<script>
import NavBar from './components/NavBar.vue';
import LogoOverlay from './components/LogoOverlay.vue';
import Hero from './components/Hero.vue';
import SearchModal from './components/SearchModal.vue';
import FooterComponent from './components/FooterComponent.vue';
import CheckLink from './components/CheckLink.vue';
import Card from './components/Card.vue';

export default {
    name: 'Home',
    components: {
        NavBar,
        LogoOverlay,
        Hero,
        SearchModal,
        FooterComponent,
        CheckLink,
        Card
    },
    data() {
        return {
            isSearchModalVisible: false,
        };
    },
    methods: {
        toggleSearchModal() {
            this.isSearchModalVisible = !this.isSearchModalVisible;
        },
        closeSearchModal() {
            this.isSearchModalVisible = false;
        }
    }
}
</script>

<template>
    <SearchModal v-if="isSearchModalVisible" @close-search-modal="closeSearchModal"/>
    <div id="home" class="relative h-full scroll-smooth">
        <NavBar @toggle-search-modal="toggleSearchModal"/>
        <Hero />
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
        <FooterComponent />
    </div>
</template>
