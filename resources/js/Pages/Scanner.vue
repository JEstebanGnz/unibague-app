<script setup>
import {onMounted, ref} from 'vue';
import {QrcodeStream, QrcodeDropZone, QrcodeCapture} from 'vue-qrcode-reader'

const MyComponent = {
    components: {
        QrcodeStream,
        QrcodeDropZone,
        QrcodeCapture
    }
}

let scanedCode = [];
let userRoles = ref([]);
const onDetect = async (detectedCode) => {

    scanedCode = detectedCode[0].rawValue;

    const route = 'users/byToken?token=' + scanedCode
    const response = await axios.get(route)

    userRoles.value = response.data;
    console.log(userRoles.value)

}
</script>
<template>
    <div class="w-40">
        <qrcode-stream @detect="onDetect"></qrcode-stream>
        {{ userRoles }}

    </div>
</template>
