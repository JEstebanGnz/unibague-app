<script setup>
import { ref, onBeforeMount } from 'vue'
import CarnetsFactory from "../CarnetsFactory.js";
import Carnet from '../Pages/Carnet.vue';

const props = defineProps({data: Array, qrCode:String})

const carnets = ref([])
let index = ref(0);
    onBeforeMount( () => {
        carnets.value = CarnetsFactory.createCarnet(props.data);
        console.log(carnets.value)

})

const mostrarSiguienteCarnet = () => {
    console.log("entro");

    if (index.value < carnets.value.length ) {
        index.value++;
        console.log(index);
    }
    if(index.value === 3){
        index.value = 0;
    }

}
</script>

<template>
    <Carnet :image="carnets[index].image" :name="carnets[index].name" :user="carnets[index].user" :role="carnets[index].role" :identification="carnets[index].identification" :primaryInfo="carnets[index].primaryInfo" :secondaryInfo="carnets[index].secondaryInfo" :qrCode="qrCode" :color="carnets[index].color" @cambiar-carnet="mostrarSiguienteCarnet">
<!--        <Carnet :image="carnets[index].image" :name="carnets[index].name" :user="carnets[index].user" :role="carnets[index].role" :identification="carnets[index].identification" :primaryInfo="carnets[index].primaryInfo.join('<br>')" :secondaryInfo="carnets[index].secondaryInfo" :qrCode="qrCode" :color="carnets[index].color" @cambiar-carnet="mostrarSiguienteCarnet">-->


    </Carnet>
</template>

<style scoped>

</style>
