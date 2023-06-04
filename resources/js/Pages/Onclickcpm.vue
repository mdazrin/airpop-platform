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
    propads_traffic_categories: Object,
});

const isOpen = ref(false);


const form = useForm({
    name: null,
    target_url:null,
    countries:ref([]),
    user_activity:ref([]),
    remember: false,
});
</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                OnClick CPM
                <p>Checked names: <pre>{{ form.countries }}</pre></p>
                <p>Checked countries: <pre>{{ form.user_activity }}</pre></p>

                <form @submit.prevent="form.post('/onclick-cpm-create')">
                    <!-- name -->
                    <input
                        type="text"
                        v-model="form.name"
                    >
                    <br>
                    <!-- user activity -->
                    <input
                        type="checkbox"
                        value="1"
                        v-model="form.user_activity"
                    >
                    <input
                        type="checkbox"
                        value="2"
                        v-model="form.user_activity"
                    >
                    <input
                        type="checkbox"
                        value="3"
                        v-model="form.user_activity"
                    >
                    <br>
                    <!-- country -->
                    <input
                        type="text"
                        v-model="form.countries"
                        placeholder="countries"
                    >
                    <br>
                    <button
                        type="submit"
                        :disabled="form.processing"
                    >Create</button>
                </form>
            </div>
        </template>
    </SidebarLayout>
</template>

