<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
</script>

<template>
    <SidebarLayout>
        <template #content>
            <h3 class="text-2xl font-bold text-left py-2">
                Finance
            </h3>
            <h1>Select tracker</h1>
            <div class="mb-6">

                <!-- radio card -->
                <ul class="grid w-full gap-6 md:grid-cols-3">
                    <li>
                        <input
                            type="radio"
                            id="plan1"
                            name="plan"
                            value="plan1"
                            class="hidden peer"
                            required
                        />
                        <label
                            for="plan1"
                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100"
                        >
                            <div class="block">
                                <div
                                    class="w-full flex items-center justify-center"
                                >

                                </div>
                                <div
                                    class="w-full flex items-center justify-center text-lg font-semibold mt-4"
                                >
                                    Tracker A
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input
                            type="radio"
                            id="plan2"
                            name="plan"
                            value="plan2"
                            class="hidden peer"
                        />
                        <label
                            for="plan2"
                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100"
                        >
                            <div class="block">
                                <div
                                    class="w-full flex items-center justify-center"
                                >
                                </div>
                                <div
                                    class="w-full flex items-center justify-center mt-4"
                                >
                                    Tracker B
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input
                            type="radio"
                            id="plan3"
                            name="plan"
                            value="plan3"
                            class="hidden peer"
                        />
                        <label
                            for="plan3"
                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100"
                        >
                            <div class="block">
                                <div
                                    class="w-full flex items-center justify-center mt-4"
                                >
                                    Tracker C
                                </div>
                            </div>
                        </label>
                    </li>
                </ul>
            </div>

        </template>
    </SidebarLayout>
</template>


