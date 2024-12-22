import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Dashboard from './components/Dashboard';
import Guests from './components/Guests';
import Houses from './components/Houses';
import Login from './components/Login';
import Maintenance from './components/Maintenance';
import Register from './components/Register';
import Reports from './components/Reports';
import './css/style.css';

function App() {
    return (
        <Router>
            <div>
                <Routes>
                    <Route path="/" element={<Login />} />
                    <Route path="/register" element={<Register />} />
                    <Route path="/dashboard" element={<Dashboard />} />
                    <Route path="/houses" element={<Houses />} />
                    <Route path="/guests" element={<Guests />} />
                    <Route path="/maintenance" element={<Maintenance />} />
                    <Route path="/reports" element={<Reports />} />
                </Routes>
            </div>
        </Router>
    );
}

export default App;
