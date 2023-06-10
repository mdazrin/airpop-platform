<script setup>
import TitleLabel from "./TitleLabel.vue";
import { defineProps, ref, defineEmits } from "vue";

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
    options: {
        type: Array,
        default: () => [],
    },
    modelValue: {
        type: Array,
        default: () => [],
    },
    title: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <div>
        <TitleLabel :title="title" />

        <div class="flex">
            <div
                v-for="(option, index) in options"
                :key="index"
                v-bind="$attrs"
                class="flex items-center h-5 mr-4"
            >
                <input
                    type="checkbox"
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                    :value="option.value"
                    @change="handleChange"
                />

                <label
                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >{{ option.label }}
                    <a
                        href="#"
                        class="text-blue-600 hover:underline dark:text-blue-500"
                        >{{ option.label_blue }}</a
                    ></label
                >
            </div>
        </div>
    </div>
</template>
