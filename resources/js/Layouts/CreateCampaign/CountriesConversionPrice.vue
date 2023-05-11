<script setup>
import RadioButtonCards from "@/Components/RadioButtonCards.vue";
</script>

<template>
    <div class="mb-6">
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
    </div>
</template>
