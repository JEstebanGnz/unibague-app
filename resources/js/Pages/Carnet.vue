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

</script>


<template>
    <div
        class="w-full h-full md:w-1/3 xl:w-2/6 flex flex-col md:h-full mx-auto bg-unibague-blue bg-opacity-3 rounded-xl mb-2 relative md:shadow-2xl">
        <div>
            <div class="relative flex" :style="{ background:color }">
                <button class="absolute top-5 left-7" @click="$emit('cambiarCarnet')" v-if="showChangeButton">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/>
                    </svg>
                </button>
                <div class="flex justify-center items-center w-full mt-2">
                    <img class="rounded-full w-2/5 md:w-2/5 md:h-4/5 h-5/6 border-white border-solid border-2 bg-white "
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
                </div>
            </div>
        </div>


        <div
            class=" px-12 lg:my-4 my-4 flex flex-col h-32 mx-auto font-bold text-lg xl:text-2xl justify-between text-center"
            :class="{'my-4': role === 'Funcionario'}">
            <h2>{{ role }}</h2>
            <h2>{{ identification }}</h2>
            <h2 class="capitalize" v-html="primaryInfo"/>
            <h2 class="capitalize">{{ secondaryInfo }}</h2>
        </div>


        <div class="bottom-0 pb-4 relative w-full flex flex-col items-center">
            <div class=" mb-5 mx-auto">
                <qrcode-vue :value="qrCode" :size="QRsize" level="Q"/>
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

