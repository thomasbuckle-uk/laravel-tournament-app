<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateTeamForm from '@/Pages/Team/Partials/CreateTeamForm.vue';
</script>

<template>
    <AppLayout title="Create Team">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                You currently have no team! Create a Team now
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
<p class="text-white ">                #Dev note - If invited to a team then this page should not appear but we should link the create form anyway
</p>                <CreateTeamForm />
            </div>
        </div>
    </AppLayout>
</template>
