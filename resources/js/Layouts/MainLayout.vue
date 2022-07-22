<script setup>
import Navbar from '@/Components/Navbar.vue'
</script>

<template>


    <div class="min-h-screen bg-black bg-hero-warzone bg-no-repeat bg-contain mix-blend-luminosity bg-origin-padding">

        <Navbar class="border-b-4 border-[#C10013]" canLogin canRegister/>
        <main>
            <slot/>
        </main>
    </div>

</template>

<style scoped>
header {
    min-height: 108px;
}

</style>
