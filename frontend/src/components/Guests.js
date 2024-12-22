import React, { useState, useEffect } from "react";

function Guests() {
  const [guests, setGuests] = useState([]);
  const [newGuest, setNewGuest] = useState({ name: "", contact: "", checkIn: "", checkOut: "" });
  const [loading, setLoading] = useState(true);

  // Simulate fetching data from an API
  useEffect(() => {
    const fetchGuests = async () => {
      setLoading(true);
      try {
        // Placeholder for API data
        const data = [
          { id: 1, name: "John Doe", contact: "123-456-7890", checkIn: "2024-01-01", checkOut: "2024-01-05" },
          { id: 2, name: "Jane Smith", contact: "987-654-3210", checkIn: "2024-01-02", checkOut: "2024-01-06" },
        ];

        setGuests(data);
      } catch (error) {
        console.error("Error fetching guests:", error);
      } finally {
        setLoading(false);
      }
    };

    fetchGuests();
  }, []);

  const handleAddGuest = (e) => {
    e.preventDefault();
    const newGuestData = { ...newGuest, id: guests.length + 1 };
    setGuests([...guests, newGuestData]);
    setNewGuest({ name: "", contact: "", checkIn: "", checkOut: "" });
  };

  if (loading) {
    return <p>Loading guest data...</p>;
  }

  return (
    <div>
      <h2>Guests</h2>
      <form onSubmit={handleAddGuest} className="guest-form">
        <div>
          <label>Name:</label>
          <input
            type="text"
            value={newGuest.name}
            onChange={(e) => setNewGuest({ ...newGuest, name: e.target.value })}
            required
          />
        </div>
        <div>
          <label>Contact:</label>
          <input
            type="text"
            value={newGuest.contact}
            onChange={(e) => setNewGuest({ ...newGuest, contact: e.target.value })}
            required
          />
        </div>
        <div>
          <label>Check-In:</label>
          <input
            type="date"
            value={newGuest.checkIn}
            onChange={(e) => setNewGuest({ ...newGuest, checkIn: e.target.value })}
            required
          />
        </div>
        <div>
          <label>Check-Out:</label>
          <input
            type="date"
            value={newGuest.checkOut}
            onChange={(e) => setNewGuest({ ...newGuest, checkOut: e.target.value })}
            required
          />
        </div>
        <button type="submit">Add Guest</button>
      </form>

      <h3>Guest List</h3>
      <table className="guest-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Check-In</th>
            <th>Check-Out</th>
          </tr>
        </thead>
        <tbody>
          {guests.map((guest) => (
            <tr key={guest.id}>
              <td>{guest.name}</td>
              <td>{guest.contact}</td>
              <td>{guest.checkIn}</td>
              <td>{guest.checkOut}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default Guests;
