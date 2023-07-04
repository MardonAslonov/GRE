<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('totals', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('variant_id');
            $table->foreign('variant_id')
                ->references('id')
                ->on('variants')
                ->onDelete('cascade');

            $table->string('userName');
            $table->string('userSurname');
            $table->string('totalCorrect');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('totals');
    }
};
