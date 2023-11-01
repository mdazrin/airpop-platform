<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import TitleLabel from "@/Components/FormComponents/TitleLabel.vue";

import { ref } from "vue";
import TableLayout from "@/Layouts/TableLayout.vue";

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
            <TitleLabel
                title_big="true"
                title="Campaign List"
            />  
            <TableLayout :header="header" :tableData="campaign.result" />`
        </template>
    </SidebarLayout>
</template>
