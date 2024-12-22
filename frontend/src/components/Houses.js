import React, { useState, useEffect } from 'react';

const Houses = () => {
    const [houses, setHouses] = useState([]);
    const [newHouse, setNewHouse] = useState({ name: '', address: '', status: 'vacant' });

    useEffect(() => {
        fetch('/api/houses')
            .then((response) => response.json())
            .then((data) => setHouses(data))
            .catch((error) => console.error('Error fetching houses:', error));
    }, []);

    const handleAddHouse = (e) => {
        e.preventDefault();
        fetch('/api/houses', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(newHouse),
        })
            .then((response) => response.json())
            .then((house) => setHouses([...houses, house]))
            .catch((error) => console.error('Error adding house:', error));
    };

    return (
        <div className="houses">
            <h1>House Management</h1>
            <form onSubmit={handleAddHouse}>
                <input
                    type="text"
                    placeholder="House Name"
                    value={newHouse.name}
                    onChange={(e) => setNewHouse({ ...newHouse, name: e.target.value })}
                />
                <input
                    type="text"
                    placeholder="Address"
                    value={newHouse.address}
                    onChange={(e) => setNewHouse({ ...newHouse, address: e.target.value })}
                />
                <select
                    value={newHouse.status}
                    onChange={(e) => setNewHouse({ ...newHouse, status: e.target.value })}
                >
                    <option value="vacant">Vacant</option>
                    <option value="occupied">Occupied</option>
                    <option value="under_maintenance">Under Maintenance</option>
                </select>
                <button type="submit">Add House</button>
            </form>
            <ul>
                {houses.map((house) => (
                    <li key={house.id}>
                        {house.name} ({house.address}) - {house.status}
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Houses;
