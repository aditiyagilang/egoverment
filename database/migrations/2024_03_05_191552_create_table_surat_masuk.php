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
        Schema::create('table_surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('id_surat');
            $table->string('nama');
            $table->text('perihal');
            $table->string('asalsurat');
            $table->string('file');
            $table->date('tanggal_surat')->nullable();
            $table->date('tanggal_terima')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Menambahkan kunci asing untuk menghubungkan dengan tabel 'users'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_surat_masuk');
    }
};
