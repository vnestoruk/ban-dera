<?php

use App\Models\TargetIpAddress;
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
        Schema::create('target_ip_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('target_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('type', TargetIpAddress::_TYPE)->default(TargetIpAddress::_TYPE['IPv4']);
            $table->char('ip_address', 45);
            $table->char('port', 5)->default(80);
            $table->boolean('secure')->default(false);
            $table->boolean('tcp')->default(true);
            $table->boolean('udp')->default(false);
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
        Schema::dropIfExists('target_ip_addresses');
    }
};
