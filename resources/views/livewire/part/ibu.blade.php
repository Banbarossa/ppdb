<div class="col-12 col-lg-6">
    <div class="form-group mb-3">
        <label class="form-label" for="nama_ibu">Nama ibu</label>
        <input type="text" class="form-control form-control-lg @error('nama_ibu') is-invalid @enderror" wire:model="nama_ibu" id="nama_ibu"  placeholder="Nama Ibu" />
        <x-input-error :messages="$errors->get('nama_ibu')" class="mt-2"/>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="nik_ibu">NIK Ibu</label>
        <input type="text" class="form-control form-control-lg @error('nik_ibu') is-invalid @enderror" wire:model="nik_ibu" id="nik_ibu" placeholder="NIK Ibu" />
        <x-input-error :messages="$errors->get('nik_ibu')" class="mt-2"/>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="tempat_lahir_ibu">Tempat lahir Ibu</label>
        <input type="text" class="form-control form-control-lg @error('tempat_lahir_ibu') is-invalid @enderror" wire:model="tempat_lahir_ibu" id="tempat_lahir_ibu" placeholder="Tempat lahir Ibu" />
        <x-input-error :messages="$errors->get('tempat_lahir_ibu')" class="mt-2"/>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="tanggal_lahir_ibu"> Tanggal lahir Ibu</label>
        <input type="date" class="form-control form-control-lg @error('tanggal_lahir_ibu') is-invalid @enderror" wire:model="tanggal_lahir_ibu" id="tanggal_lahir_ibu" placeholder="Tanggal lahir ibu" />
        <x-input-error :messages="$errors->get('tanggal_lahir_ibu')" class="mt-2"/>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="status_ibu">Status Ibu</label>
        <select wire:model="status_ibu" id="status_ibu" class="form-select @error('status_ibu') is-invalid @enderror">

            @php
                $data['status_ibu'] =[
                    'Masih Hidup',
                    'Sudah Meninggal'
                ]
            @endphp
            <option value="">Pilih Status</option>
            @foreach ($data['status_ibu'] as $item)
                <option value="{{$item}}">{{$item}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status_ibu')" class="mt-2"/>

    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="pendidikan_ibu">Pendidikan Ibu</label>
        <input type="text" class="form-control form-control-lg @error('pendidikan_ibu') is-invalid @enderror" wire:model="pendidikan_ibu" id="pendidikan_ibu"  placeholder="Pekerjaan Ibu" />
        <x-input-error :messages="$errors->get('pendidikan_ibu')" class="mt-2"/>
    </div>

    {{-- aktifkan --}}
    <div class="form-group mb-3">
        <label class="form-label" for="pekerjaan_ibu">pekerjaan Ibu</label>
        <input type="text" class="form-control form-control-lg @error('pekerjaan_ibu') is-invalid @enderror" wire:model="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" />
        <x-input-error :messages="$errors->get('pekerjaan_ibu')" class="mt-2"/>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="penghasilan_ibu">penghasilan Ibu</label>
        <input type="text" class="form-control form-control-lg @error('penghasilan_ibu') is-invalid @enderror" wire:model="penghasilan_ibu" id="penghasilan_ibu"  placeholder="Pekerjaan Ayah" />
        <x-input-error :messages="$errors->get('penghasilan_ibu')" class="mt-2"/>
    </div>

    <div class="mb-3">
        <label class="form-label">No HP (+62)</label>
        <input class="form-control form-control-lg @error('no_hp_ibu') is-invalid @enderror"
            type="text" id="no_hp_ibu" wire:model="no_hp_ibu"
            placeholder="Enter your phone number" />
        <x-input-error :messages="$errors->get('no_hp_ibu')" class="mt-2" />
    </div>
</div>