<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';

import AppLayout from '@/Layouts/AppLayout.vue';


defineProps({
    tournament: Object,
    permissions: Object,
});
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="container w-full center mt-10">

            <div class="mt-24">
                <div class="overflow-hidden rounded-md bg-black bg-opacity-75  border border-[1px] border-gray-500">
                    <div class="grid grid-cols-4">
                        <div class="ml-5 py-5 col-span-2 ">
                            <img class="rounded-md bg-no-repeat" src="/assets/images/warzone-cover.jpg" alt="">
                        </div>
                        <div class="py-5 sm:p-6 grid grid-cols-1 items-center h-50">
                            <h1 class="text-white"> {{ tournament.long_name }}</h1>
                            <p class="text-white "> {{ tournament.description }}</p>
                            <hr>
                            <div class="m-1 w-full">
                                <p class="text-white">Starts: {{tournament.scheduled_start_date}}</p>
                                <p class="text-white">Ends: {{tournament.scheduled_end_date}}</p>
                                <p class="text-white">Registration Closes: {{tournament.registration_closing_time}}</p>
                                <p class="text-white">Checkin Opens: {{tournament.check_in_participant_start_time}}</p>
                            </div>

                            <hr>
                            <div>
                                <Link
                                    class="text-white  bg-[#C10013] rounded-md py-2 px-5">
                                    Join
                                </Link>
                            </div>
                        </div>


                    </div>
                </div>
                <div
                    class="overflow-hidden rounded-md bg-black bg-opacity-75 mt-10 border border-[1px] border-gray-500">

                    <div class="grid grid-cols-1 px-4 py-5 sm:p-6">
                        <div class="text-white">
                            <h2 class="underline text-3xl mb-5">Details</h2>
                            <p> Tournament Type: {{tournament.participant_type}}</p>
                        </div>
                    </div>
                    <hr class="mx-5 my-5">
                    <div class="grid grid-cols-2 px-4 py-5 sm:p-6">
                       <div>
                           <h2 class="text-white text-3xl underline mb-5">Rules</h2>

                           <p class="text-white">    {{ tournament.rules}}</p>
                       </div>
                       <div>
                           <h2 class="text-white text-3xl underline mb-5">Prizes</h2>

                           <p class="text-white">    {{ tournament.prizes}}</p>
                       </div>
                   </div>
                </div>
                <div
                    class="overflow-hidden rounded-md bg-black bg-opacity-75 mt-10  border border-[1px] border-gray-500">
                    <div class="px-4 py-5 sm:p-6">
                        <p class="text-white text-lg">Tournament Bracket View Coming Soon!</p>
                    </div>
                </div>
            </div>


        </div>


    </AppLayout>
</template>
