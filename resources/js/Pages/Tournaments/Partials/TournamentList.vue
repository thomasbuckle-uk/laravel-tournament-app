
<script setup>
const items = [
    { id: 1 },
    { id: 2}
    // More items...
]
</script>

<template>
    <ul role="list" class="space-y-3">
        <li v-for="item in items" :key="item.id" class="overflow-hidden bg-transparent border-gray-700 border-[2px] px-4 py-4 shadow sm:rounded-md sm:px-6">
            <!-- Your content -->
        </li>
    </ul>
</template>


<script>
</script>
<style scoped>

</style>
