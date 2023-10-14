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
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:left-0 p-6 text-right">
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

        <div>
            <!--Logo-->
            <img
                src="/airpop-platform.png"
                class="mx-auto"
                alt="PropellerLogo"
            />

            <p
            class="text-white text-center font-sans text-2xl font-semibold py-1"
            >
                NOT JUST ANOTHER DIGITAL MARKETING PLATFORM</p>

            <!--About Us-->
            <p
            class="text-center text-red-300 mt-40 text-4xl font-semibold"
            >ABOUT US</p>

            <p
            class="text-center text-white mt-5 text-3xl font-semibold"
            >WHAT IS AIRPOP?</p>


            <div
            class="px-20 pt-5"
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

            <!--Ad Formats-->
            <p
                class="text-center text-red-300 mt-40 text-4xl font-semibold"
            >AD FORMATS</p>

            <p
                class="text-center text-white mt-5 text-3xl font-semibold"
            >WHY PROGRAMMATIC PUSH-ADS?</p>

            <div
                class="px-20 pt-5"
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
</template>

<style>

</style>