import React, { useState, useEffect } from 'react';

const Dashboard = () => {
    const [data, setData] = useState({
        totalHouses: 0,
        occupiedHouses: 0,
        underMaintenance: 0,
        totalGuests: 0,
    });

    useEffect(() => {
        // Fetch data from API (dummy example)
        fetch('/api/dashboard-stats')
            .then((response) => response.json())
            .then((stats) => setData(stats))
            .catch((error) => console.error('Error fetching dashboard stats:', error));
    }, []);

    return (
        <div className="dashboard">
            <h1>Admin Dashboard</h1>
            <div className="stats">
                <div className="stat">
                    <h2>Total Houses</h2>
                    <p>{data.totalHouses}</p>
                </div>
                <div className="stat">
                    <h2>Occupied Houses</h2>
                    <p>{data.occupiedHouses}</p>
                </div>
                <div className="stat">
                    <h2>Under Maintenance</h2>
                    <p>{data.underMaintenance}</p>
                </div>
                <div className="stat">
                    <h2>Total Guests</h2>
                    <p>{data.totalGuests}</p>
                </div>
            </div>
        </div>
    );
};

export default Dashboard;
