<script setup>
import {ref} from "vue";

import {MenuIcon, SearchIcon, XIcon} from "@heroicons/vue/outline";
import {Head, Link} from '@inertiajs/inertia-vue3';
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";

const navigation = {
    pages: [
        {name: "Home", href: "/"},
        {name: "News", href: "/news"},
        {name: "Teams", href: "/teams"},
        {name: "Tournaments", href: "/tournaments"},
        {name: "Partners", href: "/partners"},
        {name: "About", href: "/about"},
        {name: "Shop", href: "/shop"},
    ],
};

const openMobile = ref(false);

const open = ref(false);

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <div class="bg-black">
        <!-- Mobile menu -->
        <TransitionRoot as="template" :show="openMobile">
            <Dialog as="div" class="relative z-40 lg:hidden" @close="openMobile = true">
                <TransitionChild
                    as="template"
                    enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div class="fixed inset-0 bg-black bg-opacity-25"/>
                </TransitionChild>

                <div class="fixed inset-0 flex z-40">
                    <TransitionChild
                        as="template"
                        enter="transition ease-in-out duration-300 transform"
                        enter-from="-translate-x-full"
                        enter-to="translate-x-0"
                        leave="transition ease-in-out duration-300 transform"
                        leave-from="translate-x-0"
                        leave-to="-translate-x-full"
                    >
                        <DialogPanel
                            class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto"
                        >
                            <div class="px-4 pt-5 pb-2 flex">
                                <button
                                    type="button"
                                    class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-white hover:text-gray-300"
                                    @click="openMobile = false"
                                >
                                    <span class="sr-only">Close menu</span>
                                    <XIcon class="h-6 w-6" aria-hidden="true"/>
                                </button>
                            </div>

                            <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                                <div v-for="page in navigation.pages" :key="page.name" class="flow-root">
                                    <a
                                        :href="page.href"
                                        class="-m-2 p-2 block font-medium text-white hover:text-gray-300"
                                    >{{ page.name }}</a
                                    >
                                </div>
                            </div>

                            <div class="border-t border-gray-200 py-6 px-4">
                                <a href="#" class="-m-2 p-2 flex items-center">
                                    <img
                                        src="https://tailwindui.com/img/flags/flag-canada.svg"
                                        alt=""
                                        class="w-5 h-auto block flex-shrink-0"
                                    />
                                    <span
                                        class="ml-3 block text-base font-medium text-white hover:text-gray-300"
                                    >
                    CAD
                  </span>
                                    <span class="sr-only">, change currency</span>
                                </a>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <header class="relative">
            <nav aria-label="Top" class="container w-full">
                <div class="">
                    <div class="h-16 flex items-center justify-between">
                        <div class="flex-1 flex items-center lg:hidden">
                            <button
                                type="button"
                                class="-ml-2 bg-white p-2 rounded-md text-white hover:text-gray-300"
                                @click="open = true"
                            >
                                <span class="sr-only">Open menu</span>
                                <MenuIcon class="h-6 w-6" aria-hidden="true"/>
                            </button>

                            <a href="#" class="ml-2 p-2 text-white hover:text-gray-300">
                                <span class="sr-only">Search</span>
                                <SearchIcon class="w-6 h-6" aria-hidden="true"/>
                            </a>
                        </div>

                        <!-- Flyout menus -->
                        <div class="hidden lg:flex-1 lg:block lg:self-stretch">
                            <div class="h-full flex space-x-8">
                                <a
                                    v-for="page in navigation.pages"
                                    :key="page.name"
                                    :href="page.href"
                                    class="flex items-center text-sm font-medium text-white hover:text-gray-300"
                                >{{ page.name }}</a
                                >
                            </div>
                        </div>

                        <!-- Logo -->
                        <a href="#" class="flex">
                            <span class="sr-only">Workflow</span>
                            <img
                                class="mt-12 h-24 w-auto"
                                src="../../images/logo-white.png"
                                alt=""
                            />
                        </a>

                        <div class="flex-1 flex items-center justify-end">
                            <!-- Account -->
                            <!-- <a href="#" class="p-2 text-gray-400 hover:text-gray-500 lg:ml-4">
                              <span class="sr-only">Account</span>
                              <UserIcon class="w-6 h-6" aria-hidden="true" />
                            </a> -->

                            <div class="hidden md:flex md:items-center md:space-x-6">
                                <a
                                    href="#"
                                    class="hidden ml-6 p-2 text-white hover:text-gray-300 lg:block"
                                >
                                    <span class="sr-only">Search</span>
                                    <SearchIcon class="w-6 h-6" aria-hidden="true"/>
                                </a>
                                <a
                                    href="#"
                                    class="hidden text-white hover:text-gray-300 lg:flex lg:items-center"
                                >
                                    <img
                                        src="https://tailwindui.com/img/flags/flag-canada.svg"
                                        alt="Canadian Flag"
                                        class="w-5 h-auto block flex-shrink-0"
                                    />
                                    <span class="ml-3 block text-base font-medium"> English </span>
                                    <span class="sr-only">, change language</span>
                                </a>


                                <div v-if="canLogin" >
                                    <Link v-if="$page.props.user" :href="route('dashboard')"
                                          class="text-sm text-gray-700 underline">
                                        Dashboard
                                    </Link>

                                    <template v-else>
                                        <Link :href="route('login')"
                                              class="inline-flex items-center border border-transparent text-base font-medium text-white hover:text-gray-300 md:mr-2"
                                        >
                                            Log in
                                        </Link>

                                        <Link v-if="canRegister" :href="route('register')"
                                              class="inline-flex items-center border border-transparent text-base font-medium text-white hover:text-gray-300"
                                        >
                                            Register
                                        </Link>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
</template>
