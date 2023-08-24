<script setup>

import Module from "@/Components/Module.vue";


</script>

<template>

    <div class="w-full min-h-screen flex flex-col bg-unibague-blue bg-opacity-2">
        <div class="w-full h-32 ">
            <div class="h-full">
                <img class="w-fit h-full relative" src="../../../public/Images/wave.svg"
                     alt="wave"/> </div>
            <div class="left-10 md:left-14 top-8 absolute text-white text-2xl sm:text-3xl md:text-4xl xl:text-4xl 2xl:text-5xl font-bold">
                Unibague App
            </div>
            <div class="w-12 h-12 right-24 top-8 absolute ">
                <div
                    class="w-full h-full left-0 top-0 absolute bg-yellow-400 rounded-full flex justify-center items-center ">
                    <div class="absolute text-black text-2xl font-normal">S</div>
                </div>
            </div>
        </div>
        <div
            class="flex-1 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-0.1 gap-y-10 justify-items-center my-16 px-5 md:px-16 ">

            <Module moduleName="Carnet" icon="/Images/carnet.svg" redirectType="internal" redirectView="carnet"></Module>
            <Module moduleName="SIGA" icon="/Images/SIGA.svg" redirectType="external" ></Module>
            <Module moduleName="Ajustes" icon="/Images/config.svg" redirectType="internal" redirectView="ajustes"></Module>
            <Module moduleName="Scaner" icon="/Images/qrcode.svg" redirectType="internal" redirectView="scanner"></Module>
            <Module moduleName="Carnet" icon="/Images/carnet.svg" redirectType="internal" redirectView="carnet"></Module>

            <Module moduleName="SIGA" icon="/Images/SIGA.svg" redirectType="external" ></Module>
            <Module moduleName="Ajustes" icon="/Images/config.svg" redirectType="internal" redirectView="ajustes"></Module>
            <Module moduleName="Scaner" icon="/Images/qrcode.svg" redirectType="internal" redirectView="scanner"></Module>
            <!--            <div class="left-[43.75vw] top-[28.2rem] absolute text-sky-900 text-[3.1rem] font-normal">SIGA</div>-->
        </div>
        <div class="w-full h-20 bg-unibague-blue">
            <div class="absolute text-gray-300 text-md font-normal left-5 italic">Nombre de la persona y version </div>
        </div>


    </div>


</template>

