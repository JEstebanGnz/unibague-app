<script setup>
import {ref, onBeforeMount} from 'vue'
import CarnetsFactory from "../CarnetsFactory.js";
import Carnet from '../Pages/Carnet.vue';
import CarnetSkeleton from "@/Pages/CarnetSkeleton.vue";

const props = defineProps({ qrCode: String})
const loading = ref(true)

const getUserInfo = async () =>{
    const url = route('personalInfo')
    console.log(url)
    try {
        const response = await axios.get(url)
        console.log(response.data)
        loading.value = false
        return response.data
    }
    catch (e){
        console.log("No se obtuvo informacion",e)
        return alert("El usuario no posee ningún carné activo o asociado, por favor comuníquese con g3@unibague.edu.co en dado caso de tener dudas")
    }
}

const carnets = ref([])

let index = ref(0);
onBeforeMount( async () => {
    carnets.value =   CarnetsFactory.createCarnet(await getUserInfo());
})

const showNextCard = () => {

    if (index.value < carnets.value.length) {
        index.value++;
        console.log(index);
    }
    if (index.value === carnets.value.length) {
        index.value = 0;
    }
}
</script>

<template>
    <CarnetSkeleton v-if="loading"/>
    <Carnet v-else :image="carnets[index].image" :name="carnets[index].name" :user="carnets[index].user"
            :role="carnets[index].role" :identification="carnets[index].identification"
            :primaryInfo="carnets[index].primaryInfo" :secondaryInfo="carnets[index].secondaryInfo" :qrCode="qrCode"
            :color="carnets[index].color" @cambiar-carnet="showNextCard" :showChangeButton="carnets.length > 1">
    </Carnet>
</template>

<style scoped>

</style>
