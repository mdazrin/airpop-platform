<script setup>
const props = defineProps({
    info: {
        type: String,
        required: true,
    },
});
</script>
<template>
    <div
        class="flex p-4 mt-3 mb-4 text-sm text-blue-500 rounded-lg bg-blue-50"
        role="alert"
    >
        <svg
            aria-hidden="true"
            class="flex-shrink-0 inline w-5 h-15 mr-3"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"
            ></path>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <ul class="ml-4 text-md list-disc list-inside">
                <li v-for="(item, i) in info" :key="i">{{ item }}</li>
            </ul>
        </div>
    </div>
</template>
