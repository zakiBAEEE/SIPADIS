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
        Schema::create('surat_masuks', function (Blueprint $table) {
           $table->id();
            $table->string('nomor_surat', 100);
            $table->string('asal_surat', 255);
            $table->date('tanggal_surat');
            $table->string('perihal', 255);
            $table->text('ringkasan')->nullable();
            $table->string('file_path')->nullable();
            $table->enum('status', ['draft', 'diverifikasi', 'diproses', 'diarsipkan'])->default('draft');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
