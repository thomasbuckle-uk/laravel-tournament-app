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
                       <div class="ml-10 py-20 col-span-2 ">
                           <img class="rounded-md bg-no-repeat" src="/assets/images/warzone-cover.jpg" alt="">
                       </div>
                       <div class="py-5 sm:p-6 grid grid-cols-1 items-center h-50">
                           <h1 class="text-white"> {{tournament.long_name}}</h1>
                           <Link
                               class="text-white bg-[#C10013] rounded-md py-2 px-5">
                               Join
                           </Link>
                       </div>


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
