<script setup>
import Layout from '../Layout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({ roles: Array })

</script>

<template>
    <form method="POST" action="/roles">
        <input type="text" name="name" id="" placeholder="nombre">


        <button type="submit">Enviar</button>


    </form>
</template>
