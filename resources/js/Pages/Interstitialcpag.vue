<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import {router} from '@inertiajs/vue3'
import {ref} from "vue";

const givenCountries = [
    {name:'United States',value:'us'},
    {name:'Italy',value:'it'},
    {name:'India',value:'in'},
]

const totalCountries = ref([
    {countries:['us','it'], amount:1},
    {countries:['in'], amount:1}
])

const defaultCountries = ref([])

function submit(){

    router.post('/onclick-cpm-create', {
        countries:totalCountries

    })

}

</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>

                <!--                <pre>{{totalCountries[0]}}</pre>-->

                <!--Loop every countries and rate -->

                <div v-for="(list,index) in totalCountries">

                    <!--Display a list of countries-->
                    <div>
                        {{list.countries}}
                    </div>

                    <!--Display amount-->
                    <div>
                        {{list.amount}}
                    </div>

                    <!--Checkboxes for countries-->
                    <div>
                        <input
                            type="checkbox"
                            value="us"
                            v-model="totalCountries[index].countries"
                        >
                        <label>USA</label>
                        <br>

                        <input
                            type="checkbox"
                            value="it"
                            v-model="totalCountries[index].countries"
                        >
                        <label>Italy</label>
                        <br>

                        <input
                            type="checkbox"
                            value="in"
                            v-model="totalCountries[index].countries"
                        >
                        <label>India</label>
                        <br>

                        <input
                            type="text"
                            v-model="totalCountries[index].amount"
                        >
                        <label>Amount</label>
                        <br>

                        <!--Delete a list-->
                        <button
                            type="button"
                            @click="totalCountries.splice(index,1)"
                        >Delete</button>
                    </div>
                </div>



                <button
                    type="button"
                    @click="totalCountries.push({countries:defaultCountries,amount:0})"
                >
                    Add rate
                </button>

                <br>

                <form @submit.prevent="submit">
                    <button type="submit">Submit</button>
                </form>

            </div>
        </template>
    </SidebarLayout>
</template>
