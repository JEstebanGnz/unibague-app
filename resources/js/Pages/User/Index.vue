<script setup>
import Layout from '../Layout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({ users: Object })
</script>

<template>
    <Layout>
        <Head title="Welcome" />
        <h1>Welcome</h1>
        <p>Hello welcome {{ users }} to your first Inertia apdtduhnvfidgubhp!</p>
    </Layout>
</template>
