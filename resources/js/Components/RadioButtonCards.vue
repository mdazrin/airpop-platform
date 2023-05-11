<script setup>
const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    subTitle: {
        type: String,
    },
    subTitle2: {
        type: String,
    },
});
</script>

<template>
    <div
        class="block items-center justify-between w-full p-5 text-gray-500 bg-white rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100"
    >
        <div class="w-full flex items-center justify-center">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            </svg>
        </div>
        <div
            class="w-full flex items-center justify-center text-lg font-semibold mt-4"
        >
            {{ title }}
        </div>
        <div class="w-full flex items-center justify-center mt-4">
            {{ subTitle }}
        </div>
        <div class="w-full flex items-center justify-center mt-4">
            {{ subTitle2 }}
        </div>
    </div>
</template>
