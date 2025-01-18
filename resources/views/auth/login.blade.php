<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        }

        .auth-logo img {
            max-width: 250px;
        }

        .btn-outline-secondary {
            border-color: #ced4da;
        }

        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
        }

        .form-label span {
            color: #dc3545;
        }

        .auth-box h4 {
            font-weight: bold;
            text-align: center;
            color: #212529;
        }
    </style>
</head>

<body>
    <div class="auth-box">
        <a href="/" class="auth-logo mb-3 d-flex justify-content-center">
            <img src="logo.png" alt="Logo">
        </a>

        <h4 class="mb-4">Masuk</h4>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="email">Alamat email <span class="text-danger">*</span></label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" placeholder="Masukkan alamat email " required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="pwd">Kata sandi <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="password" id="pwd" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Masukkan kata sandi" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('password.request') }}" class="text-decoration-underline">Lupa kata sandi?</a>
            </div>

            <div class="mb-3 d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('register') }}" class="btn btn-secondary">Belum Terdaftar? Daftar</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
