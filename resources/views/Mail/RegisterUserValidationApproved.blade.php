<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            background-color: #5f0000;
            color: #ffffff;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .content {
            padding: 20px;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #5f0000;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-reject {
            background-color: #e74c3c;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #f4f4f4;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pemberitahuan Pendaftaran Santri Baru</h1>
        </div>
        <div class="content">
            <p>Halo <strong>{{$user->name}}</strong>,</p>
            <p>Status pendaftaran Anda telah diperbarui oleh admin. Berikut adalah detail pendaftaran Anda:</p>
            <p><strong>Nama:</strong> {{$user->name}}</p>
            <p><strong>Status:</strong> {{$user->approval}}</p>
            
            <p>Anda dapat masuk ke akun Anda untuk melihat informasi lebih lanjut.</p>
            
            <p>Terima kasih!</p>

            <a class="btn" href="[URL Dashboard Pendaftar]">Masuk ke Akun Saya</a>
        </div>
        <div class="footer">
            <p>Email ini dikirimkan secara otomatis. Mohon jangan membalas.</p>
        </div>
    </div>
</body>
</html>
