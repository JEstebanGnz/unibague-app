<script setup>
import {defineProps, onMounted, ref} from 'vue';

const props = defineProps({usersProp: Array});

const users = ref([])

onMounted(() => {
    users.value = props.usersProp
})

const deleteUser = async (userId) =>
{
    if (!confirm ('seguro desea borrar?')) {
        return
    }
    const url = `users/${userId}`;
    try {
        await axios.delete(url);
        refreshModules(userId)
    } catch (error) {
        alert('Hubo un problema al borrar el user seleccionado')
    }
}


const refreshUser = (userId) => {
    users.value = users.value.filter( (user) =>  { return (user.id !== userId) })
}

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
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.qrCode }}</td>
                <td>{{ user.role_id }}</td>
                <td>
                    <button @click="deleteUser(user.id)">Borrar Usuario</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <q-btn color="white" text-color="black" label="Standard" />


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
