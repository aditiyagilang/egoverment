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
        Schema::create('table_disposisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surat_id');
            $table->string('id_agenda')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            // Menambahkan kunci asing untuk menghubungkan dengan tabel 'table_surat_masuk'
            $table->foreign('surat_id')->references('id')->on('table_surat_masuk')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_disposisi');
    }
};
