<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Tamu - SMK Muhammadiyah 15 Jakarta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset & Variables */
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
            --shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.15);
            --radius: 12px;
            --radius-lg: 20px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: #f1f5f9;
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styles */
        .navbar {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            background: rgba(255, 255, 255, 0.15);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo-text h2 {
            font-size: 1.3rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .logo-text p {
            font-size: 0.5rem;
            opacity: 0.9;
            margin-top: 2px;
        }

        .auth-links {
            display: flex;
            gap: 12px;
        }

        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: var(--transition);
            font-size: 0.95rem;
            border: 2px solid transparent;
            cursor: pointer;
        }

        .btn i {
            font-size: 0.9rem;
        }

        .btn-primary {
            background-color: white;
            color: var(--primary);
        }

        .btn-primary:hover {
            background-color: #f0f9ff;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(37, 99, 235, 0.2);
        }

        .btn-outline {
            background-color: transparent;
            color: white;
            border-color: rgba(255, 255, 255, 0.3);
        }

        .btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: white;
            transform: translateY(-2px);
        }

        /* Main Content */
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 1rem;
            background-image: url('<?= base_url("assets/dist/img/muh15.png"); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
        }

        .content::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(243, 244, 246, 0.85) 0%, rgba(244, 247, 246, 0.75) 100%);
            backdrop-filter: blur(0px);
            z-index: 1;
        }

        /* Form Container */
        .form-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 500px;
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-header {
            text-align: center;
            color: white;
            margin-bottom: 2rem;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .form-header h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .form-header p {
            font-size: 1.1rem;
            opacity: 0.95;
            font-weight: 300;
            max-width: 90%;
            margin: 0 auto;
        }

        /* Form Card */
        .form-card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(10px);
            border-radius: var(--radius-lg);
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-label i {
            color: var(--primary);
            font-size: 0.85rem;
        }

        .required::after {
            content: " *";
            color: var(--danger);
        }

        .form-input,
        .form-textarea,
        .form-file {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: var(--radius);
            font-size: 1rem;
            transition: var(--transition);
            background-color: white;
        }

        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
            font-family: inherit;
        }

        /* File Input Styling */
        .file-container {
            position: relative;
        }

        .file-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.9rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: var(--radius);
            background-color: white;
            cursor: pointer;
            transition: var(--transition);
        }

        .file-label:hover {
            border-color: var(--primary);
        }

        .file-text {
            color: var(--gray);
            font-size: 0.95rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            flex: 1;
        }

        .file-btn {
            background-color: #f1f5f9;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--primary);
            flex-shrink: 0;
            margin-left: 10px;
        }

        .form-file {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--radius);
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 6px 15px rgba(37, 99, 235, 0.3);
        }

        .submit-btn:hover {
            background: linear-gradient(to right, var(--primary-dark), #1e40af);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        /* Form Validation */
        .form-input:valid:not(:placeholder-shown),
        .form-textarea:valid:not(:placeholder-shown) {
            border-color: #bbf7d0;
            background-color: #f0fdf4;
        }

        .form-input:invalid:not(:placeholder-shown),
        .form-textarea:invalid:not(:placeholder-shown) {
            border-color: #fecaca;
            background-color: #fef2f2;
        }

        .error-message {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
            align-items: center;
            gap: 5px;
        }

        /* Additional UI Improvements */
        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            pointer-events: none;
        }

        .form-input:focus + .input-icon {
            color: var(--primary);
        }

        .date-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .info-text {
            font-size: 0.85rem;
            color: var(--gray);
            margin-top: 5px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .form-header h1 {
                font-size: 2rem;
            }
            
            .form-card {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            .navbar .container {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .logo {
                justify-content: center;
            }
            
            .form-header h1 {
                font-size: 1.8rem;
            }
            
            .form-header p {
                font-size: 1rem;
            }
            
            .form-card {
                padding: 1.8rem;
            }
            
            .date-group {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }

        @media (max-width: 576px) {
            .content {
                padding: 1.5rem 1rem;
            }
            
            .form-header h1 {
                font-size: 1.6rem;
            }
            
            .form-header p {
                font-size: 0.95rem;
            }
            
            .form-card {
                padding: 1.5rem;
            }
            
            .form-input,
            .form-textarea,
            .file-label {
                padding: 0.8rem;
            }
            
            .submit-btn {
                padding: 0.9rem;
                font-size: 1rem;
            }
            
            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 400px) {
            .auth-links {
                flex-direction: column;
                width: 100%;
            }
            
            .btn {
                width: 100%;
            }
            
            .form-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-school"></i>
                </div>
                <div class="logo-text">
                    <h2>SMK MUHAMMADIYAH 15 JAKARTA</h2>
                    <p>Sistem Peminjaman Fasilitas</p>
                </div>
            </div>
            <div class="auth-links">
                <a href="<?= base_url('auth/login') ?>" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
                <a href="<?= base_url('auth/register') ?>" class="btn btn-outline">
                    <i class="fas fa-user-plus"></i> Register
                </a>
            </div>
        </div>
    </nav>