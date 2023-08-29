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
        Schema::create('berkaspsbs', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('new_student_id')->constrained('new_students')->cascadeOnDelete();
            $table->string('avatar')->nullable();
            $table->string('kk')->nullable();
            $table->string('akte_lahir')->nullable();
            $table->string('ktp_wali')->nullable();
            $table->string('surat_aktif_sekolah')->nullable();
            $table->string('surat_kematian_ayah')->nullable();
            $table->string('akte_kematian_ayah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkaspsbs');
    }
};
