<template>
    <AdminPannel class="bg-unibague-blue bg-opacity-5">
        <div class="text-4xl font-semibold text-unibague-blue" style="text-align:center">
            Gestionar Eventos
        </div>

        <div class="flex justify-end">
            <!-- Button to Open Modal for New Event -->
            <button @click="openCreateModal"
                    class="mt-6 bg-unibague-blue text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">
                Crear nuevo evento
            </button>
        </div>

        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden mt-7">
            <thead class="bg-unibague-blue text-white">
            <tr>
                <th class="text-left py-4 px-6">Nombre del evento</th>
                <th class="text-left py-4 px-6">Fecha inicio</th>
                <th class="text-left py-4 px-6">Fecha finalización</th>
                <th class="text-left py-4 px-6">Administradores</th>
                <th class="text-left py-4 px-6">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="event in events" :key="event.id" class="hover:bg-gray-100">
                <td class="py-4 px-6">{{ event.name }}</td>
                <td class="py-4 px-6">{{ formatDate(event.start_date) }}</td>
                <td class="py-4 px-6">{{ formatDate(event.end_date) }}</td>
                <td class="py-4 px-6">
                    <!-- Show administrators separated by commas -->
                    {{ event.administrators.map(admin => admin.name).join(', ') }}
                </td>
                <td class="py-4 px-6">
                    <!-- Edit Button -->
                    <button class="text-green-600 hover:text-green-800 mr-4" @click="openEditModal(event)">Editar
                    </button>
                    <!-- Delete Button -->
                    <button class="text-red-600 hover:text-red-800" @click="deleteEvent(event.id)">Borrar</button>
                </td>
            </tr>
            </tbody>
        </table>

        <!-- Modal for Creating/Editing Events -->
        <EventModal
            v-if="isModalOpen"
            :event="selectedEvent"
            :users="users"
            @close="closeModal"
            @save="saveEvent"
        />
    </AdminPannel>
</template>

<script>
import AdminPannel from "../AdminPannel.vue";
import EventModal from '../../Components/Event/EventModal.vue'; // Modal component for event creation/edit
import {toast, updateGlobalOptions} from 'vue3-toastify';
import 'vue3-toastify/dist/index.css'


export default {
    components: {
        AdminPannel,
        EventModal,
    },
    data: () => ({
        events: [],
        users: [], // Store users here
        isModalOpen: false,
        selectedEvent: null,
    }),
    async created() {
        await this.getEvents();
        await this.getUsers();
    },
    methods: {
        async getEvents() {
            const response = await axios.get(route('api.events.index'));
            this.events = response.data;
            console.log(this.events, 'eventos');
        },
        async getUsers() {
            const response = await axios.get(route('api.users.index'));
            this.users = response.data;
        },
        formatDate(date) {
            return new Date(date).toLocaleDateString(); // Format dates for display
        },
        openCreateModal() {
            this.selectedEvent = null; // Reset selected event
            this.isModalOpen = true; // Open modal for new event creation
        },
        openEditModal(event) {
            this.selectedEvent = event; // Pass the event to the modal
            this.isModalOpen = true; // Open modal for editing
        },
        closeModal() {
            this.isModalOpen = false;
        },
        async saveEvent(eventData) {
            try {
                if (eventData.id) {
                    // Update existing event
                    let response = await axios.put(route('api.events.update', eventData.id), eventData);
                    toast.success(response.data.message, {autoClose: 7000});

                } else {
                    //Create new event
                    let response = await axios.post(route('api.events.store'), eventData);
                    toast.success(response.data.message, {autoClose: 7000});
                }
                await this.getEvents(); // Refresh events list
                this.closeModal(); // Close modal after save
            } catch (e) {
                if (e.response && e.response.data) {
                    console.error('Error del backend:', e.response.data.message);
                    toast.error(`Error al intentar crear el evento: ${e.response.data.message}`, {autoClose: 7000});
                } else {
                    // Handle other types of errors (e.g., network issues)
                    console.error('Error:', e.message);
                    toast.error('Error al intentar crear el evento', {autoClose: 7000});
                }
            }
        }
        ,
        async deleteEvent(eventId) {
            if (confirm('¿Estás seguro de que deseas borrar este evento? \nEsta acción es irreversible')) {
                let response = await axios.delete(route('api.events.destroy', eventId));
                toast.success(response.data.message, {
                    autoClose: 7000,
                })
                await this.getEvents(); // Refresh events list
            }
        },
    }
    ,
}
;
</script>
