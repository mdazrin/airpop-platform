<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({ user: Object })
</script>

<template>
    <AuthenticatedLayout>
        <h1>Welcome</h1>
        <p>Hello {{ user.result[0].name }}, welcome to your first Inertia app!</p>
    </AuthenticatedLayout>
</template>
