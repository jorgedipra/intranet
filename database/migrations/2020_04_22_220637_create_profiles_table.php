<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'profiles';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('Id_User');
            $table->string('Nombre', 30)->comment('nombre de la persona');
            $table->string('Apellido', 30);
            $table->string('Correo', 50);
            $table->text('Imagen')->nullable()->default(null)->comment('imagen de perfil');
            $table->string('Title_card', 20)->comment('titulo de la pagina en la card');
            $table->string('Cargo', 30)->comment('caego que desempeña');
            $table->string('Empresa', 20)->comment('Empresa en la que trabaja');
            $table->string('Titulo_frase', 20)->comment('titulo de la frase');
            $table->string('Frase', 200)->comment('fase y autor');
            $table->text('Imagen2')->nullable()->default(null)->comment('imagen de frase');
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
