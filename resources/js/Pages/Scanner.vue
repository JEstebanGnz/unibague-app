<script setup>
import {ref} from 'vue';
import {QrcodeStream, QrcodeDropZone, QrcodeCapture} from 'vue-qrcode-reader'
import MainLayout from "@/Layouts/MainLayout.vue";


const MyComponent = {
    components: {
        QrcodeStream,
        QrcodeDropZone,
        QrcodeCapture
    }
}

let dataCopied = ref(false);
let userRoles = ref([]);

const onDetect = async (detectedCode) => {

    let scanedCode = detectedCode[0].rawValue;
    const route = 'users/byToken?token=' + scanedCode
    const response = await axios.get(route)
    userRoles.value = response.data;
    console.log(scanedCode)
    clipBoard(userRoles.value[0].identification)

}

const clipBoard = async (identification) => {
    try {
        await navigator.clipboard.writeText(identification)
        dataCopied.value = true;
        console.error(dataCopied.value)
    } catch (err) {
        console.error('Error al copiar al portapapeles:', err)
        dataCopied.value = false;
    }
}

</script>
<template>
    <MainLayout >
    <div class="p-8 flex flex-wrap overflow-hidden justify-around" :class="{'items-center': userRoles.length === 0}">
        <div class="w-full md:w-5/12 rounded-2xl overflow-hidden shadow-xl mb-4">
            <qrcode-stream @detect="onDetect"></qrcode-stream>
        </div>
        <div class="w-full md:w-1/2">
            <div v-if="userRoles.length !== 0" class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full">
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
                            <td class="py-4 px-6">{{ user.department }}</td>
                        </template>
                    </tr>
                    <tr v-for="user in userRoles" v-show="user.role === 'employee'"
                        class="px-8 bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <template v-if="user.role === 'employee'">
                            <td class="py-4 px-6 font-bold">Cargo</td>
                            <td class="py-4 px-6">{{ user.position }}</td>
                        </template>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div v-else
                 class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center p-8 md:w-2/4 mx-auto w-full">
                <p class=" mb-4 text-center text-2xl text-gray-700 font-semibold">Escanea el código QR</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-24 h-24 text-blue-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z"/>
                </svg>
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
    </MainLayout>
</template>

