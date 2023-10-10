<script setup>

</script>

<template>
    <div class="bg-unibague-blue bg-opacity-2">

        <div>
            <img class="relative" src="../../../public/Images/wave2.svg" alt="wave"/>
        </div>
        <div
            class="left-10 md:left-14 top-8 absolute text-white text-2xl sm:text-3xl md:text-4xl xl:text-4xl 2xl:text-5xl font-bold">
            Unibague App
        </div>
        <div class="w-12 h-12 right-24 top-8 absolute ">
            <div
                class="w-full h-full left-0 top-0 absolute bg-yellow-400 rounded-full flex justify-center items-center ">
                <div class="absolute text-black text-2xl font-normal">S</div>
            </div>
        </div>
    </div>
    <slot></slot>
</template>

<style scoped>

</style>
