<script setup>
import HorizontalLine from "@/Components/HorizontalLine.vue";
import AlertTriangle from "@/Components/AlertTriangle.vue";
</script>

<template>
    <div class="mb-6">
        <HorizontalLine />
        <h3 class="text-xl font-bold text-left py-2">Campaign Schedule</h3>
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
                >I declare and guarantee that my campaign meets the
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
                class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5"
            >
                Start Campaign
            </button>
        </div>
    </div>
</template>
