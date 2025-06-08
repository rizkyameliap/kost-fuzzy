<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kost_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kost_id')->constrained()->onDelete('cascade');
            $table->foreignId('criteria_id')->constrained('criteria')->onDelete('cascade');
            $table->decimal('raw_value', 10, 2); // nilai asli
            $table->decimal('fuzzy_value', 5, 2); // nilai setelah fuzzifikasi
            $table->decimal('normalized_value', 8, 6); // nilai setelah normalisasi
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kost_evaluations');
    }
};