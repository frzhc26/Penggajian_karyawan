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
        Schema::create('pegawai', function (Blueprint $table) {
        $table->id();

        $table->foreignId('departemen_id')
              ->constrained('departemen')
              ->cascadeOnDelete();

        $table->foreignId('jabatan_id')
              ->constrained('jabatan')
              ->cascadeOnDelete();

        $table->string('nama');
        $table->string('email')->unique();
        $table->string('telepon');
        $table->text('alamat');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
