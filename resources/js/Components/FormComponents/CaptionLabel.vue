<script setup>
import { defineProps } from "vue";

const props = defineProps({
    caption_label: {
        type: String,
        default: "caption_label",
    },
});
</script>

<template>
    <label class="block ml-1 text-xs font-medium text-gray-500">
        {{ caption_label }}
    </label>
</template>
