<script>

export default{
    name: 'RegionsComponent',
}

</script>

<template>
    <img src="../../images/urban.jpg" class="w-screen h-screen object-cover absolute z-0 " />
    <div class="w-screen h-screen my-12 py-3 relative z-10 flex flex-col">
        <div class="flex flex-row justify-between w-full h-2/3">
            <div class="flex flex-col h-full py-12">
                <h2 class="text-7xl font-semibold mx-12 my-3 text-[#2c7474] drop-shadow-xl shadow-[#000000]">Discover</h2>
                <h3 class="text-4xl font-semibold mx-12 text-[#2c7474] drop-shadow-xl shadow-[#000000]">Urban Life</h3>
            </div>
            <img src="../../images/Tirana.png" alt="Tirana.png" class="mx-24 scale-75">
        </div>

        <div class="flex w-full h-full justify-between items-center absolute">
            <div class="flex justify-center w-12 h-12 bg-[#2c7474] hover:bg-[#3b9999] rounded-md group transition-all duration-300 cursor-pointer mx-3">
                <span class="text-[#fbfbef] text-2xl font-extrabold group-hover:text-[#feffe0] flex justify-center items-center transition-all duration-300">&lt;</span>
            </div>    
            <div class="flex justify-center w-12 h-12 bg-[#2c7474] hover:bg-[#3b9999] rounded-md group transition-all duration-300 cursor-pointer mx-3">
                <span class="text-[#fbfbef] text-2xl font-extrabold group-hover:text-[#feffe0] flex justify-center items-center transition-all duration-300">></span>
            </div>
        </div>
    </div>
</template>