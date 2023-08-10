<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Module.vue';
import Module from "@/Components/Module.vue";

</script>
<template>

    <div class="w-full min-h-screen flex flex-col">
        <div class="w-full bg-amber-950 flex flex-col">
            <img class="w-full h-fit bg-black xl:max-h-32 flex-1 top-0 relative" src="../../../public/Images/wave.svg" alt="wave"/>
            <div class="left-10 md:left-14 top-8 absolute text-white text-4xl md:text-5xl xl:text-3xl font-bold">Unibague App</div>
            <div class="w-12 h-12 right-10 top-8 absolute ">
                <div
                    class="w-full h-full left-0 top-0 absolute bg-yellow-400 rounded-full flex justify-center items-center ">
                    <div class="absolute text-black text-2xl font-normal">S</div>
                </div>
            </div>
        </div>

        <div class="flex-1 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-0.1 gap-y-10 justify-items-center my-16 px-5 md:px-20 ">

            <Module name1="Carnet" icon="/Images/carnet.svg" :onClick="Welcome"></Module>
            <Module name1="SIGA" icon="/Images/SIGA.svg"></Module>
            <Module name1="Ajustes" icon="/Images/config.svg"></Module>
            <Module name1="Scaner" icon="/Images/qrcode.svg"></Module>

            <Module name1="Carnet" icon="/Images/carnet.svg"></Module>
            <Module name1="SIGA" icon="/Images/SIGA.svg"></Module>
            <Module name1="Ajustes" icon="/Images/config.svg"></Module>
            <Module name1="Scaner" icon="/Images/qrcode.svg"></Module>
<!--            <div class="left-[43.75vw] top-[28.2rem] absolute text-sky-900 text-[3.1rem] font-normal">SIGA</div>-->
        </div>
        <div class="w-full h-20 bg-unibague-blue"></div>

    </div>

</template>
<!--<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>-->
