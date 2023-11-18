<script setup>
import {router} from "@inertiajs/vue3";
import Module from "@/Components/Module/Module.vue";

const props = defineProps({payload: String, moduleName: String, icon: String});
const payload = JSON.parse(props.payload)

const handlerRedirection = () => {
    router.visit( `${payload.link}`, { method: 'get' })
}
</script>

<template>
    <div>
        <Module :moduleName="moduleName" :icon="icon" @handle-click="handlerRedirection"></Module>
    </div>
</template>

<style scoped>

</style>
