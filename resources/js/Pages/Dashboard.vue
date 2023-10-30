<script setup>

import Module from "@/Components/Module.vue";
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({initial: String, name: String});

</script>

<template>
<div>

        <MainLayout :initial = props.initial ></MainLayout>
        <div
            class="flex-1 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-0.1 gap-y-10 justify-items-center my-6 px-5 md:px-16 ">

            <Module moduleName="Carnet" icon="/Images/carnet.svg" redirectType="internal"
                    redirectView="carnet"></Module>
            <Module moduleName="SIGA" icon="/Images/SIGA.svg" redirectType="external"></Module>
            <Module moduleName="Ajustes" icon="/Images/config.svg" redirectType="internal"
                    redirectView="users"></Module>
            <Module moduleName="Scaner" icon="/Images/qrcode.svg" redirectType="internal"
                    redirectView="scanner"></Module>
            <Module moduleName="Carnet" icon="/Images/carnet.svg" redirectType="internal"
                    redirectView="carnet"></Module>
            <Module moduleName="SIGA" icon="/Images/SIGA.svg" redirectType="external"></Module>
            <Module moduleName="Ajustes" icon="/Images/config.svg" redirectType="internal"
                    redirectView="users"></Module>
            <Module moduleName="Scaner" icon="/Images/qrcode.svg" redirectType="internal"
                    redirectView="scanner"></Module>
        </div>
        <div class="w-full h-20 bg-unibague-blue overflow-hidden flex items-center justify-between px-8">
            <div class="relative text-gray-300 text-md font-normal  capitalize">{{ props.name.toLowerCase()}} </div>
            <div class="relative text-gray-300 text-md font-normal italic"> Version 1.0 </div>
        </div>


    </div>


</template>

