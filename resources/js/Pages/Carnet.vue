<script setup>

import QrcodeVue from 'qrcode.vue';
import logo from "/public/Images/logoUnibague.png"


const props = defineProps({
    image: String,
    name: String,
    user: String,
    role: String,
    identification: String,
    primaryInfo: String || Array,
    secondaryInfo: String | Array,
    color: String,
    qrCode: String,
    showChangeButton: Boolean
});
const QRsize = 190;
const emit = defineEmits(['cambiarCarnet']);

let todayDate;
let date = new Date()
let day = `${(date.getDate())}`.padStart(2,'0');
let month = `${(date.getMonth()+1)}`.padStart(2,'0');
let year = date.getFullYear();

todayDate = `${day}-${month}-${year}`


</script>


<template>
    <div
        class="w-full h-full md:w-1/3 xl:w-2/6 flex flex-col md:h-full mx-auto bg-unibague-blue bg-opacity-3 rounded-xl mb-2 relative md:shadow-2xl">
        <div>
            <div class="relative flex" :style="{ background:color }">
                <button class="absolute top-10 right-7" @click="$emit('cambiarCarnet')" v-if="showChangeButton">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/>
                    </svg>
                </button>
                <button class="absolute top-10 left-7">
                    <a href="/dashboard"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>
                    </a>

                </button>
                <div class="flex justify-center items-center w-full mt-2 h-1/4 pt-4">
<!--                    <img class="rounded-2xl w-2/5 md:w-2/5 md:h-4/5 h-5/6 border-white border-solid border-2 bg-white object-contain "-->
                    <img class="rounded-full mb-4 w-2/5 md:w-2/5 md:h-2/6 h-2/6 border-white border-solid border-2 bg-white object-contain "
                         :src="props.image"
                         alt="">
                </div>
            </div>

            <div class="custom-shape-divider-top-1695396892 relative flex" :style="{ fill:color }">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                     preserveAspectRatio="none">
                    <path d="M0,0V7.23C0,65.52,268.63,112.77,600,112.77S1200,65.52,1200,7.23V0Z"
                          class="shape-fill"></path>
                </svg>


                <div class="absolute inset-0 flex flex-col text-center">
                    <div class="text-white text-xl xl:text-2xl font-bold capitalize">{{ name }}</div>
                    <h3 class="text-white text-lg font-light">{{ user }}</h3>
                    <h3 class="text-white text-lg font-light">{{ todayDate }}</h3>
                </div>
            </div>
        </div>


        <div
            class=" px-12 lg:my-4 my-4 flex flex-col max-h-fit mx-auto font-bold text-lg xl:text-2xl justify-between text-center"
            :class="{'my-4': role === 'Funcionario'}">
            <h2>{{ role }}</h2>
            <h2>{{ identification }}</h2>
            <h2 class="capitalize" v-html="primaryInfo"/>
            <h2 class="capitalize">{{ secondaryInfo }}</h2>
        </div>


        <div class="bottom-0 pb-4 relative w-full flex flex-col items-center">
            <div class=" mb-5 mx-auto">
                <qrcode-vue :value="qrCode" :size="QRsize" level="M"/>
            </div>
            <img :src="logo" alt="" class="w-3/6 xl:w-3/6">
        </div>


    </div>


</template>


<style>
.custom-shape-divider-top-1695396892 svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 120px;
    margin-top: -3px;
}


</style>
