<script setup>
import { defineProps } from 'vue';

defineProps({ role: Object });

</script>
<template>
    <div>
        <table class="role-table">
            <thead>
            <tr>
                <th>Name</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ role.name }}</td>

            </tr>
            </tbody>
        </table>
    </div>


</template>



<style scoped>

.role-table {
    width: 100%;
    border-collapse: collapse;
}

.role-table th {
    background-color: #f2f2f2;
    padding: 12px;
    text-align: left;
    font-weight: bold;
}

.role-table td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

.role-table tbody tr:hover {
    background-color: #f9f9f9;
}
</style>
