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
        </template>

        <template v-else-if="inputType === 'dropdown'">
            <input
                :id="id"
                class="bg-gray-50 border text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                v-bind="$attrs"
                :type="type"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
            />
        </template>
    </div>
</template>
