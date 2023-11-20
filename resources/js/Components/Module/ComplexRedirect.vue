<script setup>
import Module from "../Module/Module.vue";

const props = defineProps({payload: String, moduleName: String, icon:String});
const payload = JSON.parse(props.payload);

const getMobileOperatingSystem = () => {

    let userAgent = navigator.userAgent || navigator.vendor || window.opera;

    // Windows Phone must come first because its UA also contains "Android"
    if (/windows phone/i.test(userAgent)) {
        return "Windows Phone";
    }

    if (/android/i.test(userAgent)) {
        return "Android";
    }

    // iOS detection from: http://stackoverflow.com/a/9039885/177710
    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        return "iOS";
    }

    return "unknown";
}

const handlerRedirection = () => {
    const OS = getMobileOperatingSystem();
        if (OS === "iOS")
        {
            window.open(payload.IOSLink, '_blank');
        }
        else if (OS === "Android")
        {
            window.open(payload.androidLink, '_blank');
        }
        else if (OS === "unknown" || OS === "Windows Phone")
        {
            window.open(payload.defaultLink, '_blank');
        }


}

</script>

<template>
    <div  >
        <Module :moduleName="moduleName" :icon="icon" @handle-click="handlerRedirection"></Module>
    </div>
</template>

<style scoped>

</style>
