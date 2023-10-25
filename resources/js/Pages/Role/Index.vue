<script setup>
import {defineProps, onMounted, ref} from 'vue';
import AdminPannel from "@/Pages/AdminPannel.vue";
import AddButton from "@/Components/AddButton.vue";

const props = defineProps({rolesProp: Array});
const isOpen = ref(false);
const roles = ref([]);

onMounted(() => {
    roles.value = props.rolesProp
})
const addNew = () => {
    isOpen.value = true;
    return isOpen.value
}
const closeModal = () => {
    isOpen.value = false;
}
const deleteRoles = async (roleId) => {
    if (!confirm('seguro desea borrar?')) {
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
    roles.value = roles.value.filter((role) => {
        return (role.id !== roleId)
    })
}
</script>
<template>
    <AdminPannel class="bg-unibague-blue bg-opacity-5">
        <div>
            <div class="flex flex-col mt-8 mx-6">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div
                        class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Name
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Id
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Eliminar
                                </th>

                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            <tr v-for="role in roles" :key="role.id">
                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ role.name }}
                                            </div>
                                        </div>

                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ role.id }}
                                            </div>
                                        </div>

                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 text-gray-500">
                                                <button @click="deleteRoles(role.id)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
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
                    <form method="POST" action="/roles">
                        <div class="mb-4">
                            <label for="name" class="text-gray-700">Nombre</label>
                            <input type="text" name="name" id="name"
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

