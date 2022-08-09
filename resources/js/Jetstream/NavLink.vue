<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 font-medium text-gray-300 hover:text-gray-300 focus:outline-none focus:border-[#C10013] transition'
        : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 font-medium text-white hover:text-gray-300 focus:outline-none focus:text-gray-300 focus:border-gray-300 transition';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
