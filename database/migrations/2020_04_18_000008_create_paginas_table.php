<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'paginas';

    /**
     * Run the migrations.
     * @table paginas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Id');
            $table->string('Nombre', 100)->comment('Nombre de la pagina');
            $table->string('Url', 100)->comment('Url de la pagina variable');
            $table->string('Home', 100)->comment('Url de la pagina home constante');
            $table->string('Logo', 100)->comment('imagen del logo');
            $table->string('Color', 20)->comment('Color letra');
            $table->string('Fondo', 20)->comment('Color de Fondo');
            $table->string('Descripcion', 100)->comment('nota');
            $table->integer('Id_categoria')->comment('Categórica ');
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
