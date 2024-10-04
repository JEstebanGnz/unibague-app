<template>
    <!-- Modal overlay -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <!-- Modal content -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
            <h2 class="text-2xl mb-4">{{ isEdit ? 'Editar evento' : 'Crear un nuevo evento' }}</h2>

            <!-- Event Name Input -->
            <div class="mb-4">
                <label class="block text-gray-700">Nombre del evento</label>
                <input v-model="formData.name" class="w-full p-2 border border-gray-300 rounded mt-2" type="text" placeholder="Dar nombre al evento" />
            </div>

            <!-- Date Range Picker -->
            <div class="mb-4">
                <label class="block text-gray-700">Rango de fechas</label>
                <VueDatePicker v-model="formData.dateRange"
                               range class="w-full mt-2"
                               placeholder="Seleccionar fechas"
                               locale="es"
                               :labels="labels"
                                />
            </div>


            <!-- Administrators Multi-Select -->
            <div class="mb-4">
                <label class="block text-gray-700">Administradores</label>
                <v-select
                    v-model="formData.administrators"
                    :options="availableAdministrators"
                    label="name"
                    multiple
                    class="mt-2"
                    placeholder="Seleccionar usuarios..."
                />
            </div>

            <!-- Save and Cancel Buttons -->
            <div class="flex justify-end">
                <button @click="closeModal" class="text-gray-600 px-4 py-2 mr-2">Cancelar</button>
                <button @click="handleSave" class="bg-unibague-blue text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
            </div>
        </div>
    </div>
</template>

<script>

import { ref, watch, defineComponent } from 'vue';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import vSelect from 'vue-select'; // Add vue-select component
import 'vue-select/dist/vue-select.css';



export default defineComponent({
    name: 'EventModal',
    components: {
        VueDatePicker,
        vSelect, // Register vSelect component
    },
    props: {
        event: Object, // Receives event data if editing
        users: Array,  // List of all available users for selecting administrators
    },
    emits: ['close', 'save'],
    setup(props, { emit }) {


        // Form data for event details
        const formData = ref({
            name: props.event?.name || '',
            dateRange: props.event ? [new Date(props.event.start_date), new Date(props.event.end_date)] : [],
            administrators: props.event?.administrators || [] // Admins assigned to event (full objects)
        });

        // Watch props to update formData when event changes
        watch(
            () => props.event,
            (newEvent) => {
                formData.value = {
                    name: newEvent?.name || '',
                    dateRange: newEvent ? [new Date(newEvent.start_date), new Date(newEvent.end_date)] : [],
                    administrators: newEvent?.administrators || [] // Keep full admin objects
                };
            }
        );

        // Boolean to determine if editing or creating a new event
        const isEdit = ref(!!props.event);

        // Available users to select as administrators
        const availableAdministrators = ref(props.users); // Set available users from prop

        // Method to handle the save action
        const handleSave = () => {
            console.log(formData.value.administrators, 'LOS ADMINISTRADORES AS THEY COME');
            const eventData = {
                name: formData.value.name,
                start_date: formData.value.dateRange[0],
                end_date: formData.value.dateRange[1],
                administrators: formData.value.administrators.map(admin => (admin.id)) // Include selected administrators' ids
            };
            if (isEdit.value) {
                eventData.id = props.event.id;
            }
            emit('save', eventData); // Emit save event with data
        };

        // Method to close the modal
        const closeModal = () => {
            emit('close');
        };

        return {
            formData,
            handleSave,
            closeModal,
            isEdit,
            availableAdministrators
        };
    },
});
</script>
