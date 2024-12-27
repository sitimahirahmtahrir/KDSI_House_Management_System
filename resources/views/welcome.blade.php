<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KDSI House Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .hero-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #001f3f; /* Navy Blue */
            color: white;
            margin-bottom: 30px;
        }
        .hero-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .hero-subtitle {
            font-size: 1.2rem;
            color: #d1d5db;
        }
        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .feature-card {
            background-color: #ffffff;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .feature-icon {
            font-size: 2rem;
            color: #007bff;
            margin-bottom: 10px;
        }
        .feature-title {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
        .feature-description {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .auth-buttons {
            margin-top: 30px;
        }
        .auth-buttons a {
            margin: 0 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="hero-section">
        <h1 class="hero-title">KDSI House Management System</h1>
        <p class="hero-subtitle">Simplifying staff housing, maintenance, and guest management.</p>
    </div>

    <div class="features container">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-tachometer-alt"></i>
            </div>
            <div class="feature-title">Dashboard</div>
            <div class="feature-description">Get a quick overview of housing and maintenance status.</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-home"></i>
            </div>
            <div class="feature-title">House Management</div>
            <div class="feature-description">Manage vacant, occupied, and under-maintenance houses.</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-tools"></i>
            </div>
            <div class="feature-title">Maintenance Requests</div>
            <div class="feature-description">Track and resolve maintenance requests efficiently.</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="feature-title">Guest Management</div>
            <div class="feature-description">Verify and monitor guest check-ins and check-outs.</div>
        </div>
    </div>

    <div class="text-center auth-buttons">
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
    </div>
    @include('components.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
