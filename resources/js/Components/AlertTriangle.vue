<script setup>
const props = defineProps({
    title: {
        type: String,
        required: true,
    },
});
</script>
<template>
    <div
        class="flex p-4 mb-4 text-sm text-yellow-500 border border-[#fff2db] rounded-lg bg-[#fff2db]"
        role="alert"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="flex-shrink-0 inline w-5 h-5 mr-3"
            fill="currentColor"
            viewBox="0 0 24 24"
            id="alert"
        >
            <g data-name="Layer 2">
                <path
                    d="M22.56 16.3 14.89 3.58a3.43 3.43 0 0 0-5.78 0L1.44 16.3a3 3 0 0 0-.05 3A3.37 3.37 0 0 0 4.33 21h15.34a3.37 3.37 0 0 0 2.94-1.66 3 3 0 0 0-.05-3.04zM12 17a1 1 0 1 1 1-1 1 1 0 0 1-1 1zm1-4a1 1 0 0 1-2 0V9a1 1 0 0 1 2 0z"
                    data-name="alert-triangle"
                ></path>
            </g>
        </svg>
        <div>
            <span class="font-medium">{{ title }}</span>
        </div>
    </div>
</template>
