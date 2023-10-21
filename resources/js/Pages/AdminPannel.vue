<script setup lang="ts">

import {ref} from 'vue'

let isOpen = ref(false)
let campo1: ''
let campo2: ''
let campo3: ''


const submitForm = () =>
{

    console.log('Campo 1:', campo1);
    console.log('Campo 2:', campo2);
    console.log('Campo 3:', campo3);

}

</script>

<template>
    <div class=" flex flex-col-2 w-screen h-screen overflow-x-hidden divide-x-8">
        <div class="min-h-screen flex flex-row bg-unibague-blue hidden sm:block flex-col w-1/6 overflow-hidden">
            <div class="flex items-center justify-center h-20 xxl:hidden text-3xl text-white font-bold">
                Unibague App
            </div>
            <ul class="flex flex-col py-4 px-6 gap-y-6 text-white text-xl sm:hideen ">
                <li>
                    <a href="users"
                       class="flex flex-row items-center h-16 transform hover:translate-x-2 transition-transform ease-in duration-200 hover:font-bold">
                        <span class="text-xl font-normal ">Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="roles"
                       class="flex flex-row items-center h-16 transform hover:translate-x-2 transition-transform ease-in duration-200 hover:font-bold">
                        <span class="text-xl font-normal">Roles</span>
                    </a>
                </li>
                <li>
                    <a href="permissions"
                       class="flex flex-row items-center h-16 transform hover:translate-x-2 transition-transform ease-in duration-200 hover:font-bold">
                        <span class="text-xl font-normal">Permisos</span>
                    </a>
                </li>
                <li>
                    <a href="modules"
                       class="flex flex-row items-center h-16 transform hover:translate-x-2 transition-transform ease-in duration-200 hover:font-bold">
                        <span class="text-xl font-normal">Módulos</span>
                    </a>
                </li>

                <li>
                    <a href="/dashboard"
                       class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 hover:font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                        </svg>

                        <span class="text-sm font-medium text-xl ml-2"> Ir al inicio</span>
                    </a>
                </li>
            </ul>
        </div>


        <div class="flex-1">
            <div class="flex flex-row justify-around items-center pt-2">
                <div class="h-20 left-48 flex items-center ">
                    <div class="text-4xl font-semibold text-unibague-blue">
                        Dashboard
                    </div>
                </div>

            </div>




            <slot></slot>
        </div>
    </div>

</template>
