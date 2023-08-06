<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Akun berhasil</title>
    <style>
        /* Reset some default styles */
        body, p {
            margin: 0;
            padding: 0;
        }

        /* Container styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        /* Header styles */
        .header {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            color: maroon;
            margin-bottom: 10px;
        }

        /* Content styles */
        .content {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
        }

        .content h2 {
            color: maroon;
            margin-bottom: 10px;
        }

        .content ul {
            padding-left: 20px;
        }

        .content li {
            margin-bottom: 5px;
        }

        .content p {
            margin-top: 20px;
        }

        /* Footer styles */
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Registrasi Akun berhasil</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Detail Akun</h2>
            <ul>
                <li>Nama Siswa: {{$user->name}}</li>
                <li>Email: {{$user->email}}</li>
            </ul>

            <p>Silahkan menunggu verifikasi akun oleh panitia. Jika dalam waktu 48 jam belum aktif, Anda dapat menghubungi panitia.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Email ini dibuat secara otomatis, mohon jangan membalas.</p>
        </div>
    </div>
</body>

</html>
