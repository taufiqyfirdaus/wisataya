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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_penginapan')->unsigned();
            $table->date('checkin');
            $table->date('checkout');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_penginapan')
            ->references('id')
            ->on('penginapans')
            ->onDelete('cascade');

            $table->foreign('id_user')
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
        Schema::dropIfExists('transactions');
    }
};
