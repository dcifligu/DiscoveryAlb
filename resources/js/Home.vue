<script>
import NavBar from './components/NavBar.vue';
import LogoOverlay from './components/LogoOverlay.vue';
import Hero from './components/Hero.vue';
import SearchModal from './components/SearchModal.vue';
import FooterComponent from './components/FooterComponent.vue';
import CheckLink from './components/CheckLink.vue';
import CardCarousel from './components/CardCarousel.vue';
import RegionsComponent from './components/RegionsComponent.vue';

export default {
    name: 'Home',
    components: {
        NavBar,
        LogoOverlay,
        Hero,
        SearchModal,
        FooterComponent,
        CheckLink,
        CardCarousel,
        RegionsComponent
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
        <CardCarousel />
        <div class="py-12"></div>
        <FooterComponent />

    </div>
</template>
