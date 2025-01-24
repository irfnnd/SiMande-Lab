<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{asset('template-bootstrap/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Tagihan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
                <img src="logo.png" alt="Logo" style="width: 250px; height: 100px;">
            <h1>Tagihan Permintaan Pengujian</h1>
        </div>
        <hr>
        <div style="display: inline">
            <p style="display: inline; margin-right: 50px;"><strong>Nomor Invoice : </strong> {{$nomor_invoice}}</p>
            <p class="d-inline" style="display: inline"><strong>Tanggal:</strong> {{ $tanggal }}</p>
        </div>
        <div>
            <p ><strong>Nama Pelangan:</strong> {{ $nama_pelanggan }}</p>
            <p ><strong>Nama Perusahaan:</strong> {{ $nama_perusahaan }}</p>
        </div>
        <p class="d-inline"><strong>ID Tagihan:</strong> {{ $id }}</p>
        <table>
            <tr>
                <th>Parameter Uji</th>
                <td>{{ $parameter }}</td>
            </tr>
            <tr>
                <th>Jumlah Titik</th>
                <td>{{ $jumlah_titik }}</td>
            </tr>
            <tr>
                <th>Total Biaya</th>
                <td>Rp. {{ number_format($total_biaya, 0, ',', '.') }}</td>
            </tr>
        </table>
        <p style="text-align: center; font-style: italic; margin-top: 20px;">Terima kasih atas kepercayaan Anda.</p>
    </div>
</body>
</html>
