<script setup>
import TitleLabel from "./TitleLabel.vue";
import { defineProps } from "vue";

const props = defineProps({
    options: {
        type: Array,
        default: () => [],
    },
    title: {
        type: String,
        default: "",
    },
    modelValue: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <div class="mb-6">
        <TitleLabel :title="title" />
        <div class="flex">
            <div
                v-for="(option, index) in options"
                :key="index"
                class="flex items-center mr-4"
            >
                <input
                    id="inline-radio"
                    type="radio"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                    name="radio_target_by"
                    :value="option.value"
                    @input="$emit('update:modelValue', option.value)"
                />
                <label
                    for="inline-radio"
                    class="ml-2 text-sm font-medium text-gray-900"
                    >{{ option.label }}</label
                >
            </div>
        </div>
    </div>
</template>
