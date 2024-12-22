import React from "react";
import { Routes, Route, Link } from "react-router-dom";
import Dashboard from "./components/Dashboard";
import Houses from "./components/Houses";
import Guests from "./components/Guests";
import Maintenance from "./components/Maintenance";
import Reports from "./components/Reports";
import Login from "./components/Login";
import LogoutButton from "./components/LogoutButton";

function App() {
  const isAuthenticated = !!localStorage.getItem("token"); // Check if user is logged in

  return (
    <div>
      <header className="main-header">
        <h1>KDSI House Management System</h1>
        {isAuthenticated && <LogoutButton />} {/* Show Logout button if logged in */}
      </header>
      <nav className="navbar">
        <ul>
          <li><Link to="/">Dashboard</Link></li>
          <li><Link to="/houses">Houses</Link></li>
          <li><Link to="/guests">Guests</Link></li>
          <li><Link to="/maintenance">Maintenance</Link></li>
          <li><Link to="/reports">Reports</Link></li>
        </ul>
      </nav>
      <main>
        <Routes>
          <Route path="/" element={<Dashboard />} />
          <Route path="/houses" element={<Houses />} />
          <Route path="/guests" element={<Guests />} />
          <Route path="/maintenance" element={<Maintenance />} />
          <Route path="/reports" element={<Reports />} />
          <Route path="/login" element={<Login />} />
        </Routes>
      </main>
      <footer className="main-footer">
        <p>&copy; 2024 KDSI House Management System. All Rights Reserved.</p>
      </footer>
    </div>
  );
}

export default App;
