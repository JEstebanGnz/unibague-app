<script setup>
const props = defineProps(
    {
        payload: {
            type: Object,

        }
    }
)
const emitPayload = (link) => {
    return {"link": link}
}

const formatValue = () => {

    console.log('props', props);
    return props.payload.link || ''
}
</script>

<template>
    <div class="mb-4">
        <label for="link" class="text-gray-700">Link del componente</label>
        <input type="text" name="link" id="link"
               :value="formatValue()"
               @input="$emit('updated', emitPayload($event.target.value))"
               required
               class="w-full mt-2 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
</template>

<style scoped>

</style>
