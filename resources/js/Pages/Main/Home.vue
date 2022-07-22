<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import MainLayout from "@/Layouts/MainLayout.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome"/>
    <MainLayout>
        Test
    </MainLayout>
</template>

<style scoped>

</style>
