<script setup>
import HorizontalLine from "@/Components/HorizontalLine.vue";
import AlertTriangle from "@/Components/AlertTriangle.vue";
</script>
<template>
    <div class="mb-6">
        <HorizontalLine />
        <h3 class="text-xl font-bold text-left py-2">
            Collectan an audience for retargeting
        </h3>

        <label
            for="audience_name"
            class="block mb-2 mt-4 text-sm font-medium text-gray-900"
        >
            Create a retargeting audience based on this campaign</label
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
        <div class="flex items-center pl-4 border border-gray-200 rounded-lg">
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
                >Collect users who completed conversions in this campaign</label
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
                <option>Create new or select the existing one</option>
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
                >We will start collecting your audience after you launch the
                campaign. This audience will appear in the
                <a href="#" class="text-blue-600 hover:underline"
                    >“Audience” section </a
                >, and you will be able to target it.</label
            >
        </div>
    </div>
</template>
