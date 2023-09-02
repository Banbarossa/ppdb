<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('new_students', function (Blueprint $table) {
            $table->foreignUuid('jenjang_id')->nullable();
        });

        DB::table('new_students')->update([
            'jenjang_id' => DB::raw('jenjang'),
        ]);

        Schema::table('new_students', function (Blueprint $table) {
            $table->dropColumn('jenjang');
        });
        Schema::table('new_students', function (Blueprint $table) {
            $table->foreign('jenjang_id')->references('id')->on('jenjangs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('new_students', function (Blueprint $table) {
            $table->string('jenjang')->nullable();
            $table->dropForeign(['jenjang_id']);
            $table->dropColumn('jenjang_id');
        });
    }
};
