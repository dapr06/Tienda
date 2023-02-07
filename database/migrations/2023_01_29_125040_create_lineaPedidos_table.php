<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Producto;
use \App\Models\Pedido;



return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_pedidos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            // linea_pedido y productos N a N ya que un producto puede estar
            // varios pedidos y un pedido podría tener varios productos
            $table->foreignIdFor(Producto::class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // id_producto (tabla producto ya tiene precio producto y cantidad)
            // id_pedido correspondiente
            $table->integer('cantidad');
            $table->foreignIdFor(Pedido::class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_pedidos');
    }
};
