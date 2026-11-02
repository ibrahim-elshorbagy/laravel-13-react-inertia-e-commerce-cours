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
        Schema::create('product_attribute_value_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_attribute_value_id');
            $table->string('locale', 5);
            $table->string('name');

            $table->foreign('product_attribute_value_id', 'attr_value_translations_value_id_foreign')
                ->references('id')
                ->on('product_attribute_values')
                ->cascadeOnDelete();

            $table->unique(['product_attribute_value_id', 'locale'], 'attr_value_translations_value_id_locale_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attribute_value_translations');
    }
};
