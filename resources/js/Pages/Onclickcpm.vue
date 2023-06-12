<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import {router} from '@inertiajs/vue3'
import {ref} from "vue";

const givenCountries = ref([
    {name:'United States',countryValue:'us'},
    {name:'Italy',countryValue:'it'},
    {name:'India',countryValue:'in'},
])

const totalCountries = ref([
    {countries:[], amount:1},

])

const defaultCountries = ref([])

function deleteList(index){
    totalCountries.value.splice(index,1)

}

function removeCountries(index){
    givenCountries.value.splice(index,1)
}

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

<!--                <pre>{{totalCountries}}</pre>-->
                <pre>{{givenCountries}}</pre>

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
                        <div v-for="(items, index2) in givenCountries">
                            <input
                                type="checkbox"
                                @change="removeCountries(index2)"
                                :value="items.countryValue"
                                v-model="totalCountries[index].countries"
                            >
                            <label>{{items.name}}</label>
                            <br>
                        </div>

                        <input
                            type="text"
                            v-model="totalCountries[index].amount"
                        >
                        <label>Amount</label>
                        <br>

                        <!--Delete a list-->
                        <button
                            type="button"
                            @click="deleteList(index)"
                        >Delete</button>
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

