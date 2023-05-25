<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import RadioButtonCards from "@/Components/RadioButtonCards.vue";
import HorizontalLine from "@/Components/HorizontalLine.vue";
import AddDeleteAlert from "@/Components/AddDeleteAlert.vue";
import AlertTriangle from "@/Components/AlertTriangle.vue";
import AlertInfo from "@/Components/AlertInfo.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";


const form = useForm({
    name: null,
    direction: null,
    rate_model: null,
    target_url:null,
    remember: false,
});
</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                Campaign List
            </div>
        </template>
    </SidebarLayout>
</template>

