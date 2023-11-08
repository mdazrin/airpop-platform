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
        <nav class="bg-gray-600 fixed w-full z-20 top-0 left-0 border-b border-gray-600 h-24">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex">
                        <div class="flex items-center justify-start">
                            <!-- hamburger icon -->
                            <button
                                @click="showSide = !showSide"
                                class="inline-flex items-center justify-center p-2 hover:bg-gray-800 focus:outline-none transition duration-150 ease-in-out"
                            >
                                <svg
                                    class="h-6 w-6"
                                    stroke="#F7D2D0"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                </svg>
                            </button>
                        </div>
                        <Link
                            :href="route('dashboard')"
                            class="flex #1e293b"
                        >
                            <!--Logo Relative Path-->
                            <img
                                src="/airpop-platform.png"
                                class="h-16"
                                alt="PropellerLogo"
                            />
                        </Link>
                    </div>
                    <div class="flex">
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
                                                    class="inline-flex items-center px-3 py-2 border border-transparent
                                                    text-sm leading-4 font-medium rounded-md text-white bg-gray-700
                                                    hover:text-white-300 focus:outline-none transition ease-in-out
                                                    duration-150"
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
            class="fixed top-0 left-0 z-10 sm:w-64 w-full h-screen mt-24"
            aria-label="Sidebar"
            v-show="showSide"
        >
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-600 text-white">
                <ul class="space-y-2 font-medium">
                    <li @click="open = !open">
                        <button
                            type="button"
                            class="flex items-center w-full p-2 transition duration-75 rounded-lg hover:bg-gray-800"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-sky-400 transition duration-75"
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
                                    class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 hover:bg-gray-800"
                                >
                                    Campaign List
                                </Link>
                            </li>
                            <li>
                                <Link
                                    :href="route('createcampaign')"
                                    class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 hover:bg-gray-800"
                                >
                                    Create Campaign
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <Link
                            :href="route('dashboard')"
                            class="flex items-center p-2 rounded-lg hover:bg-gray-800"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-sky-400 transition duration-75"
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
                            class="flex items-center p-2 rounded-lg hover:bg-gray-800"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-sky-400 transition duration-75"
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
                            class="flex items-center p-2 rounded-lg hover:bg-gray-800"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-sky-400 transition duration-75 hover:bg-gray-800"
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
                            class="flex items-center p-2 rounded-lg hover:bg-gray-800"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-sky-400 transition duration-75"
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
                            class="flex items-center p-2 rounded-lg hover:bg-gray-800"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-sky-400 transition duration-75"
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
                            class="flex items-center p-2 rounded-lg hover:bg-gray-800"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-sky-400 transition duration-75"
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

        <div class="mt-24" :class="{ 'md:ml-0': !showSide, 'md:ml-64': showSide }" >
            <div class="p-4 bg-gray-100">
                <slot name="content" />
            </div>
        </div>
    </div>
</template>
