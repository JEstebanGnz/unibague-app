<script setup>
import { router } from '@inertiajs/vue3'

const props = defineProps({moduleName: String, icon:String, redirectType: String, redirectView: String, redirectLink:String});

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
    if (props.redirectType === "internal"){
        router.visit( `/${props.redirectView}`, { method: 'get' })
    }
    else {
        if (getMobileOperatingSystem() === "iOS")
        {
            window.location.href = "https://apps.apple.com/co/app/unibague/id1560226102";
        }
        else if (getMobileOperatingSystem() === "unknown")
        {
            window.location.href = "https://siga.unibague.edu.co/sgacampus/";
        }
        else if (getMobileOperatingSystem() === "Android")
        {
            window.location.href = "https://play.google.com/store/apps/details?id=com.acies.sinu.unibague&hl=es_CO&gl=US";
        }


    }

}
</script>

<template>


    <div class="w-4/6 md:w-7/12 cursor-pointer" @click="handlerRedirection">

        <div class="w-full aspect-square bg-white rounded-2xl shadow-xl backdrop-blur-sm p-3 sm:p-8 md:p-6 justify-center flex align-center">
            <img class="object-contain " :src="icon"/>
        </div>
       <div class="text-black text-xl xl:text-2xl font-bold text-center truncate mt-2">{{ moduleName }}</div>

    </div>


</template>
