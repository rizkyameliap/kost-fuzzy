<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('owner_name');
            $table->string('phone');
            $table->decimal('price_per_year', 15, 2); // biaya per tahun
            $table->integer('distance_to_campus'); // dalam meter
            $table->integer('facility_count'); // jumlah fasilitas
            $table->enum('cleanliness', ['Ya', 'Cukup', 'Tidak']); // kebersihan
            $table->enum('security', ['Ya', 'Tidak']); // keamanan
            $table->enum('food_access', ['Mudah', 'Sulit']); // akses makanan
            $table->text('facilities')->nullable(); // daftar fasilitas (JSON)
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kosts');
    }
};