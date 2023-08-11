<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resi Penjualan</title>
    <link rel="stylesheet" href="resi.css">
    <style>
        :root {
            --primary-color: maroon;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .wrapper {
            padding: 30pt;
        }

        h2,
        h3 {
            text-align: center;
            color: var(--primary-color);
        }

        .header {
            margin-bottom: 20px;
            border-bottom: 2px solid #500202;
            padding-bottom: 10px;
        }

        .transaction-id {
            font-size: 14px;
            color: #555;
        }

        .customer-info {
            margin-bottom: 20px;
        }

        .customer-info span {
            font-weight: bold;
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .product-table th,
        .product-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .product-table th {
            background-color: #f1f1f1;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }

        .thank-you {
            margin-top: 60px;
            text-align: center;
            color: #007BFF;
            font-weight: bold;
            font-size: 16px;
        }

        /* Gaya dasar untuk tombol */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            /* Warna latar belakang tombol */
            color: #fff;
            /* Warna teks tombol */
            cursor: pointer;
        }

        /* Gaya ketika tombol dihover (diarahkan) */
        .btn:hover {
            background-color: #0056b3;
            /* Warna latar belakang tombol saat dihover */
        }

        /* Gaya ketika tombol ditekan (aktif) */
        .btn:active {
            background-color: #003d80;
            /* Warna latar belakang tombol saat ditekan */
        }



        /* Add more styling as needed */

    </style>

</head>

<body>
    <div class="wrapper">
        <h2>Pesantren Imam Syafi'i</h2>
        <div class="header">
            <h3>Pendaftaran Akun Baru PSB</h3>
            {{-- <p class="transaction-id">Nomor Transaksi: 123456789</p> --}}
        </div>
        <div class="customer-info">
            <p><span>Nama Siswa:</span> {{ $user->name }}</p>
            <p><span>Tanggal Pendaftaran:</span> {{ $user->created_at }}</p>
        </div>
        <table class="product-table">
            <tr>
                <th>Detail Pendaftaran</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td>Jalur Pendaftaran</td>
                <td>{{ $user->nama_jalur }}</td>
            </tr>
            <tr>
                <td>Biaya Pendaftaran</td>
                <td>{{ $user->biaya_pendaftaran }}</td>
            </tr>
        </table>



        <div class="thank-you">
            <p>Mohon untuk verifikasi, <strong>Jazzakumullahu khairan</strong> </p>
            <a href="" class="btn">Verifikasi Sekarang</a>
        </div>
    </div>
</body>

</html>
