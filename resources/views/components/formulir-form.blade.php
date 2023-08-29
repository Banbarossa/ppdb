@props(['value'])

<div class="form-row">
    <label for="nama">Nama lengkap Siswa:</label>
    <div class="form-textarea" id="nama" name="nama">{{$value ?? $value}}</div>
</div>