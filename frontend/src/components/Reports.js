import React, { useState, useEffect } from "react";
import axios from "axios";

function Reports() {
  const [reports, setReports] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState("");

  // Fetch reports from the backend
  useEffect(() => {
    const fetchReports = async () => {
      setLoading(true);
      setError("");

      try {
        const response = await axios.get("http://your-backend-url/api/reports");
        setReports(response.data);
      } catch (err) {
        console.error("Error fetching reports:", err);
        setError("Failed to fetch reports. Please try again.");
      } finally {
        setLoading(false);
      }
    };

    fetchReports();
  }, []);

  const handleDownload = async (reportId) => {
    try {
      const response = await axios.get(`http://your-backend-url/api/reports/${reportId}/download`, {
        responseType: "blob", // Ensures the response is treated as a file
      });

      // Create a blob URL and trigger download
      const url = window.URL.createObjectURL(new Blob([response.data]));
      const link = document.createElement("a");
      link.href = url;
      link.setAttribute("download", `report-${reportId}.pdf`); // Replace with desired filename
      document.body.appendChild(link);
      link.click();
      link.parentNode.removeChild(link);
    } catch (err) {
      console.error("Error downloading report:", err);
      setError("Failed to download report. Please try again.");
    }
  };

  if (loading) {
    return <p>Loading reports...</p>;
  }

  if (error) {
    return <p className="error-message">{error}</p>;
  }

  return (
    <div>
      <h2>Reports</h2>
      {reports.length === 0 ? (
        <p>No reports available.</p>
      ) : (
        <table className="reports-table">
          <thead>
            <tr>
              <th>Report Name</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            {reports.map((report) => (
              <tr key={report.id}>
                <td>{report.name}</td>
                <td>{new Date(report.date).toLocaleDateString()}</td>
                <td>
                  <button
                    onClick={() => handleDownload(report.id)}
                    className="download-button"
                  >
                    Download
                  </button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      )}
    </div>
  );
}

export default Reports;
