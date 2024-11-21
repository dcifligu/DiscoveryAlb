<script>
    import FooterWeatherBlock from './FooterWeatherBlock.vue';

    export default{
        components: {
            FooterWeatherBlock
        },
        name: 'FooterComponent',
        data(){
            return{
                footerItemsRow1: [
                    { text: 'Places to be', href: '#' },
                    { text: 'Things to do', href: '#' },
                    { text: 'Other', href: '#' },
                ],
                footerItemsRow2:[

                    { text: 'About Us', href: '#'},
                    { text: 'Contact Us', href: '#'},
                ],
                footerItemsRow3: [
                    { text: 'Privacy Policy', href: '#'},
                    { text: 'Terms of Service', href: '#'},
                    { text: 'Cookie Policy', href: '#'},
                ],
            }
        }
    }
</script>
<template>
    <footer class="bg-[#F9F9F9] py-4 flex flex-row gap-8 relative">
        <div class="w-full mx-6 flex flex-col">
            <div class="w-2/4">
                <div class="flex flex-row items-center gap-1">
                <img src="../../images/Logo.svg" class="w-12 h-12" />
                <span class="font-light text-sm">
                    Discover
                    <br>
                    Today
                </span>
            </div>
            <p class="text-xs mt-4">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, eaque aliquam! Architecto veritatis quia necessitatibus recusandae vitae soluta, deserunt illo reiciendis accusamus repellat corporis inventore! Fuga, tempora? Deleniti, commodi molestias.
            </p>
            <div class="flex flex-row gap-12 py-4 my-2 ">
                <ul class=" flex flex-col gap-4 text-xl font-semibold">
                    <li v-for="item in footerItemsRow1" :key="item.text">
                        <a :href="item.href" class="hover:text-[#3b9999] transition-all duration-300">{{ item.text }}</a>
                    </li>
                </ul>
                <ul class=" flex flex-col gap-4 text-xl font-semibold">
                    <li v-for="item in footerItemsRow2" :key="item.text">
                        <a :href="item.href" class="hover:text-[#3b9999] transition-all duration-300">{{ item.text }}</a>
                    </li>
                </ul>
                <ul class=" flex flex-col gap-4 text-xl font-semibold">
                    <li v-for="item in footerItemsRow3" :key="item.text">
                        <a :href="item.href" class="hover:text-[#3b9999] transition-all duration-300">{{ item.text }}</a>
                    </li>
                </ul>
            </div>
            <a href="mailto:info@discover.com" class="hover:text-[#3b9999] transition-all duration-300">info@discover.com</a>
            </div>
            <span class="text-center">
                &copy; 2024 Discover Today. All rights reserved.
            </span>
        </div>
        <FooterWeatherBlock/>
    </footer>
</template>