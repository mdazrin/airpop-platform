<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import HorizontalLine from "@/Components/HorizontalLine.vue";
import AlertTriangle from "@/Components/AlertTriangle.vue";
import InputField from "@/Components/InputField.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const advertFormat = ref()


const isOpen = ref(false);
const captionTargetURL = [
    "https://www.domain.com/in.php?clickid=${SUBID}",
    "Add city targeting to reach people in certain cities",
];
const placeholder_dropdown = ref("Select an option");
const dropdownOptions = [
    { value: "option1", label: "Option 1" },
    { value: "option2", label: "Option 2" },
    { value: "option3", label: "Option 3" },
];

const form = useForm({
    name: null,
    target_url: null,
    remember: false,
    countries: null,
    cpa_goal_required: null,
    cpa_goal: null,
    cities_list: null,
    platform: null,
    os: null,
});

</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                <form @submit.prevent="form.post('/onclick-cpag-create')">
                    <h3 class="text-2xl font-bold text-left py-2">
                        Create Campaign
                    </h3>

                    <!-- campaign name -->
                    <InputField
                        id="campaignName"
                        v-model="form.name"
                        title="Campaign Name"
                        placeholder="Start typing..."
                        inputType="input"
                    />

                    <!-- target url -->

                    <InputField
                        id="targetURL"
                        v-model="form.target_url"
                        title="Target URL"
                        placeholder="Start typing..."
                        inputType="input"
                        caption="true"
                        :caption_label="captionTargetURL[0]"
                    />

                <!--Advertising Format-->
                    <div class="mb-6">
                        <HorizontalLine />
                        <h3 class="text-xl font-bold text-left py-2">
                            Advertising Format
                        </h3>

                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <input
                                    checked
                                    id="inline-radio"
                                    type="radio"
                                    v-model="advertFormat"
                                    value="onclick"
                                    name="radio_target_by"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="inline-radio"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                >Onclick</label
                                >
                            </div>
                            <div class="flex items-center mr-4">
                                <input
                                    id="inline-2-radio"
                                    type="radio"
                                    v-model="advertFormat"
                                    value="push"
                                    name="radio_target_by"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="inline-2-radio"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                >Push Notifications</label
                                >
                            </div>
                            <div class="flex items-center mr-4">
                                <input
                                    id="inline-2-radio"
                                    type="radio"
                                    v-model="advertFormat"
                                    value="interstitial"
                                    name="radio_target_by"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="inline-2-radio"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                >Interstitial</label
                                >
                            </div>
                            <div class="flex items-center mr-4">
                                <input
                                    id="inline-2-radio"
                                    type="radio"
                                    v-model="advertFormat"
                                    value="surveyexit"
                                    name="radio_target_by"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="inline-2-radio"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                >Survey Exit</label
                                >
                            </div>
                        </div>

                    </div>

                <!--Onclick Multiformat-->
                    <div v-if="advertFormat === 'onclick'">
                        A
                    </div>
                    <div v-else-if="advertFormat === 'push'">
                        B
                    </div>
                    <div v-else-if="advertFormat === 'interstitial'">
                        C
                    </div>
                    <div v-else-if="advertFormat === 'surveyexit'">
                        D
                    </div>

                    <!-- Countries & Conversion price -->
                    <div class="mb-6">
                        <HorizontalLine />
                        <h3 class="text-xl font-bold text-left py-2">
                            Countries &amp; Conversion Price
                        </h3>
                        <div class="grid gap-6 mb-6 md:grid-cols-6">
                            <div class="col-span-5">
                                <InputField
                                    id="countries"
                                    v-model="form.countries"
                                    title="Countries*"
                                    placeholder="Choose a country"
                                    inputType="dropdown"
                                    :dropdownOptions="dropdownOptions"
                                    :placeholder_dropdown="placeholder_dropdown"
                                    required
                                />
                            </div>
                            <div>
                                <InputField
                                    id="cpa_goal_required"
                                    v-model="form.cpa_goal_required"
                                    title="CPA Goal, $*"
                                    inputType="input"
                                    type="number"
                                    step="0.01"
                                    required
                                />
                            </div>
                            <div class="col-span-5">
                                <div
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >
                                    Add separate rate for Interstitial campaign
                                </div>
                            </div>
                            <div>
                                <InputField
                                    id="cpa_goal"
                                    v-model="form.cpa_goal"
                                    title="CPA Goal, $"
                                    inputType="input"
                                    type="number"
                                    step="0.01"
                                />
                            </div>
                        </div>

                        <!-- targeting -->
                        <div class="mb-6">
                            <HorizontalLine />
                            <h3 class="text-xl font-bold text-left py-2">
                                Targeting
                            </h3>

                            <!-- platform -->

                            <InputField
                                id="platform"
                                v-model="form.platform"
                                title="Platform"
                                placeholder="Start typing..."
                                inputType="dropdown"
                                :dropdownOptions="dropdownOptions"
                                :placeholder_dropdown="placeholder_dropdown"
                            />

                            <!-- os -->
                            <InputField
                                id="os"
                                v-model="form.os"
                                title="OS"
                                placeholder="Start typing..."
                                inputType="dropdown"
                                :dropdownOptions="dropdownOptions"
                                :placeholder_dropdown="placeholder_dropdown"
                            />

                            <!-- device -->
                            <div class="mb-6">
                                <label
                                    for="target_by"
                                    class="block text-sm font-medium text-gray-900"
                                    >Device
                                </label>
                                <div class="flex">
                                    <div class="flex items-center mr-4">
                                        <input
                                            checked
                                            id="inline-radio"
                                            type="radio"
                                            value="include_device"
                                            name="radio_device"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >Include</label
                                        >
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input
                                            id="inline-2-radio"
                                            type="radio"
                                            value="exclude_device"
                                            name="radio_device"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-2-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >Exclude</label
                                        >
                                    </div>
                                    <div
                                        class="flex flex-auto items-center mr-4"
                                    >
                                        <input
                                            type="text"
                                            id="cities_list"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Start typing..."
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- browser -->
                            <div class="mb-6">
                                <label
                                    for="target_by"
                                    class="block text-sm font-medium text-gray-900"
                                    >Browser
                                </label>
                                <div class="flex">
                                    <div class="flex items-center mr-4">
                                        <input
                                            checked
                                            id="inline-radio"
                                            type="radio"
                                            value="include_browser"
                                            name="radio_browser"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >Include</label
                                        >
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input
                                            id="inline-2-radio"
                                            type="radio"
                                            value="exclude_browser"
                                            name="radio_browser"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-2-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >Exclude</label
                                        >
                                    </div>
                                    <div
                                        class="flex flex-auto items-center mr-4"
                                    >
                                        <input
                                            type="text"
                                            id="cities_list"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Start typing..."
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- browser language -->
                            <div class="mb-6">
                                <label
                                    for="target_by"
                                    class="block text-sm font-medium text-gray-900"
                                    >Browser Language
                                </label>
                                <div class="flex">
                                    <div class="flex items-center mr-4">
                                        <input
                                            checked
                                            id="inline-radio"
                                            type="radio"
                                            value="include_browser_language"
                                            name="radio_browser_language"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >Include</label
                                        >
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input
                                            id="inline-2-radio"
                                            type="radio"
                                            value="exclude_browser_language"
                                            name="radio_browser_language"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-2-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >Exclude</label
                                        >
                                    </div>
                                    <div
                                        class="flex flex-auto items-center mr-4"
                                    >
                                        <input
                                            type="text"
                                            id="cities_list"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Start typing..."
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- connection type -->
                            <div class="mb-6">
                                <label
                                    for="target_by"
                                    class="block text-sm font-medium text-gray-900 mb-2"
                                    >Connection Type
                                </label>
                                <div class="flex">
                                    <div class="flex items-center mr-4">
                                        <input
                                            checked
                                            id="inline-radio"
                                            type="radio"
                                            value="include"
                                            name="radio_connection_type"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >All</label
                                        >
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input
                                            id="inline-2-radio"
                                            type="radio"
                                            value="exclude"
                                            name="radio_connection_type"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-2-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >3G / LTE</label
                                        >
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input
                                            id="inline-2-radio"
                                            type="radio"
                                            value="exclude"
                                            name="radio_connection_type"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-2-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >WI-FI /Broadband
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- proxy -->
                            <div class="mb-6">
                                <label
                                    for="target_by"
                                    class="block text-sm font-medium text-gray-900 mb-2"
                                    >Proxy
                                </label>
                                <div class="flex">
                                    <div class="flex items-center mr-4">
                                        <input
                                            id="inline-radio"
                                            type="radio"
                                            value="include"
                                            name="radio_proxy"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >All traffic</label
                                        >
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input
                                            id="inline-2-radio"
                                            type="radio"
                                            value="exclude"
                                            name="radio_proxy"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-2-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >Only proxy</label
                                        >
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input
                                            checked
                                            id="inline-2-radio"
                                            type="radio"
                                            value="exclude"
                                            name="radio_proxy"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-2-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >No proxy
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile ISP -->
                            <div class="mb-6">
                                <label
                                    for="target_by"
                                    class="block text-sm font-medium text-gray-900"
                                    >Mobile ISP
                                </label>
                                <div class="flex">
                                    <div class="flex items-center mr-4">
                                        <input
                                            checked
                                            id="inline-radio"
                                            type="radio"
                                            value="include_mobile_isp"
                                            name="radio_mobile_isp"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >Include</label
                                        >
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input
                                            id="inline-2-radio"
                                            type="radio"
                                            value="exclude_mobile_isp"
                                            name="radio_mobile_isp"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-2-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >Exclude</label
                                        >
                                    </div>
                                    <div
                                        class="flex flex-auto items-center mr-4"
                                    >
                                        <input
                                            type="text"
                                            id="cities_list"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Start typing..."
                                        />
                                    </div>
                                </div>
                                <div>
                                    <label
                                        for="target_by"
                                        class="block mb-2 text-xs font-medium text-gray-500"
                                        >Please set up GEO and select 3G/LTE
                                        connection type in order to select
                                        Mobile ISP</label
                                    >
                                </div>
                            </div>

                            <!-- zone limitation -->
                            <div class="mb-6">
                                <label
                                    for="target_by"
                                    class="block text-sm font-medium text-gray-900"
                                    >Zone limitation
                                </label>
                                <div class="flex">
                                    <div class="flex items-center mr-4">
                                        <input
                                            checked
                                            id="inline-radio"
                                            type="radio"
                                            value="include_zone_limitation"
                                            name="inline-radio_zone_limitation"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >Include</label
                                        >
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input
                                            id="inline-2-radio"
                                            type="radio"
                                            value="exclude_zone_limitation"
                                            name="inline-radio_zone_limitation"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        />
                                        <label
                                            for="inline-2-radio"
                                            class="ml-2 text-sm font-medium text-gray-900"
                                            >Exclude</label
                                        >
                                    </div>
                                    <div
                                        class="flex flex-auto items-center mr-4"
                                    >
                                        <textarea
                                            id="message"
                                            rows="1"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Zone IDs separated by comma"
                                        ></textarea>
                                    </div>
                                </div>
                                <div>
                                    <label
                                        for="target_by"
                                        class="block mb-2 text-xs font-medium text-gray-500"
                                        >Maximum 5000 zones allowed
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- campaign schedule -->
                        <div class="mb-6">
                            <HorizontalLine />
                            <h3 class="text-xl font-bold text-left py-2">
                                Campaign Schedule
                            </h3>
                            <div>
                                <label
                                    for="audience_name"
                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900"
                                    >Select Timezone</label
                                >
                                <select
                                    id="countries"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Create new or select the existing one"
                                >
                                    <option>UTC (GMT)</option>
                                    <option>UTC+1</option>
                                    <option>UTC+2</option>
                                    <option>UTC+3</option>
                                </select>
                            </div>
                            <!-- <div> date picker </div> -->

                            <AlertTriangle
                                class="mt-8 !text-blue-500 !bg-blue-50 !border-blue-50"
                                title="Before campaign is started it will be sent for review (takes up to 24 hours). And will start immediately."
                            />

                            <AlertTriangle
                                class="!text-blue-500 !bg-blue-50 !border-blue-50"
                                title="Please note that an Interstitial campaign can be rejected in case your landing page cannot be opened via Interstitial banner (is using more than 4 megabytes of network bandwidth)"
                            />

                            <div class="flex items-start mb-6">
                                <div class="flex items-center h-5">
                                    <input
                                        id="terms"
                                        type="checkbox"
                                        value=""
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                        required
                                    />
                                </div>
                                <label
                                    for="terms"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >I declare and guarantee that my campaign
                                    meets the
                                    <a
                                        href="#"
                                        class="text-blue-600 hover:underline dark:text-blue-500"
                                        >Quality Guidelines</a
                                    ></label
                                >
                            </div>
                            <div class="flex items-center justify-end">
                                <button
                                    type="button"
                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 mr-2"
                                >
                                    Save as Draft
                                </button>
                                <button
                                    @click="isOpen = true"
                                    type="submit"
                                    :disabled="form.processing"
                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5"
                                >
                                    Start Campaign
                                </button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div>
                            <!-- <button
                                @click="isOpen = true"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button"
                            >
                                Open Modal
                            </button> -->

                            <div
                                v-if="isOpen"
                                class="fixed inset-0 flex items-center justify-center z-50"
                            >
                                <div
                                    class="relative w-full max-w-md max-h-full"
                                >
                                    <div
                                        class="relative bg-white rounded-lg shadow"
                                    >
                                        <button
                                            @click="isOpen = false"
                                            type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                        >
                                            <svg
                                                aria-hidden="true"
                                                class="w-5 h-5"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                            <span class="sr-only"
                                                >Close modal</span
                                            >
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg
                                                viewBox="0 0 1024 1024"
                                                class="mx-auto mb-4 text-gray-400 w-14 h-14"
                                                xmlns="http://www.w3.org/2000/svg"
                                                id="IconChangeColor"
                                                height="200"
                                                width="200"
                                            >
                                                <path
                                                    fill="green"
                                                    d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm-55.808 536.384-99.52-99.584a38.4 38.4 0 1 0-54.336 54.336l126.72 126.72a38.272 38.272 0 0 0 54.336 0l262.4-262.464a38.4 38.4 0 1 0-54.272-54.336L456.192 600.384z"
                                                    id="mainIconPathAttribute"
                                                ></path>
                                            </svg>
                                            <h3
                                                class="mb-5 text-lg font-normal text-gray-500"
                                            >
                                                Campaign Created Sucessfully
                                            </h3>
                                            <button
                                                type="button"
                                                class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                            >
                                                Next
                                                <svg
                                                    aria-hidden="true"
                                                    class="w-5 h-5 ml-2 -mr-1"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    ></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </template>
    </SidebarLayout>
</template>
