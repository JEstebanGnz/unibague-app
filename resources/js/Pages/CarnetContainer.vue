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
    if(index.value == 3){
        index.value = 0;
    }

}
</script>

<template>
    <Carnet :image="carnets[index].image" :name="carnets[index].name" :user="carnets[index].user" :role="carnets[index].role" :identification="carnets[index].identification" :primaryInfo="carnets[index].primaryInfo.join(', ')" :secondaryInfo="carnets[index].secondaryInfo" :qrCode="qrCode" :color="carnets[index].color" @cambiar-carnet="mostrarSiguienteCarnet">
<!--   <Carnet v-for="carnet in carnets" :image="carnets[1].image" :name="carnets[1].name" :user="carnets[1].user" :role="carnets[1].role" :identification="carnets[1].identification" :primaryInfo="carnets[1].primaryInfo" :secondaryInfo="carnets[1].secondaryInfo" :qrCode="qrCode" :color="carnets[1].color" @cambiar-carnet="mostrarSiguienteCarnet">-->
<!--    <Carnet v-for="carnet in carnets" :image="carnet.image" :name="carnet.name" :user="carnet.user" :role="carnet.role" :identification="carnet.identification" :primaryInfo="carnet.primaryInfo.join(',')" :secondaryInfo="carnet.secondaryInfo" :qrCode="qrCode" :color="carnet.color" @cambiar-carnet="mostrarSiguienteCarnet">-->

    </Carnet>
</template>

<style scoped>

</style>
