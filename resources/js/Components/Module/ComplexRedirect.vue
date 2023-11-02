<script setup>
import Module from "@/Components/Module/Module.vue";

const props = defineProps({payload: Object, moduleName: String, icon:String});
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
    if (payload.externalRedirectType === 'simple') {
        window.open(payload.link, '_blank');
    }
    else{
        if (getMobileOperatingSystem() === "iOS")
        {
            window.open(payload.IOSLink, '_blank');
        }
        else if (getMobileOperatingSystem() === "unknown")
        {
            window.open(payload.DefaultLink, '_blank');
        }
        else if (getMobileOperatingSystem() === "Android")
        {
            window.open(payload.AndroidLink, '_blank');
        }
    }
}





</script>

<template>
    <div @click="handlerRedirection">
        <Module :moduleName="moduleName" :icon="icon" ></Module>
    </div>
</template>

<style scoped>

</style>
