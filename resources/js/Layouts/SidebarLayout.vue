<script setup>
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const showSide = ref(true);
const open = ref(false);
</script>

<template>
    <div>
        <!-- navbar -->
        <nav class="fixed top-0 z-50 w-full border-b border-gray-200" style="background-color: rgb(62, 62, 62);">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button
                            @click="showSide = !showSide"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out"
                        >
                            <svg
                                class="h-6 w-6"
                                stroke="#F7D2D0"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex':
                                            !showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                            </svg>
                        </button>
                        <Link
                            :href="route('dashboard')"
                            class="flex ml-2 md:mr-24"
                        >
                            <img
                                src="https://propellerads.com/wp-content/uploads/2022/11/header_logo_new.svg"
                                class="h-8 mr-3"
                                alt="PropellerLogo"
                            />
                            <span
                                class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white"
                                >Airpop Platform</span
                            >
                        </Link>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center ml-3">
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <!-- Settings Dropdown -->
                                <div class="ml-3 relative">
                                    <Dropdown align="right" width="48">
                                        <template #trigger>
                                            <span
                                                class="inline-flex rounded-md"
                                            >
                                                <button
                                                    type="button"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                                >
                                                    {{
                                                        $page.props.auth.user
                                                            .name
                                                    }}

                                                    <svg
                                                        class="ml-2 -mr-0.5 h-4 w-4"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"
                                                        />
                                                    </svg>
                                                </button>
                                            </span>
                                        </template>

                                        <template #content>
                                            <DropdownLink
                                                :href="route('profile.edit')"
                                            >
                                                Profile
                                            </DropdownLink>
                                            <DropdownLink
                                                :href="route('logout')"
                                                method="post"
                                                as="button"
                                            >
                                                Log Out
                                            </DropdownLink>
                                        </template>
                                    </Dropdown>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- sidebar -->
        <aside
            id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-gray-100 border-r border-gray-200 sm:translate-x-0"
            aria-label="Sidebar"
            v-show="showSide"
        >
            <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-100">
                <ul class="space-y-2 font-medium">
                    <li @click="open = !open">
                        <button
                            type="button"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-white"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"
                                ></path>
                                <path
                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                                ></path>
                            </svg>
                            <span
                                class="flex-1 ml-3 text-left whitespace-nowrap"
                                >Campaign</span
                            >
                            <svg
                                class="w-6 h-6"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </button>
                        <ul
                            id="dropdown-example"
                            class="py-2 space-y-2"
                            v-show="open"
                        >
                            <li>
                                <Link
                                    :href="route('campaignlist')"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-white"
                                >
                                    Campaign List
                                </Link>
                            </li>
                            <li>
                                <Link
                                    :href="route('createcampaign')"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-white"
                                >
                                    Create Campaign
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <Link
                            :href="route('dashboard')"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-white"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"
                                ></path>
                                <path
                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                                ></path>
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('traffic')"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-white"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"
                                ></path>
                                <path
                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                                ></path>
                            </svg>
                            <span class="ml-3">Traffic</span>
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('conversion')"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-white"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"
                                ></path>
                                <path
                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                                ></path>
                            </svg>
                            <span class="ml-3">Conversion</span>
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('finance')"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-white"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"
                                ></path>
                                <path
                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                                ></path>
                            </svg>
                            <span class="ml-3">Finance</span>
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('dashboard')"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-white"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"
                                ></path>
                                <path
                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                                ></path>
                            </svg>
                            <span class="ml-3">Add funds</span>
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('dashboard')"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-white"
                        >
                            <svg
                                aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                                ></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap"
                                >Others</span
                            >
                            <span
                                class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full"
                                >New</span
                            >
                        </Link>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="p-4 sm:ml-64">
            <div class="p-4 rounded-lg mt-14">
                <slot name="content" />
            </div>
        </div>
    </div>
</template>
