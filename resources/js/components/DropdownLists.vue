<script>
export default {
  name: 'DropdownLists',
  data() {
    return {
      places: [
        { displayText: 'Tirana', apiText: 'Tirana', href: '#', displayInfo: 'Capital of Albania' },
        { displayText: 'Korçë', apiText: 'Korce', href: '#', displayInfo: 'City in Albania' },
        { displayText: 'Durrës', apiText: 'Durres', href: '#', displayInfo: 'City in Albania' },
        { displayText: 'Shkodër', apiText: 'Shkoder', href: '#', displayInfo: 'City in Albania' },
      ],
      weather: {
        temp_c: null,
        temp_f: null,
        condition: {
          text: '',
          icon: ''
        }
      },
      selectedPlace: { displayText: 'Tirana', apiText: 'Tirana', displayInfo: 'Capital of Albania'},
      hoveredPlace: null
    }
  },
  mounted() {
    this.fetchWeatherData(this.selectedPlace.apiText);
  },
  methods: {
    async fetchWeatherData(place) {
      try {
        const response = await fetch(`http://127.0.0.1:8000/weather/${place}`);
        const data = await response.json();
        this.weather.temp_c = data.current.temp_c;
        this.weather.temp_f = data.current.temp_f;
        this.weather.condition.text = data.current.condition.text;
        this.weather.condition.icon = data.current.condition.icon;
      } catch (error) {
        console.error('Error fetching weather data:', error);
      }
    },
    selectPlace(place) {
      this.selectedPlace = place;
      this.fetchWeatherData(place.apiText);
    },
    setHoveredPlace(place) {
      this.hoveredPlace = place;
    }
  }
}
</script>

<template>
  <div class="fixed w-full h-fit bg-[#F9F9F9] z-0 rounded-b-xl">
    <div class="h-full w-full">
      <div class="m-6">
        <div class="flex flex-row py-3 justify-start gap-1">
          <div class="flex flex-col h-full w-1/4">
            <span class="font-bold text-4xl pb-4">
              Places to be
            </span>
            <ul>
              <li v-for="item in places" id="places-list"
                  :key="item.apiText"
                  class="py-1 cursor-pointer"
                  @mouseover="setHoveredPlace(item)"
                  @mouseleave="setHoveredPlace(null)">
                <a @click.prevent="selectPlace(item)" class="flex flex-row text-xl p-1 -pr-2 hover:bg-[#f2f2f2] rounded-3xl px-2">
                  <span :class="{'underline-effect-lists': item.apiText === selectedPlace.apiText || item.apiText === hoveredPlace?.apiText}">
                    {{ item.displayText }}
                  </span>
                </a>
              </li>
            </ul>
          </div>
          <div class="flex flex-col h-full w-2/4 mx-2">
            <span class="text-4xl font-semibold pb-4">
              {{ selectedPlace.displayText }}
            </span>
            <span class="text-lg font-thin w-2/3 text-pretty">
              {{ selectedPlace.displayInfo }}  
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
