import React, { useState, useEffect } from 'react';

const Maintenance = () => {
    const [requests, setRequests] = useState([]);
    const [newRequest, setNewRequest] = useState({ description: '', houseId: '' });

    useEffect(() => {
        fetch('/api/maintenance')
            .then((response) => response.json())
            .then((data) => setRequests(data))
            .catch((error) => console.error('Error fetching maintenance requests:', error));
    }, []);

    const handleAddRequest = (e) => {
        e.preventDefault();
        fetch('/api/maintenance', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(newRequest),
        })
            .then((response) => response.json())
            .then((request) => setRequests([...requests, request]))
            .catch((error) => console.error('Error adding request:', error));
    };

    return (
        <div className="maintenance">
            <h1>Maintenance Requests</h1>
            <form onSubmit={handleAddRequest}>
                <textarea
                    placeholder="Description"
                    value={newRequest.description}
                    onChange={(e) => setNewRequest({ ...newRequest, description: e.target.value })}
                />
                <input
                    type="text"
                    placeholder="House ID"
                    value={newRequest.houseId}
                    onChange={(e) => setNewRequest({ ...newRequest, houseId: e.target.value })}
                />
                <button type="submit">Add Request</button>
            </form>
            <ul>
                {requests.map((request) => (
                    <li key={request.id}>
                        {request.description} (House ID: {request.houseId})
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Maintenance;
