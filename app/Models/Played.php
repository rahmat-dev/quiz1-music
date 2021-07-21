<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Played extends Model
{
  use HasFactory;

  protected $fillable = ['artist_id', 'album_id', 'track_id', 'played'];

  public function get_artist()
  {
    return $this->belongsTo(Artist::class, 'artist_id', 'artist_id');
  }

  public function get_album()
  {
    return $this->belongsTo(Album::class, 'album_id', 'album_id');
  }

  public function get_track()
  {
    return $this->belongsTo(Track::class, 'track_id', 'track_id');
  }
}
