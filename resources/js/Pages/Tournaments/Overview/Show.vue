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

            <div class="mt-24 flex justify-center">
                <div class="text-lg max-w-prose mx-auto">
                    <h1>
                        <span class="mt-2 block text-xl text-center leading-8 font-medium tracking-tight text-white sm:text-4xl">Tournaments</span>
                    </h1>
                    <p class="mt-4 text-center text-gray-500 leading-8"></p>
                </div>
            </div>

                    <TournamentList
                        :tournaments="upcomingTournaments"
                    ></TournamentList>



        </div>




    </AppLayout>
</template>
