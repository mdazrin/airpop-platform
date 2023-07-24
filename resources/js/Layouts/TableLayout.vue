<script setup>
import { ref } from "vue";

const props = defineProps({
    header: {
        type: Array,
        default: () => [],
    },
    tableData: {
        type: Array,
        default: () => [],
    },
    id: {
        type: String,
        required: true,
    },
    name: {
        type: String,
    },
    rate_model: {
        type: String,
    },
    is_archived: {
        type: String,
    },
    limit_daily_amount: {
        type: String,
    },
    limit_total_amount: {
        type: String,
    },
});
</script>
<template>
    <div class="overflow-x-auto relative sm:rounded-lg p-5">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th
                        scope="col"
                        class="py-3 px-6"
                        v-for="item in header"
                        :key="item"
                    >
                        <div class="flex items-center">
                            {{ item }}
                            <a href="#"
                                ><svg
                                    class="w-3 h-3 ml-1.5"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"
                                    /></svg
                            ></a>
                        </div>
                    </th>

                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="bg-white border-b"
                    v-for="item in tableData"
                    :key="item.id"
                >
                    <th
                        scope="row"
                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap"
                    >
                        {{ item.id }}
                    </th>
                    <td class="py-4 px-6">{{ item.name }}</td>
                    <td class="py-4 px-6">{{ item.rate_model }}</td>
                    <td class="py-4 px-6">{{ item.status }}</td>
                    <td class="py-4 px-6">
                        {{ item.is_archived }}
                    </td>
                    <td class="py-4 px-6">
                        {{ item.limit_daily_amount }}
                    </td>
                    <td class="py-4 px-6">
                        {{ item.limit_total_amount }}
                    </td>
                    <td class="py-4 px-6 text-right">
                        <a
                            href="#"
                            class="font-medium text-blue-600 hover:underline"
                            >Edit</a
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
