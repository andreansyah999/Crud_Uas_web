<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemain_olahragas', function (Blueprint $table) {
            $table->id('id_event');
            $table->string('gambar');
            $table->string('nama_event');
            $table->date('tanggal');
            $table->string('tempat');
            $table->string('penanggung_jawab');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemain_olahragas');
    }
};