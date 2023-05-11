<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import RadioButtonCards from "@/Components/RadioButtonCards.vue";
import TrafficResourcesVue from "../Layouts/CreateCampaign/TrafficResources.vue";
import CountriesConversionPrice from "../Layouts/CreateCampaign/CountriesConversionPrice.vue";
import AdvertisingBudget from "../Layouts/CreateCampaign/AdvertisingBudget.vue";

({ user1: Object });
let selectedPlan = "";
</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                <h3 class="text-2xl font-bold text-left py-2">
                    Create Campaign
                </h3>

                <form>
                    <div class="mb-6">
                        <label
                            for="campaignTitle"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Campaign Name</label
                        >
                        <input
                            type="text"
                            id="campaignTitle"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder=""
                        />
                    </div>
                    <div class="mb-6">
                        <label
                            for="campaignTitle"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Choose Advertising Format</label
                        >

                        <!-- radio card -->
                        <ul class="grid w-full gap-6 md:grid-cols-3">
                            <li>
                                <input
                                    type="radio"
                                    id="plan1"
                                    name="plan"
                                    value="plan1"
                                    class="hidden peer"
                                    required
                                />
                                <label
                                    for="plan1"
                                    class="inline-flex border border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:text-blue-600"
                                >
                                    <!-- <div class="block">
                                        <div
                                            class="w-full flex items-center justify-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </div>
                                        <div
                                            class="w-full flex items-center justify-center text-lg font-semibold mt-4"
                                        >
                                            Onclick (Popunder &amp; Direct
                                            Click)
                                        </div>
                                        <div
                                            class="w-full flex items-center justify-center mt-4"
                                        >
                                            Full-page and eye-catchy ads opening
                                            in the background.
                                        </div>
                                    </div> -->
                                    <RadioButtonCards
                                        title="Onclick (Popunder &amp; Direct Click)"
                                        subTitle="Full-page and eye-catchy ads opening in the background."
                                    ></RadioButtonCards>
                                </label>
                            </li>
                            <li>
                                <input
                                    type="radio"
                                    id="plan2"
                                    name="plan"
                                    value="plan2"
                                    class="hidden peer"
                                />
                                <label
                                    for="plan2"
                                    class="inline-flex border border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:text-blue-600"
                                >
                                    <!-- <div class="block">
                                        <div
                                            class="w-full flex items-center justify-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </div>
                                        <div
                                            class="w-full flex items-center justify-center text-lg font-semibold mt-4"
                                        >
                                            Push Notifications
                                        </div>
                                        <div
                                            class="w-full flex items-center justify-center mt-4"
                                        >
                                            Create a notification with a catchy
                                            offer and a vivid banner image
                                        </div>
                                    </div> -->
                                    <RadioButtonCards
                                        title="Push Notifications"
                                        subTitle="Create a notification with a catchy offer and a vivid banner image"
                                    ></RadioButtonCards>
                                </label>
                            </li>
                            <li>
                                <input
                                    type="radio"
                                    id="plan3"
                                    name="plan"
                                    value="plan3"
                                    class="hidden peer"
                                />
                                <label
                                    for="plan3"
                                    class="inline-flex border border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:text-blue-600"
                                >
                                    <!-- <div class="block">
                                        <div
                                            class="w-full flex items-center justify-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </div>
                                        <div
                                            class="w-full flex items-center justify-center text-lg font-semibold mt-4"
                                        >
                                            Interstitial
                                        </div>
                                        <div
                                            class="w-full flex items-center justify-center mt-4 mb-6"
                                        >
                                            Non full-screen banner overlaying
                                            content
                                        </div>
                                    </div> -->
                                    <RadioButtonCards
                                        title="Interstitial"
                                        subTitle="Non full-screen banner overlaying content"
                                    ></RadioButtonCards>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- radio card  Traffic Type-->
                    <div class="mb-6">
                        <label
                            for="campaignTitle"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Traffic Type</label
                        >

                        <ul class="grid w-full gap-6 md:grid-cols-3">
                            <li>
                                <input
                                    type="radio"
                                    id="popunder"
                                    name="traffic_type"
                                    value="popunder"
                                    class="hidden peer"
                                    required
                                />
                                <label
                                    for="popunder"
                                    class="inline-flex border border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:text-blue-600"
                                >
                                    <!-- <div class="block">
                                        <div
                                            class="w-full flex items-center justify-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </div>
                                        <div
                                            class="w-full flex items-center justify-center text-lg font-semibold mt-4"
                                        >
                                            Popunder
                                        </div>
                                        <div
                                            class="w-full flex items-center justify-center mt-4"
                                        >
                                            Full-tab ad with maximum visibility.
                                            Opens in a new browser tab.
                                        </div>
                                    </div> -->
                                    <RadioButtonCards
                                        title="Popunder"
                                        subTitle=" Full-tab ad with maximum visibility. Opens in a new browser tab."
                                    ></RadioButtonCards>
                                </label>
                            </li>
                            <li>
                                <input
                                    type="radio"
                                    id="directClick"
                                    name="traffic_type"
                                    value="directClick"
                                    class="hidden peer"
                                    required
                                />
                                <label
                                    for="directClick"
                                    class="inline-flex border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100"
                                >
                                    <!-- <div class="block">
                                        <div
                                            class="w-full flex items-center justify-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </div>
                                        <div
                                            class="w-full flex items-center justify-center text-lg font-semibold mt-4"
                                        >
                                            Direct Click
                                        </div>
                                        <div
                                            class="w-full flex items-center justify-center mt-4"
                                        >
                                            Top converting zones providing
                                            direct visits to your offer.
                                        </div>
                                    </div> -->
                                    <RadioButtonCards
                                        title="Direct Click"
                                        subTitle="Top converting zones providing direct visits to your offer."
                                    ></RadioButtonCards>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- radio buttons for pricing model -->
                    <div class="mb-6">
                        <label
                            for="campaignTitle"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Pricing Model</label
                        >

                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <input
                                    id="inline-radio"
                                    type="radio"
                                    value="cpagoal"
                                    name="inline-radio-group"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="inline-radio"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                    >CPA Goal 2.0</label
                                >
                            </div>
                            <div class="flex items-center mr-4">
                                <input
                                    id="inline-2-radio"
                                    type="radio"
                                    value="smartcpm"
                                    name="inline-radio-group"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="inline-2-radio"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                    >SmartCPM</label
                                >
                            </div>
                            <div class="flex items-center mr-4">
                                <input
                                    checked
                                    id="inline-checked-radio"
                                    type="radio"
                                    value="cpm"
                                    name="inline-radio-group"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="inline-checked-radio"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                    >CPM</label
                                >
                            </div>
                        </div>
                    </div>
                    <!-- target url -->
                    <div class="mb-6">
                        <label
                            for="campaignTitle"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Target URL</label
                        >
                        <input
                            type="url"
                            id="website"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Start typing..."
                            required
                        />
                    </div>
                </form>
                <TrafficResourcesVue />
                <CountriesConversionPrice />
                <AdvertisingBudget />
            </div>
        </template>
    </SidebarLayout>
</template>
