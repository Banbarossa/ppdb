<div class="col-12 col-lg-6">
    <div class="form-group mb-3">
        <label class="form-label" for="nama_ayah">Nama Ayah</label>
        <input type="text" class="form-control form-control-lg @error('nama_ayah') is-invalid @enderror" wire:model="nama_ayah" id="nama_ayah" placeholder="Nama ayah" />
        <x-input-error :messages="$errors->get('nama_ayah')" class="mt-2"/>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="nik_ayah">NIK Ayah</label>
        <input type="text" class="form-control form-control-lg @error('nik_ayah') is-invalid @enderror" wire:model="nik_ayah" id="nik_ayah" placeholder="NIK Ayah" />
        <x-input-error :messages="$errors->get('nik_ayah')" class="mt-2"/>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="tempat_lahir_ayah">Tempat lahir Ayah</label>
        <input type="text" class="form-control form-control-lg @error('tempat_lahir_ayah') is-invalid @enderror" wire:model="tempat_lahir_ayah" id="tempat_lahir_ayah" placeholder="Tempat lahir Ayah" />
        <x-input-error :messages="$errors->get('tempat_lahir_ayah')" class="mt-2"/>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="tanggal_lahir_ayah"> Tanggal lahir Ayah</label>
        <input type="date" class="form-control form-control-lg @error('tanggal_lahir_ayah') is-invalid @enderror" wire:model="tanggal_lahir_ayah" id="tanggal_lahir_ayah" placeholder="Tempat Tanggal lahir Ayah" />
        <x-input-error :messages="$errors->get('tanggal_lahir_ayah')" class="mt-2"/>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="status_ayah">Status</label>
        <select wire:model="status_ayah" id="status_ayah" class="form-select @error('status_ayah') is-invalid @enderror">

            @php
                $data['status_ayah'] =[
                    'Masih Hidup',
                    'Sudah Meninggal'
                ]
            @endphp
            <option value="">Pilih Status</option>
            @foreach ($data['status_ayah'] as $item)
                <option value="{{$item}}">{{$item}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status_ayah')" class="mt-2"/>

    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="pendidikan_ayah">pendidikan_ayah</label>
        <input type="text" class="form-control form-control-lg @error('pendidikan_ayah') is-invalid @enderror" wire:model="pendidikan_ayah" id="pendidikan_ayah"  placeholder="Pekerjaan Ayah" />
        <x-input-error :messages="$errors->get('pendidikan_ayah')" class="mt-2"/>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="pekerjaan_ayah">pekerjaan_ayah</label>
        <input type="text" class="form-control form-control-lg @error('pekerjaan_ayah') is-invalid @enderror" wire:model="pekerjaan_ayah" id="pekerjaan_ayah"  placeholder="Pekerjaan Ayah" />
        <x-input-error :messages="$errors->get('pekerjaan_ayah')" class="mt-2"/>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="penghasilan_ayah">penghasilan_ayah</label>
        <input type="text" class="form-control form-control-lg @error('penghasilan_ayah') is-invalid @enderror" wire:model="penghasilan_ayah" id="penghasilan_ayah"  placeholder="Pekerjaan Ayah" />
        <x-input-error :messages="$errors->get('penghasilan_ayah')" class="mt-2"/>
    </div>

    <div class="mb-3">
        <label class="form-label">No HP (+62)</label>
        <input class="form-control form-control-lg @error('no_hp_ayah') is-invalid @enderror"
            type="text" id="no_hp_ayah" wire:model="no_hp_ayah"
            placeholder="Enter your phone number" />
        <x-input-error :messages="$errors->get('no_hp_ayah')" class="mt-2" />
    </div>
</div>