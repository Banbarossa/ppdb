<div>
    <form action="" wire:submit.prevent="storeData">
        <div class="card p-3 border border-4 border-primary border-top-0 border-end-0 border-bottom-0">
            <div class="card-header">
                @if ($user->level_pendaftaran < 7)
                    <div class="fs-3 text-danger fw-bold">
                        Calon santri ini belum Mendaftar ulang
                    </div>
                @endif
                
                <h5 class="card-title mb-0 text-primary">
                    @if ($current_step == 1)
                        Profil Calon Siswa
                    @elseif ($current_step == 2)
                        Data Orang Tua
                    @elseif ($current_step == 3)
                        Data Sekolah Sebelumnya
                    @endif
                </h5>
            </div>
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <button class="nav-link {{$current_step == 1 ? 'active':''}}" wire:click='firstStep'>Profil Siswa</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{$current_step == 2 ? 'active':''}}" wire:click='secondStep'>Data Orang Tua</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{$current_step == 3 ? 'active':''}}" wire:click='thirdStep'>Data Sekolah</button>
                            </li>
                          </ul>
                    </div>
                </div>

                

                <form action="" wire:submit.prevent="storeData">
                    <div class="row {{$current_step != 1 ? 'd-none':''}}">
                        {{-- Identitas anak - col left --}}
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="nama">Nama Siswa</label>
                                <input type="text" wire:model="nama" class="form-control form-control-lg @error('nama') is-invalid @enderror"  id="nama"  disabled />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2"/>
                            </div>
                
                            {{-- aktifkan --}}
                            <div class="form-group mb-3">
                                <label class="form-label" for="nisn">NISN</label>
                                <input type="number" wire:model="nisn" class="form-control form-control-lg @error('nisn') is-invalid @enderror" id="nisn" placeholder="Masukkan NISN Siswa" />
                                <x-input-error :messages="$errors->get('nisn')" class="mt-2"/>
                            </div>
                
                            {{-- aktifkan --}}
                            <div class="form-group mb-3">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select wire:model="jenis_kelamin"  id="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2"/>
                            </div>
                
                            {{-- aktifkan --}}
                            <div class="form-group mb-3">
                                <label class="form-label" for="tempat_lahir_siswa">Tempat Lahir</label>
                                <input type="text" class="form-control form-control-lg @error('tempat_lahir_siswa') is-invalid @enderror" wire:model="tempat_lahir_siswa" id="tempat_lahir_siswa" placeholder="Tempat lahir siswa" />
                                <x-input-error :messages="$errors->get('tempat_lahir_siswa')" class="mt-2"/>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="tanggal_lahir_siswa">Tanggal Lahir</label>
                                <input type="date" class="form-control form-control-lg @error('tanggal_lahir_siswa') is-invalid @enderror" wire:model="tanggal_lahir_siswa" id="tanggal_lahir_siswa"  placeholder="Tanggal lahir siswa" />
                                <x-input-error :messages="$errors->get('tanggal_lahir_siswa')" class="mt-2"/>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="nik_siswa">NIK Siswa</label>
                                <input type="text" class="form-control form-control-lg @error('nik_siswa') is-invalid @enderror" wire:model="nik_siswa" id="nik_siswa"  placeholder="NIK Siswa" />
                                <x-input-error :messages="$errors->get('nik_siswa')" class="mt-2"/>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="no_akte">Nomor Akte Kelahiran</label>
                                <input type="text" class="form-control form-control-lg @error('no_akte') is-invalid @enderror" wire:model="no_akte" id="no_akte"  placeholder="Nomor Akte Kelahiran" />
                                <x-input-error :messages="$errors->get('no_akte')" class="mt-2"/>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-label" for="anak_ke">Anak Ke</label>
                                <input type="text" class="form-control form-control-lg @error('anak_ke') is-invalid @enderror" wire:model="anak_ke" id="anak_ke"  placeholder="Anak Ke" />
                                <x-input-error :messages="$errors->get('anak_ke')" class="mt-2"/>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="jumlah_saudara">Jumlah Saudara</label>
                                <input type="text" class="form-control form-control-lg @error('jumlah_saudara') is-invalid @enderror" wire:model="jumlah_saudara" id="jumlah_saudara"  placeholder="Jumlah Saudara" />
                                <x-input-error :messages="$errors->get('jumlah_saudara')" class="mt-2"/>
                            </div>
                            
                        </div>
                        {{-- Identitas anak - col rigth --}}
                        <div class="col-12 col-lg-6">
                            
                            <div class="form-group mb-3">
                                @php
                                    $hubungan =[
                                        'Anak Kandung',
                                        'Anak Tiri',
                                        'Anak Angkat',
                                    ]
                                @endphp
                                <label class="form-label" for="hubungan_keluarga">Hubungan keluarga</label>
                                <select wire:model="hubungan_keluarga" id="hubungan_keluarga" class="form-select @error('hubungan_keluarga') is-invalid @enderror">
                                    <option value="">Pilih Hubungan keluarga</option>
                                    @foreach ($hubungan as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('hubungan_keluarga')" class="mt-2"/>
                            </div>

                            <div class="form-group mb-3">
                                @php
                                    $status_anak =[
                                        'Non yatim',
                                        'Yatim',
                                        'Piatu',
                                    ]
                                @endphp
                                <label class="form-label" for="status_anak">Status Dalam Keluarga</label>
                                <select wire:model="status_anak" id="status_anak" class="form-select @error('status_anak') is-invalid @enderror">
                                    <option value="">Pilih Status</option>
                                    @foreach ($status_anak as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('status_anak')" class="mt-2"/>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="cita_cita">Cita Cita</label>
                                <input type="text" class="form-control form-control-lg @error('cita_cita') is-invalid @enderror" wire:model="cita_cita" id="cita_cita"  placeholder="Cita Cita" />
                                <x-input-error :messages="$errors->get('cita_cita')" class="mt-2"/>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="tinggi_badan">Tinggi Badan (M)</label>
                                <input type="text" class="form-control form-control-lg @error('tinggi_badan') is-invalid @enderror" wire:model="tinggi_badan" id="tinggi_badan"  placeholder="Tinggi Badan" />
                                <x-input-error :messages="$errors->get('tinggi_badan')" class="mt-2"/>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="berat_badan">Berat Badan (KG)</label>
                                <input type="text" class="form-control form-control-lg @error('berat_badan') is-invalid @enderror" wire:model="berat_badan" id="berat_badan"  placeholder="Berat Badan" />
                                <x-input-error :messages="$errors->get('berat_badan')" class="mt-2"/>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="gol_darah">Golongan Darah</label>
                                <select wire:model="gol_darah" id="gol_darah" class="form-select @error('gol_darah') is-invalid @enderror">
                                    <option value="">Pilih Golongan Darah</option>
                                    @foreach ($golongan_darah as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('gol_darah')" class="mt-2"/>
                            </div>
        
                            {{-- aktifkan --}}
                            <div class="form-group mb-3">
                                <label class="form-label" for="alamat_siswa">Alamat Lengkap Siswa</label>
                                <textarea wire:model="alamat_siswa" class="form-control @error('alamat_siswa') is-invalid @enderror" rows="3" placeholder="Alamat Siswa"></textarea>
                                <x-input-error :messages="$errors->get('alamat_siswa')" class="mt-2"/>
                            </div>
                            
                        </div>

                        {{-- <div class="d-flex justify-contents-end">
                            <button type="button" wire:click="firstStepSubmit" id="submitButton" class="btn btn-primary px-4 ms-auto">Selanjutnya</button>
                        </div> --}}

                        
                    

                    </div>

                    {{-- Orang tua --}}

                    <div class="row {{$current_step != 2 ? 'd-none':''}}">
                        @include('livewire.part.ayah')
                        @include('livewire.part.ibu')


                        
                        
                    </div>

                    <div class="row {{$current_step != 3 ? 'd-none':''}}">
                        <div class="col-12 col-lg-7">
                            <div class="form-group mb-4">
                                <label class="form-label" for="sekolah_sebelumnya">Nama Sekolah</label>
                                <input type="text" class="form-control form-control-lg @error('sekolah_sebelumnya') is-invalid @enderror" wire:model="sekolah_sebelumnya" id="sekolah_sebelumnya" placeholder="Nama Sekolah Sebelumnya" />
                                <x-input-error :messages="$errors->get('sekolah_sebelumnya')" class="mt-2"/>
                            </div>
    
                            {{-- aktifkan --}}
    
                            <div class="form-group mb-4">
                                <label class="form-label" for="npsn_sekolah_sebelumnya">NPSN Sekolah</label>
                                <input type="number" class="form-control form-control-lg @error('npsn_sekolah_sebelumnya') is-invalid @enderror" wire:model="npsn_sekolah_sebelumnya" id="npsn_sekolah_sebelumnya"  placeholder="NPSN Sekolah Sebelumnya" />
                                <x-input-error :messages="$errors->get('npsn_sekolah_sebelumnya')" class="mt-2"/>
                            </div>

    
                        </div>
                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end">
                                    <button type="button" wire:click="storeData" id="submitButton" class="btn btn-success px-4">Kirim Data</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>


            </div>

        </div>
    </form>

    @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        $('#no_hp_ayah').mask('+62 000-0000-0000')
        $('#no_hp_ibu').mask('+62 000-0000-0000')
        $('#nisn').mask('9999999999')



</script>
        
    @endpush
</div>
