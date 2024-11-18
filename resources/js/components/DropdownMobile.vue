<script>
export default {
 name: 'DropdownMobile',
 data() {
   return {
     isOpen: false,
     isOpenLang: false,
     navItems: [
       { text: 'Places to be', href: '#' },
       { text: 'Things to do', href: '#' },
       { text: 'Other', href: '#' }
     ],
     languages: [
       { text: 'En', href: '#', code: 'gb' },
       { text: 'AL', href: '#', code: 'al' }
     ]
   };
 },
 methods: {
   toggleMenu(event) {
     event.stopPropagation();
     this.isOpen = !this.isOpen;
   },
   closeMenu(e) {
     if (!this.$el.contains(e.target)) {
       this.isOpen = false;
     }
   },
   toggleMenuLang(event) {
     event.stopPropagation();
     this.isOpenLang = !this.isOpenLang;
   }
 },
 watch: {
   isOpen(val) {
     if (val) {
       window.addEventListener('click', this.closeMenu);
     } else {
       window.removeEventListener('click', this.closeMenu);
     }
   }
 },
 beforeDestroy() {
   window.removeEventListener('click', this.closeMenu);
 }
};
</script>


<template>
 <div class="relative">
   <button @click="toggleMenu" class="p-2 focus:outline-none">
     <svg v-if="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
     </svg>
     <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
     </svg>
   </button>


   <transition name="fade">
     <div v-if="isOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-20">
       <ul class="py-2">
         <li v-for="item in navItems" :key="item.text" class="px-4 py-2 hover:bg-[#f2f2f2]">
           <a :href="item.href">{{ item.text }}</a>
         </li>
         <div class="flex-row flex items-center w-fit h-fit px-4 py-2" @click="toggleMenuLang">
           <img class="h-6 w-auto" src="../../images/globe.png" alt="globe" srcset="">
           <span class="m-1 font-light text-xs">En</span>
           <transition name="fade">
               <div v-if="isOpenLang"
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
       </ul>
     </div>
   </transition>
 </div>
</template>


<style>
.fade-enter-active, .fade-leave-active {
 transition: opacity 0.2s ease;
}
.fade-enter, .fade-leave-to {
 opacity: 0;
}
</style>