<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Peminjaman Berhasil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .success-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 3rem 2.5rem;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            max-width: 420px;
            width: 90%;
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .icon-success {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: #10b981;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 20px rgba(16,185,129,0.4);
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: #1e293b;
        }

        p {
            color: #64748b;
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        .btn-group {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.8rem 1.4rem;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 2px solid #2563eb;
            color: #2563eb;
            background: transparent;
        }

        .btn-outline:hover {
            background: #eff6ff;
            transform: translateY(-2px);
        }

        .school {
            margin-top: 2rem;
            font-size: 0.85rem;
            color: #94a3b8;
        }
    </style>
</head>
<body>

<div class="success-card">
    <div class="icon-success">
        <i class="fas fa-check"></i>
    </div>

    <h1>Peminjaman Berhasil!</h1>
    <p>
        Data peminjaman tamu berhasil disimpan ke dalam sistem.  
        Silakan tunggu konfirmasi selanjutnya.
    </p>

    <div class="btn-group">
        <a href="<?= base_url() ?>" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Kembali ke Form
        </a>
        <a href="<?= base_url('auth/login') ?>" class="btn btn-outline">
            <i class="fas fa-user"></i> Login
        </a>
    </div>

    <div class="school">
        © <?= date('Y') ?> SMK Muhammadiyah 15 Jakarta
    </div>
</div>

</body>
</html>
