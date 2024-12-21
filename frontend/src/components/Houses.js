import React, { useState, useEffect } from "react";

const Houses = () => {
    const [houses, setHouses] = useState([]);
    const [houseNumber, setHouseNumber] = useState("");
    const [location, setLocation] = useState("");
    const [status, setStatus] = useState("Vacant");

    // Fetch the list of houses on component mount
    useEffect(() => {
        fetch("http://localhost:8000/api/houses")
            .then((response) => response.json())
            .then((data) => setHouses(data))
            .catch((error) => console.error("Error:", error));
    }, []);

    // Handle adding a new house
    const handleAddHouse = (e) => {
        e.preventDefault();
        fetch("http://localhost:8000/api/houses", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ house_number: houseNumber, location, status }),
        })
            .then((response) => response.json())
            .then((data) => {
                alert("House added successfully!");
                setHouses([...houses, data]); // Update the local state
                setHouseNumber("");
                setLocation("");
                setStatus("Vacant");
            })
            .catch((error) => console.error("Error:", error));
    };

    return (
        <div>
            <h1>Manage Houses</h1>
            <table>
                <thead>
                    <tr>
                        <th>House Number</th>
                        <th>Location</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    {houses.map((house) => (
                        <tr key={house.id}>
                            <td>{house.house_number}</td>
                            <td>{house.location}</td>
                            <td>{house.status}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
            <form onSubmit={handleAddHouse}>
                <h2>Add New House</h2>
                <label>House Number:</label>
                <input
                    type="text"
                    value={houseNumber}
                    onChange={(e) => setHouseNumber(e.target.value)}
                    required
                />
                <label>Location:</label>
                <input
                    type="text"
                    value={location}
                    onChange={(e) => setLocation(e.target.value)}
                    required
                />
                <label>Status:</label>
                <select value={status} onChange={(e) => setStatus(e.target.value)}>
                    <option value="Vacant">Vacant</option>
                    <option value="Occupied">Occupied</option>
                    <option value="Maintenance">Maintenance</option>
                </select>
                <button type="submit">Add House</button>
            </form>
        </div>
    );
};

export default Houses;
