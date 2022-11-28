<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
const props = defineProps({
    tournaments: Object,
});
</script>

<template>
    <ul role="list"
        class="space-y-4 sm:grid sm:grid-cols-2 sm:gap-6 sm:space-y-0 sm:grid-rows-2 lg:grid-cols-3 lg:gap-12 mt-24 h-auto">
        <li v-for="item in tournaments" :key="item.id"
            class="h-80 rounded-lg bg-no-repeat bg-center bg-cover " :style="{'background-image': 'url(../assets/images/warzone-cover.jpg)'}">
            <div class="flex flex-col h-full">
                <div class="text-white basis-2/3 mt-4 ml-1 ">
                    <div class=" text-sm text-gray-600 sm:grid sm:grid-cols-3 sm:gap-x-6 sm:space-y-0 sm:divide-y-0 w-auto  ">

                        <div class="bg-gray-800  rounded-md text-center py-1">
                            <p class="text-white uppercase">{{ item.participant_type }}</p>
                        </div>

                        <div class=" bg-gray-800  rounded-md text-center py-1 text-center">
                            <p class="bg-gray-800 rounded-md  text-white uppercase ">{{ item.size }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center text-white basis-1/3 bg-black bg-opacity-75 bg-gradient-to-t from-black">

                   <div class="ml-5 w-2/3">
                       <p class="text-white uppercase">{{ item.tournament_name }}</p>
                       <p class="text-red-500 uppercase">0/{{ item.size }}</p>
                       <p class="text-gray-500 text-sm">Signup Closes {{ item.registration_closing_time }}</p>
                   </div>

                    <div class="w-1/3 ">
                        <Link :href="route('tournaments.details' , item.id)"
                              class="text-white bg-[#C10013] rounded-md p-2">
                            Details
                        </Link>
                    </div>
                </div>

            </div>


        </li>


    </ul>
</template>


<script>
</script>
<style scoped>

</style>
