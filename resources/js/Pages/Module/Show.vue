<script setup>
import { defineProps } from 'vue';

defineProps({ module: Object });

</script>
<template>
    <div>
        <table class="module-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Permission Id</th>
                <th>Icon</th>
                <th>Visible</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ module.name }}</td>
                <td>{{ module.permission_id }}</td>
                <td>{{ module.icon }}</td>
                <td>{{ module.visible }}</td>

            </tr>
            </tbody>
        </table>
    </div>


</template>



<style scoped>

.module-table {
    width: 100%;
    border-collapse: collapse;
}

.user-table th {
    background-color: #f2f2f2;
    padding: 12px;
    text-align: left;
    font-weight: bold;
}

.user-table td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

.user-table tbody tr:hover {
    background-color: #f9f9f9;
}
</style>
