<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import { ref } from "vue";
const tabs = [
    { id: "tab1", title: "Payments" },
    { id: "tab2", title: "Expenses" },
    { id: "tab3", title: "Invoices" },
];

const activeTab = ref(0);


</script>

<template>
    <SidebarLayout>
        <template #content>
            <h3 class="text-2xl font-bold text-left py-2">
                Finance
            </h3>

            <div class="mb-6">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400" id="tabExample" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg
                                hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="profile-tab-example"
                                type="button"
                                role="tab"
                                aria-controls="profile-example"
                                aria-selected="false"
                                v-for="(tab,index) in tabs"
                                :key="index"
                                :class="{active:activeTab === index}"
                                @click="activeTab = index"
                            >
                                {{tab.title}}
                            </button>
                        </li>

                    </ul>
                </div>
                <div id="tabContentExample">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile-example" role="tabpanel" aria-labelledby="profile-tab-example">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                </div>
            </div>

        </template>
    </SidebarLayout>
</template>


