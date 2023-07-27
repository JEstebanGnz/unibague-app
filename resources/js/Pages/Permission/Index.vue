<script setup>
import {defineProps} from 'vue';
import { ref, onMounted } from 'vue'

const props = defineProps({permissionsProp: Array});

const permissions = ref([])

onMounted(() => {
    permissions.value = props.permissionsProp
})

const deletePermission = async (permissionId) =>
{
    if (!confirm ('seguro desea borrar?')) {
        return
    }
    const url = `permissions/${permissionId}`;
    try {
        await axios.delete(url);
        refreshPermissions(permissionId)
    } catch (error) {
        alert('Hubo un problema al borrar el permiso seleccionado')
    }
}


const refreshPermissions = (permissionId) => {
    permissions.value = permissions.value.filter( (permission) =>  { return (permission.id !== permissionId) })
}
</script>
<template>
    <div>
        <table class="permissions-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="permission in permissions" :key="permission.id">
                <td>{{ permission.name }}</td>
                <td>{{ permission.description }}</td>
                <td>
                    <button @click="deletePermission(permission.id)">Borrar permiso</button>
                </td>

            </tr>
            </tbody>
        </table>


    </div>


</template>


<style scoped>

.permissions-table {
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
