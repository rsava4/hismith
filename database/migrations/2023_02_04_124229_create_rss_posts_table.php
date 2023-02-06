<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRssPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rss_posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('guid', 100)->unique();
            $table->dateTime('published_at')->nullable();
            $table->string('title', 255);
            $table->text('description');
            $table->string('author', 255)->nullable();
            $table->string('image', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rss_posts');
    }
}
