<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_target', function (Blueprint $table) {
            $table->foreignId('target_id')->constrained('targets')->cascadeOnUpdate()->cascadeOnDelete();
            $table->char('category_key', 16);

            $table->foreign('category_key')->references('key')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('target_category');
    }
};
