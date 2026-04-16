<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->unsignedBigInteger('id_penumpang');
            $table->unsignedBigInteger('id_jadwal');
            $table->date('tanggal_pesan');
            $table->integer('jumlah_tiket');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pemesanan');
    }
};