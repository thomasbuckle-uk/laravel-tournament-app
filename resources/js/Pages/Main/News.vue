<script setup>
import { ref } from "vue";
import MainLayout from '@/Layouts/MainLayout.vue';


const posts = [
    {
        title: "Boost your conversion rate",
        href: "#",
        category: { name: "Article", href: "#" },
        description:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.",
        date: "Mar 16, 2020",
        datetime: "2020-03-16",
        imageUrl:
            "https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80",
        readingTime: "6 min",
        author: {
            name: "Roel Aufderehar",
            href: "#",
            imageUrl:
                "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
        },
    },
    {
        title: "How to use search engine optimization to drive sales",
        href: "#",
        category: { name: "Video", href: "#" },
        description:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo laudantium.",
        date: "Mar 10, 2020",
        datetime: "2020-03-10",
        imageUrl:
            "https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80",
        readingTime: "4 min",
        author: {
            name: "Brenna Goyette",
            href: "#",
            imageUrl:
                "https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
        },
    },
    {
        title: "Improve your customer experience",
        href: "#",
        category: { name: "Case Study", href: "#" },
        description:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint harum rerum voluptatem quo recusandae magni placeat saepe molestiae, sed excepturi cumque corporis perferendis hic.",
        date: "Feb 12, 2020",
        datetime: "2020-02-12",
        imageUrl:
            "https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80",
        readingTime: "11 min",
        author: {
            name: "Daniela Metz",
            href: "#",
            imageUrl:
                "https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
        },
    },
];
</script>

<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <MainLayout>
        <div class="min-h-screen container w-full center mt-10">
            <div class="mt-24 flex justify-center">
                <div class="text-lg max-w-prose mx-auto">
                    <h1>
          <span
              class="mt-2 block text-3xl text-center leading-8 font-medium tracking-tight text-white sm:text-6xl"
          >NEWS</span
          >
                    </h1>
                    <p class="mt-4 text-center text-gray-500 leading-8"></p>
                </div>
            </div>

            <!-- Begin News Listings -->
            <div class="mt-12 max-w-6xl mx-auto grid gap-5 lg:grid-cols-1">
                <div
                    v-for="post in posts"
                    :key="post.title"
                    class="flex flex-row rounded-lg shadow-lg overflow-hidden bg-black border-gray-700 border-[2px]"
                >
                    <div class="basis-1/2 p-6">
                        <img
                            class="object-cover rounded shadow overflow-hidden bg-black"
                            :src="post.imageUrl"
                            alt=""
                        />
                    </div>
                    <div class="basis-1/2 gap-5 bg-black p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <a :href="post.href" class="block mt-2">
                                <p class="text-2xl font-semibold text-white">
                                    {{ post.title }}
                                </p>
                                <p class="mt-3 text-base text-gray-500">
                                    {{ post.description }}
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="ml-3">
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time :datetime="post.datetime">
                                        {{ post.date }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
