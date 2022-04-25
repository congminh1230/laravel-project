<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table-> string('name');
            $table-> string('slug');
            $table-> integer('category_id');
            $table-> string('description')-> nullable();
            $table-> integer('quantity')->default(1);
            $table-> decimal('price_origin')->default(0);
            $table-> decimal('price_sale')-> default(0);
            $table-> integer('discount_percent')-> default(0);
            $table-> integer('review_count')->default(0);
            $table-> integer('sell_count')-> default(0);
            $table-> integer('like_count')-> default(0);
            $table-> integer('user_id');
            $table-> integer('shop_id');
            $table-> json('attribute')-> nullable();
            $table-> integer('status')-> default(0);
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
        Schema::dropIfExists('product');
    }
}
