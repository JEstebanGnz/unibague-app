<script setup lang="ts">
import { ref } from 'vue'

interface User {
    name: string
    email: string
    title: string
    title2: string
    status: string
    role: string
}

const testUser: User = {
    name: 'sara',
    email: 'sara@gmail.com',
    title: 'student',
    title2: 'Web dev',
    status: 'Activo',
    role: 'Admin',
}

const users = ref<User[]>([...Array(10).keys()].map(() => testUser))
</script>

<template>
    <div class=" flex flex-col-2 w-screen overflow-x-hidden">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

        <div class="min-h-screen flex flex-row bg-unibague-blue">
<!--            <div class="flex flex-col ">-->
<!--            </div>-->
            <div class="flex flex-col w-56 overflow-hidden">
                <div class="flex items-center justify-center h-20 ">
                    <img src="https://www.unibague.edu.co/images/2022/Unibague-4.0.png" alt="">
                </div>
                <div class="">
                <ul class="flex flex-col py-4 px-6 text-white text-xl">
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
                        <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-log-out"></i></span>
                            <span class="text-sm font-medium">Logout</span>
                        </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>


    <div class="flex-1">
        <div class="flex items-center justify-center h-20 bg-unibague-blue">
            <h3 class="text-3xl font-medium text-white">
                Dashboard
            </h3>
        </div>



        <slot></slot>
    </div>
    </div>

</template>
