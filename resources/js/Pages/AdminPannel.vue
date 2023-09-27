<script setup lang="ts">
import { ref } from 'vue'

let isOpen = false

const toggleMenu = () => {
    isOpen = !isOpen;
}
</script>

<template>
    <div class=" flex flex-col-2 w-screen overflow-x-hidden">
        <div class="min-h-screen flex flex-row bg-unibague-blue hidden sm:block flex-col w-1/6 overflow-hidden">
            <div class="flex items-center justify-center h-20 xxl:hidden">
                <img src="https://www.unibague.edu.co/images/2022/Unibague-4.0.png" alt="">
            </div>
            <ul class="flex flex-col py-4 px-6 text-white text-xl sm:hideen">
                <li>
                    <a href="users" class="flex flex-row items-center h-16 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                        <!--                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg "><i class="bx bx-home"></i></span>-->
                        <span class="text-xl font-medium text-white">Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="roles" class="flex flex-row items-center h-16 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                        <span class="text-xl text-white">Roles</span>
                    </a>
                </li>
                <li>
                    <a href="permissions" class="flex flex-row items-center h-16 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                        <span class="text-xl font-medium text-white">Permisos</span>
                    </a>
                </li>
                <li>
                    <a href="modules" class="flex flex-row items-center h-16 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                        <span class="text-xl font-medium text-white">Módulos</span>
                    </a>
                </li>

                <li>
                    <a href="/dashboard" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>

                        <span class="text-sm font-medium text-white text-xl"> Ir al inicio</span>
                    </a>
                </li>
            </ul>
              </div>


    <div class="flex-1">
        <div class="bg-unibague-blue">
            <div class="flex items-center justify-between h-20 px-4 sm:px-6">

                <h3 class="text-3xl font-medium text-white">
                    Dashboard
                </h3>
            </div>

        </div>

        <slot></slot>
    </div>
    </div>

</template>
