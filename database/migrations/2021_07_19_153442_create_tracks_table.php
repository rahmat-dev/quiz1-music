<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tracks', function (Blueprint $table) {
      $table->smallIncrements('track_id');
      $table->unsignedSmallInteger('artist_id');
      $table->unsignedSmallInteger('album_id');
      $table->string('track_name', 128);
      $table->decimal('time', 5, 2);
      $table->timestamps();

      $table->foreign('artist_id')->references('artist_id')->on('artists');
      $table->foreign('album_id')->references('album_id')->on('albums');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('tracks');
  }
}
