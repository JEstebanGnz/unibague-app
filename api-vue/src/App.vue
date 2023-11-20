<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Nav from './components/Nav.vue'
</script>

<template>
  <Nav></Nav>
  <div class="container-fluid mt-3"></div>

  <RouterView />
</template>

<style scoped>

</style>
