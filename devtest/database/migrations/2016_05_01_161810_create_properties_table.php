<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('properties', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('bedrooms');
			$table->integer('bathrooms');
			$table->integer('storeys');
			$table->integer('garages');
			$table->double('price');
			$table->timestamp('updated_at');
			$table->timestamp('created_at');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::drop('properties');
    }
}
