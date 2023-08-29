<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Santri Baru</title>
    <link rel="stylesheet" href="{{asset('my-css/formulir-psb.css')}}">
</head>
<body>
    <div class="header">
        <img src="{{asset('images/kop.jpg')}}" alt="Logo" class="kop">
        <div class="title">
            FORMULIR PENDAFTARAN SANTRI BARU
            <br>
            PESANTREN IMAM SYAFI'I - SIBREH - ACEH BESAR
            <br>
            TAHUN PELAJARAN 2023/2024
        </div>
    </div>

    <div class="form-container">
        {{-- formulir start --}}
        <div>
            <div id="identitas_santri">
                <h4>A. Identitas Santri</h4>
                <table>
                    <tr class="tr">
                        <td class="identitas">Nama lengkap Siswa:</td>
                        <th class="isi_identitas">{{strToUpper($data->nama)}}</th>
                    </tr>
                    <tr >
                    <tr class="tr">
                        <td class="identitas">Tempat, Tanggal Lahir:</td>
                        <th class="isi_identitas">{{strToUpper($data->tempat_lahir_siswa)}}, {{Carbon\Carbon::parse($data->tanggal_lahir_siswa)->format('d F Y')}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">NISN:</td>
                        <th class="isi_identitas">{{$data->nisn}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Jenis kelamin:</td>
                        <th class="isi_identitas">{{$data->jenis_kelamin}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Hubungan keluarga:</td>
                        <th class="isi_identitas">{{$data->hubungan_keluarga}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Status dalam keluarga:</td>
                        <th class="isi_identitas">{{$data->status_anak}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Anak Ke:</td>
                        <th class="isi_identitas">{{$data->anak_ke ."dari ".$data->jumlah_keluarga}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Agama:</td>
                        <th class="isi_identitas">Islam</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Nomor Kartu Keluarga:</td>
                        <th class="isi_identitas">{{$data->nik}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">NIK Anak:</td>
                        <th class="isi_identitas">{{$data->nik_siswa}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">No Registrasi Akte Anak:</td>
                        <th class="isi_identitas">{{$data->no_akte}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Hobi:</td>
                        <th class="isi_identitas">{{$data->hobi}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Cita Cita:</td>
                        <th class="isi_identitas">{{$data->cita_cita}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Tinggi badan:</td>
                        <th class="isi_identitas">{{$data->tinggi_badan}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Berat Badan:</td>
                        <th class="isi_identitas">{{$data->berat_badan}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Nama Paud:</td>
                        <th class="isi_identitas">{{$data->nama_paud}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Nama TK:</td>
                        <th class="isi_identitas">{{$data->nama_tk}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Sekolah Asal:</td>
                        <th class="isi_identitas">{{$data->sekolah_sebelumnya}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Alamat Sekolah Asal:</td>
                        <th class="isi_identitas">{{$data->alamat_sekolah_sebelumya}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Alamat Anak:</td>
                        <th class="isi_identitas">{{$data->alamat_siswa}}</th>
                    </tr>
        
                </table>
            </div>
    
            <div id="identitas_ayah" class="page-break">
                <h4>B. Identitas Ayah</h4>
                <table>
                    <tr class="tr">
                        <td class="identitas">Nama Ayah:</td>
                        <th class="isi_identitas">{{strToUpper($data->nama_ayah	)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">NIK Ayah:</td>
                        <th class="isi_identitas">{{strToUpper($data->nik_ayah)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Tempat, Tanggal Lahir:</td>
                        <th class="isi_identitas">{{strToUpper($data->tempat_lahir_ayah)}}, {{$data->tanggal_lahir_ayah}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Status:</td>
                        <th class="isi_identitas">{{strToUpper($data->status_ayah)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Pendidikan:</td>
                        <th class="isi_identitas">{{strToUpper($data->pendidikan_ayah)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Pekerjaan:</td>
                        <th class="isi_identitas">{{strToUpper($data->pekerjaan_ayah)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Penghasilan:</td>
                        <th class="isi_identitas">{{strToUpper($data->penghasilan_ayah)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">No Telp/HP:</td>
                        <th class="isi_identitas">{{strToUpper($data->no_hp_ayah)}}</th>
                    </tr>
                </table>
            </div>
            <div id="identitas_ibu">
                <h4>B. Identitas ibu</h4>
                <table>
                    <tr class="tr">
                        <td class="identitas">Nama ibu:</td>
                        <th class="isi_identitas">{{strToUpper($data->nama_ibu	)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">NIK ibu:</td>
                        <th class="isi_identitas">{{strToUpper($data->nik_ibu)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Tempat, Tanggal Lahir:</td>
                        <th class="isi_identitas">{{strToUpper($data->tempat_lahir_ibu)}}, {{$data->tanggal_lahir_ibu}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Status:</td>
                        <th class="isi_identitas">{{strToUpper($data->status_ibu)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Pendidikan:</td>
                        <th class="isi_identitas">{{strToUpper($data->pendidikan_ibu)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Pekerjaan:</td>
                        <th class="isi_identitas">{{strToUpper($data->pekerjaan_ibu)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Penghasilan:</td>
                        <th class="isi_identitas">{{strToUpper($data->penghasilan_ibu)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">No Telp/HP:</td>
                        <th class="isi_identitas">{{strToUpper($data->no_hp_ibu)}}</th>
                    </tr>
                </table>
            </div>
            <div id="identitas_wali">
                <h4>B. Identitas Wali</h4>
                <table>
                    <tr class="tr">
                        <td class="identitas">Nama wali:</td>
                        <th class="isi_identitas">{{strToUpper($data->nama_wali	)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">NIK wali:</td>
                        <th class="isi_identitas">{{strToUpper($data->nik_wali)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Tempat, Tanggal Lahir:</td>
                        <th class="isi_identitas">{{strToUpper($data->tempat_lahir_wali)}}, {{$data->tanggal_lahir_wali}}</th>
                    </tr>
    
                    <tr class="tr">
                        <td class="identitas">Pendidikan:</td>
                        <th class="isi_identitas">{{strToUpper($data->pendidikan_wali)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Pekerjaan:</td>
                        <th class="isi_identitas">{{strToUpper($data->pekerjaan_wali)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Penghasilan:</td>
                        <th class="isi_identitas">{{strToUpper($data->penghasilan_wali)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">No Telp/HP:</td>
                        <th class="isi_identitas">{{strToUpper($data->no_hp_wali)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Alamat Wali:</td>
                        <th class="isi_identitas"></th>
                    </tr>
                </table>
            </div>
    
            <div class="signature page-break">
                <div class="single-signature">
                    <div>Sibreh, {{Carbon\Carbon::parse(now())->format('d F Y')}}</div>
                    <div style="margin-bottom:55px;">Ortu/Wali</div>
                    <div>..............................</div>
                </div>
            </div>
        </div>
        {{-- formulir end --}}
       


        {{-- halaman surat pernyataan santri start --}}
        <div id="sp-santri-baru page-break">
            <div class="header">
                <div class="title">
                    SURAT PERNYATAAN CALON SANTRI BARU
                    <br>
                    PESANTREN IMAM SYAFI’I
                    <br>
                    TAHUN PELAJARAN 2023/2024
                </div>
            </div>
            <p style="margin-top: 50px;">Yang bertanda tangan dibawah ini saya, calon santri:</p>
            <table>
                <tr class="tr">
                    <td class="identitas">Nama lengkap Siswa:</td>
                    <th class="isi_identitas">{{strToUpper($data->nama)}}</th>
                </tr>
                <tr class="tr">
                    <td class="identitas">Kelas:</td>
                    <th class="isi_identitas">..........................</th>
                </tr>
                <tr >
                <tr class="tr">
                    <td class="identitas">Tempat, Tanggal Lahir:</td>
                    <th class="isi_identitas">{{strToUpper($data->tempat_lahir_siswa)}}, {{Carbon\Carbon::parse($data->tanggal_lahir_siswa)->format('d F Y')}}</th>
                </tr>
                <tr class="tr">
                    <td class="identitas">NISN:</td>
                    <th class="isi_identitas">{{$data->nisn}}</th>
                </tr>

                <tr class="tr">
                    <td class="identitas">Alamat asal:</td>
                    <th class="isi_identitas">{{$data->nik_anak}}</th>
                </tr>
    
            </table>
            <div class="judul">
                <h4>MENYATAKAN</h4>
            </div>
            <div>
                <ol>
                    <li>Sanggup mematuhi peraturan dan tata tertib Pesantren Imam Syafi'i Sibreh - Aceh Besar</li>
                    <li>Sanggup menjaga nama baik pribadi dan  Pesantren Imam Syafi’i Sibreh – Aceh Besar.</li>
                    <li>Sanggup menerima dengan ikhlas fasilitas yang diberikan oleh Pesantren Imam Syafi’i Sibreh – Aceh Besar.</li>
                    <li>Sanggup melaksanakan amanah yang diberikan sebagai santri.</li>
                    <li>Sanggup menerima dengan ikhlas sanksi yang diberikan, apabila melanggar tata tertib  Pesantren
                        Imam Syafi’i Sibreh – Aceh Besar.</li>
                </ol>
            </div>
            <p>
                Demikian surat pernyataan ini saya buat dengan sebenarnya, tanpa paksaan dari pihak manapun.
            </p>

            <div class="page-break">
                <table>
                    <tr>
                        <td>
                            <div class="signature-area">
                                <div>Mengetahui,</div>
                                <div style="margin-bottom:55px;">Orang tua/Wali,</div>
                                <div>..............................</div>
                            </div>
                        </td>
                        <td style="margin-left: 100px;">
                            <div class="signature-area">
                                <div style="margin-bottom:55px;">Pembuat Pernyataan,</div>
                                <div>..............................</div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
           
        </div>
        {{-- halaman surat pernyataan santri end --}}
        



        {{-- halaman surat pernyataan santri start --}}
        <div id="sp-wali">
            <div class="header">
                <div class="title">
                    SURAT PERNYATAAN KESANGGUPAN
                    <br>
                    ORANG TUA /WALI SANTRI 
                </div>
            </div>
            <div>
                <p>Yang bertanda tangan dibawah ini:</p>
                <table>
                    <tr class="tr">
                        <td class="identitas">Nama:</td>
                        <th class="isi_identitas">..........................</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Alamat Asal:</td>
                        <th class="isi_identitas">..........................</th>
                    </tr>
                    <tr >
        
                </table>
            </div>
            <div>
                <p>Atas nama orang tua/Wali dari calon santri :</p>
                <table>
                    <tr class="tr">
                        <td class="identitas">Nama:</td>
                        <th class="isi_identitas">{{strToUpper($data->nama)}}</th>
                    </tr>
                    <tr class="tr">
                        <td class="identitas">Alamat Asal:</td>
                        <th class="isi_identitas">{{$data->no_pendaftaran}}</th>
                    </tr>
                    <tr >
        
                </table>
            </div>
           
            
            <div>
                <p>Dengan ini menyatakan bahwa :</p>
                <ol>
                    <li>Bersedia melengkapi persyaratan administrasi yang masih kurang</li>
                    <li>Bersedia menyelesaikan setiap permasalahan yang terjadi di Pesantren secara
                        kekeluargaan.
                    </li>
                    <li>Bersedia mengobati/menarik kembali anak saya, apabila di kemudian hari terbukti
                        mengidap penyakit berat (bawaan).
                    </li>
                   
                </ol>
            </div>
            <p>
                Demikian surat pernyataan ini saya buat dengan sebenarnya, tanpa paksaan dari pihak manapun.
            </p>

            <div class="signature">
                <div class="single-signature">
                    <div>Sibreh, {{Carbon\Carbon::parse(now())->format('d F Y')}}</div>
                    <div style="margin-bottom:55px;">Ortu/Wali</div>
                    <div>..............................</div>
                </div>
            </div>
        </div>
        {{-- halaman surat pernyataan santri end --}}
        
    

    </div>
</body>
</html>
