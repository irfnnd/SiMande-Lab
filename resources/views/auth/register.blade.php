<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
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
            max-width: 150px;
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
        <a href="/" class="auth-logo mb-4 d-flex justify-content-center">
            <img src="logo.png" alt="Logo">
        </a>

        <h4 class="mb-4">Daftar</h4>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                    placeholder="Masukkan nama lengkap">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email <span class="text-danger">*</span></label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email"
                    placeholder="Masukkan alamat email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan/ Instansi <span class="text-danger">*</span></label>
                <input id="nama_perusahaan" type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror"
                    name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required autocomplete="nama_perusahaan"
                    placeholder="Masukkan nama perusahaan atau instansi">
                @error('nama_perusahaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No. Telepon <span class="text-danger">*</span></label>
                <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                    name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp"
                    placeholder="Masukkan nomor telepon">
                @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                    name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat"
                    placeholder="Masukkan alamat lengkap">
                @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi <span class="text-danger">*</span></label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password" placeholder="Masukkan kata sandi">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Konfirmasi Kata Sandi <span
                        class="text-danger">*</span></label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Masukkan kembali kata sandi">
            </div>

            <div class="mb-3 d-grid gap-2">
                <button type="submit" class="btn btn-primary">Daftar</button>
                <a href="{{ route('login') }}" class="btn btn-secondary">Sudah Mempunyai Akun? Masuk</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
