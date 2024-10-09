<script setup>
import { ref, computed, onMounted } from 'vue';
import AdminPannel from '../AdminPannel.vue';

const props = defineProps({ usersProp: Array, avaliableRoles: Array });
const isOpenEditor = ref(false);
const roleId = ref('');
const editedUserId = ref(null);

// Pagination setup
const users = ref([]);
const currentPage = ref(1);
const usersPerPage = ref(10); // Adjust the number of users per page here
const searchQuery = ref('');

// Methods
const editUser = (userId) => {
    isOpenEditor.value = true;
    editedUserId.value = userId;
};

const sendEditedUser = async () => {
    const url = route('users.update', { user: editedUserId.value });
    try {
        await axios.patch(url, { role_id: roleId.value });
        location.reload();
    } catch (e) {
        return 'No se pudo actualizar el usuario', e;
    }
};

onMounted(() => {
    users.value = [...props.usersProp]; // Initialize users
});

const deleteUser = async (userId) => {
    if (!confirm('seguro desea borrar?')) {
        return;
    }
    const url = `users/${userId}`;
    try {
        await axios.delete(url);
        refreshUser(userId);
    } catch (error) {
        alert('Hubo un problema al borrar el user seleccionado');
    }
};

const refreshUser = (userId) => {
    users.value = users.value.filter((user) => {
        return user.id !== userId;
    });
};

// Computed Properties
const filteredUsers = computed(() => {
    if (searchQuery.value) {
        return users.value.filter((user) =>
            user.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            user.email.toLowerCase().includes(searchQuery.value.toLowerCase())
        );
    }
    return users.value;
});

const paginatedUsers = computed(() => {
    const start = (currentPage.value - 1) * usersPerPage.value;
    const end = start + usersPerPage.value;
    return filteredUsers.value.slice(start, end);
});

const totalPages = computed(() => Math.ceil(filteredUsers.value.length / usersPerPage.value));

// Pagination Controls
const goToPage = (page) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
};

</script>

<template>
    <AdminPannel class="bg-unibague-blue bg-opacity-5">
        <div>
            <div class="text-4xl font-semibold text-unibague-blue" style="text-align:center">
                Gestionar Usuarios
            </div>

            <div class="flex flex-col mt-8 mx-6">
                <!-- Search Bar -->
                <div class="mb-4">
                    <input
                        v-model="searchQuery"
                        type="text"
                        placeholder="Buscar por nombre o correo"
                        class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    />
                </div>

                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="">
                        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-unibague-blue text-white">
                            <tr>
                                <th class="text-left py-4 px-6">Nombre</th>
                                <th class="text-left py-4 px-6">Correo</th>
                                <th class="text-left py-4 px-6">Rol</th>
                                <th class="text-left py-4 px-6">Editar Rol</th>
                                <th class="text-left py-4 px-6">Eliminar</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            <tr v-for="user in paginatedUsers" :key="user.id">
                                <td class="px-6 py-4 border-b border-gray-200">{{ user.name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ user.email }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ user.role.name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <button @click="editUser(user.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <button @click="deleteUser(user.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!-- Pagination Controls -->
                        <div class="flex justify-between mt-4">
                            <button @click="goToPage(currentPage - 1)" :disabled="currentPage === 1" class="bg-unibague-blue text-white font-semibold rounded hover:bg-blue-600 py-2 px-4">
                                Anterior
                            </button>
                            <span class="px-4 py-2">Página {{ currentPage }} de {{ totalPages }}</span>
                            <button @click="goToPage(currentPage + 1)" :disabled="currentPage === totalPages" class="bg-unibague-blue text-white font-semibold rounded hover:bg-blue-600 py-2 px-4">
                                Siguiente
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for editing user roles -->
            <template v-if="isOpenEditor">
                <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                        <h2 class="text-2xl mb-4">Editar Rol de Usuario</h2>
                        <div>
                            <label for="role" class="block text-gray-700">Nuevo Rol</label>
                            <select v-model="roleId" id="role" class="w-full mt-2 p-2 border rounded-lg">
                                <option :value="role.id" v-for="role in props.avaliableRoles" :key="role.id">{{ role.name }}</option>
                            </select>
                        </div>

                        <div class="mt-6">
                            <button @click="sendEditedUser" class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg">Guardar Cambios</button>
                            <button @click="isOpenEditor = false" class="w-full px-4 py-2 mt-4 bg-red-500 text-white rounded-lg">Cancelar</button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </AdminPannel>
</template>

