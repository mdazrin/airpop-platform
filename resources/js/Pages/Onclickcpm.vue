<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import { useForm } from "@inertiajs/vue3";
import {ref, watch} from "vue";

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

//test countries
const listCountries = ref([])
//const count = ref(0)



const isOpen = ref(false);


const form = useForm({
    name: null,
    target_url:null,
    is_adblock_buy:null,
    countries:ref([]),
    rates:null,
    user_activity:ref([]),
    remember: false,

});
</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                OnClick CPM
                <p>Checked names: <pre>{{ form.name }}</pre></p>
                <p>Checked target url: <pre>{{ form.target_url }}</pre></p>
                <p>Checked adblock: <pre>{{ form.is_adblock_buy }}</pre></p>
                <p>Checked countries: <pre>{{ form.countries }}</pre></p>
                <p>Checked rates: <pre>{{ form.rates }}</pre></p>

                <form @submit.prevent="form.post('/onclick-cpm-create')">
                    <!-- name -->
                    <input
                        type="text"
                        v-model="form.name"
                        placeholder="name"
                    >
                    <br>
                    <!-- target url -->
                    <input
                        type="text"
                        v-model="form.target_url"
                        placeholder="target url"
                    >
                    <br>
                    <!-- adblock buy -->
                    <input
                        type="checkbox"
                        v-model="form.is_adblock_buy"
                        true-value=1
                        false-value=null
                    >
                    <br>
                    <!-- Countries -->
                    <li v-for="item in propads_device_type.result">
                        <input
                            type="checkbox"
                            v-model="form.countries"
                            :value="item.value"
                        >
                        <label>{{item.value}}</label>
                    </li>
                    <br>
                    <!-- user activity -->
                    <input
                        type="checkbox"
                        value="1"
                        v-model="form.user_activity"
                    >
                    <br>
                    <!-- Rates -->
                    <input
                        type="text"
                        v-model="form.rates"
                        placeholder="rates"

                    >
                    <br>
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
                    <button
                        type="submit"
                        :disabled="form.processing"
                    >Create</button>
                </form>
            </div>
        </template>
    </SidebarLayout>
</template>

