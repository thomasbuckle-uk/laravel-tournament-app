<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import JetActionMessage from '@/Jetstream/ActionMessage.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetFormSection from '@/Jetstream/FormSection.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetSectionBorder from '@/Jetstream/SectionBorder.vue'

const props = defineProps({
    team: Object,
    permissions: Object,
});

const form = useForm({
    description: props.team.description,
    twitter_username: props.team.twitter_username,
    twitch_username: props.team.twitch_username,
});

const updateTeamDescription = () => {
    form.put(route('teams.update', props.team), {
        errorBag: 'updateTeamDescription',
        preserveScroll: true,
    });
};
</script>

<template>
    <JetSectionBorder />
    <JetFormSection @submitted="updateTeamDescription">
        <template #title>
            Team Description
        </template>

        <template #description>
            The team's Description
        </template>


        <template #form>

            <!--Team Description-->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="description" value="Team Description" />

                <JetInput
                    id="description"
                    v-model="form.description"
                    type="textarea"
                    rows="4"
                    class="mt-1 block w-full"
                    :disabled="! permissions.canUpdateTeam"
                />
                <JetInputError :message="form.errors.description" class="mt-2" />

                <JetLabel for="twitter_username" value="Twitter" />

                <JetInput
                    id="twitter_username"
                    v-model="form.twitter_username"
                    type="text"
                    class="mt-1 block w-full"
                    :disabled="! permissions.canUpdateTeam"
                />
                <JetInputError :message="form.errors.twitter_username" class="mt-2" />


            </div>

        </template>

        <template v-if="permissions.canUpdateTeam" #actions>
            <JetActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </JetActionMessage>

            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </JetButton>
        </template>
    </JetFormSection>
</template>
