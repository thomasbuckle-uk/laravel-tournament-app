<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import TournamentList from '../Partials/TournamentList.vue'


defineProps({
    upcomingTournaments: Array,
    permissions: Object,
});
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="container w-full center mt-10">

            <div class="mt-24">
                <div class="overflow-hidden rounded-md bg-black bg-opacity-75  border border-[1px] border-gray-500">
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                    </div>
                </div>
                <div class="overflow-hidden rounded-md bg-black bg-opacity-75 mt-10 border border-[1px] border-gray-500">
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                    </div>
                </div>
                <div class="overflow-hidden rounded-md bg-black bg-opacity-75 mt-10  border border-[1px] border-gray-500">
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                    </div>
                </div>
            </div>



        </div>


    </AppLayout>
</template>
