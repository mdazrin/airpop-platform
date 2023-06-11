<script setup>
import InputField from "./InputField.vue";
import CaptionLabel from "./CaptionLabel.vue";
import TitleLabel from "./TitleLabel.vue";
import { ref, defineProps } from "vue";

const countries = ref();
const cities_list = ref();

const props = defineProps({
    id: {
        type: String,
        default: "",
    },
    title: {
        type: String,
        default: "",
    },
    modelValue1: {
        type: String,
        default: "modelValue1",
    },
    modelValue2: {
        type: String,
        default: "modelValue2",
    },
    dropdownOptions: {
        type: Array,
        default: () => [],
    },
    placeholder_dropdown: {
        type: String,
        default: "",
    },
    caption: {
        type: Boolean,
        default: false,
    },
    caption_label: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <div class="mb-6">
        <TitleLabel :title="title" />

        <div class="flex">
            <InputField
                class="flex items-center mr-2"
                v-model="countries"
                inputType="dropdown"
                type="text"
                :dropdownOptions="dropdownOptions"
                :placeholder_dropdown="placeholder_dropdown"
                :value="modelValue1"
                @input="$emit('update:modelValue1', $event.target.value)"
            />
            <InputField
                class="flex items-center"
                v-model="cities_list"
                placeholder="Start typing..."
                inputType="input"
                type="text"
            />
        </div>
        <CaptionLabel v-if="caption" :caption_label="caption_label" />
        <label
            for="inline-2-radio"
            class="ml-2 text-sm font-medium text-gray-900"
            >{{ modelValue1 }}</label
        >
    </div>
</template>
