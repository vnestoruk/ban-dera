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
        Schema::create('target_statuses', function (Blueprint $table) {
            $table->foreignId('target_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('node_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('error')->nullable();
            $table->string('response_time')->nullable();
            $table->string('message')->nullable();
            $table->string('status_code')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('target_statuses');
    }
};
