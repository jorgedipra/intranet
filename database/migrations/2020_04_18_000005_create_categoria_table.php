<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'categoria';

    /**
     * Run the migrations.
     * @table categoria
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Id');
            $table->string('Nombre', 20)->comment('Nombre de la categoria');
            $table->integer('Id_User')->comment('Perfil')->unsigned();

            $table->index(["Id_User"], 'UserId');


            $table->foreign('Id_User', 'UserId')
                ->references('Id')->on('perfil')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
