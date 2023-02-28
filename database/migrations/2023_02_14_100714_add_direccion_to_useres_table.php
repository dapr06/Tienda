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

    //Añado direccion a la tabla useres
    public function up()
    {
        Schema::table('useres', function (Blueprint $table) {
            $table->string('direccion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('useres', function (Blueprint $table) {
            //
        });
    }
};
