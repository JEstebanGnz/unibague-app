<script setup>
import {defineProps} from 'vue';
import { ref, onMounted } from 'vue'

const props = defineProps({modulesProp: Array});

const modules = ref([])

onMounted(() => {
    modules.value = props.modulesProp
})

const deleteModule = async (moduleId) =>
{
    if (!confirm ('seguro desea borrar?')) {
        return
    }
    const url = `modules/${moduleId}`;
    try {
        await axios.delete(url);
        refreshModules(moduleId)
    } catch (error) {
        alert('Hubo un problema al borrar el modulo seleccionado')
    }
}


const refreshModules = (moduleId) => {
    modules.value = modules.value.filter( (module) =>  { return (module.id !== moduleId) })
}
</script>
<template>
    <div>
        <table class="modules-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Permission Id</th>
                <th>Icon</th>
                <th>Visible</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="module in modules" :key="module.id">
                <td>{{ module.name }}</td>
                <td>{{ module.permission_id }}</td>
                <td>{{ module.icon }}</td>
                <td>{{ module.visible }}</td>
                <td>
                    <button @click="deleteModule(module.id)">Borrar Modulo</button>
                </td>

            </tr>
            </tbody>
        </table>

    </div>


</template>


<style scoped>

.modules-table {
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
