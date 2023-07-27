<script setup>
import { defineProps } from 'vue';

defineProps({ user: Object });

</script>
<template>
    <div>
        <table class="user-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>QR Code</th>
                <th>Role ID</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.qrCode }}</td>
                <td>{{ user.role_id }}</td>
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
