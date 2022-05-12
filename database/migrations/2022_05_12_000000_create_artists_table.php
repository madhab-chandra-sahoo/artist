<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('artists', function(Blueprint $table)
        {
        	$table->charset = 'utf8';
	    	$table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id');
            $table->tinyInteger('status')->default(1);
            $table->string('name', 150);
            $table->string('email', 250);
            $table->string('mobile', 20);
            $table->string('brand_name');
            $table->string('location');
            $table->string('genre');
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('ltm_translations');
	}

}
