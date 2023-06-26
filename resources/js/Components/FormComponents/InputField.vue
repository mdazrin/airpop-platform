<script setup>
import { defineProps } from "vue";
import CaptionLabel from "./CaptionLabel.vue";
import TitleLabel from "./TitleLabel.vue";

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
    min: {
        type: Date,
    },
});
</script>

<template>
    <div class="border-none pl-[-24px]">
        <TitleLabel :title="title" />

        <template v-if="inputType === 'input'">
            <input
                :id="id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                v-bind="$attrs"
                :type="type"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                :min="min"
            />
            <CaptionLabel v-if="caption" :caption_label="caption_label" />
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
