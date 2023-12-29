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
            $table->ulid('id')->unique();
            $table->foreignUlid('type_id')->constrained();
            $table->foreignUlid('property_id')->constrained();
            $table->foreignUlid('product_id')->constrained();
            $table->integer('cert_id')->unsigned()->unique();
            $table->string('item_name');
            $table->string('item_number');
            $table->string('item_rating');
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
