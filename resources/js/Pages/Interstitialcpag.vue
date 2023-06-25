<script setup>
import { ref } from "vue";
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import Multiselect from "@vueform/multiselect";
import MyMultiselect from "../Components/FormComponents/MyMultiselect.vue";

const days = ref([
    { title: "Saturday", shortcut: "sat" },
    { title: "Sunday", shortcut: "sun" },
    { title: "Monday", shortcut: "mon" },
    { title: "Tuesday", shortcut: "tue" },
    { title: "Wednesday", shortcut: "wed" },
    { title: "Thursday", shortcut: "thu" },
    { title: "Friday", shortcut: "fri" },
]);
const options2 = ref(["1", "2", "3", "4", "5", "6", "7", "8", "9"]);
const options = ref([
    { id: 1, name: "Option 1" },
    { id: 2, name: "Option 2" },
    { id: 3, name: "Option 3" },
    // Add more options as needed
]);

const dropdowns = ref([]);

const addDropdown = () => {
    dropdowns.value.push({
        selectedOptions: [],
    });
};

const removeDropdown = (index) => {
    dropdowns.value.splice(index, 1);
};

const filteredOptions = (dropdown) => {
    const selectedOptions = dropdowns.value
        .filter((d, i) => i !== dropdowns.value.indexOf(dropdown))
        .flatMap((d) => d.selectedOptions);

    return options.value.filter(
        (option) => !selectedOptions.includes(option.name)
    );
};
</script>

<template>
    <SidebarLayout>
        <template #content>
            <div class="p-4">
                <div
                    v-for="(dropdown, index) in dropdowns"
                    :key="index"
                    class="mb-4"
                >
                    <div>
                        <span
                            v-for="(item, index) in dropdown.selectedOptions"
                            :key="index"
                            class="bg-green-500 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded"
                            >{{ item }}</span
                        >
                    </div>
                    <select
                        v-model="dropdown.selectedOptions"
                        multiple
                        class="block w-full border border-gray-300 rounded p-2"
                    >
                        <option
                            v-for="option in filteredOptions(dropdown)"
                            :value="option.name"
                            :key="option.id"
                        >
                            {{ option.name }}
                        </option>
                    </select>
                    <div>
                        <Multiselect
                            mode="tags"
                            v-model="dropdowns"
                            :options="options2"
                        />
                    </div>
                    <MyMultiselect
                        :options="days"
                        display-property="title"
                        value-property="shortcut"
                        v-model="dropdowns"
                    ></MyMultiselect>

                    <div>
                        <button
                            @click="removeDropdown(index)"
                            class="mt-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600"
                        >
                            Remove
                        </button>
                    </div>
                </div>

                <button
                    @click="addDropdown"
                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600"
                >
                    Add Dropdown
                </button>
            </div>
        </template>
    </SidebarLayout>
</template>
<style src="@vueform/multiselect/themes/default.css"></style>
;
