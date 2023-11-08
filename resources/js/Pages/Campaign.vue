<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import TitleLabel from "@/Components/FormComponents/TitleLabel.vue";

import { ref } from "vue";
import TableLayout from "@/Layouts/TableLayout.vue";
import FilteredComponent from "@/Components/CampaignComponents/FilterComponent.vue";
import NestedFilterComponent from "@/Components/CampaignComponents/NestedFilterComponent.vue";
import CountriesandRate from "@/Components/CampaignComponents/CountriesRate.vue";
import InputComponent from "@/Components/CampaignComponents/InputComponent.vue";

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

const items = ref([
  { name: 'Item 1', category: 'A' },
  { name: 'Item 2', category: 'B' },
  { name: 'Item 3', category: 'A' },
]);
const name = ref("");
</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                <TitleLabel
                    class="text-4xl"
                    :title_big="true"
                    title="Campaign List"
                />
                <TableLayout :header="header" :tableData="campaign.result" />
                <InputComponent v-model="name" :label="'Name'"/>
                <p>data inside component {{ name }}</p>
                <NestedFilterComponent :items="items"  />
                <FilteredComponent :data="items"/>
                <!-- <CountriesandRate/> -->
            </div>
        </template>
    </SidebarLayout>
</template>
