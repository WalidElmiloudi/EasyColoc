<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('colocation_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('colocation_id')
                  ->references('id')
                  ->on('colocations')
                  ->onDelete('cascade');

            $table->unique(['colocation_id', 'name']);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
