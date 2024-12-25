<template>
    <div>
        <h1>Dashboard</h1>
        <div class="stats">
            <div>Total Houses: {{ totalHouses }}</div>
            <div>Occupied Houses: {{ occupiedHouses }}</div>
            <div>Vacant Houses: {{ vacantHouses }}</div>
            <div>Total Guests: {{ totalGuests }}</div>
            <div>Pending Maintenance Requests: {{ pendingMaintenanceRequests }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        totalHouses: Number,
        occupiedHouses: Number,
        vacantHouses: Number,
        totalGuests: Number,
        pendingMaintenanceRequests: Number,
    },
};
</script>
