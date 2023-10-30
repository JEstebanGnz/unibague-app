<script setup>
import { initFlowbite } from 'flowbite'
import { onMounted } from 'vue'

onMounted(() => {
    initFlowbite()
})

const props = defineProps({initial: String });

</script>

<template>
    <div class="bg-unibague-blue bg-opacity-2">
        <div
            class="relative md:px-28 px-10 bg-unibague-blue pt-2 md:pt-5 lg:pt-6 xl:pt-12 flex flex-row h-20 w-full justify-between items-center"
            style="z-index: 2">
            <div
                class="  text-white text-3xl sm:text-3xl md:text-4xl xl:text-5xl 2xl:text-5xl font-bold">
                Unibague App
            </div>
            <div class="w-12 h-12 ">
                <div
                    type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start"
                    class="cursor-pointer w-full h-full bg-yellow-400 rounded-full flex justify-center items-center ">
                    <div class=" text-black text-2xl font-normal"> {{props.initial}}</div>
                </div>
                <div id="userDropdown"
                     class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <div class="py-1">
                        <a href="/"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>
        <svg id="wave" class="sm:-mt-3 -mt-1" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 100"
             xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="rgba(0, 61, 124, 1)" offset="0%"></stop>
                    <stop stop-color="rgba(0, 61, 124, 1)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)"
                  d="M0,50L60,45C120,40,240,30,360,31.7C480,33,600,47,720,43.3C840,40,960,20,1080,13.3C1200,7,1320,13,1440,28.3C1560,43,1680,67,1800,73.3C1920,80,2040,70,2160,55C2280,40,2400,20,2520,20C2640,20,2760,40,2880,48.3C3000,57,3120,53,3240,48.3C3360,43,3480,37,3600,35C3720,33,3840,37,3960,33.3C4080,30,4200,20,4320,20C4440,20,4560,30,4680,43.3C4800,57,4920,73,5040,81.7C5160,90,5280,90,5400,90C5520,90,5640,90,5760,76.7C5880,63,6000,37,6120,30C6240,23,6360,37,6480,43.3C6600,50,6720,50,6840,43.3C6960,37,7080,23,7200,21.7C7320,20,7440,30,7560,41.7C7680,53,7800,67,7920,65C8040,63,8160,47,8280,33.3C8400,20,8520,10,8580,5L8640,0L8640,100L8580,100C8520,100,8400,100,8280,100C8160,100,8040,100,7920,100C7800,100,7680,100,7560,100C7440,100,7320,100,7200,100C7080,100,6960,100,6840,100C6720,100,6600,100,6480,100C6360,100,6240,100,6120,100C6000,100,5880,100,5760,100C5640,100,5520,100,5400,100C5280,100,5160,100,5040,100C4920,100,4800,100,4680,100C4560,100,4440,100,4320,100C4200,100,4080,100,3960,100C3840,100,3720,100,3600,100C3480,100,3360,100,3240,100C3120,100,3000,100,2880,100C2760,100,2640,100,2520,100C2400,100,2280,100,2160,100C2040,100,1920,100,1800,100C1680,100,1560,100,1440,100C1320,100,1200,100,1080,100C960,100,840,100,720,100C600,100,480,100,360,100C240,100,120,100,60,100L0,100Z"></path>
        </svg>
        <slot></slot>
    </div>
</template>

<style scoped>

</style>
