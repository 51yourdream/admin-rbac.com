<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->decimal('price',3)->comment('商品价钱')->default(0);
            $table->smallInteger('stocks')->comment('库存量')->default(0);
            $table->smallInteger('salenum')->comment('销量')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->dropColumn(['price','stocks','salenum']);
        });
    }
}
