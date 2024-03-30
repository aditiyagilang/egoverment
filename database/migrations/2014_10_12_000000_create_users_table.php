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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('telegram_id')->nullable();
            $table->unsignedBigInteger('jabatan_id')->nullable();
            $table->string('alamat')->nullable();
            $table->string('notelp')->nullable();
            $table->string('foto')->nullable();
            $table->enum('level', ['Admin', 'Sekretaris', 'Kaur Umum', 'Kepala Desa', 'Lainya' ]);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('set null');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
