<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SidebarLayout from '@/Layouts/SidebarLayout.vue';
defineProps({ user: Object })
</script>

<template>

    <SidebarLayout>
    <template #content>
        <h1>Welcome</h1>
        <p>Hello {{ user.result[0].name }}, welcome to your first Inertia app!</p>
    </template>
    </SidebarLayout>

</template>
