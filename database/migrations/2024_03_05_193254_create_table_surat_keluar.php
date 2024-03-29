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
        Schema::create('table_surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('perihal');
            $table->unsignedBigInteger('user_id');
            $table->string('file')->nullable();
            $table->text('coment')->nullable();
            $table->enum('status', ['pengajuan', 'acc1', 'acc2']);
            $table->enum('kategori', ['undangan', 'pengajuan']);
            $table->string('alamat')->nullable();
            $table->string('notelp')->nullable();
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
        Schema::dropIfExists('table_surat_keluar');
    }
};
