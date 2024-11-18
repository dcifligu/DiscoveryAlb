<script>
export default {
 name: 'DropdownLists',
 data() {
   return{
     places: [
       { text: 'PlaceName', href: '#' },
       { text: 'PlaceName', href: '#' },
       { text: 'PlaceName', href: '#' },
       { text: 'PlaceName', href: '#' },
       { text: 'PlaceName', href: '#' },
       { text: 'PlaceName', href: '#' },
       { text: 'PlaceName', href: '#' },
       { text: 'PlaceName', href: '#' },
     ]
   }
 }
}
</script>
<template>
   <div class="fixed w-full h-fit bg-[#F9F9F9] z-0 rounded-b-xl">
   <div class="h-full w-full">
     <div class="m-6">
     <div class="flex flex-row py-3 justify-start">
         <div class="flex flex-col h-full w-1/4">
           <span class="font-bold text-4xl pb-4">
             Places to be
           </span>
           <ul>
             <li v-for="item in places"
                         :key="item.text"
                         class="py-1 hover:bg-[#f2f2f2]">
                       <a :href="item.href" class="flex flex-row text-xl">
                         <span>
                           {{ item.text }}
                         </span>
                       </a>
                     </li>
                   </ul>
         </div>
         <div class="flex flex-col h-full w-2/4">
           <span class="text-4xl font-semibold pb-4">
             PlaceName
           </span>
           <span class="text-lg font-thin w-2/3 text-pretty">
             Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius assumenda perspiciatis ut repellendus odit! Omnis, veritatis blanditiis ratione dignissimos rerum dicta, repellendus delectus sint voluptate harum et dolor nihil? Molestiae?
           </span>
         </div>
         <div class="flex flex-col h-full">
           <img src="../../images/weather.png" alt="" srcset="" class="h-16 w-fit">
           <span class="text-4xl font-semibold pb-4">
             22°C Clear
           </span>
         </div>
       </div>
     </div>
   </div>
 </div>
</template>