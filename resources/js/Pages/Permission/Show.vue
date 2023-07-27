<script setup>
import { defineProps } from 'vue';

defineProps({ permission: Object });

</script>
<template>
    <div>
        <table class="permissions-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ permission.name }}</td>
                <td>{{ permission.description }}</td>

            </tr>
            </tbody>
        </table>
    </div>


</template>



<style scoped>

.user-table {
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
