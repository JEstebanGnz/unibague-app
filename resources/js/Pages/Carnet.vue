<script setup>

import QrcodeVue from 'qrcode.vue';
import perfil from "/public/Images/maicol.png"
import logo from "/public/Images/logoUnibague.png"

const props = defineProps({
    image: String,
    name: String,
    user: String,
    role: String,
    identification: String,
    primaryInfo: Array,
    secondaryInfo: Array,
    color: String,
    qrCode: String
});
const size = 190;
const emit = defineEmits(['cambiarCarnet']);

const changeCarnet = () => {
    emit('cambiarCarnet');
}
</script>

<template>
    <div
        class="w-full sm:max-h-screen sm:w-2/4 md:w-1/3 xl:w-1/5 flex flex-col min-h-screen overflow-hidden mx-auto bg-unibague-blue bg-opacity-3 rounded-xl mb-2 relative">
        <div>
            <div class=" relative p-4  flex lg:pt-6" :style="{ background:color }">
                <button class="self-start" @click="$emit('cambiarCarnet')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6 text-white self-start">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/>
                    </svg>
                </button>
                <div class="flex justify-center items-center w-full pt-3">
                    <img class="rounded-full w-2/5 lg:w-3/5 xl:w-2/5 border-white border-solid border-2" :src="perfil" alt="">
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6 right-0" :style="{ color:color }">
                    <path transform="translate(0 -1)" stroke-linecap="round" stroke-linejoin="round"
                          d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/>
                </svg>
            </div>

            <div class="custom-shape-divider-top-1695396892 relative flex" :style="{ fill:color }">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                     preserveAspectRatio="none">
                    <path d="M0,0V7.23C0,65.52,268.63,112.77,600,112.77S1200,65.52,1200,7.23V0Z"
                          class="shape-fill"></path>
                </svg>

                <div class="absolute inset-0 flex flex-col  text-center top-2 md:top-4">
                    <h3 class="text-white text-xl font-bold">{{ name }}</h3>
                    <h3 class="text-white text-lg font-light">{{ user }}</h3>
                </div>
            </div>
        </div>

        <div class=" px-1 lg:my-6 my-8 flex flex-col mx-auto font-bold text-lg justify-center text-center" :class="{'my-2': role == 'Funcionario'}">
            <h3>{{ role }}</h3>
            <h3>{{ identification }}</h3>
            <h3 v-html="primaryInfo"/>
            <h3>{{ secondaryInfo }}</h3>
        </div>

        <div class="bottom-0 absolute pb-4 w-full flex flex-col items-center">
            <div class="flex mb-5  mx-auto">
                <qrcode-vue :value="qrCode" :size="size" level="H"/>
            </div>
            <img :src="logo" alt="" class="w-3/6 xl:w-2/6">
        </div>
    </div>
</template>

<style>
.custom-shape-divider-top-1695396893 {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.custom-shape-divider-top-1695396892 svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 120px;
    margin-top: -3px;
}

</style>
