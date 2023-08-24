<script setup>
import QrcodeVue from 'qrcode.vue';

const props = defineProps({code: String});

const size = 500;
</script>

<template>
    <qrcode-vue :value="code" :size="size" level="H" />
</template>
