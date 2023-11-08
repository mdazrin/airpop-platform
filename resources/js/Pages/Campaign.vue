<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import TitleLabel from "@/Components/FormComponents/TitleLabel.vue";

import { ref } from "vue";
import TableLayout from "@/Layouts/TableLayout.vue";
import FilteredComponent from "@/Components/CampaignComponents/FilterComponent.vue";
import NestedFilterComponent from "@/Components/CampaignComponents/NestedFilterComponent.vue";
import CountriesandRate from "@/Components/CampaignComponents/CountriesRate.vue";

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
                <TitleLabel
                    class="text-4xl"
                    :title_big="true"
                    title="Campaign List"
                />
                <TableLayout :header="header" :tableData="campaign.result" />
                <FilteredComponent/>
                <NestedFilterComponent/>
                <CountriesandRate/>
            </div>
        </template>
    </SidebarLayout>
</template>
