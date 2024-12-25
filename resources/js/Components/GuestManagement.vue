<template>
    <div>
        <h1>Guest Management</h1>
        <button @click="goToCreatePage" class="btn btn-primary mb-3">Add Guest</button>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>House</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="guest in guests" :key="guest.id">
                    <td>{{ guest.name }}</td>
                    <td>{{ guest.contact_number }}</td>
                    <td>{{ guest.house.house_number }}</td>
                    <td>{{ guest.verification_status }}</td>
                    <td>
                        <button class="btn btn-success" @click="verifyGuest(guest.id)">Verify</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    props: {
        guests: Array,
    },
    methods: {
        goToCreatePage() {
            Inertia.visit('/guests/create');
        },
        verifyGuest(id) {
            Inertia.post(`/guests/${id}/verify`);
        },
    },
};
</script>
