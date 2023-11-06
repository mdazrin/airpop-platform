<script setup>
import { ref, computed } from 'vue';

//countries pool
const countriesPool = ref([
    {name:'USA',countryValue:'us', checkedValue:false},
    {name:'India',countryValue:'in', checkedValue:false},
    {name:'Italy',countryValue:'it', checkedValue:false}

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

const showFiltered = ref(false);
  
  const searchQuery = ref(''); 
  
  const filteredRows = computed(() => {
    let rows = countriesPool.value.slice();
  
    if (searchQuery.value) {
      const query = searchQuery.value.toLowerCase();
      rows = rows.filter((item) => {
        const nameColumnValue = item.name.toLowerCase();
        return nameColumnValue.includes(query);
      });
    }
  
    return rows;
  });
  
  const showFilteredRows = () => {
    showFiltered.value = true;
  };
</script>

<template>
    <!--Countries and Rates-->
    <!-- <div>
        <label>Countries and Rate</label>
        <br>
        <div class="flex space-x-4">
            <div class="w-full flex flex-col">
                <label>Countries</label>
                <div v-for="(list,listIndex) in countriesRate" class="border rounded-lg flex">
                    <ul class="flex items-center">
                        <li v-for="(countryList,countryIndex) in list.countries">
                            <button
                                class="border rounded-lg px-2 bg-cyan-600 text-white "
                                type="button"
                                @click="removeCountry(listIndex,countryIndex,countryList)"
                            >
                                {{countryList}}
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="absolute right-0 mt-2 w-full bg-white border rounded-lg shadow-lg">
                    <div>
                        <ul v-for="(countries,index) in countriesPool" class="border">
                            <li v-if="countries.checkedValue === false" class="w-full">
                                <button
                                    class="w-full"
                                    type="button"
                                    @click="addCountry(index)">
                                    {{countries.name}}
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="flex flex-col">
                <label for="">CPA Goal, $</label>
                <input class="rounded-lg" type="number" min="0" step="0.001">
            </div>
        </div>

        <div
            class ="border mb-4"
            v-for="(list,listIndex) in countriesRate">


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

    </div>

    <div>
        <button
            type="button"
            @click="countriesRate.push({countries:[],amount:1})">
            Add Countries
        </button>
    </div> -->

    <!-- Note To Dev -->
    <!-- We use 2 array
    array 1 to save country name and their availabilty for the list (CountriesPool)
    array 2 list of country and their rate (Countriesrate)

    First load (countriesrate) array list
    so component will render based on how much countriesrate list

    Component will render all the data in the list
    If user add country into the list
    the country pool checkedvalue will change to true and they will push country into the list Array

    If CountriesRate > 1
    display button to clear the list and change checked value to false

    For the dropdown 
    only display countriesPool with false checkedValue

    Create a button to add more list using push command -->

    <div v-for="(list,listIndex) in countriesRate">
        true
        <ul>
            <li v-for="(countryList,countryIndex) in list.countries">
                {{countryList}}
            </li>
        </ul>

        choices
        <ul v-for="(countries,index) in countriesPool">
            <li v-if="!countries.checkedValue">
                {{ countries.name }}
            </li>
        </ul>

        <div v-if="countriesRate.length > 1">
            <button
                type="button"
                @click="removeList(listIndex)">
                Remove List
            </button>
        </div>

    </div>
    <div>
        <button
        type="button"
        @click="countriesRate.push({countries:[],amount:1})">
            Add Countries
        </button>
    </div>

    <!-- <div class="mb-2">
        Countries and Rates
        <div 
        v-for="(list,listIndex) in countriesRate"
        class="flex flex-row w-full"
        >
            <div 
            class="flex flex-col w-2/3 sm:w-4/5">
                <label for="countries">Countries</label>
                <div 
                class="border rounded-lg relative">
                <ul 
                class="flex items-center">
                    <li 
                    v-for="(countryList,countryIndex) in list.countries">
                    
                    <button 
                        class="border rounded-lg p-2 bg-sky-400 text-white"
                        type="button"
                        @click="removeCountry(listIndex,countryIndex,countryList)">
                        {{countryList}}
                    </button>
                    </li>
                    <li class="w-full" @click="showFilteredRows">
                        <input
                        v-model="searchQuery"
                        type="text"
                        placeholder="Search by Campaign Name..."
                        class="w-full border-0 focus:outline-none focus:ring-0"
                        />
                    </li>
                </ul>
                <div class="absolute right-0 w-full bg-white border rounded-lg shadow-lg z-20" v-if="showFiltered">
                    <ul v-for="(countries,index) in filteredRows">
                        <li v-if="!countries.checkedValue"
                        class=""
                        >
                        <button
                            class="w-full"
                            type="button"
                            @click="addCountry(index)">
                            {{countries.name}}
                        </button>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="flex flex-col w-1/3 sm:w-1/5">
                <label for="rate">Rate</label>
                <input type="date" class="border-transparent focus:border-transparent focus:ring-0" id="rate">
            </div>
            <div v-if="countriesRate.length > 1">
            <button
                type="button"
                @click="removeList(listIndex)">
                Remove List
            </button>
        </div>
        </div>
        <button
            type="button"
            @click="countriesRate.push({countries:[],amount:1})">
                Add Countries
        </button>
    </div> -->





    <!-- <div class="mb-2">
        Countries and Rates
        <div class="flex flex-row w-full">
            <div class="flex flex-col w-2/3 sm:w-4/5">
                <label for="countries">Countries</label>
                <div class="border rounded-lg relative">
                    <ul class="flex items-center">
                    <li v-for="(item, index) in tagRows" :key="index">
                        <button 
                        class="border rounded-lg p-2 bg-sky-400 text-white"
                        type="button"
                        @click="removeItem(index)">
                        {{ item.name }}
                        </button>
                    </li>
                    <li class="w-full" @click="showFilteredRows">
                        <input
                        v-model="searchQuery"
                        type="text"
                        placeholder="Search by Campaign Name..."
                        class="w-full border-0 focus:outline-none focus:ring-0"
                        />
                    </li>
                    </ul>
                    <div class="absolute right-0 w-full bg-white border rounded-lg shadow-lg z-20" v-if="showFiltered">
                    <div>
                        <ul class="">
                        <li v-for="(item, index) in filteredRows" :key="index" class="w-full">
                            <button 
                            v-if="!item.checkedValue"
                            class="w-full" 
                            type="button"
                            @click="addItem(index)">
                            {{ item.name }}
                            </button>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-1/3 sm:w-1/5">
                <label for="rate">Rate</label>
                <input type="date" class="border-transparent focus:border-transparent focus:ring-0" id="rate">
            </div>
        </div>
        Add Country
    </div> -->
</template>

