<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import {router} from "@inertiajs/vue3";
import { ref } from "vue";

//advert format render condition
const advertFormat = ref('onclick')
const onclickMultiFormat = ref('onclick')
const campaignDays = ref('Monday')


const isOpen = ref(false);
const captionTargetURL = [
    "https://www.domain.com/in.php?clickid=${SUBID}",
    "Add city targeting to reach people in certain cities",
];
const placeholder_dropdown = ref("Select an option")
const dropdownOptions = ref([
    { value: "us", label: "USA" },
    { value: "it", label: "Italy" },
    { value: "in", label: "India" },
])


const form = ref({
    name:null,
    direction:null,
    rate_model:null,
    target_url:null
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
                    <input id="name" v-model="form.name" />
                    <br>

                    <!--direction-->
                    <label for="direction">Direction:</label>
                    <input id="direction" v-model="form.direction" />
                    <br>

                    <!--rate model-->
                    <div>
                        <label for="rate_model">Rate Model:</label>
                        <input type="radio" value="scpm" id="rate_model" v-model="form.rate_model" />
                        <br>

                        <label for="rate_model">Rate Model:</label>
                        <input type="radio" value="scpa" id="rate_model" v-model="form.rate_model" />
                        <br>

                        <label for="rate_model">Rate Model:</label>
                        <input type="radio" value="cpag" id="rate_model" v-model="form.rate_model" />
                        <br>
                    </div>


                    <!--Target URL-->
                    <label for="target_url">Target URL</label>
                    <input id="target_url" v-model="form.target_url" />
                    <br>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </template>
    </SidebarLayout>
</template>
