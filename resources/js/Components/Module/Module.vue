<script setup>
const props = defineProps({moduleName: String, icon:String});
</script>

<template>


        <div class="w-2/3 mx-auto cursor-pointer aspect-square bg-white rounded-2xl shadow-xl backdrop-blur-sm p-3 sm:p-8 md:p-6 justify-center flex align-center">
            <img class="object-contain" :src="icon" width="200" alt=""/>
        </div>
       <div class="text-black text-xl xl:text-2xl font-bold text-center truncate mt-2">{{ moduleName }}</div>



</template>
