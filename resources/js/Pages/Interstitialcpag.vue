<script setup>
import { ref, computed } from "vue";
import SidebarLayout from "@/Layouts/SidebarLayout.vue";

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
        (option) => !selectedOptions.includes(option.id)
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
                    <select
                        v-model="dropdown.selectedOptions"
                        multiple
                        class="border border-gray-300 rounded p-2"
                    >
                        <option
                            v-for="option in filteredOptions(dropdown)"
                            :value="option.id"
                            :key="option.id"
                        >
                            {{ option.name }}
                        </option>
                    </select>
                    <button
                        @click="removeDropdown(index)"
                        class="mt-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600"
                    >
                        Remove
                    </button>
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
