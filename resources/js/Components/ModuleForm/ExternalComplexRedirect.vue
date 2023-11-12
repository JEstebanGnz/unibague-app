<script setup>
const props = defineProps(
    {
        payload: {
            type: Object
        },
    }
)

const IOSValue = () => {
    console.log(props.payload)
    return props.payload.IOSLink || ''
}
const AndroidValue = () => {
    console.log(props.payload.androidLink)
    return props.payload.androidLink || ''
}
const DefaultValue = () => {
    console.log(props.payload.defaultLink)
    return props.payload.defaultLink || ''
}

const formatValue = (property, value) =>{
    if(property === 'IOSLink'){
        return {
            IOSLink:value,
            androidLink: props.payload.androidLink || '',
            defaultLink: props.payload.defaultLink || '',
        }
    }
    if(property === 'androidLink'){
        return {
            IOSLink:props.payload.IOSLink || '',
            androidLink: value,
            defaultLink: props.payload.defaultLink || '',
        }
    }
    if(property === 'defaultLink'){
        return {
            IOSLink:props.payload.IOSLink || '',
            androidLink: props.payload.androidLink || '',
            defaultLink: value,
        }
    }
}
</script>

<template>
    <div class="mb-4">
        <label for="IOSlink" class="text-gray-700">Link del sitio para usuarios IOS</label>
        <input type="text" name="IOSlink" id="IOSlink"
               :value="IOSValue()"
               @input="$emit('updated', formatValue('IOSLink',$event.target.value))"
               required
               class="w-full mt-2 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
    <div class="mb-4">
        <label for="AndroidLink" class="text-gray-700">Link del sitio para usuarios Android</label>
        <input type="text" name="AndroidLink" id="AndroidLink"
               :value="AndroidValue()"
               @input="$emit('updated', formatValue('androidLink',$event.target.value))"
               required
               class="w-full mt-2 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
    <div class="mb-4">
        <label for="DefaultLink" class="text-gray-700">Link por defecto del sitio </label>
        <input type="text" name="DefaultLink" id="DefaultLink"
               :value="DefaultValue()"
               @input="$emit('updated', formatValue('defaultLink',$event.target.value))"
               required
               class="w-full mt-2 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
</template>

<style scoped>

</style>
