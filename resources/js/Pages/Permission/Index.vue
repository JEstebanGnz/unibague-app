<script setup>
import {defineProps} from 'vue';
import {ref, onMounted} from 'vue'
import AdminPannel from "@/Pages/AdminPannel.vue";
import AddButton from "@/Components/AddButton.vue";

const props = defineProps({permissionsProp: Array});
const isOpen = ref(false);
const permissions = ref([])

const addNew = () => {
    isOpen.value = true;
    return isOpen.value
}
const closeModal = () => {
    isOpen.value = false;
}

onMounted(() => {
    permissions.value = props.permissionsProp
})

const deletePermission = async (permissionId) => {
    if (!confirm('seguro desea borrar?')) {
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
    permissions.value = permissions.value.filter((permission) => {
        return (permission.id !== permissionId)
    })
}
</script>


<template>
    <AdminPannel class="bg-unibague-blue bg-opacity-5">
        <div>
            <div class="flex flex-col mt-6 mx-6 max-w-fit">
                <div class="py-2 -my-2 ">
                    <div class="inline-block w-full align-middle border-b border-gray-200 shadow sm:rounded-lg overflow-hidden">
                        <table class="max-w-fit">
                            <thead>
                            <tr >
                                <th
                                    class=" px-6 py-3 text-xs font-medium leading-4 text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                >
                                    Name
                                </th>
                                <th
                                    class="  px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                >
                                    Description
                                </th>
                                <th class=" w-4 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Delete
                                </th>
                                <th class=" w-4 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Edit
                                </th>

                            </tr>
                            </thead>

                            <tbody class="bg-white">
                            <tr v-for="permission in permissions" :key="permission.id">
                                <td class="px-6 py-4 border-b border-gray-200 ">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium  text-gray-900">
                                                {{ permission.name }}
                                            </div>
                                        </div>

                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 ">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 text-gray-500">
                                                {{ permission.description }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 text-gray-500">
                                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" @click="deletePermission(permission.id)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </td>


                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <AddButton @click="addNew" class=" ml-6 mt-8 "/>
        <template v-if="isOpen">
            <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <form method="POST" action="/permissions">
                        <div class="mb-4">
                            <label for="name" class="text-gray-700">Nombre</label>
                            <input type="text" name="name" id="name"
                                   class="w-full mt-2 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="text-gray-700">Descripcion</label>
                            <input type="text" name="description" id="description"
                                   class="w-full mt-2 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="text-center">
                            <button type="button" @click="closeModal"
                                    class="px-4 py-2 mr-2 bg-gray-300 text-gray-700 rounded-full hover:bg-gray-400 transition duration-200">
                                Cerrar
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition duration-200">
                                Aceptar
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </template>
    </AdminPannel>


</template>


<style scoped>

</style>
