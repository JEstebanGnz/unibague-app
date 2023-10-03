<script setup>
import { ref, onBeforeMount } from 'vue'
import CarnetsFactory from "../CarnetsFactory.js";
import Carnet from '../Pages/Carnet.vue';

const props = defineProps({data: Array, qrCode:String})

const carnets = ref([])

    onBeforeMount( () => {
        carnets.value = CarnetsFactory.createCarnet(props.data);
        console.log(carnets.value)

})
</script>

<template>

    <Carnet :image="carnets[1].image" :name="carnets[1].name" :user="carnets[1].user" :role="carnets[1].role" :identification="carnets[1].identification" :primaryInfo="carnets[1].primaryInfo" :secondaryInfo="carnets[1].secondaryInfo" :qrCode="qrCode" :color="carnets[1].color">

    </Carnet>
</template>

<style scoped>

</style>
