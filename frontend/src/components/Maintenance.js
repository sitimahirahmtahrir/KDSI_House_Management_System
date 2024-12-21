import React, { useState, useEffect } from "react";

const Maintenance = () => {
    const [requests, setRequests] = useState([]);
    const [description, setDescription] = useState("");
    const [image, setImage] = useState(null);

    // Fetch the list of maintenance requests on component mount
    useEffect(() => {
        fetch("http://localhost:8000/api/maintenance-requests")
            .then((response) => response.json())
            .then((data) => setRequests(data))
            .catch((error) => console.error("Error:", error));
    }, []);

    // Handle submitting a new maintenance request
    const handleSubmitRequest = (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append("description", description);
        if (image) {
            formData.append("image", image);
        }

        fetch("http://localhost:8000/api/maintenance-requests", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                alert("Maintenance request submitted successfully!");
                setRequests([...requests, data]); // Update the local state
                setDescription("");
                setImage(null);
            })
            .catch((error) => console.error("Error:", error));
    };

    return (
        <div>
            <h1>Maintenance Requests</h1>
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    {requests.map((request) => (
                        <tr key={request.id}>
                            <td>{request.description}</td>
                            <td>{request.status}</td>
                            <td>
                                {request.image && (
                                    <img
                                        src={`http://localhost:8000/storage/${request.image}`}
                                        alt="Maintenance"
                                        width="100"
                                    />
                                )}
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
            <form onSubmit={handleSubmitRequest}>
                <h2>Submit New Request</h2>
                <label>Description:</label>
                <textarea
                    value={description}
                    onChange={(e) => setDescription(e.target.value)}
                    required
                ></textarea>
                <label>Upload Image (Optional):</label>
                <input
                    type="file"
                    onChange={(e) => setImage(e.target.files[0])}
                />
                <button type="submit">Submit Request</button>
            </form>
        </div>
    );
};

export default Maintenance;
