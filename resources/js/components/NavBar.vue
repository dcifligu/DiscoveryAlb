<script>
import DropdownMobile from './DropdownMobile.vue';
import DropdownLists from './DropdownLists.vue';

export default {
  
  name: 'NavBar',
  components: {
    DropdownMobile,
    DropdownLists
  },
  data() {
    return {
      navItems: [
        { text: 'Places to be', href: '#' },
        { text: 'Things to do', href: '#' },
        { text: 'Other', href: '#' }
      ],
      languages: [
        { text: 'En', href: '#', code: 'gb' },
        { text: 'AL', href: '#', code: 'al' }
      ],
      lastScrollY: 0,
      isOpen: false,
      isNavVisible: true,
      scrollTimeout: null,
      isHovered: false,
      isHoveredList: false,
      clicked: false,
      hideDropdownTimeout: null,
      hoveredItem: null
    };
  },
  computed: {
    hoveredStyle() {
      return this.isHovered ? { boxShadow: '0px 2px 20px 0px #666565bc' } : {};
    }
  },
  watch: {
    hoveredItem(newVal) {
      console.log('hoveredItem:', newVal);
    }
  },
  methods: {
    handleClick() {
      this.isHoveredList = false;
      this.$emit('toggle-search-modal');
      
    },
    toggleMenu(event) {
      event.stopPropagation();
      this.isOpen = !this.isOpen;
      this.clicked = !this.clicked;
    },
    closeMenu(e) {
      if (!this.$el.contains(e.target)) {
        this.isOpen = false;
        this.clicked = false;
      }
    },
    handleScroll() {
      clearTimeout(this.scrollTimeout);
      if (window.scrollY > 50) {
        this.isNavVisible = false;
        this.isHovered = false;
        this.isHoveredList = false;
        this.isOpen = false;
        this.scrollTimeout = setTimeout(() => {
          this.isNavVisible = true;
        }, 2000);
      } else {
        this.isNavVisible = true;
      }
      
      this.lastScrollY = window.scrollY;
    },
    handleMouseOver() {
      clearTimeout(this.hideDropdownTimeout);
      this.isHovered = true;
    },
    handleMouseLeave() {
      this.hideDropdownTimeout = setTimeout(() => {
        this.isHovered = false;
      }, 500);
    },
    handleMouseOverList(item) {
      clearTimeout(this.hideDropdownTimeout);
      this.isHovered = true;
      this.isHoveredList = true;
      this.hoveredItem = item.text; 
      
    },
    handleMouseLeaveList() {
      this.hideDropdownTimeout = setTimeout(() => {
        this.isHovered = false;
        this.isHoveredList = false;
        this.hoveredItem = null;
      }, 1000);
    }
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll);
    window.removeEventListener('click', this.closeMenu);
  }
};

</script>
<template>
 <div :class="['fixed z-20 top-0 w-full transition-transform duration-300', { '-translate-y-full': !isNavVisible }]">
   <div class="w-full h-30 relative border-b-[0.5px] border-b-white z-10">
     <div
   :class="['absolute top-0 left-0 w-full h-full bg-white opacity-20 transition-all duration-300', { 'hovered-class': isHovered },{ 'hovered-class': clicked }]"
   :style="hoveredStyle">
     </div>
     <div class="w-full h-full relative z-10 p-2">
       <div class="flex items-center h-full flex-row justify-between mx-4 lg:mx-12">
         <div class="h-full w-fit flex flex-row items-center child-item cursor-pointer" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave">
           <img class="h-16 w-auto" src="../../images/Logo.svg" alt="logo" srcset="">
           <span class="m-1 font-light text-xs">
             Discover <br>
             Today
           </span>
         </div>
         <ul class="h-full w-fit gap-24 flex-row items-center font-normal text-lg hidden lg:flex">
            <li v-for="item in navItems" :key="item.text">
              <a :href="item.href" 
                class="underline-effect child-item hover:text-[#3b9999]" 
                @mouseover="handleMouseOverList(item)" 
                @mouseleave="handleMouseLeaveList">
                {{ item.text }}
              </a>
            </li>
         </ul>
         <div class="w-fit h-full flex-row flex items-center gap-4">
           <div class="flex-row hidden lg:flex child-item cursor-pointer relative" 
                @click="toggleMenu"
                @mouseover="handleMouseOver"
                @mouseleave="handleMouseLeave">
             <img class="h-6 w-auto" src="../../images/globe.png" alt="globe" srcset="">
             <span class="m-1 font-light text-xs">En</span>


             <transition name="fade">
               <div v-if="isOpen"
                    class="absolute top-full left-0 mt-1 bg-white shadow-lg border border-gray-200 rounded">
                 <ul class="py-2">
                   <li v-for="item in languages"
                       :key="item.text"
                       class="px-4 py-2 hover:bg-[#f2f2f2]">
                     <a :href="item.href" class="flex flex-row gap-1">
                       <span :class="[ `fi fi-${item.code}`]"></span>
                       <span>
                         {{ item.text }}
                       </span>
                     </a>
                   </li>
                 </ul>
               </div>
             </transition>
           </div>
           <div class="h-fit w-fit lg:hidden child-item" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave">
             <DropdownMobile/>
           </div>
           <div class="cursor-pointer child-item" @click="handleClick" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave">
             <img class="h-6 w-auto" src="../../images/search.svg" alt="search" srcset="">
           </div>
         </div>
       </div>
     </div>
   </div>
   <transition enter-active-class="animate-slideDown" leave-active-class="animate-slideUp">
      <div v-if="isHoveredList" @mouseover="handleMouseOverList" @mouseleave="handleMouseLeaveList">
        <DropdownLists :active-section="hoveredItem" />
      </div>
    </transition>   
  </div>
</template>


