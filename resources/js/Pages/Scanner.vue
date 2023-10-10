<script setup>
import {onMounted, ref} from 'vue';
import {QrcodeStream, QrcodeDropZone, QrcodeCapture} from 'vue-qrcode-reader'
import MainLayout from "@/Layouts/MainLayout.vue";

const MyComponent = {
    components: {
        QrcodeStream,
        QrcodeDropZone,
        QrcodeCapture
    }
}

let scanedCode = [];
let dataCopied = ref(false);
let userRoles = ref([]);


const onDetect = async (detectedCode) => {

    scanedCode = detectedCode[0].rawValue;

    const route = 'users/byToken?token=' + scanedCode
    const response = await axios.get(route)
    userRoles.value = response.data;

}

const clipBoard = async (identification) => {
    try {
        await navigator.clipboard.writeText(identification)
        dataCopied.value = true;
    } catch (err) {
        console.error('Error al copiar al portapapeles:', err)
    }
}

</script>
<template>
    <MainLayout></MainLayout>
    <div class="p-4 flex flex-wrap">
        <div class="w-full md:w-1/2  sm:2/3 mb-4 md:mb-0 md:p-4">
            <qrcode-stream @detect="onDetect"></qrcode-stream>
        </div>
        <div class="w-full md:w-1/2 md:p-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table v-if="userRoles.length != 0" class="w-full">
                    <thead
                        class="uppercase bg-unibague-blue bg-opacity-5 dark:bg-gray-700 dark:text-gray-400 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3" colspan="2">Información del usuario</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr class="px-8 bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6 font-bold">Nombre:</td>
                        <td class="py-4 px-6">{{ userRoles[0].name }}</td>
                    </tr>

                    <tr class="px-8 bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6 font-bold">Identificación:</td>
                        <td class="py-4 px-6">{{ userRoles[0].identification }}</td>
                    </tr>

                    <tr v-for="user in userRoles"
                        class="px-8 bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <template v-if="user.role === 'graduated'">
                            <td class="py-4 px-6 font-bold">Programa finalizado:</td>
                            <td class="py-4 px-6">{{ user.finishedProgram.join(', ') }}</td>
                        </template>
                        <template v-if="user.role === 'student'">
                            <td class="py-4 px-6 font-bold">Programa actual</td>
                            <td class="py-4 px-6">{{ user.currentProgram.join(', ') }}</td>
                        </template>
                    </tr>

                    <tr v-for="user in userRoles" v-show="user.role === 'employee'"
                        class="px-8 bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <template v-if="user.role === 'employee'">
                            <td class="py-4 px-6 font-bold">Departamento</td>
                            <td class="py-4 px-6">{{ user.department.join() }}</td>
                        </template>
                    </tr>
                    <tr v-for="user in userRoles" v-show="user.role === 'employee'"
                        class="px-8 bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <template v-if="user.role === 'employee'">
                            <td class="py-4 px-6 font-bold">Cargo</td>
                            <td class="py-4 px-6">{{ user.position.join() }}</td>
                        </template>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div v-if="dataCopied" class="p-8 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-14 h-14 sm:w-10 sm:h-10 text-green-600 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>

                El número de identificación ha sido copiado en el portapapeles
            </div>
        </div>
    </div>

</template>

