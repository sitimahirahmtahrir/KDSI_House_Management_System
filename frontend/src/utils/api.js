import axios from 'axios';

const API_BASE_URL = 'http://localhost:8000/api'; // Replace with your backend API base URL

/**
 * Create a pre-configured Axios instance for API calls
 */
const apiClient = axios.create({
    baseURL: API_BASE_URL,
    timeout: 10000, // Timeout after 10 seconds
    headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
    },
});

/**
 * API Utility Functions
 */

// User Authentication
export const loginUser = async (credentials) => {
    try {
        const response = await apiClient.post('/auth/login', credentials);
        return response.data;
    } catch (error) {
        console.error('Error logging in user:', error);
        throw error;
    }
};

export const registerUser = async (userData) => {
    try {
        const response = await apiClient.post('/auth/register', userData);
        return response.data;
    } catch (error) {
        console.error('Error registering user:', error);
        throw error;
    }
};

// House Management
export const fetchHouses = async () => {
    try {
        const response = await apiClient.get('/houses');
        return response.data;
    } catch (error) {
        console.error('Error fetching houses:', error);
        throw error;
    }
};

export const createHouse = async (houseData) => {
    try {
        const response = await apiClient.post('/houses', houseData);
        return response.data;
    } catch (error) {
        console.error('Error creating house:', error);
        throw error;
    }
};

// Maintenance Requests
export const fetchMaintenanceRequests = async () => {
    try {
        const response = await apiClient.get('/maintenance');
        return response.data;
    } catch (error) {
        console.error('Error fetching maintenance requests:', error);
        throw error;
    }
};

export const createMaintenanceRequest = async (requestData) => {
    try {
        const response = await apiClient.post('/maintenance', requestData);
        return response.data;
    } catch (error) {
        console.error('Error creating maintenance request:', error);
        throw error;
    }
};

// Guest Management
export const fetchGuests = async () => {
    try {
        const response = await apiClient.get('/guests');
        return response.data;
    } catch (error) {
        console.error('Error fetching guests:', error);
        throw error;
    }
};

export const addGuest = async (guestData) => {
    try {
        const response = await apiClient.post('/guests', guestData);
        return response.data;
    } catch (error) {
        console.error('Error adding guest:', error);
        throw error;
    }
};

// Reports
export const fetchMonthlyReports = async () => {
    try {
        const response = await apiClient.get('/reports');
        return response.data;
    } catch (error) {
        console.error('Error fetching reports:', error);
        throw error;
    }
};

export default apiClient;
