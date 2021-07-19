<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayedsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('playeds', function (Blueprint $table) {
      $table->unsignedSmallInteger('artist_id');
      $table->unsignedSmallInteger('album_id');
      $table->unsignedSmallInteger('track_id');
      $table->timestamp('played');
      $table->timestamps();

      $table->foreign('artist_id')->references('artist_id')->on('artists');
      $table->foreign('album_id')->references('album_id')->on('albums');
      $table->foreign('track_id')->references('track_id')->on('tracks');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('playeds');
  }
}
