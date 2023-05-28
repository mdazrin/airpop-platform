<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import RadioButtonCards from "@/Components/RadioButtonCards.vue";
import HorizontalLine from "@/Components/HorizontalLine.vue";
import AddDeleteAlert from "@/Components/AddDeleteAlert.vue";
import AlertTriangle from "@/Components/AlertTriangle.vue";
import AlertInfo from "@/Components/AlertInfo.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    propads_timetable: Object,
    propads_os_version: Object,
    propads_os_type: Object,
    propads_os: Object,
    propads_device_type: Object,
    propads_device: Object,
    propads_browser: Object,
    propads_zone: Object,
    propads_connection: Object,
    propads_mobile_isp: Object,
    propads_proxy: Object,
    propads_language: Object,
    propads_audience: Object,
    propads_traffic_categories: Object

});

const form = useForm({
    name: null,
    target_url:null,
    remember: false,
});
</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                OnClick CPA Goal 2.0
                <form @submit.prevent="form.post('/onclick-cpag-create')">
                    <!-- name -->
                    <input
                        type="text"
                        v-model="form.name"
                        placeholder="name"
                    ><br>
                    <!-- target url -->
                    <input
                        type="text"
                        v-model="form.target_url"
                        placeholder="target url"
                    ><br>
                    <button type="submit" :disabled="form.processing">Create</button>
                </form>
            </div>
        </template>
    </SidebarLayout>
</template>

