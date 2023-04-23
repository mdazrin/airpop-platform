<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
defineProps({ user1: Object });
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
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100"
                                >
                                    <div class="block">
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
                                    </div>
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
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100"
                                >
                                    <div class="block">
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
                                    </div>
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
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100"
                                >
                                    <div class="block">
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
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </template>
    </SidebarLayout>
</template>
