<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen
        bg-dots-darker bg-center bg-gray-800
        dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="fixed top-0 left-0 p-6 text-right">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-red-300 hover:text-red-500 dark:text-red-400
                dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-red-300 hover:text-red-400 dark:text-gray-400
                    dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-red-300 hover:text-red-400 dark:text-gray-400
                    dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>

        <div class="pt-24 px-8">
            <!--Logo-->
            <div class="flex justify-center items-center">
                <div class="w-fit sm:w-1/3">
                    <img src="/airpop-platform.png" class="mx-auto" alt="PropellerLogo" />
                    <p class="text-white text-center font-sans text-2xl font-semibold py-1">
                    NOT JUST ANOTHER DIGITAL MARKETING PLATFORM
                    </p>
                </div>
            </div>

            <!--About Us-->
            <div>
                <div class="flex justify-center items-center">
                    <div class="w-full sm:w-1/2">
                        <p
                        class="text-center text-red-300 mt-40 text-4xl font-semibold"
                        >ABOUT US</p>
            
                        <p
                        class="text-center text-white mt-5 text-3xl font-semibold"
                        >WHAT IS AIRPOP?</p>
            
            
                        <div
                        class="pt-5"
                        >
                            <p
                                class="text-center text-white text-l"
                            >
                                Airpop brings to you state-of-the-art performance marketing solutions via programmatic
                                push-ads on a worldwide scale. We have partnered with one of the biggest traffic provider
                                (and more will be added) with more than 1 billion monthly audience reach and thousands of
                                advertising campaigns launched daily, across various desktop and mobile OSes.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-around flex-wrap mt-10">
                    <div class="w-full sm:w-1/3 py-5">
                        <p class="text-center text-red-300 text-7xl font-semibold">200+</p>
                        <p class="text-center text-white text-l">Coverage in more than 200 countries</p>
                    </div>
                    <div class="w-full sm:w-1/3 py-5">
                        <p class="text-center text-red-300 text-7xl font-semibold">RM0.01</p>
                        <p class="text-center text-white text-l">CPC as low as RM0.01*</p>
                        <p class="text-center text-white text-l">*based on 2023 average CPC of India push ads</p>
                    </div>
                    <div class="w-full sm:w-1/3 py-5">
                        <p class="text-center text-red-300 text-7xl font-semibold">100k+</p>
                        <p class="text-center text-white text-l">Ad impressions per second</p>
                    </div>
                    <div class="w-full sm:w-1/3 py-5">
                        <p class="text-center text-red-300 text-7xl font-semibold">20M+</p>
                        <p class="text-center text-white text-l">More than 20 million global clicks on push-ads every 24 hours*</p>
                        <p class="text-center text-white text-l">*based on 2023 global average clicks</p>
                    </div>
                    <div class="w-full sm:w-1/3 py-5">
                        <p class="text-center text-red-300 text-7xl font-semibold">2M+</p>
                        <p class="text-center text-white text-l">More than 2 million global clicks on interstitial-ads every 24 hours*</p>
                        <p class="text-center text-white text-l">*based on 2023 global average clicks</p>
                    </div>
                </div>
            </div>

            <!--Ad Formats-->
            <div>
                <div class="flex justify-center items-center">
                    <div class="w-full sm:w-1/2">
                    <p
                        class="text-center text-red-300 mt-40 text-4xl font-semibold"
                    >AD FORMATS</p>
        
                    <p
                        class="text-center text-white mt-5 text-3xl font-semibold"
                    >WHY PROGRAMMATIC PUSH-ADS?</p>
        
                        <div
                            class="pt-5"
                        >
                            <p
                                class="text-center text-white text-l"
                            >
                                Programmatic push-ads has exceptional traffic quality (filtered bot and fake clicks),
                                along with impressive traffic volume of more than 100k ad impressions per second,
                                improved ad performance through precise targeting and customization,
                                time and budget savings through AI-powered automation,
                                and efficient campaign management that allows for quick setup and continuous control.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-around flex-wrap mt-10 space-x-4 px-12">
                    <div class="w-full sm:w-1/5 py-5">
                        <div class="flex flex-col">
                            <img src="/OnClick.png" alt="">
                            <p
                            class="text-center text-white mt-5 text-3xl font-semibold"
                            >PUSH NOTIFICATION</p>
                            <p
                            class="text-center text-white text-l"   
                            >Short personalized messages delivered to your target audience even when they are not browsing - across major platforms and devices</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/5 py-5">
                        <div class="flex flex-col">
                            <img src="/OnClick.png" alt="">
                            <p
                            class="text-center text-white mt-5 text-3xl font-semibold"
                            >IN-PAGE NOTIFICATION</p>
                            <p
                            class="text-center text-white text-l"   
                            >Browser-based notifications for all platforms and devices, iOS and MacOS included. They look native and don't require users’ opt-in consent</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/5 py-5">
                        <div class="flex flex-col">
                            <img src="/OnClick.png" alt="">
                            <p
                            class="text-center text-white mt-5 text-3xl font-semibold"
                            >INTERSTITIAL ADS</p>
                            <p
                            class="text-center text-white text-l"   
                            >Big page-overlaying banners, for mobile and desktop. Draw all the attention to your message with these highly interactive banners</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/5 py-5">
                        <div class="flex flex-col">
                            <img src="/OnClick.png" alt="">
                            <p
                            class="text-center text-white mt-5 text-3xl font-semibold"
                            >POP-UNDER ADS</p>
                            <p
                            class="text-center text-white text-l"   
                            >Full-page and eye-catchy format with around 500M impressions daily and smart bidding options</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Our Audience -->
            <div>
                <p>OUR AUDIENCES</p>
                <p>SPECIALIZED INDUSTRY AUDIENCES</p>
                <p>Airpop has curated specialized audiences across 7 main industry groups. Choose the industry that you think is most relevant, save your audiences, and let the algorithm narrow down based on collected clicks!</p>
            </div>
        </div>



    </div>
</template>

<style>

</style>
