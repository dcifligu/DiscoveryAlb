<!-- PlacesLayout.vue -->
<script>
export default {
  name: 'places-layout',  // Changed to kebab-case
  props: {
    items: {
      type: Array,
      required: true
    },
    selectedItem: {
      type: Object,
      required: true
    },
    hoveredItem: {
      type: Object,
      default: null
    },
    weather: {
      type: Object,
      required: true
    }
  }
}
</script>

<template>
  <div class="fixed w-full h-fit bg-[#F9F9F9] z-0 rounded-b-xl shadow-md">
    <div class="h-full w-full">
      <div class="m-6">
        <div class="flex flex-row py-3 justify-start gap-1">
          <div class="flex flex-col h-full w-1/4">
            <span class="font-bold text-4xl pb-4">
              Places to be
            </span>
            <ul>
              <li v-for="item in items" 
                  :key="item.apiText"
                  id="places-list"
                  class="py-1 cursor-pointer"
                  @mouseover="$emit('hover', item)"
                  @mouseleave="$emit('leave', null)">
                <a @click.prevent="$emit('select', item)" 
                   class="flex flex-row text-xl p-1 -pr-2 hover:bg-[#f2f2f2] rounded-3xl px-2">
                  <span :class="{'underline-effect-lists': item === selectedItem || item === hoveredItem}">
                    {{ item.displayText }}
                  </span>
                </a>
              </li>
            </ul>
          </div>
          <div class="flex flex-col h-full w-2/4 mx-2">
            <span class="text-4xl font-semibold pb-4">
              {{ selectedItem.displayText }}
            </span>
            <span class="text-lg font-thin w-2/3 text-pretty">
              {{ selectedItem.displayInfo }}  
            </span>
          </div>
          <div class="flex flex-col h-full w-1/4">
            <img :src="weather.condition.icon" alt="Weather Icon" class="h-16 w-fit">
            <span class="text-4xl font-semibold pb-4">
              {{ weather.temp_c }}°C / {{ weather.temp_f }}°F {{ weather.condition.text }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>