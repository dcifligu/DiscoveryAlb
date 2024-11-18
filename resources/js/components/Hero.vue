<script>
import LogoOverlay from './LogoOverlay.vue';
   export
   default {
       name: 'Hero',
       components:
       {
           LogoOverlay
       }
   }
</script>


<template>
   <img src="../../images/HeroBg.png" class="w-screen h-screen object-cover absolute z-0 scale-x-[-1]" />
     <div class="w-full h-screen flex lg:flex-row flex-col items-center justify-center relative z-10">
       <LogoOverlay/>
       <div class="flex flex-col items-center">
         <h1 class="text-white md:text-6xl text-5xl font-bold">Discover Today</h1>
         <p class="text-white md:text-3xl text-cl font-light">Explore the world around you</p>
         <button class="bg-[#2c7474] hover:bg-[#3b9999] transition-all duration-300 text-[#fbfbef] hover:text-[#feffe0] md:text-xl lg:text-2xl px-6 py-2 mt-4 rounded-3xl shadow-md shadow-[#212121AD]">Get Started</button>
       </div>
     </div>
</template>
