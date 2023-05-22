<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import RadioButtonCards from "@/Components/RadioButtonCards.vue";
import HorizontalLine from "@/Components/HorizontalLine.vue";
import AddDeleteAlert from "@/Components/AddDeleteAlert.vue";
import AlertTriangle from "@/Components/AlertTriangle.vue";
import AlertInfo from "@/Components/AlertInfo.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const data = ref(["device", "browser", "browserversion"]);

const info = {
    infoCPA: [
        "Auto-Optimization: high",
        "Bidding: automatic to reach desired CPA",
        "Feature: automatic zone excluding",
        "Best for: cost-effective spending",
    ],
    infoSmartCPC: [
        "Auto-optimization: medium",
        "Bidding: second price auction model",
        "Feature: adjustable bids for each ad placement, user activity and different push notification types",
        "Best for: testing and scaling",
    ],
    // for survey exit
    infoSmartCPC_noFeature: [
        "Auto-optimization: medium",
        "Bidding: second price auction model",
        "Best for: testing and scaling",
    ],
    infoSmartCPM: [
        "Auto-optimization: medium",
        "Bidding: second price auction model",
        "Feature: adjustable bids for each ad placement",
        "Best for: testing",
    ],
    infoCPC: [
        "Auto-optimization: low",
        "Feature: User Activity Targeting",
        "Best for: paying for user engagement",
    ],
    // for survey exit
    infoCPC_noFeature: [
        "Auto-optimization: low",
        "Best for: paying for user engagement",
    ],
    infoCPM: [
        "Auto-optimization: none",
        "Bidding: manual control over bid",
        "Feature: User Activity Targeting",
        "Best for: scaling",
    ],
    // interstitial
    infoCPM_lowOptimization: [
        "Auto-optimization: low",
        "Bidding: manual control over bid",
        "Feature: User Activity Targeting",
        "Best for: scaling",
    ],
};

const form = useForm({
    name: null,
    direction: null,
    remember: false,
    pricingModel: null,
});
</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                <h3 class="text-2xl font-bold text-left py-2">
                    Create Campaign
                </h3>

                <form @submit.prevent="form.post('/create-form')">
                    <div class="mb-6">
                        <label
                            for="campaignTitle"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Campaign Name</label
                        >
                        <input
                            type="text"
                            v-model="form.name"
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
                        <ul class="grid w-full gap-6 md:grid-cols-4">
                            <li>
                                <input
                                    type="radio"
                                    v-model="form.direction"
                                    id="onclick"
                                    name="plan"
                                    value="onclick"
                                    class="hidden peer"
                                    required
                                />
                                <label
                                    for="onclick"
                                    class="inline-flex border border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:text-blue-600"
                                >
                                    <RadioButtonCards
                                        title="Onclick (Popunder &amp; Direct Click)"
                                        subTitle="Full-page and eye-catchy ads opening in the background."
                                    ></RadioButtonCards>
                                </label>
                            </li>
                            <li>
                                <input
                                    type="radio"
                                    v-model="form.direction"
                                    id="push_notifications"
                                    name="plan"
                                    value="push_notifications"
                                    class="hidden peer"
                                />
                                <label
                                    for="push_notifications"
                                    class="inline-flex border border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:text-blue-600"
                                >
                                    <RadioButtonCards
                                        title="Push Notifications"
                                        subTitle="Create a notification with a catchy offer and a vivid banner image"
                                    ></RadioButtonCards>
                                </label>
                            </li>
                            <li>
                                <input
                                    type="radio"
                                    v-model="form.direction"
                                    id="interstitial"
                                    name="plan"
                                    value="interstitial"
                                    class="hidden peer"
                                />
                                <label
                                    for="interstitial"
                                    class="inline-flex border border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:text-blue-600"
                                >
                                    <RadioButtonCards
                                        title="Interstitial"
                                        subTitle="Non full-screen banner overlaying content"
                                    ></RadioButtonCards>
                                </label>
                            </li>
                            <li>
                                <input
                                    type="radio"
                                    v-model="form.direction"
                                    id="survey_exit"
                                    name="plan"
                                    value="survey_exit"
                                    class="hidden peer"
                                />
                                <label
                                    for="survey_exit"
                                    class="inline-flex border border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:text-blue-600"
                                >
                                    <RadioButtonCards
                                        title="Survey Exit"
                                        subTitle="Audience pre-engaged with surveys and ready to convert"
                                    ></RadioButtonCards>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- radio card  Traffic Type-->
                    <div
                        class="mb-6"
                        v-if="
                            form.direction === 'onclick' ||
                            form.direction === 'push_notifications'
                        "
                    >
                        <label
                            for="campaignTitle"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            v-if="form.direction === 'onclick'"
                            >Traffic Type
                        </label>
                        <label
                            for="campaignTitle"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            v-else-if="form.direction === 'push_notifications'"
                            >Push Notification Types
                        </label>
                        <ul>
                            <div
                                class="grid w-full gap-6 md:grid-cols-3"
                                v-if="form.direction === 'onclick'"
                            >
                                <li>
                                    <input
                                        type="radio"
                                        v-model="form.direction"
                                        id="popunder"
                                        name="traffic_type"
                                        value="popunder"
                                        class="hidden peer"
                                        required
                                        checked
                                    />
                                    <label
                                        for="popunder"
                                        class="inline-flex border border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:text-blue-600"
                                    >
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
                                        <RadioButtonCards
                                            title="Direct Click"
                                            subTitle="Top converting zones providing direct visits to your offer."
                                        ></RadioButtonCards>
                                    </label>
                                </li>
                            </div>
                            <div
                                class="grid w-full gap-6 md:grid-cols-3"
                                v-if="form.direction === 'push_notifications'"
                            >
                                <li>
                                    <input
                                        type="radio"
                                        id="classic_push"
                                        name="traffic_type"
                                        value="classic_push"
                                        class="hidden peer"
                                        required
                                    />
                                    <label
                                        for="classic_push"
                                        class="inline-flex border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100"
                                    >
                                        <RadioButtonCards
                                            title="Classic Push"
                                            subTitle="Traditional web-push on the mobile and desktop devices"
                                        ></RadioButtonCards>
                                    </label>
                                </li>
                                <li>
                                    <input
                                        type="radio"
                                        id="inPagePush"
                                        name="traffic_type"
                                        value="inPagePush"
                                        class="hidden peer"
                                        required
                                    />
                                    <label
                                        for="inPagePush"
                                        class="inline-flex border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100"
                                    >
                                        <RadioButtonCards
                                            title="In-Page Push"
                                            subTitle="Works on all platforms including iOS and all browsers"
                                        ></RadioButtonCards>
                                    </label>
                                </li>
                            </div>
                        </ul>
                    </div>

                    <!-- pricing model -->
                    <div class="mb-6">
                        <label
                            v-if="form.direction !== null"
                            for="campaignTitle"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Pricing Model</label
                        >

                        <div class="flex">
                            <div
                                class="flex items-center mr-4"
                                v-if="
                                    form.direction === 'push_notifications' ||
                                    form.direction === 'interstitial'
                                "
                            >
                                <input
                                    checked
                                    id="cpagoal"
                                    type="radio"
                                    value="cpagoal"
                                    name="pricing-model"
                                    v-model="form.pricingModel"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="cpagoal"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                    >CPA Goal</label
                                >
                            </div>
                            <div
                                class="flex items-center mr-4"
                                v-if="
                                    form.direction === 'onclick' ||
                                    form.direction === 'survey_exit'
                                "
                            >
                                <input
                                    checked
                                    id="cpagoal2"
                                    type="radio"
                                    value="cpagoal2"
                                    name="pricing-model"
                                    v-model="form.pricingModel"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="cpagoal2"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                    >CPA Goal 2.0</label
                                >
                            </div>

                            <div
                                class="flex items-center mr-4"
                                v-if="
                                    form.direction === 'push_notifications' ||
                                    form.direction === 'survey_exit'
                                "
                            >
                                <input
                                    id="smartCPC"
                                    type="radio"
                                    value="smartCPC"
                                    name="pricing-model"
                                    v-model="form.pricingModel"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="smartCPC"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                    >SmartCPC
                                    <span
                                        class="mr-2 px-2.5 py-0.5 text-xs font-small text-white bg-green-400 rounded"
                                        >NEW
                                    </span></label
                                >
                            </div>
                            <div
                                class="flex items-center mr-4"
                                v-if="form.direction === 'onclick'"
                            >
                                <input
                                    id="inline-2-radio"
                                    type="radio"
                                    value="smartcpm"
                                    name="pricing-model"
                                    v-model="form.pricingModel"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="inline-2-radio"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                    >SmartCPM</label
                                >
                            </div>
                            <div
                                class="flex items-center mr-4"
                                v-if="
                                    form.direction === 'push_notifications' ||
                                    form.direction === 'interstitial' ||
                                    form.direction === 'survey_exit'
                                "
                            >
                                <input
                                    id="inline-checked-radio"
                                    type="radio"
                                    value="cpc"
                                    name="pricing-model"
                                    v-model="form.pricingModel"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="inline-checked-radio"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                    >CPC</label
                                >
                            </div>
                            <div
                                class="flex items-center mr-4"
                                v-if="
                                    form.direction === 'onclick' ||
                                    form.direction === 'push_notifications' ||
                                    form.direction === 'interstitial'
                                "
                            >
                                <input
                                    id="inline-checked-radio"
                                    type="radio"
                                    value="cpm"
                                    name="pricing-model"
                                    v-model="form.pricingModel"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="inline-checked-radio"
                                    class="ml-2 text-sm font-medium text-gray-900"
                                    >CPM</label
                                >
                            </div>
                        </div>
                        <!-- pricing model radio buttons -->
                        <AlertInfo
                            v-if="
                                form.direction === 'push_notifications' &&
                                form.pricingModel === 'smartCPC'
                            "
                            :info="info.infoSmartCPC"
                        />
                        <AlertInfo
                            v-if="
                                form.direction === 'survey_exit' &&
                                form.pricingModel === 'smartCPC'
                            "
                            :info="info.infoSmartCPC_noFeature"
                        />
                        <AlertInfo
                            v-if="
                                form.direction === 'onclick' &&
                                form.pricingModel === 'smartcpm'
                            "
                            :info="info.infoSmartCPM"
                        />
                        <AlertInfo
                            v-if="
                                (form.direction === 'push_notifications' &&
                                    form.pricingModel === 'cpc') ||
                                (form.direction === 'interstitial' &&
                                    form.pricingModel === 'cpc')
                            "
                            :info="info.infoCPC"
                        />
                        <AlertInfo
                            v-if="
                                form.direction === 'survey_exit' &&
                                form.pricingModel === 'cpc'
                            "
                            :info="info.infoCPC_noFeature"
                        />
                        <AlertInfo
                            v-if="
                                (form.direction === 'onclick' &&
                                    form.pricingModel === 'cpm') ||
                                (form.direction === 'push_notifications' &&
                                    form.pricingModel === 'cpm')
                            "
                            :info="info.infoCPM"
                        />
                        <AlertInfo
                            v-if="
                                form.direction === 'interstitial' &&
                                form.pricingModel === 'cpm'
                            "
                            :info="info.infoCPM_lowOptimization"
                        />
                        <AlertInfo
                            v-else-if="
                                (form.direction === 'onclick' &&
                                    form.pricingModel === 'cpagoal2') ||
                                (form.direction === 'push_notifications' && 
                                    form.pricingModel === 'cpagoal') ||
                                (form.direction === 'interstitial' &&
                                    form.pricingModel === 'cpagoal') ||
                                (form.direction === 'survey_exit' &&
                                    form.pricingModel === 'cpagoal2')
                            "
                            :info="info.infoCPA"
                        />

                        <AlertInfo
                            v-else-if="
                                form.direction !== null &&
                                form.pricingModel === null
                            "
                            :info="info.infoCPA"
                        />

                        <!-- target url -->
                        <div class="block mt-4">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900"
                                for="campaignTitle"
                                >Target URL</label
                            >
                            <input
                                type="url"
                                id="website"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Start typing..."
                                required
                            />
                            <label
                                for="target_by"
                                class="block mb-2 ml-1 pb-4 text-xs font-medium text-gray-500"
                                >https://www.domain.com/in.php?clickid=${SUBID}</label
                            >
                        </div>
                        <div>
                            <span
                                v-for="(item, i) in data"
                                :key="i"
                                class="bg-gray-100 text-gray-400 text-sm font-medium mr-2 px-2.5 py-0.5 rounded"
                                >{item}</span
                            >
                        </div>
                    </div>

                    <div class="mb-6">
                        <HorizontalLine />
                        <div class="flex items-center mb-4">
                            <input
                                id="default-checkbox"
                                type="checkbox"
                                value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            />
                            <label
                                for="default-checkbox"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                >Include Anti-AdBlock
                            </label>
                        </div>
                    </div>
                    <div class="mb-6">
                        <HorizontalLine />
                        <h3 class="text-xl font-bold text-left py-2">
                            Countries &amp; Conversion Price
                        </h3>
                        <div class="grid gap-6 mb-6 md:grid-cols-6">
                            <div class="col-span-5">
                                <label
                                    for="first_name"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Countries*</label
                                >
                                <input
                                    type="text"
                                    id="first_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Start typing..."
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="last_name"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >CPA Goal, $*</label
                                >
                                <input
                                    type="number"
                                    step="0.01"
                                    id="cpa_goal_required"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
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
                                <label
                                    for="cpa_goal"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >CPA Goal, $</label
                                >
                                <input
                                    type="number"
                                    step="0.01"
                                    id="cpa_goal"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                            </div>
                        </div>

                        <!-- Target by -->
                        <div class="mb-6">
                            <label
                                for="target_by"
                                class="block mb-2 text-sm font-medium text-gray-900"
                                >Target by</label
                            >

                            <div class="flex">
                                <div class="flex items-center mr-4">
                                    <input
                                        id="inline-radio"
                                        type="radio"
                                        value="cities"
                                        name="inline-radio-group"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                    />
                                    <label
                                        for="inline-radio"
                                        class="ml-2 text-sm font-medium text-gray-900"
                                        >Cities</label
                                    >
                                </div>
                                <div class="flex items-center mr-4">
                                    <input
                                        id="inline-2-radio"
                                        type="radio"
                                        value="states"
                                        name="inline-radio-group"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                    />
                                    <label
                                        for="inline-2-radio"
                                        class="ml-2 text-sm font-medium text-gray-900"
                                        >States</label
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- cities/states -->
                        <div class="mb-6">
                            <label
                                for="target_by"
                                class="block mb-2 text-sm font-medium text-gray-900"
                                >Cities</label
                            >

                            <div class="flex">
                                <div class="flex items-center mr-4">
                                    <input
                                        id="inline-radio"
                                        type="radio"
                                        value="include"
                                        name="inline-radio-group"
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
                                        value="exclude"
                                        name="inline-radio-group"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                    />
                                    <label
                                        for="inline-2-radio"
                                        class="ml-2 text-sm font-medium text-gray-900"
                                        >Exclude</label
                                    >
                                </div>
                                <div class="flex flex-auto items-center mr-4">
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
                                    >Add city targeting to reach people in
                                    certain cities</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <HorizontalLine />
                        <h3 class="text-xl font-bold text-left py-2">
                            Advertising Budget (USD)
                        </h3>
                        <div>
                            <h6 class="text-md font-bold text-left py-2">
                                OnClick
                            </h6>
                            <div class="grid gap-6 mb-6 md:grid-cols-4">
                                <div>
                                    <label
                                        for="onclick_daily_campaign_budget"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >Daily Campaign Budget, $</label
                                    >
                                    <input
                                        type="number"
                                        id="onclick_daily_campaign_budget"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                </div>
                                <div>
                                    <label
                                        for="onclick_total_campaign_budget"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >Total Campaign Budget, $</label
                                    >
                                    <input
                                        type="number"
                                        id="onclick_total_campaign_budget"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                </div>
                                <AddDeleteAlert title="Add Alert" />
                            </div>

                            <AlertTriangle
                                title="Please note, that budgets below $30 might be
                        exceeded."
                            />
                        </div>
                        <div>
                            <h6 class="text-md font-bold text-left py-2">
                                Interstitial
                            </h6>
                            <div class="grid gap-6 mb-6 md:grid-cols-4">
                                <div>
                                    <label
                                        for="interstitial_daily_campaign_budget"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >Daily Campaign Budget, $</label
                                    >
                                    <input
                                        type="number"
                                        id="interstitial_daily_campaign_budget"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                        required
                                    />
                                </div>
                                <div>
                                    <label
                                        for="interstitial_total_campaign_budget"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >Total Campaign Budget, $</label
                                    >
                                    <input
                                        type="number"
                                        id="interstitial_total_campaign_budget"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder=""
                                    />
                                </div>
                                <AddDeleteAlert title="Add Alert" />
                            </div>

                            <AlertTriangle
                                title="Please note, that budgets below $30 might be
                        exceeded."
                            />
                        </div>
                    </div>
                    <div class="mb-6">
                        <HorizontalLine />
                        <h3 class="text-xl font-bold text-left py-2">
                            Collectan an audience for retargeting
                        </h3>

                        <label
                            for="audience_name"
                            class="block mb-2 mt-4 text-sm font-medium text-gray-900"
                        >
                            Create a retargeting audience based on this
                            campaign</label
                        >

                        <div
                            class="flex items-center mb-2 pl-4 border rounded-lg border-gray-200"
                        >
                            <input
                                id="bordered-radio-1"
                                type="radio"
                                value=""
                                name="bordered-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                            />
                            <label
                                for="bordered-radio-1"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900"
                                >Do not collect</label
                            >
                        </div>
                        <div
                            class="flex items-center pl-4 border border-gray-200 rounded-lg"
                        >
                            <input
                                checked
                                id="bordered-radio-2"
                                type="radio"
                                value=""
                                name="bordered-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                            />
                            <label
                                for="bordered-radio-2"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900"
                                >Collect users who completed conversions in this
                                campaign</label
                            >
                            <span class="flex items-center"
                                ><svg
                                    class="w-5 h-5 mr-2 shrink-0"
                                    fill="rgb(107 114 128)"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </span>
                        </div>
                        <div>
                            <label
                                for="audience_name"
                                class="block mb-2 mt-4 text-sm font-medium text-gray-900"
                                >Audience name</label
                            >
                            <select
                                id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Create new or select the existing one"
                            >
                                <option>
                                    Create new or select the existing one
                                </option>
                                <option>No options</option>
                            </select>
                        </div>
                        <div>
                            <label
                                for="target_by"
                                class="block mb-2 ml-1 pb-4 text-xs font-medium text-gray-500"
                                >You can have 15 unique audiences</label
                            >
                        </div>
                        <AlertTriangle
                            title="Make sure to set up and test S2S postback in advance"
                        />

                        <div>
                            <label
                                for="target_by"
                                class="block ml-1 text-sm font-medium text-gray-500"
                                >We will start collecting your audience after
                                you launch the campaign. This audience will
                                appear in the
                                <a
                                    href="#"
                                    class="text-blue-600 hover:underline"
                                    >“Audience” section </a
                                >, and you will be able to target it.</label
                            >
                        </div>
                    </div>
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
                            class="mt-8"
                            title="Before campaign is started it will be sent for review (takes up to 24 hours). And will start immediately."
                        />

                        <AlertTriangle
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
                                type="submit"
                                :disabled="form.processing"
                                class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5"
                            >
                                Start Campaign
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </template>
    </SidebarLayout>
</template>
