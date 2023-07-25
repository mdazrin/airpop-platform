<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import { ref } from "vue";

defineProps({
    campaign: Object,
    statistics: Object,
});
const header = ref([
    "ID",
    "Name",
    "Rate Model",
    "Status",
    "Archived",
    "Daily Limit Amount",
    "Total Limit Amount",
]);
</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                <h3 class="text-2xl font-bold text-left py-2">Campaign List</h3>
                <div class="overflow-x-auto relative sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50"
                        >
                            <tr>
                                <th
                                    scope="col"
                                    class="py-3 px-6"
                                    v-for="item in header"
                                    :key="item"
                                >
                                    {{ item }}
                                </th>

                                <th scope="col" class="py-3 px-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b"
                                v-for="item in campaign.result"
                                :key="item.id"
                            >
                                <th
                                    scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap"
                                >
                                    {{ item.id }}
                                </th>
                                <td class="py-4 px-6">{{item.name}}</td>
                                <td class="py-4 px-6">{{item.rate_model}}</td>
                                <td class="py-4 px-6">{{item.status}}</td>
                                <td class="py-4 px-6">{{item.is_archived}}</td>
                                <td class="py-4 px-6">
                                    {{item.limit_daily_amount}}
                                </td>
                                <td class="py-4 px-6">
                                    {{item.limit_total_amount}}
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a
                                        href="#"
                                        class="font-medium text-blue-600 hover:underline"
                                        >Edit</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </template>
    </SidebarLayout>
</template>
