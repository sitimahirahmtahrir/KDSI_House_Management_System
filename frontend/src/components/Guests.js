import React, { useState, useEffect } from 'react';

const Guests = () => {
    const [guests, setGuests] = useState([]);
    const [newGuest, setNewGuest] = useState({ name: '', checkInDate: '', checkOutDate: '' });

    useEffect(() => {
        fetch('/api/guests')
            .then((response) => response.json())
            .then((data) => setGuests(data))
            .catch((error) => console.error('Error fetching guests:', error));
    }, []);

    const handleAddGuest = (e) => {
        e.preventDefault();
        fetch('/api/guests', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(newGuest),
        })
            .then((response) => response.json())
            .then((guest) => setGuests([...guests, guest]))
            .catch((error) => console.error('Error adding guest:', error));
    };

    return (
        <div className="guests">
            <h1>Guest Management</h1>
            <form onSubmit={handleAddGuest}>
                <input
                    type="text"
                    placeholder="Guest Name"
                    value={newGuest.name}
                    onChange={(e) => setNewGuest({ ...newGuest, name: e.target.value })}
                />
                <input
                    type="date"
                    value={newGuest.checkInDate}
                    onChange={(e) => setNewGuest({ ...newGuest, checkInDate: e.target.value })}
                />
                <input
                    type="date"
                    value={newGuest.checkOutDate}
                    onChange={(e) => setNewGuest({ ...newGuest, checkOutDate: e.target.value })}
                />
                <button type="submit">Add Guest</button>
            </form>
            <ul>
                {guests.map((guest) => (
                    <li key={guest.id}>
                        {guest.name} (Check-in: {guest.checkInDate}, Check-out: {guest.checkOutDate})
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Guests;
