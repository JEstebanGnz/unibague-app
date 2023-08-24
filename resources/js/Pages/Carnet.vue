<script setup>
import QrCode from "@/Components/QrCode.vue";

const props = defineProps({qrCodee: String});
</script>
<template>
    <div class="w-3">
        probando

        <QrCode :code="qrCodee"/>





    </div>
</template>
