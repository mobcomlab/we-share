<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('image', function(Blueprint $table)
		{
			$table->increments('image_id');
			$table->string('thumbnail_url', 200);
			$table->string('standard_url', 200);
			$table->integer('count_comment');
			$table->integer('count_likes');
			$table->timestamp('posted_at');
			$table->string('link_url', 200);
			$table->string('author_image_url', 200);
			$table->string('author_name', 50);
			$table->string('author_link_url', 200);
			$table->string('username', 50);
			$table->integer('source_id');
			$table->integer('location_id');
//			$table->integer('tag_id');
			$table->timestamps();
		});

		Schema::create('source', function(Blueprint $table)
		{
			$table->increments('source_id');
			$table->string('name', 20);
			$table->timestamps();
		});

		Schema::create('location', function(Blueprint $table)
		{
			$table->increments('location_id');
			$table->string('name', 50);
			$table->string('latitude', 20);
			$table->string('longitude', 20);
			$table->timestamps();
		});

		Schema::create('tag', function(Blueprint $table)
		{
			$table->increments('tag_id');
			$table->string('tag', 50);
			$table->boolean('pull_from_ig');
			$table->string('status', 50);
			$table->timestamps();
		});

		Schema::create('imagetag', function(Blueprint $table)
		{
			$table->increments('imagetag_id');
			$table->integer('tag_id');
			$table->integer('image_id');
			$table->timestamps();
		});
		Schema::create('mintag', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('min_tag_id',50);
			$table->timestamps();
		});

		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 32);
         	$table->string('username', 32);
          	$table->string('email', 320);
          	$table->string('password', 64);
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
		Schema::drop('image');
		Schema::drop('source');
		Schema::drop('location');
		Schema::drop('tag');
		Schema::drop('imagetag');
		Schema::drop('mintag');
		Schema::drop('users');
	}

}
