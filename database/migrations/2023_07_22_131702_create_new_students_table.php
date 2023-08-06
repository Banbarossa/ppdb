<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('new_students', function (Blueprint $table) {
            // form register (id siswa)
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('no_pendaftaran')->nullable();
            $table->string('nama');
            $table->string('no_hp');
            $table->string('jenjang')->nullable();
            $table->string('jalur_masuk')->nullable();
            $table->integer('biaya_pendaftaran');

            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->string('nisn', 10)->nullable();
            $table->string('tempat_lahir_siswa')->nullable();
            $table->date('tanggal_lahir_siswa')->nullable();
            $table->string('agama')->nullable();
            $table->string('nik', 16)->nullable();
            $table->string('nik_siswa', 16)->nullable();
            $table->string('no_akte')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('gol_darah')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->string('hubungan_keluarga')->nullable();
            $table->string('status_anak')->nullable();
            $table->text('alamat_siswa')->nullable();

            // identitas sekolah sebelumnya
            $table->string('nama_paud')->nullable();
            $table->string('nama_tk')->nullable();
            $table->string('nama_sd')->nullable();
            $table->string('nama_smp')->nullable();

            $table->string('sekolah_sebelumnya')->nullable();
            $table->string('npsn_sekolah_sebelumnya')->nullable();
            $table->text('alamat_sekolah_sebelumya')->nullable();

            // Identitas_ayah
            $table->string('nama_ayah')->nullable();
            $table->string('nik_ayah', 16)->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->string('status_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->integer('penghasilan_ayah')->nullable();
            $table->string('no_hp_ayah')->nullable();

            // Identitas ibu
            $table->string('nama_ibu')->nullable();
            $table->string('nik_ibu', 16)->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->string('status_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->integer('penghasilan_ibu')->nullable();
            $table->string('no_hp_ibu')->nullable();

            // alamat orang tua
            $table->string('status_rumah')->nullable();
            $table->text('alamat_orang_tua')->nullable();

            // Identitas wali
            $table->string('nama_wali')->nullable();
            $table->string('nik_wali', 16)->nullable();
            $table->string('tempat_lahir_wali')->nullable();
            $table->date('tanggal_lahir_wali')->nullable();
            $table->string('status_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->integer('penghasilan_wali')->nullable();
            $table->string('no_hp_wali')->nullable();

            // pilih Jurusan
            $table->string('jurusan')->nullable();

            //Kelulusan
            $table->boolean('kelulusan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_students');
    }
};
