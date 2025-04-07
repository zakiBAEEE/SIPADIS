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
        Schema::create('historis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_id')->constrained('surat_masuk');
            $table->enum('event_type', ['input', 'verifikasi', 'penerusan', 'pengarsipan']);
            $table->text('description')->nullable();
            $table->foreignId('performed_by')->constrained('users');
            $table->timestamp('event_timestamp')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historis');
    }
};
