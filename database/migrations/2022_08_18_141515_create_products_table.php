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
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug",191)->unique();
            $table->text("description",1000);
            $table->decimal("price",8,2)->default(0);
            $table->decimal("old_price",8,2)->default(0);
            $table->integer("inStock")->default(0);
            $table->integer("qty")->default(0);
            $table->string("image");
            //$table->unsignedBigInteger("category_id");
            $table->timestamps();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
