import React, { useState, useEffect } from "react";

function Dashboard() {
  const [summary, setSummary] = useState({
    totalHouses: 0,
    occupiedHouses: 0,
    vacantHouses: 0,
    maintenanceRequests: 0,
  });

  const [loading, setLoading] = useState(true);

  // Simulate fetching data from an API
  useEffect(() => {
    // Placeholder for API call
    const fetchSummaryData = async () => {
      setLoading(true);
      try {
        // Simulate API data
        const data = {
          totalHouses: 50,
          occupiedHouses: 35,
          vacantHouses: 10,
          maintenanceRequests: 5,
        };

        setSummary(data);
      } catch (error) {
        console.error("Error fetching dashboard data:", error);
      } finally {
        setLoading(false);
      }
    };

    fetchSummaryData();
  }, []);

  if (loading) {
    return <p>Loading dashboard data...</p>;
  }

  return (
    <div>
      <h2>Dashboard</h2>
      <div className="dashboard-summary">
        <div className="card">
          <h3>Total Houses</h3>
          <p>{summary.totalHouses}</p>
        </div>
        <div className="card">
          <h3>Occupied Houses</h3>
          <p>{summary.occupiedHouses}</p>
        </div>
        <div className="card">
          <h3>Vacant Houses</h3>
          <p>{summary.vacantHouses}</p>
        </div>
        <div className="card">
          <h3>Maintenance Requests</h3>
          <p>{summary.maintenanceRequests}</p>
        </div>
      </div>
    </div>
  );
}

export default Dashboard;
