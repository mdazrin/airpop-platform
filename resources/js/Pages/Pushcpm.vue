<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import RadioButtonCards from "@/Components/RadioButtonCards.vue";
import HorizontalLine from "@/Components/HorizontalLine.vue";
import AddDeleteAlert from "@/Components/AddDeleteAlert.vue";
import AlertTriangle from "@/Components/AlertTriangle.vue";
import AlertInfo from "@/Components/AlertInfo.vue";
import InputField from "@/Components/FormComponents/InputField.vue";
import DropdownInputField from "@/Components/FormComponents/DropdownInputField.vue";
import CaptionLabel from "@/Components/FormComponents/CaptionLabel.vue";
import TitleLabel from "@/Components/FormComponents/TitleLabel.vue";
import RadioButtonInput from "@/Components/FormComponents/RadioButtonInput.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    propads_timetable: Object,
    propads_os_version: Object,
    propads_os_type: Object,
    propads_os: Object,
    propads_device_type: Object,
    propads_device: Object,
    propads_browser: Object,
    propads_zone: Object,
    propads_connection: Object,
    propads_mobile_isp: Object,
    propads_proxy: Object,
    propads_language: Object,
    propads_audience: Object,
    propads_traffic_categories: Object,
});

const isOpen = ref(false);
const captionTargetURL = [
    "https://www.domain.com/in.php?clickid=${SUBID}",
    "Add city targeting to reach people in certain cities",
    "Please set up GEO and select 3G/LTE connection type in order to select Mobile ISP",
    "Maximum 5000 zones allowed",
];
const placeholder_dropdown = ref("Select an option");
const dropdownOptions = [
    { value: "option1", label: "Option 1" },
    { value: "option2", label: "Option 2" },
    { value: "option3", label: "Option 3" },
];
const dropdownOptions_timezone = [
    { value: "UTC (GMT)", label: "UTC (GMT)" },
    { value: "UTC+1", label: "UTC+1" },
    { value: "UTC+2", label: "UTC+2" },
];
const dropdownOptions_2 = [
    { value: "include", label: "Include" },
    { value: "exclude", label: "Exclude" },
];
const dropdownOptions_3 = [
    { value: "all", label: "All" },
    { value: "3g", label: "3G / LTE" },
    { value: "wifi", label: "WI-FI / Broadband" },
];

const dropdownOptions_4 = [
    { value: "all", label: "All" },
    { value: "only", label: "Only Proxy" },
    { value: "no", label: "No Proxy" },
];

const radioOptions_1 = [
    { value: "cities", label: "Cities" },
    { value: "states", label: "States" },
];

const form = useForm({
    name: null,
    target_url: null,
    target_by: null,
    remember: false,
    countries: null,
    cpa_goal_required: null,
    cpa_goal: null,
    cities_list: null,
    platform: null,
    os: null,
    timezone: null,
    cities: "",
    states: null,
    connection_type: null,
    proxy_url: null,
});

const inputType_dropdown = ref("dropdown");
</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                <form @submit.prevent="form.post('/push-cpm-create')">
                    <TitleLabel
                        class="text-3xl"
                        title_big="true"
                        title="Create Campaign (Push Notifications CPM)"
                    />

                    <!-- campaign name -->
                    <InputField
                        id="campaignName"
                        v-model="form.name"
                        title="Campaign Name"
                        placeholder="Start typing..."
                        inputType="input"
                        type="text"
                        required
                    />

                    <!-- pricing model -->

                    <!-- target url -->
                    <InputField
                        id="targetURL"
                        v-model="form.target_url"
                        title="Target URL"
                        placeholder="Start typing..."
                        inputType="input"
                        type="text"
                        caption="true"
                        :caption_label="captionTargetURL[0]"
                    />

                    <!-- user activity -->

                    <!-- Countries & Conversion price -->
                    <HorizontalLine />
                    <TitleLabel
                        title_big="true"
                        title=" Countries &amp; Conversion Price"
                    />
                    <div class="grid gap-6 mb-6 md:grid-cols-6">
                        <div class="col-span-5">
                            <InputField
                                id="countries"
                                v-model="form.countries"
                                title="Countries*"
                                placeholder="Choose a country"
                                inputType="dropdown"
                                type="text"
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

                    <!-- advertising budget -->

                    <!-- targeting -->
                    <HorizontalLine />
                    <TitleLabel title_big="true" title=" Targeting" />

                    <!-- platform -->

                    <InputField
                        id="platform"
                        v-model="form.platform"
                        title="Platform"
                        placeholder="Start typing..."
                        inputType="dropdown"
                        type="text"
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
                        type="text"
                        :dropdownOptions="dropdownOptions"
                        :placeholder_dropdown="placeholder_dropdown"
                    />

                    <!-- device -->
                    <div>
                        <TitleLabel title="Device" />

                        <div class="flex">
                            <InputField
                                class="flex items-center mr-2"
                                v-model="form.cities"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions_2"
                                :placeholder_dropdown="placeholder_dropdown"
                            />
                            <InputField
                                class="flex flex-auto items-center"
                                v-model="form.states"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions"
                                :placeholder_dropdown="placeholder_dropdown"
                            />
                        </div>
                    </div>

                    <!-- browser -->
                    <div>
                        <TitleLabel title="Browser" />

                        <div class="flex">
                            <InputField
                                class="flex items-center mr-2"
                                v-model="form.cities"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions_2"
                                :placeholder_dropdown="placeholder_dropdown"
                            />
                            <InputField
                                class="flex flex-auto items-center"
                                v-model="form.states"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions"
                                :placeholder_dropdown="placeholder_dropdown"
                            />
                        </div>
                    </div>

                    <!-- browser language -->
                    <div>
                        <TitleLabel title="Browser Language" />

                        <div class="flex">
                            <InputField
                                class="flex items-center mr-2"
                                v-model="form.cities"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions_2"
                                :placeholder_dropdown="placeholder_dropdown"
                            />
                            <InputField
                                class="flex flex-auto items-center"
                                v-model="form.states"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions"
                                :placeholder_dropdown="placeholder_dropdown"
                            />
                        </div>
                    </div>

                    <!-- connection type -->
                    <!-- <InputField
                                title="Connection Type"
                                v-model="form.cities"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions_3"
                                :placeholder_dropdown="placeholder_dropdown"
                            /> -->

                    <RadioButtonInput
                        title="Connection Type"
                        :options="dropdownOptions_3"
                        v-model="form.connection_type"
                    />

                    <!-- proxy -->
                    <!-- <InputField
                                title="Proxy"
                                v-model="form.cities"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions_4"
                                :placeholder_dropdown="placeholder_dropdown"
                            /> -->

                    <RadioButtonInput
                        title="Proxy"
                        :options="dropdownOptions_4"
                        v-model="form.proxy"
                    />

                    <!-- Mobile ISP -->
                    <div>
                        <TitleLabel title="Mobile ISP" />

                        <div class="flex">
                            <InputField
                                class="flex items-center mr-2"
                                v-model="form.cities"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions_2"
                                :placeholder_dropdown="placeholder_dropdown"
                            />
                            <InputField
                                class="flex flex-auto items-center"
                                v-model="form.states"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions"
                                :placeholder_dropdown="placeholder_dropdown"
                            />
                        </div>
                        <CaptionLabel :caption_label="captionTargetURL[2]" />
                    </div>

                    <!-- zone limitation -->
                    <div>
                        <TitleLabel title="Zone limitation" />

                        <div class="flex">
                            <InputField
                                class="flex items-center mr-2"
                                v-model="form.cities"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions_2"
                                :placeholder_dropdown="placeholder_dropdown"
                            />
                            <InputField
                                class="flex flex-auto items-center"
                                v-model="form.states"
                                inputType="dropdown"
                                type="text"
                                :dropdownOptions="dropdownOptions"
                                :placeholder_dropdown="placeholder_dropdown"
                            />
                        </div>
                        <CaptionLabel :caption_label="captionTargetURL[3]" />
                    </div>

                    <!-- Audiences -->

                    <!-- Collect an audience for retargeting -->

                    <!-- campaign schedule -->
                    <div class="mb-6">
                        <HorizontalLine />
                        <TitleLabel
                            title_big="true"
                            title=" Campaign Schedule"
                        />

                        <InputField
                            id="timezone"
                            v-model="form.os"
                            title="Select Timezone"
                            inputType="dropdown"
                            :dropdownOptions="dropdownOptions_timezone"
                            :placeholder_dropdown="placeholder_dropdown"
                        />

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
                                >I declare and guarantee that my campaign meets
                                the
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

                    <!-- Creative 1 -->

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
                            <div class="relative w-full max-w-md max-h-full">
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
                                        <span class="sr-only">Close modal</span>
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
                </form>
            </div>
        </template>
    </SidebarLayout>
</template>
