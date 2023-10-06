<script setup>
import {onMounted, ref} from 'vue';
import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from 'vue-qrcode-reader'

const MyComponent = {
    components: {
        QrcodeStream,
        QrcodeDropZone,
        QrcodeCapture
    }
}

let scan = ref(false);
let module = ref(false);
let codes = ref([]);
let values = ref();

const onDetect = async (detectedCodes)  =>  {

    codes.value = codes.value.concat(detectedCodes);

     values.value = codes._rawValue[0].rawValue;
     console.log("valores de verdad", values.value);
     const route = 'users/byToken?token=' + values.value
     const response = await axios.get(route)
    console.log(response.data)
}

const scanear = () => {
    scan.value = true;
    console.log("scan es true")
}

const closeModal = () => {
    scan.value = false;
}


</script>

<template>
    <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" @click="scanear">Scanear</button>
    <div>
        <!-- Mostrar los valores de detectedCodes en la vista -->
<!--        <div v-for="(value, index) in values" :key="index">{{ value }}</div>-->
        <div >{{ values }}</div>

    </div>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 p-28" v-if="scan">

        <div class="bg-white p-4 rounded-md w-fit h-fit" > <!-- desde movil 470 se ve feo-->
            <div >
                <qrcode-stream  @detect="onDetect"></qrcode-stream>
            </div>
            <!-- Close button -->
            <button @click="closeModal" class="text-gray-500 hover:text-gray-700 absolute top-4 right-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

    </div>


</template>
