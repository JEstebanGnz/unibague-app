<script setup>
import {defineProps, onMounted, ref} from 'vue';

const props = defineProps({rolesProp: Array});

const roles = ref([])

onMounted(() => {
    roles.value = props.rolesProp
})

const deleteRoles = async (roleId) =>
{
    if (!confirm ('seguro desea borrar?')) {
        return
    }
    const url = `roles/${roleId}`;
    try {
        await axios.delete(url);
        refreshRoles(roleId)
    } catch (error) {
        alert('Hubo un problema al borrar el rol seleccionado')
    }
}


const refreshRoles = (roleId) => {
    roles.value = roles.value.filter( (role) =>  { return (role.id !== roleId) })
}
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
            <tr v-for="role in roles" :key="role.id">
                <td>{{ role.name }}</td>
                <td>
                    <button @click="deleteRoles(role.id)">Borrar Rol</button>
                </td>

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
