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
        Schema::create('kontak', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi');
            $table->string('telepon');
            $table->string('email');
            $table->string('linkmaps')->nullable(); // kalau masih dibutuhkan
            $table->string('link_ig')->nullable();
            $table->string('link_twitter')->nullable();
            $table->string('link_fb')->nullable();
            $table->string('link_tiktok')->nullable();
            $table->string('link_youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak');
    }
};
