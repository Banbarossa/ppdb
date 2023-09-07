<div>
    <form action="" wire:submit.prevent="storeData">
        <div class="card p-3 border border-4 border-primary border-top-0 border-end-0 border-bottom-0">
            <div class="card-header">
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
                                <button class="nav-link {{$current_step == 1 ? 'active':''}}">Profil Siswa</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{$current_step == 2 ? 'active':''}}">Data Orang Tua</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{$current_step == 3 ? 'active':''}}">Data Sekolah</button>
                            </li>
                          </ul>
                    </div>
                </div>

                

                <form action="" wire:submit.prevent="storeData">
                    <div class="row {{$current_step != 1 ? 'd-none':''}}">
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
                        </div>

                        <div class="col-12 col-lg-6">
                            {{-- aktifkan --}}
                            <div class="form-group mb-3">
                                <label class="form-label" for="tanggal_lahir_siswa">Tanggal Lahir</label>
                                <input type="date" class="form-control form-control-lg @error('tanggal_lahir_siswa') is-invalid @enderror" wire:model="tanggal_lahir_siswa" id="tanggal_lahir_siswa"  placeholder="Tanggal lahir siswa" />
                                <x-input-error :messages="$errors->get('tanggal_lahir_siswa')" class="mt-2"/>
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
        
                            {{-- aktifkan --}}
                            <div class="form-group mb-3">
                                <label class="form-label" for="alamat_siswa">Alamat Lengkap Siswa</label>
                                <textarea wire:model="alamat_siswa" class="form-control @error('alamat_siswa') is-invalid @enderror" rows="3" placeholder="Alamat Siswa"></textarea>
                                <x-input-error :messages="$errors->get('alamat_siswa')" class="mt-2"/>
                            </div>
                            
                        </div>

                        <div class="d-flex justify-contents-end">
                            <button type="button" wire:click="firstStepSubmit" id="submitButton" class="btn btn-primary px-4 ms-auto">Selanjutnya</button>
                        </div>

                        
                    

                    </div>

                    {{-- Orang tua --}}

                    <div class="row {{$current_step != 2 ? 'd-none':''}}">
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control form-control-lg @error('nama_ayah') is-invalid @enderror" wire:model="nama_ayah" id="nama_ayah" placeholder="Nama ayah" />
                                <x-input-error :messages="$errors->get('nama_ayah')" class="mt-2"/>
                            </div>

                            {{-- aktifkan --}}
                            <div class="form-group mb-3">
                                <label class="form-label" for="pekerjaan_ayah">pekerjaan_ayah</label>
                                <input type="text" class="form-control form-control-lg @error('pekerjaan_ayah') is-invalid @enderror" wire:model="pekerjaan_ayah" id="pekerjaan_ayah"  placeholder="Pekerjaan Ayah" />
                                <x-input-error :messages="$errors->get('pekerjaan_ayah')" class="mt-2"/>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No HP (+62)</label>
                                <input class="form-control form-control-lg @error('no_hp_ayah') is-invalid @enderror"
                                    type="text" id="no_hp_ayah" wire:model="no_hp_ayah"
                                    placeholder="Enter your phone number" />
                                <x-input-error :messages="$errors->get('no_hp_ayah')" class="mt-2" />
                            </div>
                        </div>


                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="nama_ibu">Nama ibu</label>
                                <input type="text" class="form-control form-control-lg @error('nama_ibu') is-invalid @enderror" wire:model="nama_ibu" id="nama_ibu"  placeholder="Nama Ibu" />
                                <x-input-error :messages="$errors->get('nama_ibu')" class="mt-2"/>
                            </div>

                            {{-- aktifkan --}}
                            <div class="form-group mb-3">
                                <label class="form-label" for="pekerjaan_ibu">pekerjaan_ibu</label>
                                <input type="text" class="form-control form-control-lg @error('pekerjaan_ibu') is-invalid @enderror" wire:model="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" />
                                <x-input-error :messages="$errors->get('pekerjaan_ibu')" class="mt-2"/>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No HP (+62)</label>
                                <input class="form-control form-control-lg @error('no_hp_ibu') is-invalid @enderror"
                                    type="text" id="no_hp_ibu" wire:model="no_hp_ibu"
                                    placeholder="Enter your phone number" />
                                <x-input-error :messages="$errors->get('no_hp_ibu')" class="mt-2" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="button" wire:click="decreaseStep" id="submitButton" class="btn btn-primary px-4">Sebelumnya</button>
                            </div>
                            <div>
                                <button type="button" wire:click="secondStepSubmit" id="submitButton" class="btn btn-primary px-4">Selanjutnya</button>
                            </div>
                            {{-- @if ($current_step == 3)
                                <div >
                                    <button type="button" wire:click="secondStepSubmit" id="submitButton" class="btn btn-success px-4">Kirim Data</button>
                                </div>
                            @endif --}}
                        </div>
                        
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
                                <label class="form-label" for="npsn_sekolah_sebelumnya">NPSN Sekolah <span class="ms-3"><small class="text-danger">Anda dapat mencari npsn Sekolah</small></span> <span><a href="https://referensi.data.kemdikbud.go.id/" target="_blank" class="badge bg-success">disini</a></span></label>
                                <input type="number" class="form-control form-control-lg @error('npsn_sekolah_sebelumnya') is-invalid @enderror" wire:model="npsn_sekolah_sebelumnya" id="npsn_sekolah_sebelumnya"  placeholder="NPSN Sekolah Sebelumnya" />
                                <x-input-error :messages="$errors->get('npsn_sekolah_sebelumnya')" class="mt-2"/>
                            </div>

    
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end">
                                    <button type="button" wire:click="storeData" id="submitButton" class="btn btn-success px-4">Kirim Data</button>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
            {{-- <div class="card-footer">
                <div class="d-flex justify-content-between">
                        <div class="d-inline {{$current_step == 1 ?'d-none':''}}">
                            <button type="button" wire:click="decreaseStep" id="submitButton" class="btn btn-primary px-4">Sebelumnya</button>
                        </div>
                        <div class="ms-auto {{$current_step == 3 ?'d-none':''}}">
                            <button type="button" wire:click="addStep" id="submitButton" class="btn btn-primary px-4">Selanjutnya</button>
                        </div>
                        @if ($current_step == 3)
                            <div >
                                <button type="button" wire:click="addStep" id="submitButton" class="btn btn-success px-4">Kirim Data</button>
                            </div>
                        @endif
                    </div>
                    

                </div>
            </div> --}}
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
