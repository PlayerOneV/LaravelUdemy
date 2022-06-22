<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   //Solamente agregamos la columna username a la tabla users -> la tabla la reconoce por el nombre de la migración
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   //En cada migración tenemos que escribir el código para revertirla para tener un buen control de versiones
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
