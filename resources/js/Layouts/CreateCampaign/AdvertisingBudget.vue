<script setup>
import HorizontalLine from "@/Components/HorizontalLine.vue";
import AddDeleteAlert from "@/Components/AddDeleteAlert.vue";
import AlertTriangle from "@/Components/AlertTriangle.vue";
</script>

<template>
    <div class="mb-6">
        <HorizontalLine />
        <h3 class="text-xl font-bold text-left py-2">
            Advertising Budget (USD)
        </h3>
        <div>
            <h6 class="text-md font-bold text-left py-2">OnClick</h6>
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
            <h6 class="text-md font-bold text-left py-2">Interstitial</h6>
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
</template>
