<script setup>
import RadioButtonCards from "@/Components/RadioButtonCards.vue";
</script>

<template>
    <div class="mb-6">
        <h3 class="text-xl font-bold text-left py-2">Traffic Resources</h3>

        <ul class="grid w-full gap-6 md:grid-cols-3">
            <li>
                <input
                    type="radio"
                    id="exclusive"
                    name="traffic_type"
                    value="exclusive"
                    class="hidden peer"
                    required
                />
                <label
                    for="exclusive"
                    class="inline-flex border border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:text-blue-600"
                >
                    <RadioButtonCards
                        title="Exclusive Inventory"
                        subTitle=" High-quality traffic from our exclusive supply partners."
                        subTitle2="Best for testing."
                    ></RadioButtonCards>
                </label>
            </li>
            <li>
                <input
                    type="radio"
                    id="partner"
                    name="traffic_type"
                    value="partner"
                    class="hidden peer"
                    required
                />
                <label
                    for="partner"
                    class="inline-flex border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100"
                >
                    <RadioButtonCards
                        title="Partner Traffic"
                        subTitle="Selected supply partners' traffic filtered by our anti-fraud systems. User activity targeting is not available."
                        subTitle2="Best for scaling campaigns"
                    ></RadioButtonCards>
                </label>
            </li>
        </ul>
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
</template>
