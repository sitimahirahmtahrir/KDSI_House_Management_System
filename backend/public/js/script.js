// Script.js: Core JavaScript functionality for the KDSI House Management System

// General DOM Ready Function
document.addEventListener("DOMContentLoaded", () => {
    console.log("KDSI House Management System scripts loaded.");

    // Initialize logout functionality
    initializeLogoutButton();

    // Highlight active navigation link
    highlightActiveNavLink();
});

// Function: Initialize Logout Button
function initializeLogoutButton() {
    const logoutButton = document.querySelector(".logout-button");
    if (logoutButton) {
        logoutButton.addEventListener("click", () => {
            if (confirm("Are you sure you want to log out?")) {
                window.location.href = "/logout";
            }
        });
    }
}

// Function: Highlight Active Navigation Link
function highlightActiveNavLink() {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll("nav.navbar ul li a");

    navLinks.forEach(link => {
        if (link.getAttribute("href") === currentPath) {
            link.classList.add("active-link");
        }
    });
}

// Dashboard Functionality (e.g., Fetch Data and Render Charts)
function loadDashboardData() {
    fetch("/api/dashboard")
        .then(response => response.json())
        .then(data => {
            // Display data in the dashboard cards
            document.querySelector("#totalHouses").textContent = data.totalHouses;
            document.querySelector("#occupiedHouses").textContent = data.occupiedHouses;
            document.querySelector("#vacantHouses").textContent = data.vacantHouses;
            document.querySelector("#totalGuests").textContent = data.totalGuests;
            document.querySelector("#pendingMaintenanceRequests").textContent =
                data.pendingMaintenanceRequests;
        })
        .catch(error => {
            console.error("Error fetching dashboard data:", error);
        });
}

// Guests Functionality
function initializeGuestForm() {
    const guestForm = document.querySelector("#guestForm");
    if (guestForm) {
        guestForm.addEventListener("submit", event => {
            event.preventDefault();
            const formData = new FormData(guestForm);

            fetch("/api/guests", {
                method: "POST",
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    alert("Guest added successfully!");
                    guestForm.reset();
                })
                .catch(error => {
                    console.error("Error adding guest:", error);
                });
        });
    }
}

// Houses Functionality
function initializeHousesTable() {
    const housesTable = document.querySelector("#housesTable");
    if (housesTable) {
        fetch("/api/houses")
            .then(response => response.json())
            .then(data => {
                data.forEach(house => {
                    const row = housesTable.insertRow();
                    row.innerHTML = `
                        <td>${house.id}</td>
                        <td>${house.name}</td>
                        <td>${house.status}</td>
                        <td>${house.tenant || "N/A"}</td>
                        <td>
                            <button onclick="editHouse(${house.id})">Edit</button>
                            <button onclick="deleteHouse(${house.id})">Delete</button>
                        </td>
                    `;
                });
            })
            .catch(error => {
                console.error("Error fetching houses data:", error);
            });
    }
}

// Maintenance Requests Functionality
function initializeMaintenanceRequests() {
    const maintenanceForm = document.querySelector("#maintenanceForm");
    if (maintenanceForm) {
        maintenanceForm.addEventListener("submit", event => {
            event.preventDefault();
            const formData = new FormData(maintenanceForm);

            fetch("/api/maintenance", {
                method: "POST",
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    alert("Maintenance request submitted successfully!");
                    maintenanceForm.reset();
                })
                .catch(error => {
                    console.error("Error submitting maintenance request:", error);
                });
        });
    }
}

// Reports Functionality
function initializeReportsSection() {
    const downloadButton = document.querySelector("#downloadReport");
    if (downloadButton) {
        downloadButton.addEventListener("click", () => {
            window.location.href = "/reports/download";
        });
    }
}

// Call Initialization Functions for Specific Pages
if (document.body.classList.contains("dashboard-page")) {
    loadDashboardData();
}
if (document.body.classList.contains("guest-page")) {
    initializeGuestForm();
}
if (document.body.classList.contains("houses-page")) {
    initializeHousesTable();
}
if (document.body.classList.contains("maintenance-page")) {
    initializeMaintenanceRequests();
}
if (document.body.classList.contains("reports-page")) {
    initializeReportsSection();
}
