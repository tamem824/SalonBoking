<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitingTable extends Migration
{
    public function up()
    {
        Schema::create('siting', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siting');
    }
}
