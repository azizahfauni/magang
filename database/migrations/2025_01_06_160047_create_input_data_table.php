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
        Schema::create('input_data', function (Blueprint $table) {
            $table->id();
            $table->enum('bidang', [
                'Binamarga', 
                'Cipta Karya', 
                'Sumber Daya Air', 
                'Perumahan Kawasan Permukiman', 
                'Pertanahan Penataan Ruang', 
                'Bina Jasa Konstruksi'
            ]);
            $table->string('kategori');
            $table->year('tahun');
            $table->string('nama_perusahaan');
            $table->string('no_rekening');
            $table->decimal('nilai_kontrak', 15, 2);
            $table->decimal('nilai_spp', 15, 2);
            $table->text('uraian_kegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_data');
    }
};
