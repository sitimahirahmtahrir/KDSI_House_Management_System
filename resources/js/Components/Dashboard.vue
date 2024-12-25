<template>
    <div>
        <h1>Dashboard</h1>
        <div>
            <canvas id="houseStatusChart"></canvas>
            <canvas id="maintenanceChart"></canvas>
        </div>
    </div>
</template>

<script>
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

export default {
    props: {
        houseStatusData: Array,
        maintenanceData: Array,
    },
    mounted() {
        this.createChart('houseStatusChart', 'House Status', this.houseStatusData, ['Vacant', 'Occupied', 'Under Maintenance']);
        this.createChart('maintenanceChart', 'Maintenance Requests', this.maintenanceData, ['Pending', 'In Progress', 'Completed']);
    },
    methods: {
        createChart(chartId, title, data, labels) {
            new Chart(document.getElementById(chartId), {
                type: 'pie',
                data: {
                    labels,
                    datasets: [{
                        label: title,
                        data,
                        backgroundColor: ['#36a2eb', '#ff6384', '#ffce56'],
                    }],
                },
            });
        },
    },
};
</script>
