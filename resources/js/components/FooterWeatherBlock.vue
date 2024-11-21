<script>

    export default {
        name: 'FooterWeatherBlock',
    }

</script>

<template>
    <div class="absolute top-[-15%] -right-1 bg-[#539999] w-4/12 h-2/4 rounded-lg text-[#F9F9F9]">
        <div class="flex flex-col h-full m-2">
            <h1 class="font-semibold text-3xl ">
                Weather
            </h1>
            <div class="flex flex-row gap-2 items-center">
                <img src="//cdn.weatherapi.com/weather/64x64/night/116.png" class="h-12 w-fit" alt="weather" srcset="">
                <p class=" text-xl font-semibold">°C / °F</p>
            </div>

            <h2 class="text-right font-semibold text-3xl mr-4">
                PlaceName
            </h2>
        </div>
    </div>
</template>