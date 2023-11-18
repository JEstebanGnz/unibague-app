<script setup>
import Module from "@/Components/Module/Module.vue";

const props = defineProps({payload: String, moduleName: String, icon: String});
const payload = JSON.parse(props.payload)

const handlerRedirection = () => {

    window.open(payload.link, '_blank');
}
</script>

<template>
    <div @click="handlerRedirection">
        <Module :moduleName="moduleName" :icon="icon"></Module>
    </div>
</template>

<style scoped>

</style>
