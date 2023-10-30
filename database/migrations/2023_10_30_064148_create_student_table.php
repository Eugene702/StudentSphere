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
        Schema::create('student', function (Blueprint $table) {
            $table->integer("nim");
            $table->string("nama_siswa", 35);
            $table->string("tahun_angkatan", 4);
            $table->string("fakultas", 5);
            $table->string("jurusan", 20);
            $table->string("kelas", 6);
            $table->primary("nim");
        });

        DB::statement("ALTER TABLE student MODIFY COLUMN nim INT(10)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
