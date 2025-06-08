<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('saw_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kost_id')->constrained()->onDelete('cascade');
            $table->decimal('final_score', 8, 6); // skor akhir SAW
            $table->integer('rank'); // peringkat
            $table->timestamp('calculated_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('saw_results');
    }
};