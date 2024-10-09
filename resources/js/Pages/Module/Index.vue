<script setup>
import {ref, onMounted, watch} from 'vue'
import AdminPannel from "@/Pages/AdminPannel.vue";
import AddButton from "@/Components/AddButton.vue";
import InternRedirect from "@/Components/ModuleForm/InternRedirect.vue";
import ExternalSimpleRedirect from "@/Components/ModuleForm/ExternalSimpleRedirect.vue";
import ExternalComplexRedirect from "@/Components/ModuleForm/ExternalComplexRedirect.vue";

const props = defineProps({modulesProp: Array, availableRoles: Array});
const isOpen = ref(false);
const editorIsOpen = ref(false);
const modules = ref([])

const form = ref({
    name: '',
    icon: '',
    visible: '',
    type: '',
    roles: [],
    payload: {}

})

const editedForm = ref({
    name: '',
    icon: '',
    visible: '',
    type: '',
    roles: [],
    payload: {}

})


watch(() => form.value.type, () => {
    form.value.payload = {}
})

const addNew = () => {
    isOpen.value = true;
    return isOpen.value
}


const closeModal = () => {
    isOpen.value = false;
}

const createModule = async () => {
    const url = route('modules.store')
    try {
        const request = await axios.post(url, form.value)
        location.reload()
    } catch (e) {
        console.log(e)
        alert('Ha ocurrido un error al crear el módulo: ')
    }

}

const editModule = (moduleId) => {
    editorIsOpen.value = true
    let selectedModule = {...modules.value[moduleId]}
    selectedModule.roles = formatRoles(selectedModule.roles)
    selectedModule.payload = JSON.parse(selectedModule.payload)
    editedForm.value = selectedModule;
    console.log(editedForm.value)
    console.log(editorIsOpen.value)

}
const sendEditedModule = async () => {
    const url = route('modules.update', {module: editedForm.value.id})
    try {
        await axios.patch(url, editedForm.value)
        location.reload()
    } catch (e) {
        console.log(e, 'Error de edicion')
        return alert('No se pudo actualizar')
    }
}
const formatRoles = (roles) => {
    return roles.map((role) => {
        return role.id
    })
}
onMounted(() => {
    modules.value = props.modulesProp

})
const updatePayload = (payload) => {
    form.value.payload = payload;
}
const updateEditedPayload = (payload) => {
    editedForm.value.payload = payload;
}


const deleteModule = async (moduleId) => {
    if (!confirm('seguro desea borrar?')) {
        return
    }
    const url = `modules/${moduleId}`;
    try {
        await axios.delete(url);
        refreshModules(moduleId)
    } catch (error) {
        alert('Hubo un problema al borrar el modulo seleccionado' + error)
    }
}

const refreshModules = (moduleId) => {
    modules.value = modules.value.filter((module) => {
        return (module.id !== moduleId)
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
                            <thead class="bg-unibague-blue text-white">
                            <tr>
                                <th class="px-6 py-3">
                                    Nombre
                                </th>
                                <th class="px-6 py-3">
                                    Icono
                                </th>
                                <th class="px-6 py-3">
                                    Tipo
                                </th>
                                <th class="px-6 py-3">
                                    Visibilidad
                                </th>
                                <th class="px-6 py-3">
                                    Editar
                                </th>
                                <th class="px-6 py-3">
                                    Eliminar
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white">

                            <tr v-for="(module, index) in modules" :key="index">
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ module.name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 border-b border-gray-200 ">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ module.icon }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 ">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ module.type }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 ">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ module.visible }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 text-gray-500">
                                                <button @click="editModule(index)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                                    </svg>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 text-gray-500">
                                                <button @click="deleteModule(module.id)">
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
        <template v-if="editorIsOpen">
            <div class=" fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                <div class="bg-white p-8 rounded-lg shadow-lg h-2/3 overflow-auto">
                    <div class="mb-4">
                        <label for="name"
                               class="text-gray-700">Nombre</label>
                        <input v-model="editedForm.name" type="text"
                               name="name" id="name" required
                               class="w-full mt-2 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div class="mb-4">
                        <label for="icon"
                               class="text-gray-700">Icono</label>
                        <input v-model="editedForm.icon" type="text"
                               name="icon" id="icon" required
                               placeholder="/../../public/assets/Unibague_logo.jpg"
                               class="w-full mt-2 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div class="mb-4">
                        <div>Visibilidad</div>
                        <label for="visible"
                               class="text-gray-700">Si</label>
                        <input type="radio" v-model="editedForm.visible"
                               name="visible" id="visible" required
                               v-bind:value="1"
                               class=" mr-5 ml-1 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">

                        <label for="noVisible"
                               class="text-gray-700">No</label>
                        <input type="radio" v-model="editedForm.visible"
                               name="visible" id="noVisible" required
                               v-bind:value="0"
                               class=" ml-1 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <label for="moduleTypes"
                           class="block mb-2 text-gray-700 ">Tipo</label>
                    <select v-model="editedForm.type"
                            class="bg-gray-50 mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="InternalRedirect">Redireccion
                            interna
                        </option>
                        <option value="ExternalSimpleRedirect">Redireccion
                            externa simple
                        </option>
                        <option value="ExternalComplexRedirect">Redireccion
                            externa condicional
                        </option>

                    </select>

                    <label for="roles"
                           class="text-gray-700 ">Roles</label>
                    <template v-for="availableRole in availableRoles"
                              :key="availableRole.id">
                        <div class="flex">
                            <input type="checkbox" :value="availableRole.id"
                                   v-model="editedForm.roles"
                                   class="mr-2 rounded">
                            <label>{{ availableRole.name }}</label>
                        </div>
                    </template>

                    <InternRedirect
                        v-if="editedForm.type === 'InternalRedirect'"
                        :payload="editedForm.payload"
                        @updated="updateEditedPayload"/>

                    <ExternalSimpleRedirect
                        v-if="editedForm.type === 'ExternalSimpleRedirect'"
                        :payload="editedForm.payload"
                        @updated="updateEditedPayload"/>

                    <ExternalComplexRedirect
                        v-if="editedForm.type === 'ExternalComplexRedirect'"
                        :payload="editedForm.payload"
                        @updated="updateEditedPayload"/>

                    <div class="text-center">
                        <button type="button"
                                @click="() => { editorIsOpen=false}"
                                class="px-4 py-2 mr-2 bg-gray-300 text-gray-700 rounded-full hover:bg-gray-400 transition duration-200">
                            Cerrar
                        </button>
                        <button @click="sendEditedModule"
                                class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition duration-200">
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </template>
        <template v-if="isOpen">
            <div class=" fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white p-8 rounded-lg shadow-lg h-2/3 overflow-auto">

                    <div class="mb-4">
                        <label for="name" class="text-gray-700">Nombre</label>
                        <input v-model="form.name" type="text" name="name" id="name" required
                               class="w-full mt-2 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div class="mb-4">
                        <label for="icon" class="text-gray-700">Icono</label>
                        <input v-model="form.icon" type="text" name="icon" id="icon" required
                               placeholder="/../../public/assets/Unibague_logo.jpg"
                               class="w-full mt-2 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div class="mb-4">
                        <div>Visibilidad</div>
                        <label for="visible" class="text-gray-700">Si</label>
                        <input type="radio" v-model="form.visible" name="visible" id="visible" required
                               v-bind:value="true"
                               class=" mr-5 ml-1 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">

                        <label for="noVisible" class="text-gray-700">No</label>
                        <input type="radio" v-model="form.visible" name="visible" id="noVisible" required
                               v-bind:value="false"
                               class=" ml-1 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <label for="moduleTypes"
                           class="block mb-2 text-gray-700 ">Tipo</label>
                    <select v-model="form.type"
                            class="bg-gray-50 mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="InternalRedirect">Redireccion interna</option>
                        <option value="ExternalSimpleRedirect">Redireccion externa simple</option>
                        <option value="ExternalComplexRedirect">Redireccion externa condicional</option>

                    </select>

                    <label for="roles"
                           class="text-gray-700 ">Roles</label>
                    <template v-for="availableRole in availableRoles" :key="availableRole.id">
                        <div class="flex">
                            <input type="checkbox" :value="availableRole.id" v-model="form.roles" class="mr-2 rounded">
                            <label>{{ availableRole.name }}</label>
                        </div>
                    </template>

                    <InternRedirect v-if="form.type === 'InternalRedirect'" :payload="form.payload"
                                    @updated="updatePayload"/>

                    <ExternalSimpleRedirect v-if="form.type === 'ExternalSimpleRedirect'" :payload="form.payload"
                                            @updated="updatePayload"/>

                    <ExternalComplexRedirect v-if="form.type === 'ExternalComplexRedirect'" :payload="form.payload"
                                             @updated="updatePayload"/>

                    <div class="text-center">
                        <button type="button" @click="closeModal"
                                class="px-4 py-2 mr-2 bg-gray-300 text-gray-700 rounded-full hover:bg-gray-400 transition duration-200">
                            Cerrar
                        </button>
                        <button @click="createModule"
                                class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition duration-200">
                            Aceptar
                        </button>
                    </div>


                </div>

            </div>

        </template>
    </AdminPannel>

</template>

<style scoped>

</style>
