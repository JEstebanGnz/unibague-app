<script setup>
const props = defineProps({
    payload:{
        type: Object,
    }
})
const formatValue = () => {
    return props.payload.link || ''
}
const emitPayload = (link) => {
    return {"link": link}
}
</script>


<template>
    <div class="mb-4">
        <label for="SimpleLink" class="text-gray-700">Link del sitio web</label>
        <input type="text" name="SimpleLink" id="SimpleLink"
               :value="formatValue()"
               @input="$emit('updated', emitPayload($event.target.value))"
               required
               class="w-full mt-2 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>

</template>

<style scoped>

</style>
