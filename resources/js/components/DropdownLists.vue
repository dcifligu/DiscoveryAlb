<script>
export default {
  name: 'DropdownLists',
  data() {
    return {
      places: [
        { displayText: 'Tirana', apiText: 'Tirana', href: '#' },
        { displayText: 'Korçë', apiText: 'Korce', href: '#' },
        { displayText: 'Durrës', apiText: 'Durres', href: '#' },
        { displayText: 'Shkodër', apiText: 'Shkoder', href: '#' },
      ],
      weather: {
        temp_c: null,
        temp_f: null,
        condition: {
          text: '',
          icon: ''
        }
      },
      selectedPlace: { displayText: 'Tirana', apiText: 'Tirana' }
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
                  :key="item.apiText"
                  class="py-1 hover:bg-[#f2f2f2]">
                <a @click.prevent="selectPlace(item)" class="flex flex-row text-xl">
                  <span>
                    {{ item.displayText }}
                  </span>
                </a>
              </li>
            </ul>
          </div>
          <div class="flex flex-col h-full w-2/4">
            <span class="text-4xl font-semibold pb-4">
              {{ selectedPlace.displayText }}
            </span>
            <span class="text-lg font-thin w-2/3 text-pretty">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius assumenda perspiciatis ut repellendus odit! Omnis, veritatis blanditiis ratione dignissimos rerum dicta, repellendus delectus sint voluptate harum et dolor nihil? Molestiae?
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