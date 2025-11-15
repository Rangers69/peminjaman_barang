<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Tamu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f6fa;
        }
        .navbar {
            background: #007bff;
            color: white;
            padding: 1rem;
        }
        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn {
            background: white;
            color: #007bff;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 5px;
        }
        .btn-outline {
            border: 1px solid white;
            background: transparent;
            color: white;
        }
        .content {
            padding: 2rem;
            display: flex;
            justify-content: center;
        }
        .form-section {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            width: 400px;
        }
        .form-card input,
        .form-card textarea {
            width: 100%;
            margin-bottom: 1rem;
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn-primary {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            padding: 0.6rem;
            width: 100%;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 1rem;
            background: #f1f1f1;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
<nav class="navbar">
    <div class="container">
        <h2 class="logo">SMK MUHAMMADIYAH 15 JAKARTA</h2>
        <div class="auth-links">
            <a href="<?= base_url('auth/login') ?>" class="btn">Login</a>
            <a href="<?= base_url('auth/register') ?>" class="btn btn-outline">Register</a>
        </div>
    </div>
</nav>
<main class="content">
