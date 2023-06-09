<script setup>
import { defineProps } from "vue";

const props = defineProps({
    title: {
        type: String,
        default: "",
    },
    title_big: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <div>
        <template v-if="title_big">
            <h3 class="text-xl font-bold text-left py-2" v-bind="$attrs">
                {{ title }}
            </h3>
        </template>
        <template v-else>
            <label class="block mt-6 mb-2 text-sm font-medium text-gray-900">
                {{ title }}
            </label>
        </template>
    </div>
</template>
