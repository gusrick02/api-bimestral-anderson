<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    public function up()
{
    Schema::create('medicos', function (Blueprint $table) {
        $table->id();
        $table->string('crm');
        $table->string('nome');
        $table->string('email');
        $table->string('senha');
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
