<script setup>
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import RadioButtonCards from "@/Components/RadioButtonCards.vue";
import HorizontalLine from "@/Components/HorizontalLine.vue";
import AddDeleteAlert from "@/Components/AddDeleteAlert.vue";
import AlertTriangle from "@/Components/AlertTriangle.vue";
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    name: null

})


</script>

<template>
    <SidebarLayout>
        <template #content>
            <form @submit.prevent="form.post('/create-form')">
                <!-- email -->
                <input type="text" v-model="form.name">
                <div v-if="form.errors.name">{{ form.errors.name }}</div>
                <button type="submit" :disabled="form.processing">Login</button>
            </form>
        </template>
    </SidebarLayout>
</template>
