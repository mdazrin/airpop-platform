<script setup>
import HorizontalLine from "@/Components/HorizontalLine.vue";
</script>

<template>
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
                <div class="block mb-2 text-sm font-medium text-gray-900">
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
                    >Add city targeting to reach people in certain cities</label
                >
            </div>
        </div>
    </div>
</template>
