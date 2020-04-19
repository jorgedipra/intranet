<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarruselTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'carrusel';

    /**
     * Run the migrations.
     * @table carrusel
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('Id');
            $table->string('Url', 50)->comment('url de la imagen');
            $table->string('Title', 30)->comment('h5');
            $table->string('SubTitle', 30)->comment('p de carousel-caption');
            $table->integer('Id_User')->unsigned();

            $table->index(["Id_User"], 'User_Id');


            $table->foreign('Id_User', 'User_Id')
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
