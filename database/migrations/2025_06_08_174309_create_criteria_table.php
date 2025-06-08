<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('criteria', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10); // C1, C2, C3, dst
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('weight', 5, 2); // bobot kriteria
            $table->enum('type', ['benefit', 'cost']); // jenis kriteria
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('criteria');
    }
};