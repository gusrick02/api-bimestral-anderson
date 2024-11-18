<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    public function up()
{
    if (!Schema::hasTable('consultas')) {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained()->onDelete('cascade');
            $table->foreignId('medico_id')->constrained('medicos')->onDelete('cascade');
            $table->dateTime('data_consulta');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }
}

public function down()
{
    Schema::table('consultas', function (Blueprint $table) {
        $table->dropForeign(['paciente_id']);
        $table->dropForeign(['medico_id']);
    });

    Schema::dropIfExists('consultas');
}

}
