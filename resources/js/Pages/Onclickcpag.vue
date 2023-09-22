<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import {router} from "@inertiajs/vue3";
import {ref} from "vue";

defineProps({timetable:Object})

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

//Timetable
const days = ref(['Mo', 'Tu', 'We', 'Th', 'Fr','Sa','Su']);

const times = ref(['00', '01', '02', '03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23']);

//Put all data into bookedSlot and set the value to true
const bookedSlots = ref({});
const trueBookedSlotsArray = ref([]);

days.value.forEach(day => {
  times.value.forEach(time => {
    const key = `${day}${time}`;
    bookedSlots.value[key] = false;
  });
});

//Toggle to set data to true and false
const toggleBooking = (day, time) => {
  const key = `${day}${time}`;
  bookedSlots.value[key] = !bookedSlots.value[key]; // Toggle booked status

  if (bookedSlots.value[key] === true) {
    // alert(`push ${key}`)
    trueBookedSlotsArray.value.push(key);
  } else {
    // alert(`splice ${key}`)
    // If the value is now false, remove it from the array
    const index = trueBookedSlotsArray.value.indexOf(key);
    if (index !== -1) {
      trueBookedSlotsArray.value.splice(index, 1);
    }
  }

};

const toggleBookingWeekend = () => {
  const weekendDays = ['Sa', 'Su'];
  const isBothUnbooked = weekendDays.every(weekendDay => !bookedSlots.value[`${weekendDay}${times.value[0]}`]);

  weekendDays.forEach(weekendDay => {
    times.value.forEach(time => {
      if (isBothUnbooked) {
        bookedSlots.value[`${weekendDay}${time}`] = true;
        trueBookedSlotsArray.value.push(`${weekendDay}${time}`);
      } else {
        toggleBooking(weekendDay, time);
      }
    });
  });
};

const toggleBookingWeekDay = () => {
  const weekDays = ['Mo', 'Tu', 'We', 'Th', 'Fr'];
  const isUnbooked = weekDays.every(weekDay => !bookedSlots.value[`${weekDay}${times.value[0]}`]);

  weekDays.forEach(weekDay => {
    times.value.forEach(time => {
      if (isUnbooked) {
        bookedSlots.value[`${weekDay}${time}`] = true;
        trueBookedSlotsArray.value.push(`${weekDay}${time}`); // can put weekday and time in variable if wan
      } else {
        toggleBooking(weekDay, time);
      }
    });
  });
};

const toggleBookingReset = () => {
    days.value.forEach(day => {
        times.value.forEach(time => {
            const key = `${day}${time}`;
            bookedSlots.value[key] = false;
            
        });
    });
    trueBookedSlotsArray.value = [];
}

const toggleBookingAll = () => {
    days.value.forEach(day => {
        times.value.forEach(time => {

            const key = `${day}${time}`;
            bookedSlots.value[key] = true;
            if (!trueBookedSlotsArray.value.includes(key)) { //if key is not inside put it in array
                trueBookedSlotsArray.value.push(key);
            }
        });
    });
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

    timezone:null,

    //Creative
    creative:'prize'
})


//final submission of data, cannot be mutated
function submit(){

    router.post('/create-campaign-create',{
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
        countriesList:countriesList.value,

    })

}

const searchQuery = ref([])

const isDropdownVisible = ref(false)

// const showOptions = () => {
//     alert("Show")
//     isDropdownVisible.value = true;
// }
// const hideOptions = () => {
//     isDropdownVisible.value = false;
// }

const toggleMenu = () => {
    isDropdownVisible.value = !isDropdownVisible.value;
};


const filteredItems = () => {
    return this.countriesPool.filter(item => {
        alert(item.name)
        // Replace this condition with your filtering logic
        return item.name.includes(this.searchQuery);
    });
};



// const filteredItems = () => {
//     console.log("hi")
//     console.log('Input value changed:', this.searchQuery);
//     const query = this.searchQuery.toLowerCase();
//     console.log(query)
//     if (this.query === '') {
//         return this.countriesPool.value;
//     } else {
//     // Filter the items based on the search query
//     return this.countriesPool.filter(item => {
//         return item.toLowerCase().includes(query);
//         alert(item)
//     });
//     }
// }

// const toggleBookingReset = () => {
    //     days.value.forEach(day => {
        //         times.value.forEach(time => {
//             const key = `${day}${time}`;
//             bookedSlots.value[key] = false;
            
//         });
//     });
//     trueBookedSlotsArray.value = [];
// }
</script>

<template>
    <SidebarLayout>
        <template #content>
            <div>
                <form @submit.prevent="submit">
                    
                    <h1 class="text-3xl main mb-2">Create Campaign</h1>
                    <!--name-->
                    <div class="mb-4">
                        <label for="name" class="">Campaign name:</label>
                        <input id="name" 
                        class="border-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full pl-4 py-1" 
                        v-model="form.name" />
                    </div>

                    <!--direction-->
                    <div class="mb-4">
                        <p>Advertising Format:</p>
                        <div class="flex justify-between space-x-4">
                            <div class="w-full">
                                <div class="flex-col">
                                    <label for="onclick" class="rounded border-2 block w-full p-5 text-gray-500 bg-white rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 text-center">                                        
                                        <div class="w-full">
                                            <input type="radio" value="onclick" id="onclick" v-model="form.direction" />
                                            <div class="w-full text-lg font-semibold mt-4">Onclick</div>
                                            <div class="w-full mt-4">Full-page and eye-catchy ads opening in the background</div>
                                            <div class="flex justify-center">
                                                <img src="images/OnClick.png">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="flex-col">
                                    <label for="nativeads" class="rounded border-2 block w-full p-5 text-gray-500 bg-white rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 text-center">                                        
                                        <div class="w-full">
                                            <input type="radio" value="nativeads" id="nativeads" v-model="form.direction" />
                                            <div class="w-full text-lg font-semibold mt-4">NativeAds</div>
                                            <div class="w-full mt-4">Full-page and eye-catchy ads opening in the background</div>
                                            <div class="flex justify-center">
                                                <img src="images/OnClick.png">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="flex-col">
                                    <label for="native" class="rounded border-2 block w-full p-5 text-gray-500 bg-white rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 text-center">                                        
                                        <div class="w-full">
                                            <input type="radio" value="native" id="native" v-model="form.direction" />
                                            <div class="w-full text-lg font-semibold mt-4">Native</div>
                                            <div class="w-full mt-4">Full-page and eye-catchy ads opening in the background</div>
                                            <div class="flex justify-center">
                                                <img src="images/OnClick.png">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--rate model-->
                    <div class="mb-4">
                        <div class="flex space-x-4">
                            <!-- Onclick Pricing Model -->
                            <div v-if="form.direction === 'onclick'" class="flex space-x-8">
                                <div class="flex items-center">
                                    <input type="radio" value="scpa" id="scpa" v-model="form.rate_model" />
                                    <label for="scpa" class="px-2">CPA Goal</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" value="scpm" id="scpm" v-model="form.rate_model" />
                                    <label for="scpm" class="px-2">Smart CPM</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" value="cpm" id="cpm" v-model="form.rate_model" />
                                    <label for="cpm" class="px-2">CPM</label>
                                </div>
                            </div>
    
                            <!-- nativeads Pricing Model -->
                            <div v-if="form.direction === 'nativeads'" class="flex space-x-8">
                                <div class="flex items-center">
                                    <input type="radio" value="scpa" id="scpa" v-model="form.rate_model" />
                                    <label for="scpa" class="px-2">CPA Goal</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" value="scpc" id="scpc" v-model="form.rate_model" />
                                    <label for="scpc" class="px-2">Smart CPC</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" value="cpc" id="cpc" v-model="form.rate_model" />
                                    <label for="cpc" class="px-2">CPC</label>
                                </div>
                            </div>
    
                            <!-- Interstitial Pricing Model -->
                            <div v-if="form.direction === 'native'" class="flex space-x-8">
                                <div class="flex items-center">
                                    <input type="radio" value="scpa" id="scpa" v-model="form.rate_model" />
                                    <label for="scpa" class="px-2">CPA Goal</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" value="cpc" id="cpc" v-model="form.rate_model" />
                                    <label for="cpc" class="px-2">CPC</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" value="cpm" id="cpm" v-model="form.rate_model" />
                                    <label for="cpm" class="px-2">CPM</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Advertising Format Render Condition-->
                    <div class="mb-4">
                        <div v-if="form.direction === 'onclick' && form.rate_model === 'scpa'">
                            <label>Multiformat Campaign</label>
                            <div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" v-model="form.onclick_multi_format">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Interstitial</span>
                                </label>
                            </div>
                        </div>
                        <div v-if="form.direction === 'nativeads'">
                            B
                        </div>
                        <div v-if="form.direction === 'native'">
                            C
                        </div>
                    </div>

                    <!--Target URL-->
                    <div class="mb-4">
                        <label for="target_url">Target URL</label>
                        <input
                            id="target_url"
                            class="border-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full pl-4 py-1"
                            v-model="form.target_url" />
                    </div>

                    <!--Countries and Rates-->
                    <div>
                        <label>Countries and Rate</label>
                        <br>
                        <div class="flex space-x-12 relative">
                            <div v-for="(list,listIndex) in countriesRate" class="w-full flex flex-col">
                                <label>Countries</label>
                                <div class="border-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full pl-4 py-2 flex justify-between" @click="toggleMenu()">
                                    <div>
                                        <ul class="flex items-center">
                                        <li v-for="(countryList,countryIndex) in list.countries">
                                        <button
                                        class="border px-2 bg-cyan-600 text-white "
                                        type="button"
                                        @click="removeCountry(listIndex,countryIndex,countryList)"
                                        >
                                            {{countryList}}
                                        </button>
                                        </li>
                                        </ul>
                                    </div>
                                    <div class="flex">
                                        <svg 
                                        v-if="isDropdownVisible"
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="1.5" 
                                        stroke="currentColor" 
                                        class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                        <svg  
                                        v-else
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" viewBox="0 0 24 24" 
                                        stroke-width="1.5" 
                                        stroke="currentColor" 
                                        class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                        </svg>
                                    </div>
                                </div>
                                <div v-if="isDropdownVisible" class="relative">
                                    <div class="absolute right-0 mt-2 w-full bg-white border rounded-lg shadow-lg">
                                        <input type="text" v-model="searchQuery" placeholder="Search..." @click="showOptions()" @blur="hideOptions()" class="w-full">
                                        <div>
                                            <ul v-for="(countries,index) in countriesPool" class="border">
                                                <li v-if="countries.checkedValue === false" class="w-full">
                                                    <button
                                                    class="w-full"
                                                    type="button"
                                                    @click="addCountry(index,listIndex)">
                                                    {{countries.name}}
                                                </button>
                                                </li>
                                                
                                                <!-- <li v-for="item in filteredItems" :key="item.id">{{ item.name }}</li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label for="">CPA Goal, $</label>
                                <input id="CPAGoal" class="border-2 border-gray-300 focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-full" type="number" min="0" step="0.001">
                            </div>
                        </div>

                        {{ searchQuery }}
                        <!--Array of lists-->
                        <div
                            class ="border mb-4"
                            v-for="(list,listIndex) in countriesRate">

                            <!--Array of countries and price-->
                            <li v-for="(countryList,countryIndex) in list.countries" class="bg-cyan-600">
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
                    <div class="mb-4">
                        <label>Advertising Budget</label>
                        <br>
                        <label class="font-bold">OnClick</label>
                        <div class="flex space-x-4">
                            <div class="flex flex-col">
                                <label>Daily Budget</label>
                                <input
                                    class="border-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full pl-4 py-1"
                                    v-model="form.daily_budget"
                                >
                            </div>
                            <div class="flex flex-col">
                                <label>Total Campaign Budget</label>
                                <input
                                class="border-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full pl-4 py-1"
                                v-model="form.campaign_budget"
                                >
                            </div>
                        </div>
                        
                        <!--Multiformat Budget-->
                        <div v-if="form.onclick_multi_format === true">
                            <label class="font-bold">Interstitial</label>
                            <div class="flex space-x-4">
                                <div class="flex flex-col">
                                    <label>Interstitial Daily Budget</label>
                                    <input
                                        class="border-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full pl-4 py-1"
                                        v-model="form.multi_format_daily_budget"
                                    >
                                </div>
                                <div class="flex flex-col">
                                    <label>Interstitial Total Campaign Budget</label>
                                    <input
                                        class="border-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full pl-4 py-1"
                                        v-model="form.multi_format_campaign_budget"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

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
                        </div>
                            
                         <!--Campaign Schedule-->
                        <div class="mb-4">
                            <label>Campaign Schedule</label>

                            <!--Timezone-->
                            <div class="flex flex-col mb-4">
                                <label>Timezone</label>
                                <input
                                    class="border-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full pl-4 py-1"
                                    v-model="form.timezone"
                                >
                            </div>

                            <div>
                                <label>Schedule</label>
                                <div class="flex space-x-4 mb-2">
                                    <button type="button" class="text-blue-600" @click="toggleBookingAll()">All</button>
                                    <button type="button" class="text-blue-600" @click="toggleBookingWeekend()">Weekend</button>
                                    <button type="button" class="text-blue-600" @click="toggleBookingWeekDay()">Weekday</button>
                                    <button type="button" class="text-blue-600" @click="toggleBookingReset()">Reset</button>
                                </div>
                                <div>
                                    <div class="flex flex-col">
                                        <div class="grid_items gap-1">
                                            <div style="width: 18px;"></div>
                                            <button v-for="time in times" :key="time" class="Timetable__items__default-item" type="button">
                                                {{ time }}
                                            </button>
                                        </div>
                                        <div v-for="day in days" :key="day" class="grid_items gap-1">
                                            <button class="Timetable__items__default-item" type="button">{{ day }}</button>
                                                <div v-for="time in times" :key="time">
                                                    <button
                                                        :class="{
                                                            'Timetable__items__default-item bg-cyan-600': bookedSlots[`${day}${time}`],
                                                            'Timetable__items__default-item bg-red-600': !bookedSlots[`${day}${time}`]
                                                        }"
                                                        type="button"
                                                        @click="toggleBooking(day, time)"
                                                    >
                                                        {{ time }}
                                                    </button>
                                                </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <!-- {{ bookedSlots }} -->
                    <br>
                    <!-- {{ trueBookedSlotsArray }} -->
                    <div>
                        <!-- Creative Ads -->
                        <div v-if="form.direction === 'native'">
                            <label for="">Creative Ads</label>
                        <div class="flex justify-start">
                            <div>
                                <label for="creative_ads">Prize</label>
                                <input name="creative_ads" type="radio" value="prize" id="creative_ads" v-model="form.creative"/>
                            </div>
                            <div>
                                <label for="creative_ads">Image</label>
                                <input name="creative_ads" type="radio" value="image" id="creative_ads" v-model="form.creative"/>
                            </div>
                            <div>
                                <label for="creative_ads">Classic</label>
                                <input name="creative_ads" type="radio" value="classic" id="creative_ads" v-model="form.creative"/>
                            </div>
                            <div>
                                <label for="creative_ads">Landing</label>
                                <input name="creative_ads" type="radio" value="landing" id="creative_ads" v-model="form.creative"/>
                            </div>
                            <div>
                                <label for="creative_ads">Animated Message</label>
                                <input name="creative_ads" type="radio" value="animated_message" id="creative_ads" v-model="form.creative"/>
                            </div>
                            <div>
                                <label for="creative_ads">Message</label>
                                <input name="creative_ads" type="radio" value="message" id="creative_ads" v-model="form.creative"/>
                            </div>
                        </div>
                        <div>
                            <!-- Prize -->
                            <div v-if="form.creative === 'prize'">
                            <div class="">Creative Header</div>
                            <div>
                                <label for="name">Title</label>
                                <input id="name" class="border-2" v-model="form.creativetitle" />
                            </div>
                            <div>
                                <label for="name">Description</label>
                                <input id="name" class="border-2" v-model="form.creativedescription" />
                            </div>
                            <div>
                                <input type="file">
                            </div>
                            </div>
                            <!-- Image -->
                            <div v-if="form.creative === 'image'">
                                <div class="">Creative Header</div>
                                <div>
                                    <label for="name">Potrait</label>
                                    <input type="file" accept="image/png, image/jpeg" @change="">
                                </div>
                                <div>
                                    <label for="name">Landscape</label>
                                    <input type="file" accept="image/png, image/jpeg">
                                </div>
                            </div>
                            <!-- Classic -->
                            <div v-if="form.creative === 'classic'">
                                <div class="">Creative Header</div>
                                <div>
                                    <label for="name">Title</label>
                                    <input id="name" class="border-2" v-model="form.creativetitle" />
                                </div>
                                <div>
                                    <label for="name">Landscape</label>
                                    <input type="file" accept="image/png, image/jpeg">
                                </div>
                            </div>
                            <!-- Landing -->
                            <div v-if="form.creative === 'landing'">
                                <label for="name">Creative URL (Landing page)</label>
                                <input id="name" class="border-2" v-model="form.landing_url" />
                            </div>
                            <!-- Animated Message -->
                            <div v-if="form.creative === 'animated_message'">
                                <div>Creative Header</div>
                                <label for="name">Title</label>
                                <input id="name" class="border-2" v-model="form.creativetitle" />
                                <label for="name">Description</label>
                                <input id="name" class="border-2" v-model="form.creativedescription" />
                                <label for="name">Button text</label>
                                <input id="name" class="border-2" v-model="form.buttons" />
                                <input type="file" accept="image/png, image/jpeg">
                                <input type="file" accept="image/png, image/jpeg">
                            </div>
                            <!-- Message -->
                            <div v-if="form.creative === 'message'">
                                <div>Creative Header</div>
                                <div>
                                    <label for="name">Title</label>
                                    <input id="name" class="border-2" v-model="form.creativetitle" />
                                </div>
                                <div>
                                    <label for="name">Description</label>
                                    <input id="name" class="border-2" v-model="form.creativedescription" />
                                </div>
                                <div>
                                    <label for="ButtonText">Button text</label>
                                    <input id="ButtonText" class="border-2" v-model="form.buttons" />
                                </div>
                                <div>
                                    <div class="w-100">
                                        <input type="file">
                                    </div>
                                    <input type="file">
                                </div>
                            </div>
                        </div>
                        </div>   
                    </div>
                    <div class="flex justify-end">
                        <button class="w-max" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </template>
    </SidebarLayout>
</template>
<style>
.grid_items{
    display: grid;
    font-size: 11px;
    grid-template-columns: repeat(25,min-content);
    margin-bottom: 2px;
    position: relative;
}
.Timetable__items {
    display: grid;
    font-size: 11px;
    grid-template-rows: repeat(2,min-content);
    width: 100%;
}
.Timetable__items__hours {
    grid-gap: 2px;
    display: grid;
    grid-template-columns: repeat(25,min-content);
    margin-bottom: 2px;
    position: relative;
}
.Timetable__items__days {
    grid-gap: 2px;
    display: grid;
    grid-template-columns: repeat(25,min-content);
    margin-bottom: 2px;
    position: relative;
}
.Timetable__items__default-item {
    align-items: center;
    border: none;
    cursor: pointer;
    display: flex;
    height: 18px;
    justify-content: center;
    margin: 0;
    outline: none;
    width: 18px;
}
.Timetable__items__selected-item, .Timetable__items__selected-item-disabled {
    background-color: #0080ff;
}
</style>
