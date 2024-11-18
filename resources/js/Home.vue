<script>
import NavBar from './components/NavBar.vue';
import LogoOverlay from './components/LogoOverlay.vue';
import Hero from './components/Hero.vue';
import SearchModal from './components/SearchModal.vue';


export default {
 name: 'Home',
 components: {
   NavBar,
   LogoOverlay,
   Hero,
   SearchModal,
 },
 data() {
   return {
     isSearchModalVisible: false,
   };
 },
 methods: {
   toggleSearchModal() {
     this.isSearchModalVisible = !this.isSearchModalVisible;
   }
 }
}
</script>


<template>
   <SearchModal v-if="isSearchModalVisible"/>
   <div id="home" class="relative h-full scroll-smooth">
     <NavBar @toggle-search-modal="toggleSearchModal"/>
     <Hero />
     <div class="h-screen w-full">
     </div>
   </div>
</template>
