<script>
import PlacesLayout from './PlacesLayout.vue'
import ThingsLayout from './ThingsLayout.vue'
import OtherLayout from './OtherLayout.vue'

export default {
  name: 'DropdownLists',
  components: {
    PlacesLayout,
    ThingsLayout,
    OtherLayout
  },
  props: {
    activeSection: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      places: [
        { displayText: 'Tirana', apiText: 'Tirana', href: '#', displayInfo: 'Tirana Text' },
        { displayText: 'Korçë', apiText: 'Korce', href: '#', displayInfo: 'Korçë Text' },
        { displayText: 'Durrës', apiText: 'Durres', href: '#', displayInfo: 'Durrës Text' },
        { displayText: 'Shkodër', apiText: 'Shkoder', href: '#', displayInfo: 'Shkodër Text' },
      ],
      thingsToDo: [
        // { displayText: 'Museums', href: '#', displayInfo: 'Explore local museums' },
        // { displayText: 'Restaurants', href: '#', displayInfo: 'Local cuisine' },
        // { displayText: 'Events', href: '#', displayInfo: 'Upcoming events' },
      ],
      other: [
        // { displayText: 'Transportation', href: '#', displayInfo: 'Transportation info' },
        // { displayText: 'Documents', href: '#', displayInfo: 'Neccesary documents for traveling' },
        // { displayText: 'Emergency', href: '#', displayInfo: 'Emergency contacts' },
      ],
      weather: {
        temp_c: null,
        temp_f: null,
        condition: {
          text: '',
          icon: ''
        }
      },
      selectedPlace: null,
      hoveredPlace: null
    }
  },
  computed: {
    currentItems() {
      switch(this.activeSection) {
        case 'Places to be':
          return this.places;
        case 'Things to do':
          return this.thingsToDo;
        case 'Other':
          return this.other;
        default:
          return this.currentItems;
      }
    },
    currentComponent() {
      switch(this.activeSection) {
        case 'Places to be':
          return 'places-layout';
        case 'Things to do':
          return 'things-layout';
        case 'Other':
          return 'other-layout';
        default:
          return this.currentComponent;

      }
    }
  },
  watch: {
    currentItems: {
      immediate: true,
      handler(items) {
        if (items && items.length > 0 && !this.selectedPlace) {
          this.selectedPlace = items[0];
          if (this.selectedPlace.apiText) {
            this.fetchWeatherData(this.selectedPlace.apiText);
          }
        }
      }
    }
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
      if (place.apiText) {
        this.fetchWeatherData(place.apiText);
      }
    },
    setHoveredPlace(place) {
      this.hoveredPlace = place;
    }
  }
}
</script>

<template>
  <component 
    :is="currentComponent"
    :items="currentItems"
    :selected-item="selectedPlace"
    :hovered-item="hoveredPlace"
    :weather="weather"
    @hover="setHoveredPlace"
    @leave="setHoveredPlace"
    @select="selectPlace"
  />
</template>