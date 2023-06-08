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
        Schema::create('penginapans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('content_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('slug');
            $table->string('alamat');
            $table->text('deskripsi');
            $table->string('hp', 15);
            $table->string('thumbnail');
            $table->integer('status_publish')->default('0');
            $table->timestamps();

            $table->foreign('content_id')
            ->references('id')
            ->on('contents')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penginapans');
    }
};
