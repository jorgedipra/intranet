<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedesSocialesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'redes_sociales';

    /**
     * Run the migrations.
     * @table redes_sociales
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('Id');
            $table->string('Nombre', 20)->comment('nombre de la red social');
            $table->string('Logo', 50)->comment('class de icono( fontawesome 5)');
            $table->string('Url', 50)->comment('Url de la red social');
            $table->integer('Id_Pefil')->comment('perfil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
