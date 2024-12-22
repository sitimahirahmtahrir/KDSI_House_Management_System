import React, { useState, useEffect } from "react";

function Houses() {
  const [houses, setHouses] = useState([]);
  const [newHouse, setNewHouse] = useState({ name: "", address: "", status: "Vacant" });
  const [loading, setLoading] = useState(true);

  // Simulate fetching data from an API
  useEffect(() => {
    const fetchHouses = async () => {
      setLoading(true);
      try {
        // Placeholder for API data
        const data = [
          { id: 1, name: "House A", address: "123 Street", status: "Occupied" },
          { id: 2, name: "House B", address: "456 Avenue", status: "Vacant" },
        ];

        setHouses(data);
      } catch (error) {
        console.error("Error fetching houses:", error);
      } finally {
        setLoading(false);
      }
    };

    fetchHouses();
  }, []);

  const handleAddHouse = (e) => {
    e.preventDefault();
    const newHouseData = { ...newHouse, id: houses.length + 1 };
    setHouses([...houses, newHouseData]);
    setNewHouse({ name: "", address: "", status: "Vacant" });
  };

  const handleDeleteHouse = (id) => {
    setHouses(houses.filter((house) => house.id !== id));
  };

  if (loading) {
    return <p>Loading house data...</p>;
  }

  return (
    <div>
      <h2>Houses</h2>
      <form onSubmit={handleAddHouse} className="house-form">
        <div>
          <label>Name:</label>
          <input
            type="text"
            value={newHouse.name}
            onChange={(e) => setNewHouse({ ...newHouse, name: e.target.value })}
            required
          />
        </div>
        <div>
          <label>Address:</label>
          <input
            type="text"
            value={newHouse.address}
            onChange={(e) => setNewHouse({ ...newHouse, address: e.target.value })}
            required
          />
        </div>
        <div>
          <label>Status:</label>
          <select
            value={newHouse.status}
            onChange={(e) => setNewHouse({ ...newHouse, status: e.target.value })}
          >
            <option value="Vacant">Vacant</option>
            <option value="Occupied">Occupied</option>
            <option value="Under Maintenance">Under Maintenance</option>
          </select>
        </div>
        <button type="submit">Add House</button>
      </form>

      <h3>House List</h3>
      <table className="house-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {houses.map((house) => (
            <tr key={house.id}>
              <td>{house.name}</td>
              <td>{house.address}</td>
              <td>{house.status}</td>
              <td>
                <button
                  onClick={() => handleDeleteHouse(house.id)}
                  className="delete-button"
                >
                  Delete
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default Houses;
