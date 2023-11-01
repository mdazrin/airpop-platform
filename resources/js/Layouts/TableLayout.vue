<script setup>
import { ref, computed } from "vue";

const props = defineProps({
    tableData: {
        type: Object,
        required: true,
    },
});
const headers = computed(() => {
    return Object.keys(props.tableData[0]);
});

const shallowRows = ref([...props.tableData]);

const searchQuery = ref("");

const sortColumn = ref(""); // Column to sort by
const sortOrder = ref("asc"); // Default sorting order (ascending)

const handleSort = (column) => {
    if (sortColumn.value === column) {
        sortOrder.value = sortOrder.value === "asc" ? "desc" : "asc";
    } else {
        sortColumn.value = column;
        sortOrder.value = "asc";
    }
};

const filteredAndSortedRows = computed(() => {
    let rows = shallowRows.value.slice();

    if (searchQuery.value) {
        const query = searchQuery.value.toLowerCase();
        rows = rows.filter((item) => {
            const nameColumnValue = item["name"].toString().toLowerCase();
            return nameColumnValue.includes(query);
        });
    }

    if (sortColumn.value) {
        rows.sort((a, b) => {
            const aValue = a[sortColumn.value];
            const bValue = b[sortColumn.value];
            return (
                (aValue < bValue ? -1 : aValue > bValue ? 1 : 0) *
                (sortOrder.value === "asc" ? 1 : -1)
            );
        });
    }

    return rows;
});
</script>
<template>
    <div class="mb-5">
        <input
            v-model="searchQuery"
            type="text"
            placeholder="Search by Campaign Name..."
            class="px-4 py-2 border rounded w-80"
        />
    </div>
    <div class="overflow-x-auto relative sm:rounded-lg p-5">

        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th
                        scope="col"
                        class="py-3 px-6"
                        v-for="item in headers"
                        :key="item"
                        @click="handleSort(item)"
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
                    v-for="(item, index) in filteredAndSortedRows"
                    :key="index"
                >
                    <td
                        class="py-4 px-6"
                        v-for="column in Object.values(item)"
                        :key="column"
                    >
                        {{ column }}
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
