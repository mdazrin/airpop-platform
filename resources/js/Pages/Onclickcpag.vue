<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import {router} from "@inertiajs/vue3";
import {ref} from "vue";

//advert format render condition
const onclickMultiFormat = ref('onclick')
const campaignDays = ref('Monday')

//countries pool
const countriesPool = ref([
    {name:'USA',countryValue:'us', checkedValue:false},
    {name:'India',countryValue:'in', checkedValue:false},
    {name:'Italy',countryValue:'it', checkedValue:false}

])

//platform
const platform = ref([
    {label:'Desktop', value:'desktop'},
    {label:'Mobile', value:'mobile'}
])

//desktop os
const desktop_os = ref ([
    {label:''}
])


//list of countries and their rate
const countriesRate = ref ([
    {countries:[],amount:1}
])

const countriesList = ref([])

function addCountry(countryIndex,index){
    let a = countriesPool.value[countryIndex].countryValue

    //push into countries Rate
    countriesRate.value[index].countries.push(a)

    //push into countries list
    countriesList.value.push(a)

    //changed the checked value inside countries pool
    countriesPool.value[countryIndex].checkedValue = true

    //sort countries rate
    countriesRate.value[index].countries.sort()
    countriesList.value.sort()


}

function removeCountry(listIndex,countryIndex,countryList){

    //remove a country from countries rate
    countriesRate.value[listIndex].countries.splice(countryIndex,1)


    // changed the value of selected country in countries
    for(let list in countriesPool.value){
        let a = countriesPool.value[list].countryValue
        if(a === countryList){
            countriesPool.value[list].checkedValue = false
        }

    }

    //remove country from the list
    for(let list in countriesList.value){

        let a = countriesList.value[list]

        if(a === countryList){
            countriesList.value.splice(list,1)
        }

    }

}

function removeList(listIndex){


    for(let list in countriesRate.value){

        let a = Number(list)
        let b = Number(listIndex)
        // console.log(list)

        if(a === b){

            let c = countriesRate.value[list].countries

             for(let item of c){

                 for(let pool in countriesPool.value){

                    let b = countriesPool.value[pool].countryValue
                    if(b === item){
                        countriesPool.value[pool].checkedValue = false
                    }

                 }
             }
        }



    }

    countriesRate.value.splice(listIndex,1)

}

function checkedList(){
    return countriesRate.value.length
}

//Mutated form object
const form = ref({
    name:null,
    direction:'onclick',
    rate_model:'scpa',
    target_url:null,
    onclick_multi_format:null,

    daily_budget:null,
    campaign_budget:null,
    multi_format_daily_budget:null,
    multi_format_campaign_budget:null,

    targeting_platform:null,
    targeting_os:null,
    targeting_device:null,
    targeting_browser:null,

    timezone:null

})


//final submission of data, cannot be mutated
function submit(){

    router.post('/onclick-cpag-create',{
        name:form.value.name,
        direction:form.value.direction,
        rate_model:form.value.rate_model,
        target_url:form.value.target_url,
        onclick_multi_format:form.value.onclick_multi_format,

        daily_budget:form.value.daily_budget,
        campaign_budget:form.value.campaign_budget,
        multi_format_daily_budget:form.value.multi_format_daily_budget,
        multi_format_campaign_budget:form.value.multi_format_campaign_budget,

        targeting_platform:form.value.targeting_platform,
        targeting_os:form.value.targeting_os,
        targeting_device:form.value.targeting_device,
        targeting_browser:form.value.targeting_browser,

        timezone:form.value.timezone,
        countriesRate:countriesRate.value,
        countriesList:countriesList.value

    })

}

</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                <form @submit.prevent="submit">

                    <!--name-->
                    <label for="name">Campaign name:</label>
                    <input id="name" class="border-2" v-model="form.name" />
                    <br>
                    <br>

                    <!--direction-->
                    <div>
                        <label>Advertising Format</label>
                        <br>

                        <label for="direction">Onclick</label>
                        <input type="radio" value="onclick" id="direction" v-model="form.direction" />
                        <br>

                        <label for="direction">NativeAds</label>
                        <input type="radio" value="nativeads" id="direction" v-model="form.direction" />
                        <br>

                        <label for="direction">Native</label>
                        <input type="radio" value="native" id="direction" v-model="form.direction" />
                        <br>
                        <br>
                    </div>


                    <!--rate model-->
                    <div>
                        <label>Pricing Model</label>
                        <br>

                        <label for="rate_model">CPA Goal</label>
                        <input type="radio" value="scpa" id="rate_model" v-model="form.rate_model" />
                        <br>

                        <label for="rate_model">Smart CPM</label>
                        <input type="radio" value="scpm" id="rate_model" v-model="form.rate_model" />
                        <br>

                        <label for="rate_model">CPM</label>
                        <input type="radio" value="cpm" id="rate_model" v-model="form.rate_model" />
                        <br>
                        <br>
                    </div>

                    <!--Advertising Format Render Condition-->
                    <div v-if="form.direction === 'onclick' && form.rate_model === 'scpa'">
                        <label>Multiformat Campaign</label>
                        <br>
                        <label>Interstitial</label>
                        <input type="checkbox" v-model="form.onclick_multi_format">
                    </div>
                    <div v-if="form.direction === 'nativeads'">
                        B
                    </div>
                    <div v-if="form.direction === 'native'">
                        C
                    </div>
                    <br>

                    <!--Target URL-->
                    <label for="target_url">Target URL</label>
                    <input
                        id="target_url"
                        class="border-2"
                        v-model="form.target_url" />
                    <br>
                    <br>

                    <!--Countries and Rates-->
                    <div>
                        <label>Countries and Rate</label>
                        <br>

                        <!--Array of lists-->
                        <div
                            class ="border"
                            v-for="(list,listIndex) in countriesRate">

                            <!--Array of countries and price-->
                            <li v-for="(countryList,countryIndex) in list.countries">
                                <button
                                type="button"
                                @click="removeCountry(listIndex,countryIndex,countryList)"
                                >
                                    {{countryList}}
                                </button>

                            </li>
                            <label v-for="price in list.amount">
                                {{price}}
                            </label>

                            <!--Insert value of countries-->
                            <h1 v-for="(countries,index) in countriesPool">
                                <h1 v-if="countries.checkedValue === false">
                                    <button
                                    type="button"
                                    @click="addCountry(index,listIndex)">
                                        <label>{{countries.name}}</label>
                                    </button>
                                </h1>
                                <h1 v-else-if="countries.checkedValue === true">
                                    <label></label>
                                </h1>
                                <br>
                            </h1>

                            <div v-if="checkedList() > 1">
                                <button
                                    type="button"
                                    @click="removeList(listIndex)">
                                    Remove List
                                </button>
                            </div>

                        </div>
                        <!--End of Array Lists-->


                    </div>

                    <div>
                        <button
                        type="button"
                        @click="countriesRate.push({countries:[],amount:1})">
                            Add Countries
                        </button>
                    </div>
                    <br>

                    <!--Advertising Budget-->
                    <div>
                        <label>Advertising Budget</label>
                        <br>
                        <div>
                            <label>Daily Budget</label>
                            <input
                                class="border-2"
                                v-model="form.daily_budget"
                            >
                        </div>
                        <div>
                            <label>Total Campaign Budget</label>
                            <input
                                class="border-2"
                                v-model="form.campaign_budget"
                            >
                        </div>

                        <!--Multiformat Budget-->
                        <br>
                        <div v-if="form.onclick_multi_format === true">
                            <div>
                                <label>Interstitial Daily Budget</label>
                                <input
                                    class="border-2"
                                    v-model="form.multi_format_daily_budget"
                                >
                            </div>
                            <div>
                                <label>Interstitial Total Campaign Budget</label>
                                <input
                                    class="border-2"
                                    v-model="form.multi_format_campaign_budget"
                                >
                            </div>
                        </div>
                    </div>
                    <br>

                    <!--Targeting-->
                    <div>
                        <label>Targeting</label>

                        <!--Platform-->
                        <div>
                            <label>Platform</label>
                            <select v-model="form.targeting_platform">
                                <option v-for="item in platform">
                                    {{item.label}}
                                </option>
                            </select>

                        </div>


                        <!--OS-->
                        <div>
                            <label>OS</label>
                            <input
                                class="border-2"
                                v-model="form.targeting_os"
                            >
                        </div>

                        <!--Device-->
                        <div>
                            <label>Device</label>
                            <input
                                class="border-2"
                                v-model="form.targeting_device"
                            >
                        </div>


                        <!--Browser-->
                        <div>
                            <label>Browser</label>
                            <input
                                class="border-2"
                                v-model="form.targeting_browser"
                            >
                        </div>
                        <br>

                        <!--Campaign Schedule-->
                        <div>
                            <label>Campaign Schedule</label>

                            <!--Timezone-->
                            <div>
                                <label>Timezone</label>
                                <input
                                    class="border-2"
                                    v-model="form.timezone"
                                >
                            </div>

                            <div>
                                <label>Schedule</label>

                            </div>
                        </div>

                    </div>
                    <br>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </template>
    </SidebarLayout>
</template>
