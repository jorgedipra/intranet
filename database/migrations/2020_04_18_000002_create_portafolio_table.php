<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortafolioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'portafolio';

    /**
     * Run the migrations.
     * @table portafolio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Id');
            $table->string('Nombre', 100);
            $table->string('Url', 100);
            $table->string('Logo', 100);
            $table->string('Color', 20);
            $table->string('Fondo', 100);
            $table->string('Descripcion', 100);
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
