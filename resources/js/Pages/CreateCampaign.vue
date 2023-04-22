<script setup>
import SidebarLayout from '@/Layouts/SidebarLayout.vue';
defineProps({ user1: Object })
</script>

<template>

    <SidebarLayout>
    <template #content>
        <h1>Create Campaign</h1>
        <p>Hello {{ user1.result[1].name }}, welcome to your first Inertia app!</p>
    </template>
    </SidebarLayout>

</template>
