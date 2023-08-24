<script setup>
import QrcodeVue from 'qrcode.vue';
const value = 'https://example.com';

const size = 100;
</script>

<template>
    <qrcode-vue :value="value" :size="size" level="H" />
</template>
