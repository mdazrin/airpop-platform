<script setup>
// import { defineProps, defineEmits } from "vue";
import { defineProps } from "vue";

// const emit = defineEmits(["update:modelValue"]);

const props = defineProps({
    id: {
        type: String,
        default: "",
    },
    type: {
        type: String,
        default: "text",
    },
    title: {
        type: String,
        default: "",
    },
    modelValue: {
        type: String,
        default: "",
    },
    inputType: {
        type: String,
        default: "input",
    },
    caption: {
        type: Boolean,
        default: false,
    },
    caption_label: {
        type: String,
        default: "",
    },
    dropdownOptions: {
        type: Array,
        default: () => [],
    },
    placeholder_dropdown: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <div class="border-none mb-6 pl-[-24px]">
        <label :for="id" class="block mb-2 text-sm font-medium text-gray-900">
            {{ title }}
        </label>
        <template v-if="inputType === 'input'">
            <input
                :id="id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                v-bind="$attrs"
                :type="type"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
            />
            <label
                v-if="caption"
                for="target_by"
                class="block mb-2 ml-1 pb-4 text-xs font-medium text-gray-500"
                >{{ caption_label }}</label
            >
        </template>

        <template v-else-if="inputType === 'dropdown'">
            <select
                :id="id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                v-bind="$attrs"
                :type="type"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
            >
                <option value="" disabled>{{ placeholder_dropdown }}</option>
                <option
                    v-for="option in dropdownOptions"
                    :value="option.value"
                    :key="option.value"
                >
                    {{ option.label }}
                </option>
            </select>
        </template>
    </div>
</template>
