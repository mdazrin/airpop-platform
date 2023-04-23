<script setup>
import SidebarLayout from '@/Layouts/SidebarLayout.vue';
import {ref} from "vue";
const gridData = [
    { country: 'India', total_impressions: 10000, cpm:1.939, optimal_cpm:1.200 },
    { country: 'India', total_impressions: 10000, cpm:1.939, optimal_cpm:1.200 },
    { country: 'India', total_impressions: 10000, cpm:1.939, optimal_cpm:1.200 },
    { country: 'India', total_impressions: 10000, cpm:1.939, optimal_cpm:1.200 },
]

const picked = ref('One')
const message = ref('')
const platform = ref('')
const operating_system = ref('')
</script>

<template>

    <SidebarLayout>
        <template #content>
            <h1>Traffic Chart</h1>

            <input type="radio" id="one" value="One" v-model="picked" />
            <label for="one">OnClick</label>

            <input type="radio" id="two" value="Two" v-model="picked" />
            <label for="two">Push Notifications</label>

            <input type="radio" id="three" value="Three" v-model="picked" />
            <label for="three">Interstitial</label>

            <input v-model="message" placeholder="search country" />

            <select v-model="platform">
                <option disabled value="">All Platforms</option>
                <option>PC</option>
                <option>Mobile</option>
            </select>

            <select v-model="operating_system">
                <option disabled value="">All OS</option>
                <option>Linux</option>
                <option>Windows</option>
                <option>Mac</option>
            </select>

            <table class="table-fixed mx-auto mt-10">
                <thead class="bg-blue-100">
                <tr>
                    <td class="px-6 py-6">
                        Country
                    </td>
                    <td class="px-6 py-6">
                        Total Impressions
                    </td>
                    <td class="px-6 py-6">
                        Max CPM
                    </td>
                    <td class="px-6 py-6">
                        Optimal CPM
                    </td>
                </tr>
                </thead>
                <tbody class="border-b">
                <tr v-for="data in gridData" :key="gridData.id">
                    <td class="px-6 py-6">
                        {{data.country}}
                    </td>
                    <td class="px-6 py-6">
                        {{data.total_impressions}}
                    </td>
                    <td class="px-6 py-6">
                        {{data.cpm}}
                    </td>
                    <td class="px-6 py-6">
                        {{data.optimal_cpm}}
                    </td>
                </tr>
                </tbody>
            </table>

        </template>
    </SidebarLayout>

</template>
