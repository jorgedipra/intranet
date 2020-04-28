<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarruselsTable extends Migration
{
    /**
     * Run the migrations.
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
            
            $table->index(["Id"], 'carucel_Id_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrusels');
    }
}
