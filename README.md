# KDSI House Management System

Welcome to the **KDSI House Management System** repository. This project is developed as part of my **PSM 2 (Final Year Project)** for my thesis report. The system is designed to streamline the management of staff housing at **KD Sultan Ismail (KDSI), Tentera Laut Diraja Malaysia, Johor Bahru**.

---

## About the Project

The **KDSI House Management System** aims to improve the efficiency of managing staff housing, including:

- **Housing Details Management**: Track and manage house availability, occupancy, and maintenance status.
- **Guest Management**: Handle guest check-ins and check-outs with verification processes.
- **Maintenance Requests**: Submit and manage maintenance complaints with image uploads.
- **Dashboard Overview**: A real-time dashboard for administrators to view summary details, analyze reports, and track system activities.

This system is part of a pilot initiative for **KD Sultan Ismail (KDSI)**, providing a user-friendly platform to address operational challenges and enhance housing management.

---

## Project Structure

The repository is divided into the following sections:

- **Backend**: Contains the server-side application, API routes, and database interactions.
  - `app/`: Application logic.
  - `routes/`: API routing files.
  - `resources/views/`: Blade templates for the system's views.

- **Frontend**: Includes the client-side application for user interaction.
  - `public/`: Static assets like HTML and CSS files.
  - `src/components/`: React components for the UI.

- **Database**: Database migration files to manage schema setup.
  - `migrations/`: Contains scripts to create the necessary database tables.

---

## Technologies Used

- **Frontend**: React.js, HTML, CSS
- **Backend**: PHP (Laravel Framework)
- **Database**: MySQL
- **Version Control**: Git and GitHub

---

## How to Use

**Clone the Repository**
git clone https://github.com/sitimahirahmtahrir/KDSI_House_Management_System.git

**Set Up the Backend**
- Navigate to the backend/ directory.
- Install dependencies:
- composer install
- Configure the .env file with your database details.
- Run migrations:
- php artisan migrate

**Set Up the Frontend**
- Navigate to the frontend/ directory.
- Install dependencies:
- npm install
- Start the development server:
- pm start

---

## Author
**Siti Mahirah binti M Tahrir**
Year/Course: 2014/2015 | Sarjana Muda Sains Komputer (Kejuruteraan Perisian)

This project is supervised by **Dr. Ismail Fauzi Bin Isnin.**

