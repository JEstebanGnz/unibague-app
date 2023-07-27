<script setup>
import Layout from '../Layout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({ permission: Object })

</script>

<template>
    <form method="POST" action="/permissions">
        <input type="text" name="name" id="" placeholder="Nombre">
        <input type="text" name="description" id="" placeholder="Descripción">


        <button type="submit">Enviar</button>


    </form>
</template>
