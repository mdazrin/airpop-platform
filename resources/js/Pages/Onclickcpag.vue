<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import {router} from "@inertiajs/vue3";
import {computed, ref} from "vue";

//advert format render condition
const onclickMultiFormat = ref('onclick')
const campaignDays = ref('Monday')


const countriesPool = ref([
    {name:'USA',countryValue:'us', checkedValue:false},
    {name:'India',countryValue:'in', checkedValue:false},
    {name:'Italy',countryValue:'it', checkedValue:false}

])

const countriesRate = ref ([])

//computed properties
const testCountries = computed(()=>{
    return countriesPool.value.filter((n)=>n.checkedValue === false)
})

function checkedCountries(n) {
    for ( let x of countriesPool.value){
        if(n === x.countryValue){
            x.checkedValue = false
            countriesRate.value.splice(1,1)
            break
        }
    }
}

function insertCountries(i){
    countriesRate.value.push()

}



const form = ref({
    name:null,
    direction:null,
    rate_model:null,
    target_url:null,
    onclick_multiformat:null
})


function submit(){

    router.post('/onclick-cpag-create', form.value)

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
                        <label>Rate Model</label>
                        <br>

                        <label for="rate_model">scpa</label>
                        <input type="radio" value="scpa" id="rate_model" v-model="form.rate_model" />
                        <br>

                        <label for="rate_model">cpag</label>
                        <input type="radio" value="cpag" id="rate_model" v-model="form.rate_model" />
                        <br>

                        <label for="rate_model">scpm</label>
                        <input type="radio" value="scpm" id="rate_model" v-model="form.rate_model" />
                        <br>
                        <br>
                    </div>

                    <!--Advertising Format Render Condition-->
                    <div v-if="form.direction === 'onclick' && form.rate_model === 'cpag'">
                        <label>Interstitial</label>
                        <input type="checkbox" v-model="form.onclick_multiformat">
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
                    <input id="target_url" class="border-2" v-model="form.target_url" />
                    <br>
                    <br>

                    <!--Countries and Rates-->
                    <div>
                        <label>Countries and Rate</label>
                        <br>

                        <li v-for="countries in countriesRate">
                            <label>
                             {{countries}}
                            </label>
                        </li>

                        <li v-for="countries in countriesPool">
                            <label>{{countries.name}}</label>
                            <input
                            type="checkbox"
                            :value="countries.countryValue"
                            v-model="countriesRate"
                            >
                            <br>
                        </li>

<!--                        <input-->
<!--                            type="checkbox"-->
<!--                            value="it"-->
<!--                            v-model="pickedCountries"-->
<!--                        >-->
<!--                        <br>-->

<!--                        <input-->
<!--                            type="checkbox"-->
<!--                            value="in"-->
<!--                            v-model="pickedCountries"-->
<!--                        >-->
<!--                        <br>-->
                    </div>
                    <br>


                    <button type="submit">Submit</button>
                </form>
            </div>
        </template>
    </SidebarLayout>
</template>
