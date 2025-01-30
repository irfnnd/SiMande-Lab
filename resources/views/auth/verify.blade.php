<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .auth-box {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .auth-logo img {
            max-width: 250px;
        }

        .auth-box h4 {
            font-weight: bold;
            color: #212529;
        }

        .btn-link {
            color: #007bff;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="auth-box">
        <a href="/" class="auth-logo mb-4 d-flex justify-content-center">
            <img src="{{ asset('logo.png') }}" alt="Logo">
        </a>

        <h4 class="mb-4">Verifikasi alamat email anda</h4>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                Tautan verifikasi baru telah dikirim.
            </div>
        @endif

        <p>Sebelum melanjutkan, periksa email Anda untuk tautan verifikasi.</p>
        <p>Jika Anda belum menerima email klik di sini untuk mengirim ulang.</p>

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Kirim Ulang</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
