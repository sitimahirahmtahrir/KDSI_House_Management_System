import React from "react";

const Dashboard = () => {
    const handleLogout = () => {
        alert("You have been logged out.");
        window.location.href = "/login";
    };

    return (
        <div>
            <h1>Dashboard</h1>
            <nav>
                <a href="/houses">Manage Houses</a>
                <a href="/maintenance">Maintenance Requests</a>
                <button onClick={handleLogout}>Logout</button>
            </nav>
        </div>
    );
};

export default Dashboard;
