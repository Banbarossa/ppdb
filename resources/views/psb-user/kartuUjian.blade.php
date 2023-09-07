<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Kartu Ujian Penerimaan Santri Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            padding: 20px;
            text-align: center;
        }
        
        .card-header {
            background-color: #660303;
            color: #fff;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            font-size: 18px;
            padding: 30px 0px 30px 0px;
        }
        
        .card-title {
            font-size: 24px;
            margin-top: 10px;
        }
        
        .card-text {
            font-size: 16px;
            margin-top: 5px;
        }
        
        .card-body {
            padding: 20px 40px 20px 40px;

        }
        
        .logo {
            max-width: 50px;
            margin-right: 8px;
        }
        table tbody tr th{
            text-align: start;
        }
        table tbody tr td{
            text-align: start;
        }
        .card-footer{
            text-align: center;
            margin-top: 40px
        }
        
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <img src="{{asset('images/logo.png')}}" alt="Logo" class="logo">
            <div>
                Kartu Ujian Penerimaan Santri Baru
            </div>
        </div>
        <div class="card-body">

            <table>
                <tbody>
                    <tr>
                        <th>Nomor Pendaftaran</th>
                        <th>:</th>
                        <td>{{$data->no_pendaftaran}}</td>
                    </tr>
                    <tr>
                        <th>Nama Santri</th>
                        <th>:</th>
                        <td>{{$data->nama}}</td>
                    </tr>
                    <tr>
                        <th>Jalur Pendaftaran</th>
                        <th>:</th>
                        <td>{{$data->jalur_masuk}}</td>
                    </tr>
                    <tr>
                        <th>Jenjang Sekolah</th>
                        <th>:</th>
                        <td>{{$data->jenjang->nama_jenjang}}</td>
                    </tr>
                    <tr>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>:</th>
                        <td>{{$data->tempat_lahir_siswa}}, {{$data->tanggal_lahir_siswa}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>:</th>
                        <td>{{$data->status_anak}}</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <p>informasi waktu ujian dan tempat ujian akan diinformsikan melalui Whatsapp</p>

            <h3 class="text-muted"> Jazaakumullahukhairan</h3>
        </div>
    </div>
</body>
</html>
