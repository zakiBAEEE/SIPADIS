<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('disposisis', function (Blueprint $table) {
            $table->id();
            $table->string('surat_id');
            $table->foreign('surat_id')->references('id')->on('surat_masuk')->onDelete('cascade');
            // Pengirim dari role tertentu (misalnya Kepala LLDIKTI atau KBU)
            $table->foreignId('dari_role_id')->constrained('roles')->onDelete('restrict');

            $table->morphs('penerima'); // menghasilkan: penerima_type, penerima_id

            $table->text('catatan')->nullable();
            $table->timestamp('tanggal_disposisi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disposisis');
    }
};
