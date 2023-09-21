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
            <h1 class="text-2xl main mb-2">Traffic Chart</h1>

            <div class="mb-4">
                <div class="flex justify-start mb-2">
                    <div class="radio-inputs">
                        <label class="radio" for="one">
                        <input type="radio" id="one" value="One" v-model="picked" />
                        <span class="name">OnClick</span>
                        </label>
                        <label class="radio" for="two">
                        <input type="radio" id="two" value="Two" v-model="picked" />
                        <span class="name">Push Notifications</span>
                        </label>
                        <label class="radio" for="three">
                        <input type="radio" id="three" value="Three" v-model="picked" />
                        <span class="name">Interstitial</span>
                        </label>
                    </div>
                </div>
                <div class="flex justify-start mb-2">
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full pl-4" v-model="message" placeholder="search country" />
                    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-max pl-4" v-model="platform">
                        <option disabled value="">All Platforms</option>
                        <option>PC</option>
                        <option>Mobile</option>
                    </select>
                    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-max pl-4" v-model="operating_system">
                        <option disabled value="">All OS</option>
                        <option>Linux</option>
                        <option>Windows</option>
                        <option>Mac</option>
                    </select>
                </div>
            </div>

            <table class="table-fixed mx-auto mt-4 w-full">
                <thead class="border-b">
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
<style>
 .main {
    color: #F7D2D0;
 }
 .secondary{
    color: #D5EAF0;
 }
 .radio-inputs {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  border-radius: 0.5rem;
  background-color: #EEE;
  box-sizing: border-box;
  box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
  padding: 0.25rem;
  width: 300px;
  font-size: 14px;
}
.radio-inputs .radio {
  flex: 1 1 auto;
  text-align: center;
}

.radio-inputs .radio input {
  display: none;
}

.radio-inputs .radio .name {
  display: flex;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  border-radius: 0.5rem;
  border: none;
  padding: .5rem 0;
  color: rgba(51, 65, 85, 1);
  transition: all .15s ease-in-out;
}

.radio-inputs .radio input:checked + .name {
  background-color: #fff;
  font-weight: 600;
}
</style>