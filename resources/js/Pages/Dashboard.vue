<script setup>

import Module from "@/Components/Module.vue";
import MainLayout from "@/Layouts/MainLayout.vue";


</script>

<template>
<div>

        <MainLayout></MainLayout>
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
        <div class="w-full h-20 bg-unibague-blue">
            <div class="absolute text-gray-300 text-md font-normal left-5 italic">Nombre de la persona y version</div>
        </div>


    </div>


</template>

