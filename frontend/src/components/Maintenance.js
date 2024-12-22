import React, { useState, useEffect } from "react";

function Maintenance() {
  const [requests, setRequests] = useState([]);
  const [newRequest, setNewRequest] = useState({ house: "", description: "", status: "Pending" });
  const [loading, setLoading] = useState(true);

  // Simulate fetching data from an API
  useEffect(() => {
    const fetchRequests = async () => {
      setLoading(true);
      try {
        // Placeholder for API data
        const data = [
          { id: 1, house: "House A", description: "Leaking roof", status: "In Progress" },
          { id: 2, house: "House B", description: "Broken window", status: "Resolved" },
        ];

        setRequests(data);
      } catch (error) {
        console.error("Error fetching maintenance requests:", error);
      } finally {
        setLoading(false);
      }
    };

    fetchRequests();
  }, []);

  const handleAddRequest = (e) => {
    e.preventDefault();
    const newRequestData = { ...newRequest, id: requests.length + 1 };
    setRequests([...requests, newRequestData]);
    setNewRequest({ house: "", description: "", status: "Pending" });
  };

  const handleUpdateStatus = (id, newStatus) => {
    setRequests(
      requests.map((request) =>
        request.id === id ? { ...request, status: newStatus } : request
      )
    );
  };

  if (loading) {
    return <p>Loading maintenance requests...</p>;
  }

  return (
    <div>
      <h2>Maintenance Requests</h2>
      <form onSubmit={handleAddRequest} className="maintenance-form">
        <div>
          <label>House:</label>
          <input
            type="text"
            value={newRequest.house}
            onChange={(e) => setNewRequest({ ...newRequest, house: e.target.value })}
            required
          />
        </div>
        <div>
          <label>Description:</label>
          <textarea
            value={newRequest.description}
            onChange={(e) => setNewRequest({ ...newRequest, description: e.target.value })}
            required
          ></textarea>
        </div>
        <button type="submit">Add Request</button>
      </form>

      <h3>Maintenance Requests</h3>
      <table className="maintenance-table">
        <thead>
          <tr>
            <th>House</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {requests.map((request) => (
            <tr key={request.id}>
              <td>{request.house}</td>
              <td>{request.description}</td>
              <td>{request.status}</td>
              <td>
                {request.status !== "Resolved" && (
                  <button
                    onClick={() => handleUpdateStatus(request.id, "Resolved")}
                    className="resolve-button"
                  >
                    Mark as Resolved
                  </button>
                )}
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default Maintenance;
