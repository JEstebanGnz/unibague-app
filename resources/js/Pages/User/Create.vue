<script setup>
import Layout from '../Layout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({ users: Array })

</script>

<template>
    <form method="POST" action="/users">
        <input type="text" name="name" id="" placeholder="nombre">
        <input type="text" name="email" id="" placeholder="correo">
        <input type="text" name="qrCode" id="" placeholder="Codigo qr">
        <input type="text" name="role_id" id="" placeholder="Rol" value="1">

        <button type="submit">Enviar</button>


    </form>
</template>
