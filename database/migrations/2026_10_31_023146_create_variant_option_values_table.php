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
        Schema::create('variant_option_values', function (Blueprint $table) {
            $table->foreignId('product_variant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_attribute_value_id')->constrained()->cascadeOnDelete();


            $table->primary(['product_variant_id', 'product_attribute_value_id'], 'variant_value_primary'); // Same value can't be attached to the same variant twice
            $table->index('product_attribute_value_id');   // "all variants that are Red"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variant_option_values');
    }
};
