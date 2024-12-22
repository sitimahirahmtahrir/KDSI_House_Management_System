import React, { useState, useEffect } from 'react';

const Reports = () => {
    const [reports, setReports] = useState([]);

    useEffect(() => {
        fetch('/api/reports')
            .then((response) => response.json())
            .then((data) => setReports(data))
            .catch((error) => console.error('Error fetching reports:', error));
    }, []);

    const handleDownloadReport = (reportId) => {
        fetch(`/api/reports/${reportId}/download`, { method: 'GET' })
            .then((response) => {
                if (response.ok) {
                    return response.blob();
                } else {
                    throw new Error('Error downloading report');
                }
            })
            .then((blob) => {
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `report-${reportId}.pdf`;
                a.click();
            })
            .catch((error) => console.error(error));
    };

    return (
        <div className="reports">
            <h1>Reports</h1>
            <ul>
                {reports.map((report) => (
                    <li key={report.id}>
                        {report.title}
                        <button onClick={() => handleDownloadReport(report.id)}>Download</button>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Reports;
