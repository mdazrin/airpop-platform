<script setup>
import TitleLabel from "./TitleLabel.vue";
import { ref, defineProps, defineEmits } from "vue";

// Emit event
const emit = defineEmits(["update:modelValue"]);

// Reactive variable
const checkedOptions = ref(props.modelValue);

// Event handler
const handleChange = (event) => {
    const selectedValues = checkedOptions.value;

    if (event.target.checked) {
        selectedValues.push(event.target.value);
    } else {
        const index = selectedValues.indexOf(event.target.value);
        if (index !== -1) {
            selectedValues.splice(index, 1);
        }
    }

    emit("update:modelValue", selectedValues);
};

const props = defineProps({
    days: {
        type: Array,
        default: () => [],
    },
    options: {
        type: Array,
        default: () => [],
    },
    title: {
        type: String,
        default: "",
    },
    modelValue: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <div>
        <div v-for="(day, i) in days" :key="i" class="mt-2">
            <TitleLabel class="mx-1 font-semibold text-gray-900" :title="day.label" />
            <ul
                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:flex"
            >
                <li
                    v-for="(option, index) in options"
                    :key="index"
                    class="w-full"
                >
                    <div class="flex items-center pl-1">
                        <input
                            id="vue-checkbox"
                            type="checkbox"
                            :value="option.value"
                            @change="handleChange"
                            class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 g-offset-gray-700 focus:ring-2"
                        />
                        <label
                            for="vue-checkbox"
                            class="w-full py-1 ml-2 text-xs font-medium text-gray-900"
                            >{{ option.label }}</label
                        >
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>
