<script setup>
import { defineProps } from "vue";

const props = defineProps({
    label: {
        type: String,
        default: "",
    },
    modelValue: {
        type: String,
        default: "",
    },
    checkedValue: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <div>
        <div class="flex">
            <div v-bind="$attrs">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input
                        type="checkbox"
                        class="sr-only peer"
                        :value="modelValue"
                        @input="
                            $emit('update:modelValue', $event.target.checked)
                        "
                        :checked="checkedValue"
                    />
                    <div
                        class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"
                    ></div>
                    <span class="ml-3 text-sm font-medium text-gray-900">{{
                        label
                    }}</span>
                </label>
            </div>
        </div>
    </div>
</template>
