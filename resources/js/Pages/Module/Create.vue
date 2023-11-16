<script setup>

defineProps({ module: Object })

</script>

<template>
    <form method="POST" action="/modules">
        <input type="text" name="name" id="" placeholder="Nombre">
        <input type="text" name="permission_id" id="" placeholder="Id del permiso">
        <input type="text" name="icon" id="" placeholder="Icono">
        <input type="text" name="visible" id="" placeholder="Visibilidad">


        <button type="submit">Enviar</button>


    </form>
</template>
