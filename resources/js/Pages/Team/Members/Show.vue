<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteTeamForm from '@/Pages/Team/Partials/DeleteTeamForm.vue';
import JetSectionBorder from '@/Jetstream/SectionBorder.vue';
import TeamMemberManager from '@/Pages/Team/Partials/TeamMemberManager.vue'
import {UserCircleIcon, UserGroupIcon} from '@heroicons/vue/outline'
import UpdateTeamInformationForm from "@/Pages/Team/Partials/UpdateTeamInformationForm.vue";
import {Inertia} from "@inertiajs/inertia";


defineProps({
    team: Object,
    availableRoles: Array,
    permissions: Object,
});

let baseUrl = '/team';
const navigation = [
    {name: 'Overview', href: baseUrl + '/overview', icon: UserCircleIcon, current: false},
    {name: 'Members', href: baseUrl + '/members', icon: UserCircleIcon, current: true},
    {name: 'Stats', href: baseUrl + '/stats', icon: UserGroupIcon, current: false},
    {name: 'Settings', href: baseUrl + '/settings', icon: UserGroupIcon, current: false},
]

</script>

<template>
    <AppLayout title="Team Members">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-300 leading-tight">
                My Team -
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
                    <aside class="py-6 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
                        <nav class="space-y-1">
                            <a v-for="item in navigation" :key="item.name" :href="item.href"
                               :class="[item.current ? 'bg-gray-50 text-indigo-700 hover:text-indigo-700 hover:bg-white' : 'text-white hover:text-gray-900 hover:bg-gray-50', 'group rounded-md px-3 py-2 flex items-center text-sm font-medium']"
                               :aria-current="item.current ? 'page' : undefined">
                                <component :is="item.icon"
                                           :class="[item.current ? 'text-indigo-500 group-hover:text-indigo-500' : 'text-gray-400 group-hover:text-gray-500', 'flex-shrink-0 -ml-1 mr-3 h-6 w-6']"
                                           aria-hidden="true"/>
                                <span class="truncate">
            {{ item.name }}
          </span>
                            </a>
                        </nav>
                    </aside>

                    <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">

                                        <TeamMemberManager
                                            class="mt-10 sm:mt-0"
                                            :team="team"
                                            :available-roles="availableRoles"
                                            :user-permissions="permissions"
                                        />
                    </div>
                </div>




                <template v-if="permissions.canDeleteTeam && ! team.personal_team">
                    <JetSectionBorder/>

                    <DeleteTeamForm class="mt-10 sm:mt-0" :team="team"/>
                </template>
            </div>
        </div>
    </AppLayout>
</template>
