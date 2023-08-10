<script setup>
import {defineProps} from "vue";

const props = defineProps({name1: String, icon:String});
</script>

<template>
    <div class="w-3/5 md:w-7/12" >
        <div class="w-full aspect-square bg-unibague-blue bg-opacity-20 rounded-3xl shadow-xl backdrop-blur-sm p-6 md:p-10 justify-center flex align-center">
            <img class="object-contain " :src="icon"/>
        </div>
       <div class="text-black text-xl font-bold text-center truncate mt-2">{{ name1 }}</div>

    </div>
</template>
