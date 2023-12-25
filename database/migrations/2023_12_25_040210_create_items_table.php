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
        Schema::create('items', function (Blueprint $table) {
            $table->ulid('id');
            $table->foreignUlid('type_id')->constrained();
            $table->integer('cert_id')->unsigned();
            $table->string('game_name');
            $table->string('card_name');
            $table->string('card_number');
            $table->string('card_rating');
            $table->string('set_name');
            $table->datetime('signed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
