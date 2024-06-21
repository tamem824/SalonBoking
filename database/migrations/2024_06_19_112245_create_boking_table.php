<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBokingTable extends Migration
{
    public function up()
    {
        Schema::create('boking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamp('booked_at');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('service')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('boking');
    }
}
