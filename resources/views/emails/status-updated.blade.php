<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Permintaan Pengujian Diperbarui</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #007bff;
        }
        .header img {
            max-width: 120px;
        }
        .header h2 {
            color: #333;
        }
        .content {
            padding: 20px 0;
            font-size: 16px;
            color: #333;
        }
        .status {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
        }
        .footer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            font-size: 14px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header dengan Logo -->
        <div class="header">
            <img src="{{ asset('logo.png') }}" alt="Simande-Lab Logo">
            <h2>Simande-Lab</h2>
            <p>UPTD Laboratorium Dinas Lingkungan Hidup Provinsi Sumatera Barat</p>
        </div>

        <!-- Isi Email -->
        <div class="content">
            <p>Halo, <strong>{{ $permintaan->pelanggan->user->name }}</strong>,</p>
            <p>Status permintaan pengujian dengan Kode Sampel: <strong>{{ $permintaan->sampel->kode_sampel }}</strong> telah diperbarui menjadi:</p>
            <p class="status">{{ strtoupper($permintaan->status) }}</p>
            <p>Silakan masuk ke akun Anda di <a href="{{ url('/') }}">Simande-Lab</a> untuk informasi lebih lanjut.</p>
            <p>Jika Anda memiliki pertanyaan, silakan hubungi kami.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Terima kasih,</p>
            <p><strong>Tim Simande-Lab</strong></p>
            <p>UPTD Laboratorium Dinas Lingkungan Hidup Provinsi Sumatera Barat</p>
            <p>Email: support@simandelab.com | Telepon: (021) 123-4567</p>
        </div>
    </div>

</body>
</html>
